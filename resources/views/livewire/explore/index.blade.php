<div>
    <div class="container mb-5 mt-4">
        <i class="fa-solid fa-less-than me-2"
           style="
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 50%;
        background-color: #f0f0f0;
        transition: background-color 0.3s, box-shadow 0.3s;
    "
           onmouseover="this.style.backgroundColor='#e0e0e0'; this.style.boxShadow='0 0 6px rgba(0,0,0,0.15)'"
           onmouseout="this.style.backgroundColor='#f0f0f0'; this.style.boxShadow='none'"
           onclick="location.href = '/resort/{{$deal->location_id}}';">
        </i>
        <span style="cursor: pointer;" onclick="location.href = '/resort/{{$deal->location_id}}';">Back</span>

        <!-- Title and Price Section -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4 mt-2 gap-3">
            <!-- Resort Info -->
            <div>
                <div class="d-flex align-items-start gap-2 mb-1 flex-wrap">
                    <h5 class="fw-bold mb-0">{{ ucwords(strtolower($deal->resort_name)) }}</h5>
                    <span class="text-nowrap">(All Inclusive)</span>
                </div>
                <p class="text-muted mb-0">
                    <i class="bi bi-geo-alt-fill text-info"></i> {{ $deal->location->location_name }}
                </p>
            </div>

            <!-- Price Info -->
            <div class="text-start text-md-end">
                <h4 class="fw-bold text-dark mb-1">
                    ${{ $deal->price }} <small class="text-uppercase">usd</small>
                </h4>

                <!-- Combine original price and save in one line -->
                <div class="d-flex align-items-baseline gap-2 flex-wrap">
                    <del class="text-muted mb-0">${{ $deal->original }} USD</del>
                    <span class="text-success fw-semibold mb-0">
            @php
                $a = $deal->original - $deal->price;
                $b = $a / $deal->original;
                $c = $b * 100;
            @endphp
            SAVE {{ number_format($c, 1) }}%
        </span>
                </div>
            </div>


            <!-- Button (centered on mobile only) -->
            <div class="mt-3 mt-md-0 mx-auto mx-md-0 text-center text-md-start">
                <a href="/pay/{{ $deal->location->location_name }}/{{ $deal->resort_name }}/{{ $deal->price }}/{{ $deal->package }}"
                   class="btn px-4 py-2 fw-semibold text-dark"
                   style="background: linear-gradient(135deg, #fff176, #fdd835); border: none;">
                    GET DEAL NOW!
                </a>
            </div>
        </div>
        <!-- Mobile View: Carousel -->


        <div class="container my-4 py-3 px-1 px-sm-2 px-lg-3" x-data="{ selected: 'location' }" style="background-color: #F5F5F5">
            <!-- Tabs -->
            <!-- Full Tabs & Content Section -->
            <div x-data="{ selected: 'views' }">
                <!-- Tabs -->
                <div class="overflow-auto" style="white-space: nowrap;">
                    <div class="d-inline-flex fs-6 text-center align-items-stretch">
                        <!-- View -->
                        <div
                            class="tab-item cursor-pointer user-select-none px-2 px-md-4 py-2 border-end border-1 border-dark"
                            :class="selected === 'views' ? 'tab-selected fw-bold' : ''"
                            @click="selected = 'views'"
                        >
                            View
                        </div>

                        <!-- Amen. -->
                        <div
                            class="tab-item cursor-pointer user-select-none px-2 px-md-4 py-2 border-end border-1 border-dark"
                            :class="selected === 'amenities' ? 'tab-selected fw-bold' : ''"
                            @click="selected = 'amenities'"
                        >
                            Amen.
                        </div>

                        <!-- Room -->
                        <div
                            class="tab-item cursor-pointer user-select-none px-2 px-md-4 py-2 border-end border-1 border-dark"
                            :class="selected === 'room' ? 'tab-selected fw-bold' : ''"
                            @click="selected = 'room'"
                        >
                            Room
                        </div>

                        <!-- Map -->
                        <div
                            class="tab-item cursor-pointer user-select-none px-2 px-md-4 py-2 border-end border-1 border-dark"
                            :class="selected === 'package' ? 'tab-selected fw-bold' : ''"
                            @click="selected = 'package'"
                        >
                            Map
                        </div>

                        <!-- Package -->
                        <div
                            class="tab-item cursor-pointer user-select-none px-2 px-md-4 py-2"
                            :class="selected === 'location' ? 'tab-selected fw-bold' : ''"
                            @click="selected = 'location'"
                        >
                            Package
                        </div>
                    </div>
                </div>

                <!-- Main Layout -->
                <div class="row align-items-start mt-4">
                    <!-- Left Column: Dynamic Content -->
                    <div class="col-md-8 mb-4 mb-md-0">
                        <!-- Views Tab Content -->
                        <div x-show="selected === 'views'" x-transition >
                            <div id="dealCarousel" class="carousel slide mx-auto position-relative w-100" data-bs-ride="carousel">
                                <div class="carousel-inner rounded overflow-hidden w-100 position-relative">
                                    @foreach ($img_path as $index => $path)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <a href="{{ asset('img/resort/' . $path->image) }}" class="glightbox" data-gallery="resort-gallery">
                                                <img src="{{ asset('img/resort/' . $path->image) }}"
                                                     class="d-block mx-auto img-fluid"
                                                     style="width: 100%; height: auto;" alt="Image {{ $index + 1 }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>


                                <!-- Prev Button -->
                                <button class="carousel-control-prev position-absolute top-50 start-0 translate-middle-y custom-carousel-control"
                                        type="button" data-bs-target="#dealCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <!-- Next Button -->
                                <button class="carousel-control-next position-absolute top-50 end-0 translate-middle-y custom-carousel-control"
                                        type="button" data-bs-target="#dealCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <!-- Package Section -->
                        <div x-show="selected === 'location'" x-transition>
                            <h3 style="color: #4B0082">{{ $deal->package }}.</h3>
                            <p class="text-muted">{{ $deal->package_desc }}</p>
                        </div>

                        <!-- Map Section -->
                        <div x-show="selected === 'package'" x-transition>
                            <div class="ratio ratio-16x9" style="min-height: 350px;">
                                <iframe
                                    src="{{ $deal->map }}"
                                    width="100%" height="300"
                                    style="border:0; width:100%; height:100%; min-height: 350px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>

                        <!-- Resort Room Section -->
                        <div x-show="selected === 'room'" x-transition>
                            <h4 class="mb-3">Resort Room</h4>
                            <p class="text-muted">Details about the resort room go here.</p>
                        </div>

                        <!-- Amenities Tab Content -->
                        <div x-show="selected === 'amenities'" x-transition>
                            <div id="amenitiesCarousel" class="carousel slide mx-auto position-relative w-100" data-bs-ride="carousel" style="height: 200px;">
                                <div class="carousel-inner rounded overflow-hidden w-100 position-relative">
                                    @foreach ($img_amenity as $index => $path)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <a href="{{ asset('img/amenities/' . $path->image) }}" class="glightbox" data-gallery="amenities-gallery">
                                                <img src="{{ asset('img/amenities/' . $path->image) }}"
                                                     class="d-block mx-auto img-fluid"
                                                     style="width: 100%; height: auto;" alt="Amenity {{ $index + 1 }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Prev Button -->
                                <button class="carousel-control-prev position-absolute top-50 start-0 translate-middle-y custom-carousel-control"
                                        type="button" data-bs-target="#amenitiesCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <!-- Next Button -->
                                <button class="carousel-control-next position-absolute top-50 end-0 translate-middle-y custom-carousel-control"
                                        type="button" data-bs-target="#amenitiesCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Call Widget -->
                    <div class="col-md-4">
                        <div class="card shadow border-0 text-center p-3">
                            <img src="{{ asset('img/callnow.png') }}" class="rounded-circle mx-auto mb-3" width="100" height="100" alt="Expert">
                            <h6 class="text-muted mb-0">Need Help?</h6>
                            <h5 class="fw-bold mb-3">Talk to a Travel Expert</h5>
                            <hr class="my-2">
                            <div class="mb-2">
                                <h6 class="fw-bold mb-0">Book Today</h6>
                                <small class="text-muted">Pick your dates later</small>
                            </div>
                            <p class="text-danger fw-bold fs-6 mb-3">
                                <i class="bi bi-telephone-fill me-1"></i> 888 592-0021
                            </p>
                            <a href="tel:8776923883" class="btn text-white fw-semibold w-100"
                               style="background: linear-gradient(to right, #444, #000); border-radius: 10px;">
                                CALL NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const lightbox = GLightbox({
                selector: '.glightbox',
                touchNavigation: true,
                loop: true,
                zoomable: true,
            });
        });
    </script>
@endpush


