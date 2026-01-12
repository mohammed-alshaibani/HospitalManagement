<?php

namespace App\Http\Controllers;

use App\Enumerat\Urls;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function search(Request $request)
    {
        $url = Urls::Base->value . Urls::PatientSearch->value;
        $response = UtilitiesController::urlWithToken()->post($url, [
            'search' => $request->search,
        ]);
        return $response->json();
    }

    public static function getData(Request $request, Urls $url, string $id)
    {
        $url = Urls::Base->value . $url->value;
        $response = UtilitiesController::urlWithToken()->get($url . "?page=$request->page&&id=$id");
        return $response->json();
    }

    public static function showData(Urls $url, string $id)
    {
        $url = Urls::Base->value . $url->value;
        $response = UtilitiesController::urlWithToken()->get($url . "/$id");
        return $response->json();
    }
}
