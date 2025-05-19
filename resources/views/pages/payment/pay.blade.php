@extends('layouts.payment_layout')

@section('content')

    <div class="checkout-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form method="POST" action="{{ route('paypal.create') }}">
                        @csrf
                        <div class="custom-form-box p-4 mx-auto">
                            <!-- Logo -->
                            <div class="mb-4 text-center">
                                <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="height: 45px;">
                            </div>

                            <!-- Title -->
                            <h5 class="fw-bold mb-4 text-primary text-center">Booking Summary</h5>
                            <hr class="mb-4">

                            <!-- Booking Info -->
                            <ul class="list-unstyled mb-4">
                                <li class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="icon-circle">
                                            <i class="fa-solid fa-location-dot text-danger"></i>
                                        </div>
                                        <span class="fs-6 fw-semibold text-dark">
                                        {{ $location_name ?? 'None' }} <br>
                                        <small class="text-muted">({{ ucwords(strtolower($resort_name)) ?? 'None' }})</small>
                                    </span>
                                    </div>
                                </li>

                                <li class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="icon-circle">
                                            <i class="fa-solid fa-gift text-warning"></i>
                                        </div>
                                        <span class="fs-6 fw-semibold text-dark">
                                        {{ $package ?? '5 Days & 4 Nights for 2 Adults' }}
                                    </span>
                                    </div>
                                </li>
                            </ul>

                            <!-- Amount & Reference -->
                            <div class="border-top pt-3 mt-3 text-end">
                                <h6 class="text-muted mb-1">Total Amount</h6>
                                <p class="fs-3 text-success mb-0 fw-bold">${{ $price ?? '0.0' }}</p>
                            </div>
                            <!-- Hidden Fields -->
                            <input type="hidden" name="location_name" value="{{ $location_name }}">
                            <input type="hidden" name="resort_name" value="{{ $resort_name }}">
                            <input type="hidden" name="package" value="{{ $package }}">
                            <input type="hidden" name="amount" value="{{ $price }}">
                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fs-6 shadow-sm">
                                    <i class="fas fa-credit-card me-2"></i>Proceed
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .checkout-wrapper {
            background-color: #ffffff;
            min-height: 100vh;
            padding-top: 50px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .custom-form-box {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .custom-form-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.15);
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 1.5rem;
            background: #f1f1f1;
            transition: background 0.3s ease;
        }

        .icon-circle:hover {
            background: #e0e0e0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endpush
