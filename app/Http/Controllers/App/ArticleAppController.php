<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\ArticleCommandRequest;
use App\Mail\ArticleCommandMail;
use App\Models\Admin\Article;
use Illuminate\Support\Facades\Mail;

class ArticleAppController extends Controller
{
    public function index() {
        $articles = Article::with('pictures')->paginate(5);
        return view('app.articles.index', [
           'articles' => $articles,
        ]);
    }

    public function show(string $slug, Article $article) {
        $expectedSlug = $article->getSlug();

        if ($slug !== $expectedSlug) {
            return to_route('articles.show', [$slug => $expectedSlug, 'article' => $article]);
        }

        return view('app.articles.show', [
            'article' => $article,
        ]);
    }

    public function command(Article $article, ArticleCommandRequest $request) {

        Mail::send(new ArticleCommandMail($article, $request->validated()));
        return back()->with('success', 'Votre commande a bien été prise en compte');
    }
}
