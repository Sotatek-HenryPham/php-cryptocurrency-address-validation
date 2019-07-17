<?php

namespace Murich\PhpCryptocurrencyAddressValidation\Validation;

use Murich\PhpCryptocurrencyAddressValidation\Validation;

class QTUM extends Validation
{
    // more info at https://en.bitcoin.it/wiki/List_of_address_prefixes
    protected $base58PrefixToHexVersion = [
        'prod' => [
            'Q' => '3a',
            'M' => '32',
        ],
        'testnet' => [
            'q' => '78'
            // ? => '6e'
        ]
    ];
}