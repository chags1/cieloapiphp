<?php

namespace Chags\ApiCieloPhp\Endpoints;

use Chags\ApiCieloPhp\ApiCielo;
use GuzzleHttp\Exception\RequestException;

class CancelPayment
{
    private $apiCielo;

    public function __construct(ApiCielo $apiCielo)
    {
        $this->apiCielo = $apiCielo;
    }

    public function execute(string $paymentId, int $amount = null): array
    {
        $endpoint = "/1/sales/{$paymentId}/void";
        if ($amount) {
            $endpoint .= "?amount={$amount}";
        }

        $client = $this->apiCielo->getHttpClient();
        $headers = $this->apiCielo->getHeaders();

        try {
            $response = $client->put($endpoint, [
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
