<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;

class AdminArticleComment extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-article-comment')
            ->extends('admin.include.master')
            ->section('admin_main')
            ->with(['articles'=>Article::paginate(10)]);
    }
}
