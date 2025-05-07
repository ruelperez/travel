<?php

namespace App\Livewire\Explore;

use Livewire\Component;

class Index extends Component
{
    public $deal;

    public function render()
    {
        return view('livewire.explore.index');
    }

    public function mount($detail){
        $this->deal = $detail;
    }
}
