<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Admin\Article;

class HomeController extends Controller
{
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->limit(10)->get();
        return view('app.home.index', [
            'articles' => $articles
        ]);
    }
}
