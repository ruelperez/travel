<?php

namespace App\Livewire\Explore;

use App\Models\Resort;
use App\Models\ResortPic;
use Livewire\Component;

class Index extends Component
{
    public $deal, $img_path;

    public function render()
    {
        return view('livewire.explore.index');
    }

    public function mount($detail){
        $this->deal = $detail;
        $this->img_path = Resort::find($this->deal->id)->resort_pic;
    }
}
