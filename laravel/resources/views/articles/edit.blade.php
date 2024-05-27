@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'article</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $article->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $article->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_creation">Date de création:</label>
            <input type="date" name="date_creation" id="date_creation" class="form-control" value="{{ $article->date_creation }}" required>
        </div>
        <div class="form-group">
            <label for="a_la_une">À la une:</label>
            <select name="a_la_une" id="a_la_une" class="form-control" required>
                <option value="1" {{ $article->a_la_une ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$article->a_la_une ? 'selected' : '' }}>Non</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
