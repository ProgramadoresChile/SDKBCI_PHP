<?php
namespace Bci;

use GuzzleHttp\Exception\ClientException;

class CreditoHipotecario
{
    protected $bci;
    protected $base = 'creditos_hipotecarios';

    /**
     * CreditoHipotecario constructor.
     * @param $bci
     */
    public function __construct(Bci $bci)
    {
        $this->bci = $bci;
    }

    public function allHipotecarios()
    {
        try {
            $response = $this->bci->connection()->request('GET', $this->base);

            return Response::response($response->getBody()->getContents());
        } catch (ClientException $ex) {
            return ($ex->getMessage());
        }
    }

    public function hipotecario($id)
    {
        try {
            $url = $this->base . '/' .$id;

            $response = $this->bci->connection()->request('GET', $url);

            return Response::response($response->getBody()->getContents());
        } catch (ClientException $ex) {
            return Response::responseError($ex->getMessage());
        }
    }

    public function tasas($id)
    {
        try {
            $url = $this->base . '/' . $id . '/tasas';

            $response = $this->bci->connection()->request('GET', $url);

            return Response::response($response->getBody()->getContents());
        } catch (ClientException $ex) {
            return Response::responseError($ex->getMessage());
        }
    }

    public function simulacion($id, $data)
    {
        try {
            $url = $this->base . '/' . $id . '/simulaciones';

            $response = $this->bci->connection()->request('POST', $url, [
                'json' => $data
            ]);

            return Response::response($response->getBody()->getContents());
        } catch (ClientException $ex) {
            return Response::responseError(json_decode($ex->getResponse()->getBody()->getContents(), true));
        }
    }


}