@extends('layouts.app')

@section('content')
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header d-flex justify-content-between align-items-center border-0 bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="bi bi-percent fs-5"></i>
                        </div>
                        <div>
                            <div class="text-uppercase small">Book With Us</div>
                            <div class="fw-bold">GUARANTEED LOWEST RATE</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr class="m-0" style="border-top: 1px solid rgba(255,255,255,0.2);">
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Select Resort</label>
                            <select class="form-select">
                                <option selected>Villa del Palmar</option>
                                <option>Villa La Estancia</option>
                                <option>Garza Blanca</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dates</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control" id="dateRange" placeholder="Check-in - Check-out">
                            </div>
                        </div>

                        <div class="mb-3 d-flex gap-3">
                            <div class="flex-fill">
                                <label class="form-label">Adults</label>
                                <input type="number" class="form-control" value="2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Children</label>
                                <select id="childCount" class="form-select">
                                    <option value="0" selected>0</option>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <div id="childAgesContainer" class="mb-3"></div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Promo Code</label>
                            <input type="text" class="form-control" placeholder="Optional">
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Type</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="hotelOnly" checked>
                                <label class="form-check-label" for="hotelOnly">Hotel Only</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="hotelFlight">
                                <label class="form-check-label" for="hotelFlight">Hotel + Flight</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 fw-bold">SEE AVAILABILITY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Nav Bar -->
    <div class="bg-darkblue py-2 text-white small" style="background-color: black;">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/150x40?text=LOGO" alt="Logo" height="40" class="me-2">
                <span class="fs-6">Global Exchange Vacation Club</span>
            </div>
            <div class="d-flex align-items-center">
            <span class="me-3">
                <i class="bi bi-telephone-fill text-warning"></i>
                <strong class="ms-1">00000000000</strong>
            </span>
            </span>
                <a href="#" class="btn btn-warning text-white fw-bold px-3 py-1" style="font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#bookingModal">BOOK NOW</a>
            </div>
        </div>
    </div>

    <section id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/1803/_Chasing_the_Moments_Main_Slider_TVG_1920x1080.jpg" class="d-block w-100 carousel-image" alt="Resort 1">
{{--                <div class="carousel-caption-custom position-absolute bottom-0 start-50 translate-middle-x text-center mb-5">--}}
{{--                    <h1 class="text-white fw-bold display-5">TAFER VALLARTA</h1>--}}
{{--                    <a href="#" class="btn btn-outline-light mt-3">VIEW MORE</a>--}}
{{--                </div>--}}
            </div>
            <div class="carousel-item position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/1818/More-Space-More-Fun-Cabo6.jpg" class="d-block w-100 carousel-image" alt="Resort 1">
{{--                <div class="carousel-caption-custom position-absolute bottom-0 start-50 translate-middle-x text-center mb-5">--}}
{{--                    <h1 class="text-white fw-bold display-5">TAFER CABO</h1>--}}
{{--                    <a href="#" class="btn btn-outline-light mt-3">VIEW MORE</a>--}}
{{--                </div>--}}
            </div>
            <div class="carousel-item position-relative">
                <img src="https://villacdn.villagroupresorts.com/uploads/special/slider_en/467/UFHP_Main-Slider_TVG_1920x1080.jpg" class="d-block w-100 carousel-image" alt="Resort 1">
{{--                <div class="carousel-caption-custom position-absolute bottom-0 start-50 translate-middle-x text-center mb-5">--}}
{{--                    <h1 class="text-white fw-bold display-5">TAFER CANCUN</h1>--}}
{{--                    <a href="#" class="btn btn-outline-light mt-3">VIEW MORE</a>--}}
{{--                </div>--}}
            </div>
        </div>

        <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </section>



    <footer class="bg-dark text-white text-center py-4">
        &copy; {{ date('Y') }} The Villa Group. All rights reserved.
    </footer>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const childCount = document.getElementById('childCount');
            const childAgesContainer = document.getElementById('childAgesContainer');

            childCount.addEventListener('change', function () {
                const count = parseInt(this.value);
                childAgesContainer.innerHTML = ''; // Clear existing

                for (let i = 1; i <= count; i++) {
                    const group = document.createElement('div');
                    group.classList.add('mb-2');

                    const label = document.createElement('label');
                    label.textContent = `Child ${i} Age`;
                    label.classList.add('form-label');

                    const select = document.createElement('select');
                    select.classList.add('form-select');
                    select.name = `child_age_${i}`;

                    for (let age = 1; age <= 12; age++) {
                        const option = document.createElement('option');
                        option.value = age;
                        option.textContent = `${age} year${age > 1 ? 's' : ''} old`;
                        select.appendChild(option);
                    }

                    group.appendChild(label);
                    group.appendChild(select);
                    childAgesContainer.appendChild(group);
                }
            });
        });
    </script>
@endpush
