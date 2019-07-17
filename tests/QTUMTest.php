<?php

use Murich\PhpCryptocurrencyAddressValidation\Validation\QTUM;

class QTUMTest extends \PHPUnit\Framework\TestCase
{
    public function testValidator()
    {

        $testData = [
            ['QVZnSrMwKp6AL4FjUPPnfFgsma6j1DXQXu', true],
            ['QNjUiD3bVVZwYTc5AhpeQbS1mfb2guyWhe', true],
        ];

        foreach ($testData as $row) {
            $validator = new QTUM($row[0]);
            $this->assertEquals($row[1], $validator->validate());
        }

    }

    public function testQtumTestnetAddress()
    {

        $testData = [
            ['qbgHcqxXYHVJZXHheGpHwLJsB5epDUtWxe', true],
            ['qZqqcqCsVtP2U38WWaUnwshHRpefvCa8hX', true],
            ['mcfszWBwhekTy3paaMhmBshmhUH9RxavLC', true],
        ];

        foreach ($testData as $row) {
            $validator = new QTUM($row[0], 'testnet');
            $this->assertEquals($row[1], $validator->validate());
        }

    }
}