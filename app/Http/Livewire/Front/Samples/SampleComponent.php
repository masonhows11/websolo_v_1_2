<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Sample;
use Livewire\Component;

class SampleComponent extends Component
{

    public $sample;

    public function mount($sample)
    {
        $this->sample = Sample::where('slug',$sample)->first();
    }

    public function render()
    {
        return view('livewire.front.samples.sample-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['sample'=>$this->sample]);
    }
}
