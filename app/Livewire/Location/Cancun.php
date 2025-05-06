<?php

namespace App\Livewire\Location;

use Livewire\Component;

class Cancun extends Component
{
    public $deals = [
        [
            'location' => 'Cancun',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQL0hQQt6lxjJcSmQgUDxF5YRL-3KVC_iRrKw&s',
            'price' => 699,
            'original' => 1679,
            'title' => 'Cancun Palm All Inclusive'
        ],
        [
            'location' => 'Cancun',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXwYRcip2YJnemiX3QjN3sXj0vDiqq2mwK-A&s',
            'price' => 699,
            'original' => 1497,
            'title' => 'Palmar Cancun All Inclusive'
        ],
        [
            'location' => 'Cancun',
            'image' => 'https://cdn4.premiumread.com/?url=https://www.mmegi.bw/mmegi/uploads/images/2024/08/06/116329.jpg&w=800&q=72&f=jpg',
            'price' => 699,
            'original' => 1987,
            'title' => 'Grand Palm All Inclusive'
        ],
    ], $location_name;

    public function render()
    {
        return view('livewire.location.cancun');
    }
}
