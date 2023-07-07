<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Like;
use App\Models\Sample;
use App\Models\view;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SampleComponent extends Component
{

    public $sample;
    public $view_count;
    public $like_count;

    public $is_liked;

    public function mount($sample)
    {


        $this->sample = Sample::where('slug', $sample)->first();
        $this->like_count = $this->sample->likes()->count();
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

    public function AddLike()
    {

        if (Auth::user()) {

            if (Like::where(['user_id' => Auth::id(), 'sample_id' => $this->sample->id])->exists()) {
                $this->sample->user()->likes()->delete();
            } else {
                $this->sample->likes()->create([
                    'user_id' => \auth()->id(),
                    'like' => true,
                ]);
            }

        }

    }

    public function render()
    {
        return view('livewire.front.samples.sample-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['sample' => $this->sample]);
    }
}
