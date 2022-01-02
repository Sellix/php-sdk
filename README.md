# Sellix PHP SDK 

![tag](https://img.shields.io/github/v/tag/sellix/php-sdk?sort=date&color=blueviolet)

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
$client = new Sellix("<YOUR_API_KEY>");

try {
    $products = $client->get_products();
} catch (SellixException as $e) {
    echo $e->__toString();
}

?>
```

## Documentation

[Sellix Developers API](https://developers.sellix.io)