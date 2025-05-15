@extends('layouts.payment_layout')

@section('content')
    <div class="checkout-wrapper position-relative pb-5">
        <div class="dark-overlay"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form method="POST" action="{{ route('xendit.charge') }}">
                        @csrf
                        <div class="custom-form-box shadow-sm p-4 mx-auto" style="background-color: #F5F5F5; border-radius: 20px;">
                            <!-- Logo -->
                            <div class="mb-4 text-center">
                                <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="height: 45px;">
                            </div>

                            <!-- Booking Summary -->
                            <h5 class="fw-bold mb-4 text-primary text-center">Booking Summary</h5>
                            <hr class="mb-4">

                            <ul class="list-unstyled mb-4">
                                <li class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa-solid fa-location-dot fs-2 mb-2" style="color: red;"></i>
                                        <span class="fs-6 fw-medium text-dark">
                                            {{ $location_name ?? 'None' }} ({{ ucwords(strtolower($resort_name)) ?? 'None' }})
                                        </span>
                                    </div>
                                </li>
                                <li class="mb-4 text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa-solid fa-gift fs-2 mb-2" style="color: orange;"></i>
                                        <span class="fs-6 fw-medium text-dark">
                                            {{ $package ?? '5 Days & 4 Nights for 2 Adults' }}
                                        </span>
                                    </div>
                                </li>
                            </ul>

                            <!-- Total Amount -->
                            <div class="border-top pt-3 mt-3 text-end">
                                <h6 class="text-muted mb-1">Total Amount</h6>
                                <p class="fs-3 text-success mb-0 fw-bold">${{ $price ?? '0.0' }}</p>
                            </div>

                            <!-- Transaction ID -->
                            <div class="mt-3 small text-muted text-end">
                                Transaction ID: <strong>{{ $reference ?? 'ABC123XYZ' }}</strong>
                            </div>

                            <!-- Hidden Fields for Backend -->
                            <input type="hidden" name="location_name" value="{{ $location_name }}">
                            <input type="hidden" name="resort_name" value="{{ $resort_name }}">
                            <input type="hidden" name="package" value="{{ $package }}">
                            <input type="hidden" name="price" value="{{ $price }}">
                            <input type="hidden" name="reference" value="{{ $reference }}">

                            <!-- Proceed Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fs-6">
                                    Proceed
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
