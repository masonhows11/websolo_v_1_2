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
    public $auth_id;
    public $is_auth = false;

    public function mount($sample)
    {
        $this->auth_id = Auth::id();
        $this->sample = Sample::where('slug', $sample)->first();
        $this->like_count = $this->sample->likes()->count();

        // for add view count & set like state
        if (Auth::user()) {

            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'sample_id' => $this->sample->id])->first();
            if($this->is_liked){
                $this->is_auth = true;
            }

            if (view::where('user_id', $this->auth_id)->where('sample_id', $this->sample->id)->exists()) {
                $this->view_count = view::where('sample_id', $this->sample->id)->count();
            } else {
                view::create([
                    'user_id' => $this->auth_id,
                    'sample_id' => $this->sample->id,
                ]);
            }

        }
        $this->view_count = view::where('sample_id', $this->sample->id)->count();
    }

    public function AddLike()
    {

        if (Auth::user()) {
            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'sample_id' => $this->sample->id])->first();
            if ($this->is_liked) {
                $this->is_liked->delete();
            } else {
                Like::create([
                    'user_id' => $this->auth_id ,
                    'sample_id' => $this->sample->id,
                ]);
            }
        }else{
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => 'برای ثبت لایک یا دیس لایک ابتدا وارد شوید.']);
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
