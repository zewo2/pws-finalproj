<!DOCTYPE html>
<html lang="en">

<head>
    <title>Movie Management Panel</title>
</head>

<body>

    @extends('layouts.be_master')

    @section('content')
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        <h1 style="text-align: center">Movie Management Panel</h1>

        <h5>Hello {{ Auth::user()->name }}, here is the full movie list.</h5>

        <h6>Interactive movie table</h6>

        <form action="">
            <input type="text" name='search' id="" value="{{ request()->search }}">
            <button class="btn btn-info">Search</button>
        </form>

        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Poster</th>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Director</th>
                    <th scope="col">Genre</th>
                    <th scope="col"></th>
                    <th scope="col"><a href="{{ route('movies.add') }}" class="btn btn-success">Add Movie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moviesFromDB as $movie)
                    <tr>
                        <td><img src="{{$movie->poster ?asset('storage/'.$movie->poster) : asset('images/defaultuser.jpg')}}"
                             alt="" height="240px" width="100px"></td>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td><a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">View</a></td>
                        {{-- admin lock --}}
                        @auth
                            @if (in_array(Auth::user()->user_type, [1, 2]))
                                <td><a href="{{ route('movies.delete', $movie->id) }}" class="btn btn-danger">Delete</a></td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

</body>

</html>
