<?php

namespace App\Livewire\Location;

use Livewire\Component;

class Home extends Component
{
    public $location = "puerto-vallarta";
    public function render()
    {
        return view('livewire.location.home');
    }
}
