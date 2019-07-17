<?php

use Murich\PhpCryptocurrencyAddressValidation\Validation\EOS;

class EOSTest extends \PHPUnit\Framework\TestCase
{
    public function testValidator()
    {
        $testData = [
            ['eoslaomaocom', true],
            ['eoshuobipool', true],
            ['eoshuobipoo7', false],
        ];

        foreach ($testData as $row) {
            $validator = new EOS($row[0]);
            $this->assertEquals($row[1], $validator->validate());
        }

    }
}