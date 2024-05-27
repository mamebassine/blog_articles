<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required|date',
            'a_la_une' => 'required|boolean',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Article::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'date_creation' => $request->date_creation,
            'a_la_une' => $request->a_la_une,
            'image' => $imagePath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article créé .');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required|date',
            'a_la_une' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            Storage::disk('public')->delete($article->image);
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image = $imagePath;
        }

        $article->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'date_creation' => $request->date_creation,
            'a_la_une' => $request->a_la_une,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        // Supprimer l'image associée à l'article
        Storage::disk('public')->delete($article->image);

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé.');
    }
}
