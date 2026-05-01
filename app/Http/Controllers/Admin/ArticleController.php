<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.form', ['article' => new Article]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'extrait'          => 'nullable|string',
            'contenu'          => 'nullable|string',
            'date_publication' => 'nullable|date',
            'publie'           => 'nullable',
            'ordre'            => 'nullable|integer',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug']   = Str::slug($data['titre']);
        $data['publie'] = $request->boolean('publie');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'article-' . time() . '.' . $file->extension();
            $file->move(public_path('images/articles'), $name);
            $data['image'] = 'images/articles/' . $name;
        }

        Article::create($data);
        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'extrait'          => 'nullable|string',
            'contenu'          => 'nullable|string',
            'date_publication' => 'nullable|date',
            'publie'           => 'nullable',
            'ordre'            => 'nullable|integer',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['publie'] = $request->boolean('publie');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'article-' . time() . '.' . $file->extension();
            $file->move(public_path('images/articles'), $name);
            $data['image'] = 'images/articles/' . $name;
        }

        $article->update($data);
        return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé.');
    }
}
