<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Villa Resorts</title>
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('img/title_logo2.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('css')
</head>
<body>

<main>
    @yield('content')
</main>

@stack('js')
</body>
</html>
