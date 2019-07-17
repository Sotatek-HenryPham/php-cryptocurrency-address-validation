<?php

use Murich\PhpCryptocurrencyAddressValidation\Validation\LTC;

class LTCTest extends \PHPUnit\Framework\TestCase
{
    public function testValidator()
    {
        /*
         * There are many addresses in Litecoin blockchain which starts with 3.
         * However, addresses starting with 3 are deprecated.
         * Litecoin multisig addess should start with M.
         */

        $testData = [
            ['1QLbGuc3WGKKKpLs4pBp9H6jiQ2MgPkXRp', false],
            ['3CDJNfdWX8m2NwuGUV3nhXHXEeLygMXoAj', false],
            ['LbTjMGN7gELw4KbeyQf6cTCq859hD18guE', true],
            ['MK9xC9sbktt6DHMF6XwA3eZPJ2Vx32AXFT', true],
            // @todo: add test case with M address
        ];

        foreach ($testData as $row) {
            $validator = new LTC($row[0]);
            $this->assertEquals($row[1], $validator->validate());
        }

    }

    public function testLitecoinDeprecatedMultisigAddress()
    {
        $validator = new LTC('3CDJNfdWX8m2NwuGUV3nhXHXEeLygMXoAj');
        $validator->setDeprecatedAllowed(true);
        $this->assertEquals(true, $validator->validate());
    }

    public function testLtcTestnetAddress()
    {
        $testData = [
            ['mtPm4vxbDeNbX6yMpSSDeSJkVTRpcH7dWq', true],
            ['2MxKEf2su6FGAUfCEAHreGFQvEYrfYNHvL7', true],
            ['QiqpHzFuo4sM7Yftf2vvJwUy5Wiuv2BqF7', true],
            ['dCWFddi6m4ndiGyKqzYvsFYagqDLPVMTzC', false],
        ];

        foreach ($testData as $row) {
            $validator = new LTC($row[0], 'testnet');
            $this->assertEquals($row[1], $validator->validate(), $row[0]);
        }
    }
}