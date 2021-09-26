<?php

namespace Wrtisans\STP\Service;

use Wrtisans\STP\Request\RestHttpClient;

class RestSTPService
{
    /** @var \Wrtisans\STP\Request\RestHttpClient */
    protected $http;

    /**
     * Create a stp service instance.
     *
     * @param  \Wrtisans\STP\Request\RestHttpClient  $http
     *
     * @return void
     */
    public function __construct(RestHttpClient $http)
    {
        $this->http = $http;
    }
}
