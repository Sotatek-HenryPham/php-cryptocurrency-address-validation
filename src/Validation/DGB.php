<?php

namespace Murich\PhpCryptocurrencyAddressValidation\Validation;

use Murich\PhpCryptocurrencyAddressValidation\Validation;

class DGB extends Validation
{
    const DEPRECATED_ADDRESS_VERSION = '05';

    protected $deprecatedAllowed = false;

    protected $base58PrefixToHexVersion = [
        'prod' => [
            'D' => '1e',
        ],
        'testnet' => [],
    ];

    protected function validateVersion($version)
    {
        if ($this->addressVersion == self::DEPRECATED_ADDRESS_VERSION && !$this->deprecatedAllowed) {
            return false;
        }
        return hexdec($version) == hexdec($this->addressVersion);
    }

    /**
     * @return boolean
     */
    public function isDeprecatedAllowed()
    {
        return $this->deprecatedAllowed;
    }

    /**
     * @param boolean $deprecatedAllowed
     */
    public function setDeprecatedAllowed($deprecatedAllowed)
    {
        $this->deprecatedAllowed = $deprecatedAllowed;
    }

}