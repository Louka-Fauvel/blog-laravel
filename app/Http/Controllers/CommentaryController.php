<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    public function store(Request $request): RedirectResponse {

        $validated = $request->validate([
            'message' => 'required|string',
            'article_id' => 'required|integer',
        ]);

        //$article = Article::where('id', $request->input('article_id'))->first();

        $request->user()->commentaries()->create($validated);

        return redirect(route('articles.index'));
        
    }
}
