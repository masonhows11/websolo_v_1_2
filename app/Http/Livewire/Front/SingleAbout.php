<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SingleAbout extends Component
{
    public function render()
    {
        return view('livewire.front.single-about')
            ->extends('front.include.master_front')
            ->section('main_content');
    }
}
