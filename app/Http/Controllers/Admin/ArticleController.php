<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Admin\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBY('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();

        return view('admin.articles.form', [
            'article' => $article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());
        return to_route('admin.articles.index')->with('success', "L'article a été créé avec success");
    }

    /**
     * Display the specified resource.
     *//*
    public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.form', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        return to_route('admin.articles.index')->with('success', "L'article a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('admin.articles.index')->with('danger', "L'article a été supprimé avec succès");
    }
}