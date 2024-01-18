@extends('layout')

@section('title', 'Create a New Film')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Create a New Film</h2>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="post" action="{{ route('saveFilm') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" name="year" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="genre">Genre:</label>
                        <input type="text" name="genre" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="number" name="duration" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="img_url">URL Image:</label>
                        <input type="text" name="img_url" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
    