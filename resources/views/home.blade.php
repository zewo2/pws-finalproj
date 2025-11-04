<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/moviecarousels.css') }}">
</head>

<body>
    @extends('layouts.fe_master')

    @section('content')
        <h2 class="text-center mb-4">Welcome to MSF Movies</h2>

        <!-- Recently Added Movies Carousel -->
        <h3 class="mb-3">Recently Added</h3>
        <div id="recentlyAddedCarousel" class="carousel slide multi-item-carousel" data-bs-ride="carousel" data-bs-interval="10000" data-bs-pause="hover">
            <div class="carousel-inner">
                @foreach ($recentlyAddedMovies->chunk(4) as $index => $moviesChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($moviesChunk as $movie)
                                <div class="col-md-3 col-6">
                                    <div class="movie-card">
                                        <a href="{{ route('movies.publicshow', $movie->id) }}">
                                            <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}">
                                            <div class="movie-info">
                                                <h5>{{ $movie->title }}</h5>
                                                <div class="d-flex justify-content-between">
                                                    <span class="year">{{ date('Y', strtotime($movie->release_date)) }}</span>
                                                    <span class="rating">★ {{ $movie->rating }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#recentlyAddedCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#recentlyAddedCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Genres Section with Movies -->
        <h3 class="mb-3 mt-5">Browse by Genre</h3>
        <div class="genre-tabs">
            @foreach ($genres as $genre)
                <div class="genre-tab {{ $loop->first ? 'active' : '' }}" data-genre="{{ $genre }}">
                    {{ $genre }}
                </div>
            @endforeach
        </div>

        @foreach ($genres as $genreIndex => $genre)
            <div id="genreMoviesCarousel-{{ Str::slug($genre) }}" class="carousel slide multi-item-carousel genre-carousel {{ $genreIndex === 0 ? '' : 'd-none' }}" data-genre="{{ $genre }}" data-bs-ride="carousel" data-bs-interval="10000" data-bs-pause="hover">
                <div class="carousel-inner">
                    @foreach ($moviesByGenre[$genre]->chunk(4) as $chunkIndex => $moviesChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($moviesChunk as $movie)
                                    <div class="col-md-3 col-6">
                                        <div class="movie-card">
                                            <a href="{{ route('movies.publicshow', $movie->id) }}">
                                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}">
                                                <div class="movie-info">
                                                    <h5>{{ $movie->title }}</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="year">{{ date('Y', strtotime($movie->release_date)) }}</span>
                                                        <span class="rating">★ {{ $movie->rating }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#genreMoviesCarousel-{{ Str::slug($genre) }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#genreMoviesCarousel-{{ Str::slug($genre) }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endforeach

        <!-- Highest Rated Movies Carousel -->
        <h3 class="mb-3 mt-5">Highest Rated</h3>
        <div id="highestRatedCarousel" class="carousel slide multi-item-carousel" data-bs-ride="carousel" data-bs-interval="10000" data-bs-pause="hover">
            <div class="carousel-inner">
                @foreach ($highestRatedMovies->chunk(4) as $index => $moviesChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($moviesChunk as $movie)
                                <div class="col-md-3 col-6">
                                    <div class="movie-card">
                                        <a href="{{ route('movies.publicshow', $movie->id) }}">
                                            <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}">
                                            <div class="movie-info">
                                                <h5>{{ $movie->title }}</h5>
                                                <div class="d-flex justify-content-between">
                                                    <span class="year">{{ date('Y', strtotime($movie->release_date)) }}</span>
                                                    <span class="rating">★ {{ $movie->rating }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#highestRatedCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#highestRatedCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        @endsection

    <script src="{{ asset('js/carousels.js') }}"></script>
</body>
</html>
