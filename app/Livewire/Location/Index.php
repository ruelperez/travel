<?php

namespace App\Livewire\Location;

use App\Models\Location;
use Livewire\Component;

class Index extends Component
{
    public $deals = [];

    public function render()
    {
        return view('livewire.location.index');
    }
    public function mount($location_id){
        $this->deals = Location::find($location_id)->resort;
    }
}
