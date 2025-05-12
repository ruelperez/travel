<?php

namespace App\Livewire\Explore;

use App\Models\Resort;
use App\Models\ResortPic;
use Livewire\Component;

class Index extends Component
{
    public $deal, $img_path, $img_amenity;

    public function render()
    {
        return view('livewire.explore.index');
    }

    public function mount($detail){
        $this->deal = $detail;
        $this->img_path = Resort::find($this->deal->id)->resort_pic;
        $this->img_amenity = Resort::find($this->deal->id)->amenity;
    }
}
