<div>
    <!-- Filter & Title Section -->
    <div class="container mt-4 mb-2">
        <!-- Dropdown and Location Name -->
        <div class="row align-items-center">
            <!-- Dropdown -->
            <div class="col-12 col-md-3 mb-2 mb-md-0">
                <select class="form-select"
                        wire:model.live="list"
                        style="background-color: #f0f8ff; border: 1px solid #ccc; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    @foreach($location as $dl)
                        <option value="{{ $dl->id }}">{{ $dl->location_name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Location Name -->
            <div class="col-12 col-md-3 text-center text-md-start" wire:loading.remove>
                <h3 class="fw-bold mb-0">{{ ucwords(str_replace('-', ' ', $location_first->location_name)) }}</h3>
            </div>
        </div>

        <!-- Centered Heading -->
        <div class="row mt-4">
            <div class="col-12 text-start text-md-center">
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
        @livewire('location.index', ['location_id' => $list], key($list))
    </div>
</div>
