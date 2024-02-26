<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchArticlesRequest;
use App\Models\Admin\Article;

class HomeController extends Controller
{
    public function index(SearchArticlesRequest $request) {

        $query = Article::query();

        if ($request->validated('name')) {
            $query = $query->where('name', 'like', "%{$request->validated('name')}%");
        }

        if ($request->validated('price')) {
            $query = $query->where('price', '<=', $request->validated('price'));
        }

        return view('app.home.index', [
            'articles' => $query->paginate(10),
            'input' => $request->validated(),
        ]);
    }
}
