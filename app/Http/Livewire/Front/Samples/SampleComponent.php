<?php

namespace App\Http\Livewire\Front\Samples;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Sample;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SampleComponent extends Component
{

    public $sample;
    public $view_count;
    public $like_count;

    public $body;
    public $is_liked = null;
    public $auth_id;
    public $is_auth_liked = false;

    protected $rules = [
        'body' => 'required|min:5|max:500',
    ];

    protected $messages = [
        'body.required' => 'لطفا دیدگاه خود را بنویسید.',
        'body.min' => 'حداقل ۵ کاراکتر بنویسید. ',
        'body.max' => 'حداکثز تعداد کاراکتر مجاز ۵۰۰ عدد.',
    ];

    public function mount($sample)
    {
        $this->auth_id = Auth::id();
        $this->sample = Sample::where('slug', $sample)->first();
        $this->like_count = $this->sample->likes()->count();



        if (Auth::user()) {

            // for set like status
            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'sample_id' => $this->sample->id])->first();
            if ($this->is_liked) {
                $this->is_auth_liked = true;
            } else {
                $this->is_auth_liked = false;
            }

            // for set view status
            if (view::where('user_id', $this->auth_id)->where('sample_id', $this->sample->id)->exists())
            {
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

    public function add_like()
    {
        if (Auth::user()) {
            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'sample_id' => $this->sample->id])->first();
            if ($this->is_liked) {
                $this->is_liked->delete();
                $this->like_count--;
                $this->is_auth_liked = false;
            } else {
                Like::create([
                    'user_id' => $this->auth_id,
                    'sample_id' => $this->sample->id,
                ]);
                $this->like_count++;
                $this->is_auth_liked = true;
            }
        } else {
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => 'برای ثبت لایک یا دیس لایک ابتدا وارد شوید.']);
        }

    }

    public function add_comment(){

        $this->validate();
        try {
            Comment::create([
                'user_id' => $this->auth_id,
                'sample_id' => $this->sample->id,
                'body' => $this->body,
            ]);
            $this->body = '';
            $this->dispatchBrowserEvent('comment-success');
        }catch (\Exception $ex){
            return \view('errors_custom.model_store_error');
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
