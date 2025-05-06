@extends('layouts.app')

@section('content')

    <!-- Carousel -->
    <section id="heroCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/1803/_Chasing_the_Moments_Main_Slider_TVG_1920x1080.jpg" class="d-block w-100 carousel-image" alt="Resort 1">
            </div>
            <div class="carousel-item position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/1818/More-Space-More-Fun-Cabo6.jpg" class="d-block w-100 carousel-image" alt="Resort 2">
            </div>
            <div class="carousel-item position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/467/UFHP_Main-Slider_TVG_1920x1080.jpg" class="d-block w-100 carousel-image" alt="Resort 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </section>

    <!-- Get the Best Deal Section -->
    <section class="container my-5">
        <h4 class="text-center fw-bold mb-5">Get the Best Deal</h4>
        <div class="row gy-5 gx-4">
            @php
                $deals = [
                    [
                        'location' => 'Puerto Vallarta',
                        'image' => 'https://www.vacationdealsallinclusive.com/img/03.b3f8a0bb.webp',
                        'price' => 599,
                        'original' => 1042,
                        'title' => 'Palmar Vallarta All Inclusive'
                    ],
                    [
                        'location' => 'Puerto Vallarta',
                        'image' => 'https://www.taferresorts.com/images/resorts/garza-blanca-los-cabos.jpg',
                        'price' => 699,
                        'original' => 1042,
                        'title' => 'Grand Riviera Nayarit All Inclusive'
                    ],
                    [
                        'location' => 'Puerto Vallarta',
                        'image' => 'https://www.taferresorts.com/images/resorts/hotel-mousai.jpg',
                        'price' => 699,
                        'original' => 1042,
                        'title' => 'Grand Vallarta All Inclusive'
                    ],
                    [
                        'location' => 'Puerto Vallarta',
                        'image' => 'https://www.vacationdealsallinclusive.com/img/03.b3f8a0bb.webp',
                        'price' => 699,
                        'original' => 1042,
                        'title' => 'Grand Nuevo Vallarta All Inclusive'
                    ],
                    [
                        'location' => 'Cabo San Lucas',
                        'image' => 'https://www.taferresorts.com/images/resorts/garza-blanca-los-cabos.jpg',
                        'price' => 599,
                        'original' => 1042,
                        'title' => 'Palmar Cabo All Inclusive'
                    ],
                    [
                        'location' => 'Cabo San Lucas',
                        'image' => 'https://www.taferresorts.com/images/resorts/tafer-san-jose.jpg',
                        'price' => 699,
                        'original' => 1042,
                        'title' => 'Grand San Jose All Inclusive'
                    ],
                ];
            @endphp

            @foreach ($deals as $deal)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ $deal['image'] }}" class="card-img-top" alt="{{ $deal['title'] }}" style="height: 220px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-2 badge bg-dark text-white">
                                <i class="bi bi-geo-alt-fill me-1"></i> {{ $deal['location'] }}
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);">
                                <div class="text-white fw-semibold">
                                    <span class="text-decoration-line-through small">${{ $deal['original'] }}</span>
                                    <span class="fs-5">${{ $deal['price'] }} <small>USD</small></span>
                                </div>
                                <small class="text-white">PER COUPLE</small>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold text-primary">{{ $deal['title'] }}</h6>
                            <p class="mb-1 small">5 Days & 4 nights for 2 adults.*</p>
                            <p class="text-muted small mb-3">*Ask about including children.</p>
                            <a href="#" class="mt-auto btn btn-sm fw-semibold text-white" style="background: linear-gradient(90deg, #D4145A, #FBB03B);">EXPLORE THIS OFFER</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Benefits Section -->
    <section class="container my-5 py-5">
        <div class="row align-items-center">
            <!-- Left: Illustration -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/benefits.png') }}" class="img-fluid" alt="Travel Illustration">
            </div>

            <!-- Right: Benefits Text -->
            <div class="col-md-6">
                <small class="text-uppercase text-muted fw-bold">Benefits</small>
                <h3 class="fw-bold mb-4">Trendy destinations</h3>

                <div class="mb-4">
                    <span class="badge small mb-1 badge-soft-primary">
                        Advertising
                    </span>
                    <h5 class="fw-semibold">Budget-friendly promotion</h5>
                    <p class="text-muted">List your rental for free and attract guests without any initial investment.</p>
                </div>

                <div class="mb-4">
                    <span class="badge small mb-1 badge-soft-success" >Exposure</span>
                    <h5 class="fw-semibold">Global visibility</h5>
                    <p class="text-muted">Travelers worldwide are searching for one-of-a-kind accommodations</p>
                </div>

                <div class="mb-4">
                    <span class="badge small mb-1 badge-soft-danger">Secure</span>
                    <h5 class="fw-semibold">Secure and simple</h5>
                    <p class="text-muted">Easily manage bookings and receive payments online with confidence and convenience.</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <!-- JS for Dynamic Child Age Inputs -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const childCount = document.getElementById('childCount');
            const container = document.getElementById('childAgesContainer');

            childCount.addEventListener('change', function () {
                const count = parseInt(this.value);
                container.innerHTML = '';

                for (let i = 1; i <= count; i++) {
                    const label = document.createElement('label');
                    label.className = 'form-label text-white mt-2';
                    label.innerText = `Child ${i} Age`;

                    const select = document.createElement('select');
                    select.className = 'form-select bg-dark text-white border-light mb-2';
                    select.name = `child_age_${i}`;

                    for (let age = 1; age <= 12; age++) {
                        const option = document.createElement('option');
                        option.value = age;
                        option.innerText = `${age} year${age > 1 ? 's' : ''} old`;
                        select.appendChild(option);
                    }

                    container.appendChild(label);
                    container.appendChild(select);
                }
            });
        });
    </script>
@endpush
