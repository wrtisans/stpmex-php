<?php

namespace Wrtisans\STP\Request;

use Wrtisans\STP\Client;
use GuzzleHttp\Client as GuzzleClient;

class RestHttpClient implements HttpClient
{
    /** @var string */
    const STP_ENDPOINT = 'https://%s.stpmex.com:%s';

    /** @var \GuzzleHttp\Client */
    protected $httpClient;

    /** @var \Wrtisans\STP\Client */
    public $client;

    /** @var bool */
    protected $live;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->live = $client->live;
    }

    /**
     * Make a request.
     *
     * @param  string  $method
     * @param  string  $endpoint
     * @param  array  $payload
     */
    public function makeRequest(string $method, string $endpoint, array $payload = [])
    {
        $endpoint = $this->live
            ? "/speiws/rest/{$endpoint}"
            : "/speidemows/rest/{$endpoint}";

        return $this->httpClient()->{$method}($endpoint, [
            'json' => $payload,
        ]);
    }

    public function httpClient()
    {
        return $this->httpClient ?? $client = new GuzzleClient([
            'base_uri' => $this->endpoint(),
        ]);
    }

    public function endpoint(): string
    {
        if ($this->live) {
            $prefix = 'prod';
            $port = '7002';
        } else {
            $prefix = 'demo';
            $port = '7024';
        }

        return sprintf(
            self::STP_ENDPOINT,
            $prefix,
            $port
        );
    }
}
