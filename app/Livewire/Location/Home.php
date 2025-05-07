<?php

namespace App\Livewire\Location;

use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Component;

class Home extends Component
{
    public $location = [], $list, $location_first, $slug;
    public function render()
    {
        $this->location = Location::all();
        return view('livewire.location.home');
    }

    public function mount(){
        $this->location_first = Location::first();
        $this->slug = Str::slug($this->location_first->location_name);
        $this->list = $this->location_first->id;
    }

    public function updated($field){
        if ($field == "list"){
            $this->location_first = Location::find($this->list);
            $this->slug = Str::slug($this->location_first->location_name);
            $this->list = $this->location_first->id;
        }
    }
}
