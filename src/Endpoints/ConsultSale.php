<?php

namespace Chags\ApiCieloPhp\Endpoints;

use Chags\ApiCieloPhp\ApiCielo;
use GuzzleHttp\Exception\RequestException;

class ConsultSale
{
    private $apiCielo;

    public function __construct(ApiCielo $apiCielo)
    {
        $this->apiCielo = $apiCielo;
    }

    public function execute(string $paymentId): array
    {
        $endpoint = "/1/sales/{$paymentId}";
        $client = $this->apiCielo->getHttpClient();
        $headers = $this->apiCielo->getHeaders();

        try {
            $response = $client->get($endpoint, [
                'headers' => $headers,
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
