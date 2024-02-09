<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentary;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaryController extends Controller
{
    public function store(Request $request): RedirectResponse {

        $this->authorize('create', Commentary::class);

        $validated = $request->validate([
            'message' => 'required|string',
            'article_id' => 'required|integer',
        ]);

        //$article = Article::where('id', $request->input('article_id'))->first();

        $request->user()->commentaries()->create($validated);

        return redirect(route('articles.index'));
        
    }
}
