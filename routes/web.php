<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.location.index');
});

Route::get('/{location}/{resort}/{resort_id}', [\App\Http\Controllers\ExploreController::class, 'page']);
Route::get('/paymongo-checkout', [App\Http\Controllers\PaymongoController::class, 'createCheckoutSession']);
