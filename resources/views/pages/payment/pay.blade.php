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
                                        <label class="form-label">Billing Address</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <div class="mt-4 border-top pt-3">
                                        <label class="form-label d-block mb-3">Card Details</label>

                                        <!-- Card Number -->
                                        <div class="position-relative mb-3">
                                            <input type="text" name="card_number" id="card_number" class="form-control pe-5" required>
                                            <img id="card_icon" src="" alt="Card" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); height: 24px; display: none;">
                                        </div>

                                        <!-- Expiration -->
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <input type="text" name="exp_date" id="exp_date" class="form-control" placeholder="MM/YY" maxlength="5" required>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="cvc" class="form-control" placeholder="CVC" maxlength="4" required>
                                            </div>
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
                                    <li><strong>Location:</strong> {{ $location_name ?? 'None' }} ({{ $resort_name ?? 'None' }})</li>
                                    <li><strong>Package:</strong> {{ $package ?? '5 Days & 4 Nights for 2 Adults' }}</li>
                                </ul>
                                <div class="border-top pt-3 mt-3">
                                    <h6 class="">Total Amount</h6>
                                    <p class="fs-4 text-success mb-0 fw-bold">${{ $price ?? '0.0' }}</p>
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
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cardInput = document.getElementById('card_number');
            cardInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '').substring(0, 16);
                let formatted = value.match(/.{1,4}/g);
                e.target.value = formatted ? formatted.join(' ') : '';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cardInput = document.getElementById('card_number');
            const typeDisplay = document.getElementById('card_type_display');

            cardInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');

                // Auto-detect cards type
                let cardType = getCardType(value);
                typeDisplay.textContent = cardType ? `Card Type: ${cardType}` : '';

                // Limit digits based on cards type
                let maxLength = (cardType === 'American Express') ? 15 : 16;
                value = value.substring(0, maxLength);

                // Format input
                e.target.value = formatCardNumber(value, cardType);
            });

            function formatCardNumber(number, type) {
                if (type === 'American Express') {
                    return number.replace(/^(\d{0,4})(\d{0,6})(\d{0,5}).*/, function (_, g1, g2, g3) {
                        return [g1, g2, g3].filter(Boolean).join(' ');
                    });
                } else {
                    return number.replace(/(.{4})/g, '$1 ').trim();
                }
            }

            function getCardType(number) {
                if (/^4/.test(number)) return 'Visa';
                if (/^5[1-5]/.test(number)) return 'Mastercard';
                if (/^3[47]/.test(number)) return 'American Express';
                if (/^6(?:011|5)/.test(number)) return 'Discover';
                return '';
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cardInput = document.getElementById('card_number');
            const cardIcon = document.getElementById('card_icon');

            cardInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');
                let cardType = getCardType(value);

                // Format card number
                let maxLength = (cardType === 'American Express') ? 15 : 16;
                value = value.substring(0, maxLength);
                e.target.value = formatCardNumber(value, cardType);

                // Update icon
                const base = '{{ asset('img/cards') }}/';
                if (cardType === 'Visa') {
                    cardIcon.src = base + 'visa.png';
                    cardIcon.style.display = 'inline';
                } else if (cardType === 'Mastercard') {
                    cardIcon.src = base + 'mastercard.png';
                    cardIcon.style.display = 'inline';
                } else if (cardType === 'American Express') {
                    cardIcon.src = base + 'amex.png';
                    cardIcon.style.display = 'inline';
                } else if (cardType === 'Discover') {
                    cardIcon.src = base + 'discover.png';
                    cardIcon.style.display = 'inline';
                } else {
                    cardIcon.src = '';
                    cardIcon.style.display = 'none';
                }
            });

            function formatCardNumber(number, type) {
                if (type === 'American Express') {
                    return number.replace(/^(\d{0,4})(\d{0,6})(\d{0,5}).*/, (_, g1, g2, g3) =>
                        [g1, g2, g3].filter(Boolean).join(' ')
                    );
                } else {
                    return number.replace(/(.{4})/g, '$1 ').trim();
                }
            }

            function getCardType(number) {
                if (/^4/.test(number)) return 'Visa';
                if (/^5[1-5]/.test(number)) return 'Mastercard';
                if (/^3[47]/.test(number)) return 'American Express';
                if (/^6(?:011|5)/.test(number)) return 'Discover';
                return '';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const expDateInput = document.getElementById('exp_date');

            expDateInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value.length >= 3) {
                    value = value.substring(0, 4);
                    value = value.replace(/^(\d{2})(\d{1,2})/, '$1/$2');
                }

                e.target.value = value;
            });
        });
    </script>
@endpush
