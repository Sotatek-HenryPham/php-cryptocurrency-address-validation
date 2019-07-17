<?php


use Murich\PhpCryptocurrencyAddressValidation\Validation\BCH;

class BCHTest extends \PHPUnit\Framework\TestCase
{

    public function testValidator()
    {
        $testData = [
            ['bitcoincash:qqq3728yw0y47sqn6l2na30mcw6zm78dzqre909m2r', true],
            ['bitcoincash:qpm2qsznhks23z7629mms6s4cwef74vcwvy22gdx6a', true],
            ['bitcoincash:qr95sy3j9xwd2ap32xkykttr4cvcu7as4y0qverfuy', true],
            ['qqq3728yw0y47sqn6l2na30mcw6zm78dzqre909m2r', true],
            ['qpm2qsznhks23z7629mms6s4cwef74vcwvy22gdx6a', true],
            ['qr95sy3j9xwd2ap32xkykttr4cvcu7as4y0qverfuy', true],
            ['ppm2qsznhks23z7629mms6s4cwef74vcwvn0h829pq', true],
            ['qrll76p3mfl69p07vyvqzwy3crqy8myvrytgv8v7f7', true],
            ['1BpEi6DfDAUFd7GtittLSdBeYJvcoaVggu', true],
            ['1KXrWXciRDZUpQwQmuM1DbwsKDLYAYsVLR', true],
            ['16w1D5WRVKJuZUsSRzdLp9w3YGcgoxDXb', true],
            ['3CWFddi6m4ndiGyKqzYvsFYagqDLPVMTzC', true],
            ['dCWFddi6m4ndiGyKqzYvsFYagqDLPVMTzC', false],
        ];

        foreach ($testData as $row) {
            $validator = new BCH($row[0]);
            $this->assertEquals($row[1], $validator->validate(), $row[0]);
        }

    }


    public function testTestnetAddress()
    {
        $testData = [
            ['mzBc4XEFSdzCDcTxAgf6EZXgsZWpztRhef', true],
            ['2MxKEf2su6FGAUfCEAHreGFQvEYrfYNHvL7', true],
            ['dCWFddi6m4ndiGyKqzYvsFYagqDLPVMTzC', false],
        ];

        foreach ($testData as $row) {
            $validator = new BCH($row[0], 'testnet');
            $this->assertEquals($row[1], $validator->validate(), $row[0]);
        }
    }
}