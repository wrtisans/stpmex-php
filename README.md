# STP Mexico - PHP

[![StyleCI](https://styleci.io/repos/211879152/shield?branch=master)](https://styleci.io/repos/211879152)
[![Total Downloads](https://poser.pugx.org/wrtisans/stpmex-php/downloads?format=flat-square)](https://packagist.org/packages/wrtisans/stpmex-php)
[![License](https://img.shields.io/github/license/wrtisans/stpmex-php.svg?style=flat-square)](https://packagist.org/packages/wrtisans/stpmex-phpstpmex-php)

- [Installation](#installation)
- [License](#license)

## Installation

```shell
composer require wrtisans/stpmex-php
```

## Usage

### Client

Example:

```php
<?php

use Wrtisans\STP\Client;

$account = '646180123400000001';
$key = file_get_contents('key.pem');
$passphrase = '12345678';
$live = false;

$client = new Client($account, $key, $passphrase, $live);
```

### Account Service

Example:

```php
<?php

use Wrtisans\STP\Client;

$client = new Client(...);

$client->account()->balance();
```

### Catalogue Service

Example:

```php
<?php

use Wrtisans\STP\Client;

$client = new Client(...);

$client->catalogue()->get();
```

### Order Service

Example:

```php
<?php

use Wrtisans\STP\Client;
use Wrtisans\STP\Catalogue\{
    AccountTypeCatalogue,
    FinancialInstitutionCatalogue
};

$client = new Client(...);

$client->order()->create([
    'claveRastreo' => '123456789000000000000000003',
    'conceptoPago' => 'wrtisans Payment',
    'emailBeneficiario' => 'john.doe@example.com',
    'cuentaBeneficiario' => '012345678987654321',
    'empresa' => 'wrtisans',
    'institucionContraparte' => FinancialInstitutionCatalogue::BANORTE_IXE,
    'institucionOperante' => FinancialInstitutionCatalogue::STP,
    'iva' => 16.00,
    'monto' => 1200.00,
    'nombreBeneficiario' => 'John Doe',
    'nombreOrdenante' => 'wrtisans SAPI de CV',
    'prioridad' => 1,
    'referenciaNumerica' => '1234567',
    'tipoCuentaBeneficiario' => AccountTypeCatalogue::CLABE,
    'tipoPago' => PaymentTypeCatalogue::THIRD_PARTIES,
    'medioEntrega' => 3,
]);
```

## License

The STP Mexico PHP library is open-sourced software licensed under the [MIT license](LICENSE).
