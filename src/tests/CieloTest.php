<?php

use PHPUnit\Framework\TestCase;
use Chags\ApiCieloPhp\Cielo;

class CieloTest extends TestCase
{
    public function testCreatePhysicalSale()
    {
        $cielo = new Cielo('MERCHANT_ID', 'MERCHANT_KEY', 'https://sandbox.cieloecommerce.cielo.com.br/');
        $response = $cielo->createPhysicalSale([
            'MerchantOrderId' => '123456',
            'Customer' => ['Name' => 'Teste'],
            'Payment' => [
                'Type' => 'CreditCard',
                'Amount' => 10000,
                'Installments' => 1,
                'CreditCard' => [
                    'CardNumber' => '1234123412341234',
                    'Holder' => 'Teste',
                    'ExpirationDate' => '12/2030',
                    'SecurityCode' => '123',
                    'Brand' => 'Visa'
                ]
            ]
        ]);

        $this->assertArrayHasKey('PaymentId', $response);
    }
}
