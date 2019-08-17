<?php

return [
    'url'         => [
        'login'   => env('SPOTIFY_LOGIN_ENDPOINT', ''),
        'request' => env('SPOTIFY_REQUEST_ENPOINT', ''),
    ],
    'credentials' => [
        'client_id'     => env('SPOTIFY_CLIENT_ID', ''),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET', ''),
    ],
];
