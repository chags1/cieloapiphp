<?php

namespace Chags\ApiCieloPhp;

use GuzzleHttp\Client;

class ApiCielo
{
    private $merchantId;
    private $merchantKey;
    private $baseUrl;
    private $httpClient;

    public function __construct($merchantId, $merchantKey, $sandbox = true)
    {
        $this->merchantId = $merchantId;
        $this->merchantKey = $merchantKey;
        $this->baseUrl = $sandbox
            ? 'https://apisandbox.cieloecommerce.cielo.com.br'
            : 'https://api.cieloecommerce.cielo.com.br';

        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 30.0,
        ]);
    }

    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'MerchantId'   => $this->merchantId,
            'MerchantKey'  => $this->merchantKey,
            'Accept'       => 'application/json',
        ];
    }
}
