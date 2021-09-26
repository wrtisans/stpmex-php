<?php

namespace Wrtisans\STP\Service;

use Wrtisans\STP\Utils\Chain;
use Wrtisans\STP\Exceptions\STPException;

class OrderService extends RestSTPService
{
    public function create(array $data): int
    {
        $signature = ($http = $this->http)->client->getSignature(
            Chain::generate($data)
        );

        $request = $http->makeRequest('put', 'ordenPago/registra', array_merge($data, [
            'firma' => $signature,
        ]));

        $result = json_decode($request->getBody())->resultado;

        if (isset($result->descripcionError)) {
            throw new STPException($result->descripcionError, $result->id);
        }

        return $result->id;
    }
}
