<?php

namespace App\Http\Controllers\v1;

use App\Models\ApiBase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    private $apiBase;

    public function __construct()
    {
        $this->apiBase = new ApiBase();
    }

    public function getAlbums(Request $request)
    {
        dd($this->apiBase->getToken());

        $this->apiBase->get('artists/{id}/albums');
    }
}
