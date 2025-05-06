<?php

namespace App\Livewire\Location;

use Livewire\Component;

class PuertoVallarta extends Component
{
    public $deals = [
        [
            'location' => 'Puerto Vallarta',
            'image' => 'https://villacdn.villagroupresorts.com/uploads/template_amenitie_service/cover_normal/2/optimizada_Villa-del-Palmar-Puerto-Vallarta-Pool.jpg',
            'price' => 599,
            'original' => 1605,
            'title' => 'Palmar Vallarta All Inclusive'
        ],
        [
            'location' => 'Puerto Vallarta',
            'image' => 'https://assets.resortpass.com/uploads/image/picture/30787/width_1280_GrandVelasRivieraNayarit_Pool2.jpg',
            'price' => 699,
            'original' => 1899,
            'title' => 'Grand Riviera Nayarit All Inclusive'
        ],
        [
            'location' => 'Puerto Vallarta',
            'image' => 'https://www.palladiumhotelgroup.com/content/dam/palladium/images/hoteles/mexico/riviera-nayarit/hotel/piscinas/grand-palladium-vallarta-resort-spa/quiet-pool/grand-palladium-vallarta-piscina-quiet-pool-4.jpg.transform/rendition-md/image.jpg',
            'price' => 699,
            'original' => 1049,
            'title' => 'Grand Vallarta All Inclusive'
        ],
        [
            'location' => 'Puerto Vallarta',
            'image' => 'https://www.krystalgrand-nuevovallarta.com/media/uploads/cms/piscina-jardines-grand-nvo-vallarta.jpg?q=pr:sharp/rs:fill/w:1920/h:700/f:jpg',
            'price' => 699,
            'original' => 1049,
            'title' => 'Grand Nuevo Vallarta All Inclusive'
        ],

    ], $location_name;

    public function render()
    {
        return view('livewire.location.puerto-vallarta');
    }

}
