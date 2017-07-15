<?php
namespace Bci;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Bci
{
    protected $api_key;
    protected $url_base = 'https://api.us.apiconnect.ibmcloud.com/portal-api-developers-desarrollo/sandbox/';
    protected $url_request;
    /**
     * Bci constructor.
     * @param $api_key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function connection()
    {
        $client = new Client([
            'base_uri' => $this->url_base,
            'headers' => [
                'accept' => 'application/json',
                'x-ibm-client-id' => $this->api_key,
                'content-type' => 'application/json'
            ]
        ]);

        return $client;
    }

    public function indicadores()
    {
        $url = '/portal-api-developers-desarrollo/sandbox/info-banco/cajeros';

        $response = $this->connection()->request('GET', $url);

        return $response->getBody();
    }

    public function beneficios($body)
    {

    }

    /**
     * @return array
     */
    public function creditoConsumo($body = [])
    {
        try {
            $url = 'creditos_consumo';

            $response = $this->connection()->request('POST', $url, [
                'json' => $body
            ]);

            return $this->responseApi($response);
        } catch (ClientException $ex) {
            return $this->responseError($ex->getMessage());
        }
    }

    /**
     * @param $response
     * @return array
     */

    protected function responseApi($response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param $message
     * @return array
     */
    protected function responseError($message)
    {
        return ['error' => $message];
    }
}