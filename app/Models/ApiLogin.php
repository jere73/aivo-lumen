<?php

namespace App\Models;

use GuzzleHttp\Client;

class ApiLogin
{

    private $url_login;
    private $client;
    private $token;

    public function __construct()
    {
        $this->url_login = config('spotify.url.login');
        $this->client    = new Client();
    }

    public function login()
    {
        $preformatted = config('spotify.credentials.client_id') . ':' . config('spotify.credentials.client_secret');

        $encrypted = trim(base64_encode($preformatted));
        $complete  = 'Basic ' . $encrypted;

        $response = $this->client->post($this->url_login, [
            'headers'     => [
                'Content-Type'  => 'application/x-www-form-urlencoded; charset=utf-8',
                'Authorization' => $complete,
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
        ]);

        $data_api = json_decode($response->getBody()->getContents());
        
        $this->token = $data_api->token_type . ' ' . $data_api->access_token;

        return $this->token;
    }

}
