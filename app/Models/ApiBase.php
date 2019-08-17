<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class ApiBase
{
    private $client;
    private $token;

    private $headers = [
        'Content-type' => 'application/json',
    ];

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('spotify.url.request'),
        ]);

        $apiLogin    = new ApiLogin();
        $this->token = $apiLogin->login();

    }

    public function get($url, $headers = [])
    {
        $api_response = null;

        try {

            $response = $this->client->get($url, [
                'headers' => [
                    'Authorization' => $this->token,
                ],
            ]);

            $api_response = json_decode($response->getBody()->getContents());

        } catch (ServerException | ClientException $th) {

            throw $th;
        
        } catch (\Exception $e) {

            throw $e;

        }

        return $api_response;
    }

    public function getToken()
    {
        return $this->token;
    }

}
