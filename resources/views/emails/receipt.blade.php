<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
</head>
<body>
<h2>Hi {{ $data['name'] }},</h2>
<p>Thank you for your payment!</p>

<p><strong>Payment Details:</strong></p>
<ul>
    <li><strong>Amount Paid:</strong> ₱{{ number_format($data['amount'], 2) }}</li>
    <li><strong>Payment ID:</strong> {{ $data['payment_id'] }}</li>
    <li><strong>Date:</strong> {{ now()->toDayDateTimeString() }}</li>
</ul>

<p>If you have questions, feel free to reply to this email.</p>

<p>Regards,<br><strong>YourBusiness</strong></p>
</body>
</html>
