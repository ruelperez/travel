<?php

use App\Http\Controllers\PaymongoCustomController;
use App\Http\Controllers\PayPalController;
use App\Mail\PaymentReceiptMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('pages.location.index', [
        'location_id' => 1
    ]);
})->name('home');

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

Route::post('/pay_process', [PaymongoCustomController::class, 'charge'])->name('paymongo.charge');

Route::get('/payment-success', function () {
    return view('pages.payment.success');
})->name('payment.success');

Route::get('/payment-failed', function () {
    return view('pages.payment.failed');
})->name('payment.failed');
Route::get('/test-mail', function () {
    Mail::to('karuelflorperezz@gmail.com')->send(new PaymentReceiptMail([
        'name' => 'Test User',
        'email' => 'karuelflorperezz@gmail.com',
        'amount' => 1800,
        'payment_id' => 'pi_test_12345'
    ]));

    return 'Test email sent!';
});


Route::post('/paypal/create-order', [PayPalController::class, 'createOrder'])->name('paypal.create');
Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
Route::get('/purchase-confirmation/{link_id}', [\App\Http\Controllers\PurchaseLinkController::class, 'index'])->name('purchase.link');
Route::post('/purchase/sign', [\App\Http\Controllers\PurchaseLinkController::class, 'storeSignature'])->name('purchase.sign');
