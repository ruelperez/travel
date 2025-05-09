<?php

use App\Http\Controllers\PaymongoCustomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.location.index');
});

Route::get('/{location}/{resort}/{resort_id}', [\App\Http\Controllers\ExploreController::class, 'page']);
Route::view('/pay', 'pay');
Route::post('/pay', [PaymongoCustomController::class, 'charge'])->name('paymongo.charge');
