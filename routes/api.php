<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;

Route::post('/paypal/webhook', [\App\Http\Controllers\PaymentLinkController::class, 'handleWebhook']);
