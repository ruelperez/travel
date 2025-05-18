<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            padding: 40px 20px;
        }

        .email-wrapper {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #0b5ed7;
            font-size: 20px;
            margin-bottom: 10px;
        }

        p {
            font-size: 15px;
            margin-bottom: 25px;
        }

        .link-button {
            display: inline-block;
            background-color: #198754;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
        }

        .link-button:hover {
            background-color: #157347;
        }

        .small-note {
            font-size: 13px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="email-wrapper">
    <h2>Your Purchase Confirmation is Ready</h2>
    <p>
        Thank you for your purchase. You may now view your official purchase confirmation by clicking the button below:
    </p>
    <p style="text-align: center;">
        <a href="{{ $payLink }}" target="_blank" class="link-button">View Confirmation</a>
    </p>

    <p class="small-note">
        If the button doesn’t work, copy and paste this link into your browser:<br>
        <a href="{{ $payLink }}" style="color: #0b5ed7;">{{ $payLink }}</a>
    </p>
</div>

</body>
</html>
