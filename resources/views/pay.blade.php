<!DOCTYPE html>
<html>
<head>
    <title>Custom PayMongo Test Checkout</title>
</head>
<body>
<h2>Secure Payment (Test Only)</h2>
<form method="POST" action="{{ route('paymongo.charge') }}">
    @csrf

    <label>Full Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" placeholder="+1 555 123 4567" required><br><br>

    <label>Amount (in PHP):</label><br>
    <input type="number" name="amount" min="20" required><br><br>

    <label>Card Number:</label><br>
    <input type="text" name="card_number" value="4343434343434345" required><br><br>

    <label>Expiration Month (MM):</label><br>
    <input type="text" name="exp_month" value="12" required><br><br>

    <label>Expiration Year (YYYY):</label><br>
    <input type="text" name="exp_year" value="2029" required><br><br>

    <label>CVC:</label><br>
    <input type="text" name="cvc" value="123" required><br><br>

    <button type="submit">Pay Now (Test Mode)</button>
</form>
</body>
</html>
