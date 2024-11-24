<?php

namespace ApiCieloPhp\Endpoints;

use apicielophp\Config;

class CreatePhysicalSale extends Config
{
    protected $endpoint = '1/sales/';

    /**
     * Executa a requisição para criar uma venda com cartão.
     *
     * @param array $data Dados da requisição no formato esperado pela API.
     * @return array Resposta da API da Cielo.
     * @throws \Exception
     */
    public function execute(array $data)
    {
        $url = $this->apiUrl . $this->endpoint;

        return $this->httpPost($url, $data);
    }
}
