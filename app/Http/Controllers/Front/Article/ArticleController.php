<?php

namespace App\Http\Controllers\Front\Article;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    public function index(){

        return view('front.article.index')
            ->with(['articles' => DB::table('articles')->where('approved',1)->paginate(9),
                'categories' => Category::tree()->get()->toTree()]);
    }

    public function articleCategory(Category $category)
    {
        return view('front.article.article_by_category')
            ->with(['articles' => $category->articles()->paginate(12), 'categories' => Category::tree()->get()->toTree()]);
    }
}
