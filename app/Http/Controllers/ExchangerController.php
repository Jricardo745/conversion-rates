<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangerRequest;
use Illuminate\Support\Facades\Http;

class ExchangerController extends Controller
{
    public function convert(ExchangerRequest $request)
    {
        $url = 'http://apilayer.net/api/live';

        $response = Http::get($url, [
            'access_key' => config('currency_layer.access_key'),
            'currencies' => $request->get('source_currency'),
            'source' => 'USD',
        ])->body();

        return response()->json(json_decode($response)->quotes);
    }
}
