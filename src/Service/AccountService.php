<?php

namespace Wrtisans\STP\Service;

class AccountService extends SoapSTPService
{
    public function balance()
    {
        return ($http = $this->http)->makeRequest('consultaSaldoCuenta', [
            'firma' => $http->client->getSignature(),
            'cuenta' => $http->client->accountKey,
        ]);
    }
}
