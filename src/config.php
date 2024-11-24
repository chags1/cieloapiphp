<?php

namespace ApiCieloPhp;

use GuzzleHttp\Client;

abstract class Config
{
    protected $merchantId;
    protected $merchantKey;
    protected $apiUrl;

    public function __construct(string $merchantId, string $merchantKey, string $apiUrl)
    {
        $this->merchantId = $merchantId;
        $this->merchantKey = $merchantKey;
        $this->apiUrl = $apiUrl;
    }

    /**
     * Faz uma requisição HTTP POST.
     *
     * @param string $url URL do endpoint.
     * @param array $data Dados a serem enviados no corpo da requisição.
     * @return array Resposta da API.
     * @throws \Exception
     */
    protected function httpPost(string $url, array $data)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false, // Desativa a verificação de SSL
        ]);
    
        $response = $client->post($url, [
            'headers' => [
                'MerchantId' => $this->merchantId,
                'MerchantKey' => $this->merchantKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => $data,
        ]);
    
        return json_decode($response->getBody()->getContents(), true);
    }
    
}
