# Sellix PHP SDK 

![tag](https://img.shields.io/github/v/tag/sellix/php-sdk?sort=date&color=blueviolet)
![version](https://img.shields.io/packagist/v/sellix/php-sdk)
![downloads](https://img.shields.io/packagist/dt/sellix/php-sdk)

## Introduction

Sellix public API for developers to access merchant resources

## Requirements

- php ^5.3
- php-curl

## Installation

Install the package through composer.

```
composer require sellix/php-sdk
```

## Usage

```php
<?php

require_once 'vendor/autoload.php';

use \Sellix\PhpSdk\Sellix;
use \Sellix\PhpSdk\SellixException;

// pass <MERCHANT_NAME> only if you need to be authenticated as an additional store

$client = new Sellix("<YOUR_API_KEY>", "<MERCHANT_NAME>");

try {
    $products = $client->get_products();
} catch (SellixException $e) {
    echo $e->__toString();
}

?>
```

## Documentation

[Sellix Developers API](https://developers.sellix.io)
