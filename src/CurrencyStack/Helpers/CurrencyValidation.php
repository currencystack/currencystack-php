<?php

namespace CurrencyStack\Helpers;

use CurrencyStack\Constants\CurrencyList;

class CurrencyValidation
{

    public static function ValidCurrency($currencyKey)
    {
        return in_array(strtoupper($currencyKey), CurrencyList::$Keys);

    }

    /**
     * function to validate and return an array of valid currencies from the input array
     *
     * @param Array $currencyKeys
     * @return Array - valid currencies
     */
    public static function ValidatedCurrencies($currencyKeys = [])
    {
        $UpperCaseCurrencyKeys = array_map('strtoupper', $currencyKeys);
        return array_intersect($UpperCaseCurrencyKeys, CurrencyList::$Keys);

    }

}
