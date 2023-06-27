<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.front.about')->extends('front.include.master_front')->section('main_content');
    }
}
