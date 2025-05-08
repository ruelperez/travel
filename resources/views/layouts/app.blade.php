<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Villa Resorts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Daterangepicker CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        .tab-scale {
            transition: all 0.2s ease;
        }
        .tab-selected {
            font-weight: bold;
            transform: scale(1.1);
        }
        .custom-divider-right {
            border-right: 1px solid black;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            background: url('https://example.com/your-hero.jpg') no-repeat center center;
            background-size: cover;
            height: 80vh;
            color: white;
        }
        .carousel-caption {
            background: rgba(255, 255, 255, 0.7);
            color: #000;
            border-radius: 8px;
            padding: 1rem;
        }

        .carousel-caption h5,
        .carousel-caption p {
            color: #000 !important;
        }

        body, .navbar {
            transition: background-color 0.3s ease, color 0.3s ease;
        }


        .carousel-caption-custom h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .carousel-caption-custom a {
            padding: 10px 25px;
            font-weight: 600;
        }

        .carousel-image {
            height: 560px; /* Reduced from ~700px */
            object-fit: cover;
        }

        .carousel-caption-custom h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .custom-carousel-control {
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 70% 70%;
            filter: invert(1); /* Make arrows white */
        }

        .custom-carousel-control:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }

        #topNavbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1055; /* stays above carousel */
            background-color: rgba(255, 255, 255, 0.85); /* semi-transparent white */
            backdrop-filter: blur(10px); /* optional blur for nice effect */
            border-bottom: 1px solid #ddd;
        }
        .badge-soft-primary {
            background-color: rgba(13, 110, 253, 0.15);
            color: #0d6efd;
            border-radius: 999px;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
        }

        .badge-soft-success {
            background-color: rgba(25, 135, 84, 0.15);
            color: #198754;
            border-radius: 999px;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
        }

        .badge-soft-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
            border-radius: 999px;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
        }
        .text-teal {
            color: #008080;
        }
        .card-img-top {
            border-top-left-radius: .5rem;
            border-top-right-radius: .5rem;
        }
        .btn-teal {
            background: linear-gradient(to right, #00b4aa, #293462);
            color: white;
            border: none;
        }

        .btn-teal:hover {
            background: linear-gradient(to right, #009688, #1f294b);
        }

        .bg-teal {
            background-color: #00b4aa;
        }

        .object-cover {
            object-fit: cover;
        }

        @media (max-width: 768px) {
            #dealCarousel {
                max-width: 90%;
            }
            .carousel-inner {
                height: 450px !important;
            }
        }
    </style>
    @livewireStyles
</head>
<body id="appBody" class="text-dark">
@include('partials.header')
@include('modal.home.booknow')

<main class="pt-5 mt-4">
    @yield('content')
</main>

@include('partials.footer')

<!-- Bootstrap JS -->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}
<script>
    $(function () {
        $('#dateRange').daterangepicker({
            opens: 'center',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                applyLabel: 'Apply',
                format: 'MM/DD/YYYY'
            }
        });

        $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#dateRange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('themeToggle');
        const icon = toggleBtn?.querySelector('i');
        const body = document.body;

        // Load saved theme
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.remove('bg-white', 'text-dark');
            body.classList.add('bg-dark', 'text-white');
            icon?.classList.replace('bi-moon', 'bi-sun');
        }

        toggleBtn?.addEventListener('click', function () {
            const isDark = body.classList.contains('bg-dark');

            body.classList.toggle('bg-dark', !isDark);
            body.classList.toggle('text-white', !isDark);
            body.classList.toggle('bg-white', isDark);
            body.classList.toggle('text-dark', isDark);

            icon?.classList.replace(isDark ? 'bi-sun' : 'bi-moon', isDark ? 'bi-moon' : 'bi-sun');
            localStorage.setItem('theme', isDark ? 'light' : 'dark');
        });

        const nav = document.querySelector('.navbar');
        const links = document.querySelectorAll('.nav-link, .navbar-brand span');

        function applyTheme(isDark) {
            body.classList.toggle('bg-dark', isDark);
            body.classList.toggle('text-white', isDark);
            body.classList.toggle('bg-white', !isDark);
            body.classList.toggle('text-dark', !isDark);

            nav?.classList.toggle('bg-dark', isDark);
            nav?.classList.toggle('text-white', isDark);
            nav?.classList.toggle('bg-white', !isDark);
            nav?.classList.toggle('text-dark', !isDark);

            links.forEach(link => {
                link.classList.toggle('text-white', isDark);
                link.classList.toggle('text-dark', !isDark);
            });
        }
    });
</script>
@livewireScripts

@stack('js')
</body>
</html>
