@extends('layouts.payment_layout')

@section('content')
    <div class="success-container">
        <div class="success-box">
            <div class="checkmark">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="text-success mt-3">Payment Successful</h2>

            <div class="transaction-details mt-4">
                <p><strong>Transaction ID:</strong> {{ $details['id'] }}</p>
                <p><strong>Status:</strong> {{ $details['status'] }}</p>
            </div>

            <p class="text-muted mt-3">
                <a href="{{ route('purchase.link', $linkID) }}"
                   class="confirm-link"
                   target="_blank" rel="noopener noreferrer">
                    View your confirmation
                </a>
                or check your email — we've sent it there too.
            </p>

            <a href="{{ route('home') }}" class="btn btn-outline-success back-btn mt-4">
                <i class="fas fa-arrow-left me-2"></i> Back Home
            </a>
        </div>
    </div>
@endsection

@push('css')
    <style>
        body {
            margin: 0;
            background: linear-gradient(to right, #eaffea, #f3fff3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.8s ease-in-out;
            padding: 1rem;
        }

        .success-box {
            background: #ffffff;
            padding: 3rem 2rem;
            border-radius: 20px;
            border: 1px solid #c6f0c6;
            box-shadow: 0 20px 40px rgba(0, 128, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
            animation: slideUp 0.6s ease-in-out;
        }

        .checkmark {
            font-size: 72px;
            color: #28a745;
            animation: pop 0.4s ease-out;
        }

        .transaction-details p {
            margin-bottom: 0.25rem;
            font-size: 15px;
            color: #333;
        }

        .confirm-link {
            display: inline-block;
            margin-top: 0.5rem;
            color: #198754;
            font-weight: 600;
            text-decoration: underline;
            transition: color 0.2s ease-in-out;
        }

        .confirm-link:hover {
            color: #145c32;
        }

        .back-btn {
            padding: 0.5rem 1.5rem;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .back-btn:hover {
            background-color: #28a745;
            color: #fff;
            border-color: #28a745;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
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
