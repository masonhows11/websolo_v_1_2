<?php

namespace App\Http\Livewire\Front\Articles;

use Livewire\Component;

class ArticleComponent extends Component
{
    public $article;

    public function mount(){

    }

    public function render()
    {
        return view('livewire.front.articles.article-component')
            ->extends('front.include.master_front')
            ->section('main_content')
            ->with(['article' => $this->article]);
    }
}
