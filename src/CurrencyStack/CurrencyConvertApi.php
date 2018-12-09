<?php
namespace CurrencyStack;

use CurrencyStack\Helpers\CurrencyValidation;

class CurrencyConvertApi
{

    /**
     * construct the CurrencyStack client and Guzzle httpClient
     *
     * @param String $apiKey
     */
    public function __construct(HttpClientInterface $client)
    {

        $this->newHttpClient = $client;

    }

    /**
     * get currency conversion against array of currenct targets from CurrencyStack services
     *
     * @param String $base - base curreny to convert from
     * @param Array $target - target currencies to
     * @return Object||Exception
     */
    public function GetCurrencyConvertion($base, $target)
    {
        if (!CurrencyValidation::ValidCurrency($base)) {
            throw new \Exception('invalid base curreny');
        }

        $validCurrencies = CurrencyValidation::ValidatedCurrencies($target);
        if (count($validCurrencies) == 0) {
            throw new \Exception('no valid currency target');
        }

        try {
            $res = $this->newHttpClient->get("/currency", ['base' => $base, 'target' => implode($validCurrencies,',')]);
            return json_decode($res);

        } catch (RequestException $e) {
            throw new \Exception(
                'request error'
            );
        }

    }
}
