@extends('layouts.payment_layout')

@section('content')
    <div class="container py-5 text-center">
        <h2 class="text-danger mb-3">❌ Payment Failed</h2>
        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <div class="mt-4">
            <a href="{{ route('pay.form') }}" class="btn btn-warning">Try Again</a>
            <a href="/" class="btn btn-outline-secondary ms-2">Go to Homepage</a>
        </div>
    </div>
@endsection
