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

    <style>
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
    </style>
</head>
<body>
@yield('content')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
@stack('js')
</body>
</html>
