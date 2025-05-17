@extends('layouts.payment_layout')

@section('content')
    <div class="cancel-container">
        <div class="cancel-box">
            <div class="cancel-icon mb-3">
                <i class="fas fa-times-circle"></i>
            </div>
            <h2 class="text-danger">Payment Cancelled</h2>
            <p class="text-muted">Your payment has been cancelled or failed.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-danger mt-3">
                <i class="fas fa-undo-alt me-2"></i> Try Again
            </a>
        </div>
    </div>
@endsection
@push('css')
    <style>
        body {
            margin: 0;
            background-color: #fff5f5;
        }

        .cancel-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.6s ease-in-out;
        }

        .cancel-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: slideDown 0.5s ease-out;
        }

        .cancel-icon {
            font-size: 60px;
            color: #dc3545;
            animation: pop 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes pop {
            0% { transform: scale(0.6); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
@endpush
