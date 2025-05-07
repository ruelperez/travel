<div>
    <!-- Get the Best Deal Section -->
    <section class="container my-5">
        <div class="row gy-5 gx-4">
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
                            <a href="#" class="mt-auto btn btn-sm fw-semibold text-black" style="background: linear-gradient(90deg, #00C9FF, #92FE9D);">EXPLORE THIS OFFER</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

