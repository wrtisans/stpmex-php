<?php

namespace Wrtisans\STP\Request;

use SoapFault;
use SoapClient;
use Wrtisans\STP\Client;

class SoapHttpClient implements HttpClient
{
    /** @var string */
    const STP_ENDPOINT = 'https://%s.stpmex.com:%s/%s/webservices/SpeiConsultaServices?wsdl';

    /** @var \SoapClient */
    protected $httpClient;

    /** @var \Wrtisans\STP\Client */
    public $client;

    /** @var bool */
    protected $live;

    /**
     * Create a new http client instance.
     *
     * @param  \Wrtisans\STP\Client  $client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->live = $client->live;
    }

    /**
     * Make a request.
     *
     * @param  string  $endpoint
     * @param  array  $payload
     */
    public function makeRequest(string $endpoint, array $payload = [])
    {
        try {
            return $this->httpClient()->{$endpoint}($payload);
        } catch (SoapFault $ex) {
            throw $ex;
        }
    }

    public function httpClient(): SoapClient
    {
        return $this->soapClient ?? new SoapClient($this->endpoint(), [
            'trance' => true,
        ]);
    }

    public function endpoint(): string
    {
        if ($this->live) {
            $port = '7002';
            $prefix = 'prod';
            $route = 'spei';
        } else {
            $port = '7024';
            $prefix = 'demo';
            $route = 'speidemo';
        }

        return sprintf(
            self::STP_ENDPOINT,
            $prefix,
            $port,
            $route
        );
    }
}
