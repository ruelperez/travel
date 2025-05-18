@extends('layouts.payment_layout')

@section('content')
    <div class="success-container">
        <div class="success-box">
            <div class="checkmark">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="text-success mt-3">Payment Successful</h2>
            <p class="mb-2"><strong>Transaction ID:</strong> {{ $details['id'] }}</p>
            <p class="mb-2"><strong>Status:</strong> {{ $details['status'] }}</p>
            <p class="text-muted mb-4">
                A purchase confirmation has been sent to your email. Please check your inbox (and spam folder).
            </p>
            <a href="{{ route('home') }}" class="btn btn-outline-success">
                <i class="fas fa-arrow-left me-2"></i> Back Home
            </a>
        </div>
    </div>
@endsection

@push('css')
    <style>
        body {
            margin: 0;
            background-color: #eaffea; /* light green background */
        }

        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1s ease-in-out;
        }

        .success-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #c6f0c6;
            box-shadow: 0 12px 24px rgba(0, 128, 0, 0.1);
            text-align: center;
            animation: slideUp 0.6s ease-in-out;
        }

        .checkmark {
            font-size: 64px;
            color: #28a745;
            animation: pop 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes pop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
@endpush
