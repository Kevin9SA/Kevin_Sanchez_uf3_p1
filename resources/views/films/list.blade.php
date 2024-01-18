@extends('layout')

@section('title', $title)

@section('content')

    <h1>{{$title}}</h1>

    @if(empty($films))
        <p style="color: red;">No se ha encontrado ninguna película</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach($films[0] as $key => $value)
                            <th>{{$key}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{$film['name']}}</td>
                            <td>{{$film['year']}}</td>
                            <td>{{$film['genre']}}</td>
                            <td>{{$film['country']}}</td>
                            <td>{{$film['duration']}}</td>
                            <td><img src="{{$film['img_url']}}" style="width: 100px; height: 120px;" alt="{{$film['name']}}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
