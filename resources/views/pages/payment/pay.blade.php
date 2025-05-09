@extends('layouts.payment_layout')

@section('content')
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="height: 50px;">
            <div class="reference-box">
                Reference Number: <strong>m2m39sj43h5lFFSA1sd</strong>
            </div>
        </div>

        <div class="row">
            <!-- Left: Summary -->
            <div class="col-md-6 mb-3">
                <div class="card-box">
                    <div class="section-title">Payment amount</div>
                    <div class="total-amount">₱ 1,800.00</div>

                    <div class="mt-4">
                        <div class="section-title">Payment for</div>
                        <p class="text-muted">The beanie products.</p>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>ITEM NAME</th>
                                <th class="text-center">QTY</th>
                                <th class="text-end">PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Jasmine Rice 25KG</td>
                                <td class="text-center">1</td>
                                <td class="text-end">₱ 1,250.00</td>
                            </tr>
                            <tr>
                                <td>Beanines</td>
                                <td class="text-center">100</td>
                                <td class="text-end">₱ 550.00</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th class="text-end">₱ 1,800.00</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right: Card Form -->
            <div class="col-md-6 mb-3">
                <div class="card-box">
                    <div class="section-title mb-3">Choose your payment method</div>
                    <form method="POST" action="{{ route('paymongo.charge') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <input type="text" class="form-control" name="card_number" value="4343434343434345" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Expiration Month (MM)</label>
                                        <input type="text" class="form-control" name="exp_month" value="12" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Expiration Year (YYYY)</label>
                                        <input type="text" class="form-control" name="exp_year" value="2029" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">CVC</label>
                                <input type="text" class="form-control" name="cvc" value="123" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="John Doe" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="johndoe@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="+1 555 123 4567" required>
                        </div>

                        <input type="hidden" name="amount" value="1800">

                        <button type="submit" class="btn btn-success w-100">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-box {
            border: 1px solid #e0e0e0;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .total-amount {
            font-size: 24px;
            color: green;
            font-weight: bold;
        }
        .powered {
            font-size: 12px;
            color: #888;
        }
        .reference-box {
            background-color: #f1f1f1;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 13px;
        }
    </style>
@endpush

