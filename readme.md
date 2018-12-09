# CurrencyStack.io PHP client

php client library for clear ip

## Installation

```bash
composer require CurrencyStack
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
