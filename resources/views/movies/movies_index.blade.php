<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Movies</title>
    <link rel="stylesheet" href="{{ asset('css/moviecarousels.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moviesindex.css') }}">
</head>

<body>
    @extends('layouts.fe_master')

    @section('content')
        <div class="container">
            <div class="movies-header">
                <h2>All Movies</h2>

                <div class="search-filter-container">
                    <!-- Search Form -->
                    <form action="{{ route('movies.index') }}" method="GET" class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" class="form-control"
                               placeholder="Search movies..." value="{{ request('search') }}">
                    </form>

                    <!-- Filters -->
                    <div class="d-flex gap-2">
                        <!-- Genre Filter -->
                        <div class="filter-dropdown">
                            <select class="form-select" onchange="window.location.href=this.value">
                                <option value="{{ route('movies.index', ['sort' => request('sort'), 'search' => request('search')]) }}">
                                    All Genres
                                </option>
                                @foreach($genres as $genre)
                                    <option value="{{ route('movies.index', ['genre' => $genre, 'sort' => request('sort'), 'search' => request('search')]) }}"
                                        {{ request('genre') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort Filter -->
                        <div class="filter-dropdown">
                            <select class="form-select" onchange="window.location.href=this.value">
                                <option value="{{ route('movies.index', ['genre' => request('genre'), 'search' => request('search'), 'sort' => 'newest']) }}"
                                    {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>
                                    Newest First
                                </option>
                                <option value="{{ route('movies.index', ['genre' => request('genre'), 'search' => request('search'), 'sort' => 'oldest']) }}"
                                    {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                    Oldest First
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movies Grid -->
            @if($movies->isEmpty())
                <div class="text-center py-5">
                    <h4>No movies found matching your criteria</h4>
                    <a href="{{ route('movies.index') }}" class="btn btn-dark mt-3">Reset Filters</a>
                </div>
            @else
                <div class="movies-grid">
                    @foreach($movies as $movie)
                        <div class="movie-card">
                            <a href="{{ route('movies.publicshow', $movie->id) }}">
                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}">
                                <div class="movie-info">
                                    <h5>{{ $movie->title }}</h5>
                                    <div class="movie-meta">
                                        <span>{{ date('Y', strtotime($movie->release_date)) }}</span>
                                        <span>★ {{ $movie->rating }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $movies->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    @endsection
</body>
</html>
