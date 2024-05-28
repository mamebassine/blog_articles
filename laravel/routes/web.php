<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// Route pour la page d'accueil
Route::get('/', function () {
    return view('articles.index');
});
Route::resource('articles', ArticleController::class);

// Route pour la liste des articles
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

// Route pour afficher le formulaire de création d'un nouvel article
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Route pour enregistrer un nouvel article
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

// Route pour afficher un article spécifique
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route pour afficher le formulaire d'édition d'un article
Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

// Route pour mettre à jour un article
Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Route pour supprimer un article
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
