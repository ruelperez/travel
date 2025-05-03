<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white" style="background-color: rgba(33, 37, 41, 0.6); border: none; backdrop-filter: blur(8px);">

            <!-- Transparent Header -->
            <div class="modal-header d-flex justify-content-between align-items-center border-0"
                 style="background-color: rgba(13, 110, 253, 0.6); backdrop-filter: blur(8px); border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
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

            <hr class="m-0 border-light">

            <!-- Modal Body -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Select Resort</label>
                        <select class="form-select bg-dark text-white border-light">
                            <option selected>Villa del Palmar</option>
                            <option>Villa La Estancia</option>
                            <option>Garza Blanca</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dates</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white border-light"><i class="bi bi-calendar-event"></i></span>
                            <input type="text" class="form-control bg-dark text-white border-light" id="dateRange" placeholder="Check-in - Check-out">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Adults</label>
                            <input type="number" class="form-control bg-dark text-white border-light" value="2" min="1">
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <label class="form-label">Children</label>
                            <select id="childCount" class="form-select bg-dark text-white border-light">
                                <option value="0" selected>0</option>
                                @for ($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Container for Dynamic Child Ages -->
                    <div id="childAgesContainer" class="mb-3"></div>

                    <div class="mb-3">
                        <label class="form-label">Promo Code</label>
                        <input type="text" class="form-control bg-dark text-white border-light" placeholder="Optional">
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
