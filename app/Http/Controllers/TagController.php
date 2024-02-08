<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View {
        return view('tags.index');
    }

    public function store(Request $request): RedirectResponse {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $request->user()->tags()->create($validated);

        return redirect(route('chirps.index'));
        
    }
}
