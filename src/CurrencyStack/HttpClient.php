<?php
namespace CurrencyStack;

use GuzzleHttp\Exception\RequestException;

class HttpClient implements HttpClientInterface
{

    protected $apikey;

    /**
     * construct the default http client
     *
     * @param String $apiKey
     */
    public function __construct($apiKey)
    {

        $this->apiKey = $apiKey;
        $this->baseUri = "https://api.currencystack.io";

        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => $this->baseUri,
        ]);

    }

    /**
     * Get request
     *
     * @param String $url
     * @param Array $queryParams
     * @return JSON||Exception
     */
    public function get($url, $queryParams = [])
    {

        if (gettype($queryParams) != 'array') {
            throw new \Exception(
                'query params needs to be an array'
            );
        }

        try {
            $res = $this->httpClient->request('GET', $url, ['query' => array_merge($queryParams, ['apikey' => $this->apiKey])]);
            return $res->getBody();
        } catch (RequestException $e) {
            throw new \Exception(
                'request error'
            );
        }

    }
}
