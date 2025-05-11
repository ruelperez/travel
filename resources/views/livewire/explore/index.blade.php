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
                    <h4 class="fw-bold mb-0">{{ ucwords(strtolower($deal->resort_name)) }}</h4>
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

        <!-- Desktop View: Grid (3 Columns) -->
        <div class="row d-none d-md-flex justify-content-center">
            @foreach($img_path as $path)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="position-relative rounded overflow-hidden" style="width: 450px; height: 450px;">
                        <img src="{{asset('img/resort/'.$path->image)}}" class="w-100 h-100 object-cover">
{{--                        <div class="position-absolute top-0 start-0 bg-teal text-white p-2 fw-semibold rounded-end mt-2 ms-2">--}}
{{--                            SAVE NOW <br><span class="fw-normal small">Travel Later</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Mobile View: Carousel -->
        <div id="dealCarousel" class="carousel slide d-md-none mx-auto" style="max-width: 450px;" data-bs-ride="carousel">
            <div class="carousel-inner rounded overflow-hidden" style="height: 450px;">
                <div class="carousel-item active">
                    <img src="{{asset('img/palmar1.png')}}" class="d-block w-100 h-100 object-cover" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/palmar2.png')}}" class="d-block w-100 h-100 object-cover" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/palmar3.png')}}" class="d-block w-100 h-100 object-cover" alt="Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#dealCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#dealCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
            </button>
        </div>
        <div class="container my-4" x-data="{ selected: 'location' }">
            <!-- Tabs -->
            <div class="d-flex flex-row fs-6 text-center align-items-stretch">
                <div
                    class="tab-item cursor-pointer user-select-none px-4 py-2 border-end border-2 border-dark"
                    :class="selected === 'location' ? 'tab-selected' : ''"
                    @click="selected = 'location'"
                >
                    Package
                </div>
                <div
                    class="tab-item cursor-pointer user-select-none px-4 py-2 border-end border-2 border-dark"
                    :class="selected === 'package' ? 'tab-selected' : ''"
                    @click="selected = 'package'"
                >
                    Map
                </div>
                <div
                    class="tab-item cursor-pointer user-select-none px-4 py-2"
                    :class="selected === 'room' ? 'tab-selected' : ''"
                    @click="selected = 'room'"
                >
                    Room
                </div>
            </div>

            <!-- Main Layout -->
            <div class="row align-items-start mt-4">
                <!-- Left Column: Dynamic Content -->
                <div class="col-md-8 mb-4 mb-md-0">
                    <!-- Package Section -->
                    <div x-show="selected === 'location'" x-transition>
                        <h3 style="color: #4B0082">{{ $deal->package }}.</h3>
                        <p class="text-muted">{{ $deal->package_desc }}</p>
                    </div>

                    <!-- Map Section -->
                    <div x-show="selected === 'package'" x-transition>
                        <div class="ratio ratio-16x9" style="min-height: 350px;">
                            <iframe
                                src="{{$deal->map}}"
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
                </div>

                <!-- Right Column: Call Widget (Always visible) -->
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



