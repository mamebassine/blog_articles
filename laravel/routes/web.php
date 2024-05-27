<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {return view('welcome');});

Route::resource('articles', ArticleController::class);

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');



use App\Http\Controllers\ArticleController;

// Route pour afficher le formulaire de création d'un nouvel article
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Route pour enregistrer un nouvel article dans la base de données
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

// Route pour afficher les détails d'un article en fonction de son ID
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route pour afficher le formulaire de modification d'un article en fonction de son ID
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

// Route pour mettre à jour un article dans la base de données en fonction de son ID
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Route pour supprimer un article de la base de données en fonction de son ID
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
