# alpaca-broker-php-sdk
It's a PHP SDK for Alpaca Broker API

[![Laravel 8|9](https://img.shields.io/badge/Laravel-8|9-orange.svg)](http://laravel.com)

[![Latest Stable Version](https://img.shields.io/packagist/v/devstar/alpaca-broker-php-sdk.svg)](https://packagist.org/packagesdevstar/alpaca-broker-php-sdk)

[![Total Downloads](https://poser.pugx.org/devstar/alpaca-broker-php-sdk/downloads.png)](https://packagist.org/packages/devstar/alpaca-broker-php-sdk)

[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/devstar/alpaca-broker-php-sdk)

## Requirements
- [PHP >= 8.0.2](http://php.net/)
- [Laravel Framework](https://github.com/laravel/framework)
## Install
composer require devstar/alpaca-broker-php-sdk

## Usage
 ### Create Alpaca Broker client
$this->alpaca = new Alpaca($key, $secret, $mode == 'pepper' ? true: false);

 ### Open an account
$this->alpaca->account->create($params);

 ### Search all assets
$this->alpaca->asset->getAssetsAll();

 ### Create an order
$this->alpaca->trade->createOrder($account_id, $params);

 ### Transfer
$this->alpaca->funding->createTransferEntity($account_id, $params);

 ### Document upload
$this->alpaca->document->upload($account_id, $params);

