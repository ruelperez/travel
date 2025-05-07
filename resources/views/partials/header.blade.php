<!-- Top Navbar -->
<nav class="navbar navbar-expand-md shadow-sm small fixed-top" id="topNavbar" style="border-bottom: 1px solid #eee;">
    <div class="container">
        <!-- Left: Logo and Title -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="Global Exchange Vacation Club" height="50">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainContent" aria-controls="navbarMainContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarMainContent">
            <ul class="navbar-nav align-items-md-center text-center text-md-start">
                <!-- Home Link -->
                <li class="nav-item me-md-3">
                    <a class="nav-link fw-semibold" href="/">Home</a>
                </li>

{{--                <!-- Packages Dropdown -->--}}
{{--                <li class="nav-item dropdown me-md-3">--}}
{{--                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        Vacation Deal--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="/puerto-vallarta" wire:navigate>Puerto Vallarta</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/loreto" wire:navigate>Loreto</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/cancun" wire:navigate>Cancun</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/cabo-san-lucas" wire:navigate>Cabo San Lucas</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/riviera-maya" wire:navigate>Riviera Maya</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <!-- Phone -->
                <li class="nav-item me-md-3">
                    <span class="nav-link">
                        <i class="bi bi-telephone-fill text-warning"></i>
                        <strong class="ms-1">00000000000</strong>
                    </span>
                </li>

                <!-- Book Now Button -->
                <li class="nav-item me-md-3">
                    <a href="#" class="btn btn-warning text-white fw-bold px-3 py-1" style="font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#bookingModal">
                        BOOK NOW
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
