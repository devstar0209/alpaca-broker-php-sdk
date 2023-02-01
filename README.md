# alpaca-broker-php-sdk
It's a PHP SDK for Alpaca Broker API

# Install
composer require devstar/alpaca-broker-php-sdk

# Usage
 # Create Alpaca Broker client
$this->alpaca = new Alpaca($key, $secret, $mode == 'pepper' ? true: false);

 # Open an account
$this->alpaca->account->create($params);

 # Search all assets
$this->alpaca->asset->getAssetsAll();

 # Create an order
$this->alpaca->trade->createOrder($account_id, $params);

 # Transfer
$this->alpaca->funding->createTransferEntity($account_id, $params);

 # Document upload
$this->alpaca->document->upload($account_id, $params);

