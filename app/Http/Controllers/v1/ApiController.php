<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Infraestructura\Helper;
use App\Models\ApiBase;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    private $apiBase;

    public function __construct()
    {
        $this->apiBase = new ApiBase();
    }

    public function getAlbumsByArtist(Request $request)
    {

        $resource = [];

        try {

            $artist     = $request->get('q');
            $artist_url = preg_replace('/\s+/', '%20', $artist);

            $response = $this->apiBase->get('search?q=' . $artist_url . '&type=album');

            if (!is_null($response)) {

                $albums = $response->albums->items;

                foreach ($albums as $key => $item) {
                    $resource[$key]['name']     = $item->name;
                    $resource[$key]['released'] = Helper::formatoFecha($item->release_date, 'd-m-Y');
                    $resource[$key]['tracks']   = $item->total_tracks;
                    $resource[$key]['cover']    = $item->images;
                }

            }

        } catch (ServerException | ClientException $th) {

            $error = json_decode($th->getResponse()->getBody()->getContents());
            return response()->json([$error], $error->error->status);

        } catch (\Exception $e) {
            return $e;
        }

        return response()->json($resource, 200);

    }
}
