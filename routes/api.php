<?php

use App\Http\Controllers\ExchangerController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Api',
    'prefix' => 'v1',
], function () {
    Route::get('/convert', [ExchangerController::class, 'convert'])->name('api.v1.convert');
});
