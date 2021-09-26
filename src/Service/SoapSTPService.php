<?php

namespace Wrtisans\STP\Service;

use Wrtisans\STP\Request\SoapHttpClient;

class SoapSTPService
{
    /** @var \Wrtisans\STP\Request\HttpClient */
    protected $http;

    /**
     * Create a stp service instance.
     *
     * @param  \Wrtisans\STP\Request\SoapHttpClient  $http
     *
     * @return void
     */
    public function __construct(SoapHttpClient $http)
    {
        $this->http = $http;
    }
}
