# Api Cielo com PHP

Pacote PHP para integração com a API RESTful da Cielo.

## Instalação

Use o Composer para instalar o pacote:

```bash
composer require chags/apicielophp




```php
require 'vendor/autoload.php';
use apicielophp\Cielo;  

// Credenciais de produção
$merchantId = '8937bd5b-9796-494d-9fe5-f76b3e4da633';
$merchantKey = 'XKGHUBSBKIRXKAVPSKWLVXYCLVJUGTNZLIHPUSYV';

// Instanciar o cliente no ambiente de produção
$cielo = new Cielo($merchantId, $merchantKey, 'sandbox');

// Dados da venda
$data =[
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
];

try {
    $response = $cielo->createPhysicalSale($data);
    print_r($response);
} catch (\Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}