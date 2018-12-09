<?php
namespace CurrencyStack;

interface HttpClientInterface
{

    public function get($url, $queryParams);

}
