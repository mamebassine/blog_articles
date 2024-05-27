@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Ajouter un article</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de Création</th>
                <th>À la Une</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
            <!-- Boucle sur tous les articles pour les afficher -->
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->nom }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->date_creation }}</td>
                <td>{{ $article->a_la_une ? 'Oui' : 'Non' }}</td>
                <td>
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->nom }}" style="max-width: 100px; max-height: 100px;">
                </td>
                <td>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
                    <!-- Ajoutez un formulaire pour supprimer l'article -->
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding-top: 50px;
    }

    h1 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 2px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .btn {
        border: 1px solid #3498db;
        padding: 5px 10px;
        text-decoration: none;
        color: #000;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-info {
        background-color: #3498db;
        color: #fff;
    }

    .btn-warning {
        background-color: #f39c12;
        color: #fff;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .mb-3 {
        margin-bottom: 15px;
    }

    .form-control, .form-control-file, .form-group select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-control-file {
        border: none;
    }
</style>
@endsection
