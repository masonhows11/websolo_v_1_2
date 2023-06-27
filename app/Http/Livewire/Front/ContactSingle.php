<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class ContactSingle extends Component
{
    public function render()
    {
        return view('livewire.front.contact-single')->extends('front.include.master_front')->section('main_content');
    }
}
