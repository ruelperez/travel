<?php

namespace App\Livewire\Location;

use Livewire\Component;

class CaboSanLucas extends Component
{
    public $deals = [
        [
            'location' => 'Cabo San Lucas',
            'image' => 'https://cdn5.redweek.com/photos/full-preview/3/3/9/339040.jpg?1',
            'price' => 599,
            'original' => 1506,
            'title' => 'Palmar Cabo All Inclusive'
        ],
        [
            'location' => 'Cabo San Lucas',
            'image' => 'https://www.krystalgrandloscabos.com/images/gallery/gallery-1.jpg',
            'price' => 699,
            'original' => 1605,
            'title' => 'Grand San Jose All Inclusive'
        ],
        [
            'location' => 'Cabo San Lucas',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3rFP_akZL0aS-WZPvnChoeBlGKpgzhrmnPQ&s',
            'price' => 699,
            'original' => 1605,
            'title' => 'Royal Solaris'
        ],
    ], $location_name;

    public function render()
    {
        return view('livewire.location.cabo-san-lucas');
    }
}
