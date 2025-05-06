<?php

namespace App\Livewire\Location;

use Livewire\Component;

class RivieraMaya extends Component
{
    public $deals = [
        [
            'location' => 'Riviera Maya',
            'image' => 'https://bluebaygrandesmeralda.bluebayhotels.net/cache/b0/28/b028a2901244bbcf6b7943888777ebe2.jpg',
            'price' => 699,
            'original' => 1899,
            'title' => 'Esmeralda All Inclusive'
        ],
        [
            'location' => 'Riviera Maya',
            'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/04/71/dc/d6/el-palmar-beach-tennis.jpg?w=900&h=-1&s=1',
            'price' => 699,
            'original' => 1899,
            'title' => 'Palmar Beach Resort'
        ],

    ], $location_name;

    public function render()
    {
        return view('livewire.location.riviera-maya');
    }
}
