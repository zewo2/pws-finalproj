<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Bimg Bomss">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('world.home') }}">MSF Movies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('world.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('world.home') }}">Movies</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('world.home') }}">Favorites</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    @if (Route::has('login'))
        <div class="d-flex gap-2 align-items-center">
            @auth
                <a href="{{ route('dashboard.dashboard') }}" class="btn btn-primary">
                    Dashboard
                </a>

                @if(in_array(auth()->user()->user_type, [1, 2])) <!-- Show for admin (1) and editor (2) -->
                    <a href="{{ route('maintenance.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-tools me-1"></i> Maintenance
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-warning" type="submit">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-success">
                    Login
                </a>

                @if (Route::has('register.usr_add'))
                    <a href="{{ route('register.usr_add') }}" class="btn btn-warning">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    @endif
</nav>

    <div class="container">

        <main>
            @yield('content')
        </main>

    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                {{-- <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li> --}}
            </ul>
            <p class="text-center text-body-secondary">&copy; 2025 Militaires Sans Frontières, LLC</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
