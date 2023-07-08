<?php

namespace App\Http\Livewire\Front\Articles;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticleComponent extends Component
{
    public $article;

    public $view_count;
    public  $like_count;

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

    public function mount($article)
    {
        $this->auth_id = Auth::id();
        $this->article = Article::where('slug', $article)->first();
        $this->like_count = $this->article->likes()->count();

        if (Auth::user()) {

            // for set like status
            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'article_id' => $this->article->id])->first();
            if ($this->is_liked) {
                $this->is_auth_liked = true;
            } else {
                $this->is_auth_liked = false;
            }

            // for set view status
            if (view::where('user_id', $this->auth_id)->where('article_id', $this->article->id)->exists())
            {
                $this->view_count = view::where('article_id', $this->article->id)->count();
            } else {
                view::create([
                    'user_id' => $this->auth_id,
                    'article_id' => $this->article->id,
                ]);
            }

        }
        $this->view_count = view::where('article_id', $this->article->id)->count();
    }

    public function add_like()
    {
        if (Auth::user()) {
            $this->is_liked = Like::where(['user_id' => $this->auth_id, 'article_id' => $this->article->id])->first();
            if ($this->is_liked) {
                $this->is_liked->delete();
                $this->like_count--;
                $this->is_auth_liked = false;
            } else {
                Like::create([
                    'user_id' => $this->auth_id,
                    'article_id' => $this->article->id,
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
                'article_id' => $this->sample->id,
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
        return view('livewire.front.articles.article-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['article' => $this->article]);
    }
}
