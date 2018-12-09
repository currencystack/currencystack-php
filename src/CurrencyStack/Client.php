<?php
namespace CurrencyStack;

use CurrencyStack\CurrencyConvertApi;

class Client
{

    protected $apikey;

    /**
     * construct the CurrencyStack client and Guzzle httpClient
     *
     * @param String $apiKey
     */
    public function __construct($apiKey, HttpClientInterface $client = null)
    {

        if (empty($apiKey)) {
            throw new \Exception(
                'api key required'
            );
        }

        $this->apiKey = $apiKey;
        $this->newHttpClient = ($client) ?: new HttpClient($apiKey);

        $this->CurrencyConvertApi = new CurrencyConvertApi($this->newHttpClient);

    }

}
