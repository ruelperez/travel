@extends('layouts.payment_layout')

@section('content')
    <div class="container py-5 text-center">
        <h2 class="text-success mb-3">✅ Payment Successful</h2>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <div class="mt-4">
            <a href="/" class="btn btn-outline-secondary ms-2">Go to Homepage</a>
        </div>
    </div>
@endsection
