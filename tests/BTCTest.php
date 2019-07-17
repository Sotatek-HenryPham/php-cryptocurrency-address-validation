<?php

use Murich\PhpCryptocurrencyAddressValidation\Validation\BTC;

class BTCTest extends \PHPUnit\Framework\TestCase
{

    public function testValidator()
    {
        $testData = [
            ['1QLbGuc3WGKKKpLs4pBp9H6jiQ2MgPkXRp', true],
            ['3QJmV3qfvL9SuYo34YihAf3sRCW3qSinyC', true],
            ['LbTjMGN7gELw4KbeyQf6cTCq859hD18guE', false]
        ];

        foreach ($testData as $row) {
            $validator = new BTC($row[0]);
            $this->assertEquals($row[1], $validator->validate());
        }

    }

    public function testTestnetAddress()
    {
        $testData = [
            ['mtPm4vxbDeNbX6yMpSSDeSJkVTRpcH7dWq', true],
            ['2MxKEf2su6FGAUfCEAHreGFQvEYrfYNHvL7', true],
            ['dCWFddi6m4ndiGyKqzYvsFYagqDLPVMTzC', false],
        ];

        foreach ($testData as $row) {
            $validator = new BTC($row[0], 'testnet');
            $this->assertEquals($row[1], $validator->validate(), $row[0]);
        }
    }
}