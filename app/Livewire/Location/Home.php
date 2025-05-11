<?php

namespace App\Livewire\Location;

use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Component;

class Home extends Component
{
    public $location = [], $list, $location_first;
    public function render()
    {
        $this->location = Location::all();
        return view('livewire.location.home');
    }

    public function mount($location_id){
        $this->location_first = Location::find($location_id);
        $this->list = $this->location_first->id;
    }

    public function updated($field){
        if ($field == "list"){
            $this->location_first = Location::find($this->list);
            $this->list = $this->location_first->id;
        }
    }
}
