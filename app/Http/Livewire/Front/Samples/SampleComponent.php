<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Sample;
use App\Models\view;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SampleComponent extends Component
{

    public $sample;
    public $view_count;

    public function mount($sample)
    {
        $this->sample = Sample::where('slug', $sample)->first();
        if (Auth::user()) {

            if (view::where('user_id', Auth::id())->where('sample_id', $this->sample->id)->exists()) {
                $this->view_count = view::where('sample_id', $this->sample->id)->count();
            } else {
                view::create([
                    'user_id' => Auth::id(),
                    'sample_id' => $this->sample->id,
                ]);
            }

        }
        $this->view_count = view::where('sample_id', $this->sample->id)->count();
    }

    public function AddLike(){

        

    }

    public function render()
    {
        return view('livewire.front.samples.sample-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['sample' => $this->sample]);
    }
}
