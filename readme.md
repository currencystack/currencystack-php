# CurrencyStack.io PHP client [![Build Status](https://travis-ci.com/pushbots/currencystack-php.svg?token=xL8qMcpPMGBsgtk7bqqS&branch=master)](https://travis-ci.com/pushbots/currencystack-php)

php client library for clear ip

## Installation

```bash
composer require currencystack/currencystack-php
```

## usage

Get ip info:

```php

<?php
require_once __DIR__ . '/vendor/autoload.php';

use CurrencyStack\Client;

$CurrencyStackClient = new Client('API Key Here');

try {

    var_dump($CurrencyStackClient->CurrencyConvertApi->GetCurrencyConvertion('EUR', ['USD', 'EGP', 'AED']));

} catch (Exception $e) {
    echo $e->getMessage();
}



```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
