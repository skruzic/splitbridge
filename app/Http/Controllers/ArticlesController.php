<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_date', 'desc')->simplePaginate(3);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
