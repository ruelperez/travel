@extends('layouts.app')

@section('content')
    <!-- Carousel -->
    <section id="heroCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="{{ asset('img/head3.png') }}" class="d-block w-100 carousel-image" alt="Resort 1">
            </div>
            <div class="carousel-item position-relative">
                <img src="{{ asset('img/head2.png') }}" class="d-block w-100 carousel-image" alt="Resort 2">
            </div>
            <div class="carousel-item position-relative">
                <img src="{{ asset('img/head1.png') }}" class="d-block w-100 carousel-image" alt="Resort 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </section>
    @livewire('location.home')
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
{{--@push('js')--}}
{{--    <script>--}}
{{--        $wire.on('subSubmitted', () => {--}}
{{--            $('#addClose').click();--}}
{{--            $('#btn123').click();--}}
{{--        });--}}
{{--        $wire.on('remOrUp', () => {--}}
{{--            $('#resClose').click();--}}
{{--            $('#btn456').click();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
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
