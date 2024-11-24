<?php

namespace ApiCieloPhp;

use ApiCieloPhp\Endpoints\CreatePhysicalSale;

class Cielo
{
    protected $merchantId;
    protected $merchantKey;
    protected $apiUrl;

    /**
     * Construtor da classe Cielo.
     *
     * @param string $merchantId ID do comerciante fornecido pela Cielo.
     * @param string $merchantKey Chave do comerciante fornecida pela Cielo.
     * @param string $environment Ambiente da API: 'sandbox' ou 'production'.
     * @throws \Exception
     */
    public function __construct(string $merchantId, string $merchantKey, string $environment = 'sandbox')
    {
        $this->merchantId = $merchantId;
        $this->merchantKey = $merchantKey;

        // Configura a URL com base no ambiente
        if ($environment === 'sandbox') {
            $this->apiUrl = 'https://apisandbox.cieloecommerce.cielo.com.br/';
        } elseif ($environment === 'production') {
            $this->apiUrl = 'https://api.cieloecommerce.cielo.com.br/';
        } else {
            throw new \Exception("Ambiente inválido. Use 'sandbox' ou 'production'.");
        }
    }

    /**
     * Criar uma venda física com cartão.
     *
     * @param array $data Dados para criar a venda.
     * @return array Resposta da API da Cielo.
     */
    public function createPhysicalSale(array $data)
    {
        $endpoint = new CreatePhysicalSale($this->merchantId, $this->merchantKey, $this->apiUrl);
        return $endpoint->execute($data);
    }
}

