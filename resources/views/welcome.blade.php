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
        <div class="mt-4">
            <h4>Lista de Actores por Década</h4>
            <form action="{{ route('listActorsByDecade') }}" method="GET">
                <div class="form-group">
                    <label for="decade">Selecciona una década:</label>
                    <select class="form-control" id="decade" name="decade">
                        <option value="1980">1980s</option>
                        <option value="1990">1990s</option>
                        <option value="2000">2000s</option>
                        <option value="2010">2010s</option>
                        <option value="2020">2020s</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        @if(isset($actors))
        <div class="mt-4">
            <h4>Resultados:{{ $title }}</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>País</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actors as $actor)
                    <tr>
                        <td>{{ $actor->name }}</td>
                        <td>{{ $actor->surname }}</td>
                        <td>{{ $actor->birthdate }}</td>
                        <td>{{ $actor->country }}</td>
                        <td><img src="{{ $actor->img_url }}" alt="{{ $actor->name }}" style="max-width: 100px;"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>
<br>
<br><br><br><br><br>
@endsection