@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouvel article</h1>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="date_creation">Date de création:</label>
            <input type="date" name="date_creation" id="date_creation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="a_la_une">À la une:</label>
            <select name="a_la_une" id="a_la_une" class="form-control" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<style>
    /* Styles CSS pour le formulaire d'ajout */
    .container {
        width: 50%;
        margin: 0 auto;
        padding-top: 50px;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    input[type="file"] {
        width: 100%;
        padding: 10px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
@endsection
