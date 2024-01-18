@extends('layout')

@section('title', 'Contador de Películas')

@section('content')

    <div class="container mt-4">
        <h1 class="mb-4">Total de Películas: {{ $totalFilms }}</h1>
    </div>

@endsection
