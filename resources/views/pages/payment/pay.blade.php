@extends('layouts.payment_layout')

@section('content')
    <div class="checkout-wrapper position-relative pb-5">
        <div class="dark-overlay"></div>

        <div class="container">
            <!-- Form + Summary -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4 align-items-start">
                        <!-- Billing & Payment Info -->
                        <div class="col-md-7 order-2 order-md-1">
                            <div class="custom-form-box shadow-sm rounded">
                                <!-- Logo only on desktop view -->
                                <div class="mb-3 d-none d-md-block">
                                    <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="height: 50px;">
                                </div>

                                <h5 class="mb-1 fw-bold">Booking & Payment Details</h5>
                                <hr>
                                <form method="POST" action="{{ route('paymongo.charge') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <!-- Billing Address Section -->
                                    <div class="mb-3">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" name="billing_street" class="form-control" placeholder="e.g. 123 Palm St." required>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">City</label>
                                            <input type="text" name="billing_city" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">State / Province</label>
                                            <input type="text" name="billing_state" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">ZIP / Postal Code</label>
                                            <input type="text" name="billing_zip" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Country</label>
                                            <select name="billing_country" class="form-select" required>
                                                <option value="">Select Country</option>
                                                <option value="United States">United States</option>
                                                <option value="Canada">Canada</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Germany">Germany</option>
                                                <option value="France">France</option>
                                                <option value="India">India</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 border-top pt-3">
                                        <label class="form-label d-block mb-2">Card Details</label>

                                        <div class="mb-3">
                                            <input type="text" name="card_number" class="form-control" placeholder="Card Number" required>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <input type="text" name="exp_month" class="form-control" placeholder="Exp. Month (MM)" required>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="exp_year" class="form-control" placeholder="Exp. Year (YYYY)" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" name="cvc" class="form-control" placeholder="CVC" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="amount" value="{{ $amount ?? 100 }}">

                                    <button type="submit" class="btn btn-primary w-100 mt-3">Proceed</button>
                                </form>
                            </div>
                        </div>
                        <!-- Logo only on mobile view -->
                        <div class="mb-1 d-block d-md-none text-left">
                            <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="height: 50px;">
                        </div>
                        <!-- Booking Summary -->
                        <div class="col-md-5 order-1 order-md-2">
                            <div class="custom-form-box shadow-sm rounded">
                                <h5 class="fw-bold mb-3">Booking Summary</h5>
                                <hr>
                                <ul class="list-unstyled mb-2">
                                    <li><strong>Location:</strong> {{ $location ?? 'Cancun' }}</li>
                                    <li><strong>Resort:</strong> {{ $resort ?? 'Cancun Palm All Inclusive' }}</li>
                                    <li><strong>Package:</strong> {{ $package ?? '5 Days & 4 Nights for 2 Adults' }}</li>
                                </ul>
                                <div class="border-top pt-3 mt-3">
                                    <h6 class="">Total Amount</h6>
                                    <p class="fs-4 text-success mb-0 fw-bold">${{ $amount ?? '100.00' }}</p>
                                </div>

                                <div class="mt-4 small text-muted">
                                    Transaction ID: <strong>{{ $reference ?? 'ABC123XYZ' }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        .checkout-wrapper {
            background: url('{{ asset('img/resort-bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Adjust for darker/lighter */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .custom-form-box {
            background-color: rgba(255, 255, 255, 0.75); /* semi-transparent white */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            font-size: 14px;
            padding: 10px 12px;
            border-radius: 6px;
            background-color: #ffffff;
            border: 1px solid #ccc;
        }

        .form-label {
            font-weight: 500;
            font-size: 14px;
            color: #333;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
            padding: 10px 12px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-primary:hover {
            background-color: #004099;
        }

        .text-success {
            color: #2b8a3e !important;
        }

        .fw-bold {
            font-weight: 600 !important;
        }

        ul.list-unstyled li {
            margin-bottom: 6px;
        }
    </style>
@endpush
