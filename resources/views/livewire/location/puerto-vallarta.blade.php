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
                                <div class="text-white ">
                                    <span class="text-decoration-line-through small">${{ $deal['original'] }}</span>
                                    <span class="fs-5 fw-semibold">${{ $deal['price'] }} <small>USD</small></span>
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

</div>
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
