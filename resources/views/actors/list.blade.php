@extends('layout')

@section('title', $title)

@section('content')

<div class="container mt-4">
    <h1>{{ $title }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">País</th>
                <th scope="col">Imagen</th>
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

@endsection


    