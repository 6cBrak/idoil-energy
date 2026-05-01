<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::publie()->paginate(9);
        return view('actualites', compact('articles'));
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->where('publie', true)->firstOrFail();
        $recents = Article::publie()->where('id', '!=', $article->id)->limit(3)->get();
        return view('actualite', compact('article', 'recents'));
    }
}
