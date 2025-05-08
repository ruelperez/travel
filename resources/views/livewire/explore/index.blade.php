<div>
    <div class="container my-5">
        <!-- Title and Price Section -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">{{$deal->resort_name}} All Inclusive</h3>
                <p class="text-muted mb-1">
                    <i class="bi bi-geo-alt-fill text-info"></i> Cabo San Lucas
                </p>
            </div>
            <div class="text-end">
                <h3 class="fw-bold text-dark">$599 <small class="text-uppercase">usd</small></h3>
                <p class="mb-1">
                    <del class="text-muted">$1500 USD</del>
                    <span class="text-success fw-semibold">SAVE 60%</span>
                </p>
            </div>
            <div class="ms-md-3 mt-3 mt-md-0">
                <a href="#" class="btn btn-teal px-4 py-2 fw-semibold">GET DEAL NOW!</a>
            </div>
        </div>

        <!-- Desktop View: Grid (3 Columns) -->
        <div class="row d-none d-md-flex justify-content-center">
            @foreach($img_path as $path)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="position-relative rounded overflow-hidden" style="width: 450px; height: 450px;">
                        <img src="{{asset($path->image)}}" class="w-100 h-100 object-cover">
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
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center fs-6 text-center">
                <div
                    class="tab-item cursor-pointer user-select-none px-3 py-2 custom-divider-right"
                    :class="selected === 'location' ? 'tab-selected' : ''"
                    @click="selected = 'location'"
                >Package</div>

                <div
                    class="tab-item cursor-pointer user-select-none px-3 py-2 custom-divider-right"
                    :class="selected === 'package' ? 'tab-selected' : ''"
                    @click="selected = 'package'"
                >Location</div>

                <div
                    class="tab-item cursor-pointer user-select-none px-3 py-2"
                    :class="selected === 'room' ? 'tab-selected' : ''"
                    @click="selected = 'room'"
                >Resort Room</div>
            </div>
        </div>
        <div class="position-relative">
            <!-- Your tab section goes here -->
asdfadsffds
            <!-- Call Widget -->
            <div class="container my-4" x-data>
                <div class="card shadow border-0 text-center p-3" style="max-width: 320px; margin-left: auto;">
                    <!-- Avatar -->
                    <img src="{{ asset('img/callnow.png') }}" class="rounded-circle mx-auto mb-3" width="100" height="100" alt="Expert">
                    <!-- Headline -->
                    <h6 class="text-muted mb-0">Need Help?</h6>
                    <h5 class="fw-bold mb-3">Talk to a Travel Expert</h5>

                    <hr class="my-2">

                    <!-- Booking Prompt -->
                    <div class="mb-2">
                        <h6 class="fw-bold mb-0">Book Today</h6>
                        <small class="text-muted">Pick your dates later</small>
                    </div>

                    <!-- Phone -->
                    <p class="text-danger fw-bold fs-6 mb-3">
                        <i class="bi bi-telephone-fill me-1"></i> 877 692 3883
                    </p>

                    <!-- Call Button -->
                    <a href="tel:8776923883" class="btn text-white fw-semibold w-100"
                       style="background: linear-gradient(to right, #444, #000); border-radius: 10px;">
                        CALL NOW
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>



