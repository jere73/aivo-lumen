<?php

namespace App\Models;

use GuzzleHttp\Client;

class ApiBase
{
    private $client;
    private $token;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('spotify.url.request'),
        ]);

        $apiLogin    = new ApiLogin();
        $this->token = $apiLogin->login();
        // $this->token = $login->getToken();

    }

    public function getToken()
    {
        return $this->token;
    }


}
