<?php


namespace App\Services\ExternalApis;


use GuzzleHttp\Client;

class BaseApi
{
    protected $client;

    protected const GET = 'GET';
    protected const POST = 'POST';

    protected const JSON = 'JSON';

    protected function request($method, $uri, $headers, $responseType = null)
    {
        if ($responseType == 'JSON') {
            return $this->parseJSONResponse($this->client->request($method, $uri, $headers));
        }
        return $this->client->request($method, $uri, $headers);
    }

    private function parseJSONResponse($response)
    {
        return json_decode($response->getBody(), false);
    }

    protected function client($baseUri)
    {
        return new Client(['base_uri' => $baseUri]);
    }
}
