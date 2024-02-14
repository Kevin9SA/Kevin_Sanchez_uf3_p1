@extends('layout')

@section('title', 'Contador de Actores')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Total de actores: {{ $totalActors }}</h1>
</div>

@endsection
