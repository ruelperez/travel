<?php

use App\Http\Controllers\PaymongoCustomController;
use App\Http\Controllers\XenditCustomController;
use App\Mail\PaymentReceiptMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('pages.location.index', [
        'location_id' => 1
    ]);
});

Route::get('/resort/{location_id}', function ($location_id) {
    return view('pages.location.index', [
        'location_id' => $location_id,
    ]);
});


Route::get('/{location}/{resort}/{resort_id}', [\App\Http\Controllers\ExploreController::class, 'page']);

Route::get('/pay/{location_name}/{resort_name}/{price}/{package}', function ($location_name, $resort_name, $price, $package) {
    $reference = strtoupper(Str::random(5)) . '-' . now()->format('YmdHis');

    return view('pages.payment.pay', [
        'location_name' => $location_name,
        'resort_name' => $resort_name,
        'price' => $price,
        'package' => $package,
        'reference' => $reference,
    ]);
})->name('pay.form');


//PAYMENT PROCESS
Route::post('/xendit-charge', [XenditCustomController::class, 'charge'])->name('xendit.charge');
Route::get('/payment-success', function () {
    return view('pages.payment.success');
})->name('payment.success');

Route::get('/payment-failed', function () {
    return view('pages.payment.failed');
})->name('payment.failed');


