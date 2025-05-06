<div>
    <!-- Filter & Title Section -->
    <div class="container my-4">
        <!-- Dropdown -->
        <div class="row align-items-center">
            <!-- Dropdown -->
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <select class="form-select" wire:model.live="location">
                    <option value="puerto-vallarta">Puerto Vallarta</option>
                    <option value="loreto">Loreto</option>
                    <option value="cancun">Cancun</option>
                    <option value="cabo-san-lucas">Cabo San Lucas</option>
                    <option value="riviera-maya">Riviera Maya</option>
                </select>
            </div>

            <!-- Location Name -->
            <div class="col-12 col-md-3" wire:loading.remove>
                <h3 class="fw-bold">{{ ucwords(str_replace('-', ' ', $location)) }}</h3>
            </div>
        </div>

        <!-- Centered Heading -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <h4>Grab Hot Deals</h4>
            </div>
        </div>
    </div>
    <div class="text-center">
        <div class="spinner-border mt-5" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div wire:loading.remove>
        @livewire("location.$location", [], key($location))
    </div>
</div>
