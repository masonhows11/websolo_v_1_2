<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Sample;
use Livewire\Component;

class SamplesComponent extends Component
{
    public function render()
    {
        return view('livewire.front.samples.samples-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['samples'=>Sample::where('approved','1')->paginate(12)]);
    }
}
