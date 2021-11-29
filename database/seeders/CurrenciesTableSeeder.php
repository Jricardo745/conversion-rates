<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CurrenciesTableSeeder extends Seeder
{
    public function run(): void
    {
        $url = 'http://api.currencylayer.com/live';

        $response = Http::get($url, ['access_key' => config('currency_layer.access_key')]);

        $availableCurrencies = json_decode($response->body())->quotes;

        foreach ($availableCurrencies as $currency => $rate) {
            Currency::query()->insertOrIgnore([
                'alphabetic_code' => Str::substr($currency, 3),
            ]);
        }
    }
}
