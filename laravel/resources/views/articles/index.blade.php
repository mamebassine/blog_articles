<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Articles</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de Création</th>
                <th>À la Une</th>
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
@endsection
