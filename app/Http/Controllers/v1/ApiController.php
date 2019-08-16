<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function __construct()
    {
        $client = new Client([
            'base_uri' => 'https://api.spotify.com',
        ]);
    }

    public function getAlbums(Request $request)
    {
        dd('llega');
    }
}
