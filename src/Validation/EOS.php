<?php

namespace Murich\PhpCryptocurrencyAddressValidation\Validation;

use Murich\PhpCryptocurrencyAddressValidation\Validation;

class EOS implements ValidationInterface
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function validate()
    {
        return preg_match('/^[1-5a-z]{12}$/i', $this->address);
    }

}