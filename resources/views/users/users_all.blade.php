<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management Panel</title>
</head>

<body>

    @extends('layouts.be_master')

    @section('content')
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        <h1 style="text-align: center">User Management Panel</h1>

        <h5>Hello {{ Auth::user()->name }}, here is the full user list.</h5>

        <h6>Interactive user table</h6>

        <form action="">
            <input type="text" name='search' id="" value="{{ request()->search }}">
            <button class="btn btn-info">Search</button>
        </form>

        <br>

        <table class="table table-striped table-secondary">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                    <th scope="col"><a href="{{ route('users.add') }}" class="btn btn-success">Add User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersFromDB as $user)
                    <tr>
                        <td><img src="{{$user->user_photo ?asset('storage/'.$user->user_photo) : asset('images/defaultuser.jpg')}}"
                             alt="" height="50px" width="50px"></td>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View</a></td>
                        {{-- admin lock --}}
                        @auth
                            @if (Auth::user()->user_type == 1)
                                <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Delete</a></td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

</body>

</html>
