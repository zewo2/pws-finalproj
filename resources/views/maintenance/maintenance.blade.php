<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    @extends('layouts.be_master')

    @section('content')
        @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        {{-- podemos usar o número do user type, mas usamos a constante para tornar o código mais legivel --}}
            <div class="alert alert-danger" role="alert">
                Administrator account!
            </div>
        @endif

        @if (Auth::user()->user_type == \App\Models\User::TYPE_EDITOR)
        {{-- podemos usar o número do user type, mas usamos a constante para tornar o código mais legivel --}}
            <div class="alert alert-warning" role="alert">
                Editor account!
            </div>
        @endif

        <h5>Hello {{ Auth::user()->name }}, welcome to the Maintenance Dashboard.</h5>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-black text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-film"></i> Movies Management
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('movies.all') }}" class="text-decoration-none">
                                    <i class="bi bi-list-ul"></i> Movie List
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('movies.create') }}" class="text-decoration-none">
                                    <i class="bi bi-plus-circle"></i> Add Movie
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="bi bi-people"></i> Users Management
                            </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="{{ route('users.all') }}" class="text-decoration-none">
                                        <i class="bi bi-list-ul"></i> User List
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('users.add') }}" class="text-decoration-none">
                                        <i class="bi bi-person-plus"></i> Add User
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-speedometer2"></i> Quick Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('world.home') }}" class="btn btn-outline-primary">
                                <i class="bi bi-house"></i> Home
                            </a>
                            <a href="{{ route('dashboard.dashboard') }}" class="btn btn-outline-success">
                                <i class="bi bi-speedometer"></i> User Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
