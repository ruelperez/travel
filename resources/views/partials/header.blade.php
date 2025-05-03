<!-- Top Navbar -->
<nav class="navbar navbar-expand-md shadow-sm small fixed-top" id="topNavbar" style="border-bottom: 1px solid #eee;">
    <div class="container">
        <!-- Left: Logo and Title -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Global Exchange Vacation Club" height="50">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainContent" aria-controls="navbarMainContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarMainContent">
            <ul class="navbar-nav align-items-md-center text-center text-md-start">
                <li class="nav-item me-md-3">
                    <span class="nav-link">
                        <i class="bi bi-telephone-fill text-warning"></i>
                        <strong class="ms-1">00000000000</strong>
                    </span>
                </li>
                <li class="nav-item me-md-3">
                    <a href="#" class="btn btn-warning text-white fw-bold px-3 py-1" style="font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#bookingModal">
                        BOOK NOW
                    </a>
                </li>
            </ul>
        </div>

        <!-- Always visible: Theme Toggle -->
{{--        <div class="d-flex align-items-center ms-2">--}}
{{--            <button id="themeToggle" class="btn btn-outline-secondary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;" title="Toggle Light/Dark Mode">--}}
{{--                <i class="bi bi-moon fs-5"></i>--}}
{{--            </button>--}}
{{--        </div>--}}
    </div>
</nav>
