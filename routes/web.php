<?php

use App\Http\Controllers\PaymongoCustomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.location.index');
});

Route::get('/{location}/{resort}/{resort_id}', [\App\Http\Controllers\ExploreController::class, 'page']);

Route::view('/pay', 'pages.payment.pay')->name('pay.form');
Route::post('/pay_process', [PaymongoCustomController::class, 'charge'])->name('paymongo.charge');

Route::get('/payment-success', function () {
    return view('pages.payment.success');
})->name('payment.success');

Route::get('/payment-failed', function () {
    return view('pages.payment.failed');
})->name('payment.failed');
