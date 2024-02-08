<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View {
        return view('articles.index', ['articles' => Article::with('user')->latest()->get()]);
    }

    public function store(Request $request): RedirectResponse {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $request->user()->articles()->create($validated);

        return redirect(route('articles.index'));
        
    }

    public function edit(Article $article): View {

        $this->authorize('update', $article);
        return view('articles.edit', ['article' => $article]);

    }

    public function update(Request $request, Article $article): RedirectResponse {

        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($validated);

        return redirect(route('articles.index'));

    }

    public function show(Article $article): View {

        return view('articles.show', ['article' => $article, 'commentaries' => $article->commentaries()]);
    }

}
