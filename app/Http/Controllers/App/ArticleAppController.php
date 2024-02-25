<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Admin\Article;

class ArticleAppController extends Controller
{
    public function index() {
        $articles = Article::paginate(5);
        return view('app.articles.index', [
           'articles' => $articles,
        ]);
    }

    public function show(string $slug, Article $article) {

    }
}
