<?php

namespace App\Livewire\Location;

use Livewire\Component;

class Loreto extends Component
{
    public $deals = [
        [
            'location' => 'Loreto',
            'image' => 'https://vagabond3.com/wp-content/uploads/2013/07/IMG_0210.jpg',
            'price' => 599,
            'original' => 1042,
            'title' => 'Palmar Loreto All Inclusive'
        ],
    ], $location_name;

    public function render()
    {
        return view('livewire.location.loreto');
    }
    public function mount(){

    }
}
