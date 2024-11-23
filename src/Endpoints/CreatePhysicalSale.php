<?php

namespace Chags\ApiCieloPhp\Endpoints;

use Chags\ApiCieloPhp\ApiCielo;
use GuzzleHttp\Exception\RequestException;

class CreatePhysicalSale
{
    private $apiCielo;

    public function __construct(ApiCielo $apiCielo)
    {
        $this->apiCielo = $apiCielo;
    }

    public function execute(array $paymentData): array
    {
        $endpoint = '/1/physicalSales/';
        $client = $this->apiCielo->getHttpClient();
        $headers = $this->apiCielo->getHeaders();

        try {
            $response = $client->post($endpoint, [
                'headers' => $headers,
                'json'    => $paymentData,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody(), true);
            }
            return ['error' => $e->getMessage()];
        }
    }
}
