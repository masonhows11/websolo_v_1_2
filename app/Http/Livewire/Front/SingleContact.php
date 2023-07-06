<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SingleContact extends Component
{
    public function render()
    {
        return view('livewire.front.single-contact')->extends('front.include.master_front')->section('main_content');
    }
}
