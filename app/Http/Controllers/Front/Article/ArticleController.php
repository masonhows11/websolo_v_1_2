<?php

namespace App\Http\Controllers\Front\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(){

        return view('front.article.index')
            ->with(['articles' => Article::where('approved', 1)->paginate(12),
                'categories' => Category::tree()->get()->toTree()]);
    }

    public function articleCategory(Category $category)
    {
        return view('front.article.article_by_category')
            ->with(['articles' => $category->articles()->paginate(12), 'categories' => Category::tree()->get()->toTree()]);
    }
}
