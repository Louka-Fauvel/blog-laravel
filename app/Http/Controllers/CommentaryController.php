<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentary;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentaryController extends Controller
{
    public function store(Request $request): RedirectResponse {

        $this->authorize('create', Commentary::class);

        $validated = $request->validate([
            'message' => 'required|string',
            'article_id' => 'required|integer',
        ]);

        $request->user()->commentaries()->create($validated);

        $article = Article::where('id', $request->input('article_id'))->first();

        return redirect(route('articles.show', ['article' => $article, 'commentaries' => $article->commentaries]));
        
    }

    public function edit(Commentary $commentary): View {

        $article = Article::where('id', $commentary->article_id)->first();

        $this->authorize('update', $commentary);
        return view('commentaries.edit', ['commentary' => $commentary, 'article' => $article]);

    }

    public function update(Request $request, Commentary $commentary): RedirectResponse {

        $this->authorize('update', $commentary);

        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $commentary->update($validated);
        $article = Article::where('id', $commentary->article_id)->first();

        return redirect(route('articles.show', ['article' => $article, 'commentaries' => $article->commentaries]));

    }
}
