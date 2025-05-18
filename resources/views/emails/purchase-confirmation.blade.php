<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.5; }
        h2 { color: #0056b3; }
        .section { margin-bottom: 20px; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

<h2>OFFICIAL PURCHASE CONFIRMATION</h2>
<p><em>(This is NOT your hotel confirmation)</em></p>

{{--<div class="section">--}}
{{--    <p><strong>Purchase Date:</strong> {{ now()->format('d/M/Y') }}</p>--}}
{{--    <p>Thank you for your purchase of a vacation certificate with <strong>Vacation Deals All Inclusive</strong></p>--}}
{{--    <p><strong>Certificate Number:</strong> {{ $data['transaction_id'] }}</p>--}}
{{--    <p><strong>Certificate Expiry:</strong> {{ now()->addMonths(18)->format('d/M/Y') }}</p>--}}
{{--    <p><strong>Package Price:</strong> ${{ $data['price'] }}</p>--}}
{{--</div>--}}

{{--<div class="section" style="background: #fef3c7; padding: 10px;">--}}
{{--    <strong>⚠️ ACTION REQUIRED:</strong><br>--}}
{{--    This confirmation must be <strong>e-signed within 48 hours</strong> to activate your vacation certificate.<br>--}}
{{--    <a href="{{ $data['esign_link'] }}" target="_blank">{{ $data['esign_link'] }}</a>--}}
{{--</div>--}}

{{--<div class="section">--}}
{{--    <h3>Payment Confirmation</h3>--}}
{{--    <p><strong>Name:</strong> {{ $data['name'] }}</p>--}}
{{--    <p><strong>Email:</strong> {{ $data['email'] }}</p>--}}
{{--    <p><strong>Package:</strong> {{ $data['package'] ?? 'All Inclusive' }}</p>--}}
{{--    <p><strong>Amount Paid:</strong> ${{ $data['price'] }}</p>--}}
{{--    <p><strong>Payment Method:</strong> PayPal</p>--}}
{{--</div>--}}

{{--<div class="section">--}}
{{--    <h3>Your Vacation Package Includes:</h3>--}}
{{--    <ul>--}}
{{--        <li><strong>Destination:</strong> {{ $data['resort_name'] }}</li>--}}
{{--        <li><strong>Arrival Date:</strong> OPEN</li>--}}
{{--        <li><strong>Plan Type:</strong> {{ $data['package'] ?? 'All Inclusive' }}</li>--}}
{{--        <li><strong>No. of Nights:</strong> 4</li>--}}
{{--        <li><strong>Incentives:</strong> Free airport pick-up, free night (if eligible)</li>--}}
{{--    </ul>--}}
{{--</div>--}}

{{--<div class="section">--}}
{{--    <h3>Important Notes</h3>--}}
{{--    <ul>--}}
{{--        <li>Attendance to a 90-minute resort presentation is required</li>--}}
{{--        <li>Resort fees are not included and must be paid upon date confirmation</li>--}}
{{--        <li>This offer may not be used during Christmas and New Year’s weeks unless a premium is paid</li>--}}
{{--        <li>Bookings are subject to hotel availability</li>--}}
{{--        <li>No refunds for no-show or early checkout</li>--}}
{{--    </ul>--}}
{{--</div>--}}

{{--<div class="section" style="font-size: 13px; color: #666;">--}}
{{--    <p>This email is your official receipt. Please e-sign and return as confirmation of agreement to the terms and conditions.</p>--}}
{{--    <p>Need help? Call us at <strong>855-690-2950</strong> or email <strong>support@vacationdeals.com</strong></p>--}}
{{--</div>--}}

</body>
</html>
