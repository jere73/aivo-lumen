<?php

namespace App\Models;

use GuzzleHttp\Client;

class ApiBase
{
    private $client;
    private $token;

    private $headers = [
        'Content-type' => 'application/json'
    ];

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('spotify.url.request'),
        ]);

        $apiLogin    = new ApiLogin();
        $this->token = $apiLogin->login();

    }

    public function getToken()
    {
        return $this->token;
    }

    public function get($url, $headers = [])
    {
        $api_response = null;

        $response = $this->client->get($url, [
            'headers'     => [
                'Authorization' => $this->token,
            ]
        ]);

        $api_response = json_decode($response->getBody()->getContents());

        return $api_response;
    }

}
