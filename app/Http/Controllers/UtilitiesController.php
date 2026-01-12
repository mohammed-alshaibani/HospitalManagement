<?php

namespace App\Http\Controllers;

use App\Mail\SendCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class UtilitiesController extends Controller
{
    //create verify code for doctor
    public static function createCode(): int
    {
        // time + random code
        $code = time() + rand(0, 1000000);
        return $code;
    }

    // send mail with code
    public static function sendCode($email, $code)
    {
        try {
            $message = 'رمز التحقق الخاص بك هو: ' . $code;
            Mail::to($email)->send(new SendCode($message));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ ما، يرجى المحاولة مرة أخرى');
        }
    }

    // get data from json file
    public static function getDataFromJson(string $file, array $keys = ['*'], string $id = null)
    {
        $json = file_get_contents($file);
        $data = json_decode($json, true);
        return collect($data)
            ->when($id, function ($item) use ($id) {
                return $item->where('id', $id);
            })
            ->map(function ($item) use ($keys) {
                if ($keys[0] != '*') return collect($item)->only($keys);
                return $item;
            });
    }

    // get data from url and return it as array
    public static function urlWithToken()
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Token' => env('API_TOKEN'),
            'Locale' => App::getLocale()
        ]);
    }
}
