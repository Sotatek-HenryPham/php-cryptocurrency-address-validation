<?php

namespace Murich\PhpCryptocurrencyAddressValidation\Validation;

use Murich\PhpCryptocurrencyAddressValidation\Validation;

class BTC extends Validation
{
    // more info at https://en.bitcoin.it/wiki/List_of_address_prefixes
     protected $base58PrefixToHexVersion = [
        'prod' => [
            '1' => '00',
            '3' => '05',
        ],
        'testnet' => [
            'm' => '6f',
            '2' => 'c4',
        ],
    ];
}