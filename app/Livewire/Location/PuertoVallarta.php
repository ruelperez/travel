<?php

namespace App\Livewire\Location;

use App\Models\Location;
use App\Models\Resort;
use Livewire\Component;

class PuertoVallarta extends Component
{
    public $deals;

    public function render()
    {
        return view('livewire.location.puerto-vallarta');
    }

    public function mount($location_id){
       $this->deals = Location::find($location_id)->resort;
    }
}
