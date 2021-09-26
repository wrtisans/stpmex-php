<?php

namespace Wrtisans\STP\Utils;

class Chain
{
    public static function generate(array $data): string
    {
        $orderKeys = [
            'institucionContraparte',
            'empresa',
            'fechaOperacion',
            'folioOrigen',
            'claveRastreo',
            'institucionOperante',
            'monto',
            'tipoPago',
            'tipoCuentaOrdenante',
            'nombreOrdenante',
            'cuentaOrdenante',
            'rfcOrdenante',
            'tipoCuentaBeneficiario',
            'nombreBeneficiario',
            'cuentaBeneficiario',
            'rfcBeneficiario',
            'emailBeneficiario',
            'cuentaBeneficiario2',
            'nombreBeneficiario2',
            'cuantaBeneficiario2',
            'rfcBeneficiario2',
            'conceptoPago',
            'conceptoPago2',
            'claveCatalogoUsuario1',
            'claveCatalogoUsuario2',
            'clavePago',
            'referenciaCobranza',
            'referenciaNumerica',
            'tipoOperacion',
            'tipologia',
            'usuario',
            'medioEntrega',
            'prioridad',
            'iva',
        ];

        $originalString = '||';

        foreach ($orderKeys as $key) {
            $value = '';

            if (isset($data[$key])) {
                $value = $data[$key];
                $value = ltrim($value);
                $value = rtrim($value);
            }

            $originalString .= "{$value}|";
        }

        $originalString .= '|';

        return $originalString;
    }
}
