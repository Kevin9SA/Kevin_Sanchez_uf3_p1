<!-- resources/views/welcome.blade.php -->

@extends('layout')

@section('title', 'Movies List')

@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container mt-4">
    <div class="jumbotron" style="background-color: #e3f2fd;">
        <h1 class="display-4">Lista de Películas</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href="/filmout/oldFilms">Pelis antiguas</a></li>
            <li class="list-group-item"><a href="/filmout/newFilms">Pelis nuevas</a></li>
            <li class="list-group-item"><a href="/filmout/films">Pelis</a></li>
            <li class="list-group-item"><a href="/filmout/filmsByYear/1985">Pelis por Año</a></li>
            <li class="list-group-item"><a href="/filmout/filmsByGenre/Drama">Pelis por Género</a></li>
            <li class="list-group-item"><a href="/filmout/sortFilms">Pelis Ordenadas por Año</a></li>
            <li class="list-group-item"><a href="/filmout/countFilms">Contador de Películas</a></li>
            <li class="list-group-item"><a href="/filmint/registerFilm" class="btn btn-primary">Insertar Nueva Película</a></li>
        </ul>
    </div>
</div>

<div class="container mt-4">
    <div class="jumbotron" style="background-color: #e3f2fd;">
        <h1 class="display-4">Lista de Actores </h1>
        <ul class="list-group">
            <li class="list-group-item"> <a href="/actorout/actors">List actors</a></li>
            <li class="list-group-item"><a href="/actorout/countActors">Count actors</a></li>
        </ul>
    </div>
</div>
<br>
<br><br><br><br><br>
@endsection