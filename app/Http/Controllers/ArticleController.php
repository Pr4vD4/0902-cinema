<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $articles = Article::query()
            ->when($request->category_id, function($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($request->search, function($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->with('category')
            ->latest()
            ->paginate(9);

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article->load('category'),
            'relatedArticles' => Article::where('category_id', $article->category_id)
                ->where('id', '!=', $article->id)
                ->latest()
                ->take(3)
                ->get()
        ]);
    }
}
