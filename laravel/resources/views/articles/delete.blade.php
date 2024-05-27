@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supprimer l'article</h1>
    <p>Êtes-vous sûr de vouloir supprimer cet article ? Cette action est irréversible.</p>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
