@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supprimer l'article</h1>
   <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
