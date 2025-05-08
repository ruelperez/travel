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
            @for ($i = 1; $i <= 3; $i++)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="position-relative rounded overflow-hidden" style="width: 450px; height: 450px;">
                        <img src="{{asset('img/palmar'.$i.'.png')}}" class="w-100 h-100 object-cover" alt="Image {{ $i }}">
                        <div class="position-absolute top-0 start-0 bg-teal text-white p-2 fw-semibold rounded-end mt-2 ms-2">
                            SAVE NOW <br><span class="fw-normal small">Travel Later</span>
                        </div>
                    </div>
                </div>
            @endfor
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
    </div>
</div>



