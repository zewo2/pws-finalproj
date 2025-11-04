<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $movie->title }} - MSF Movies</title>
    <link rel="stylesheet" href="{{ asset('css/moviecarousels.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moviepublicshow.css') }}">
</head>
<body>
    @extends('layouts.fe_master')

    @section('content')
        <div class="movie-detail-container">
            <div class="synopsis-section">
                <div class="movie-header">
                    <div class="movie-poster">
                        <img src="{{ asset('storage/' . $movie->poster) }}" height="100px" alt="{{ $movie->title }}">
                    </div>
                    <div class="movie-info">
                        <h1 class="movie-title">{{ $movie->title }}</h1>
                        <div class="movie-meta">
                            <span>{{ date('Y', strtotime($movie->release_date)) }}</span>
                            <span class="movie-rating">★ {{ $movie->rating }}</span>
                            <span>{{ $movie->genre }}</span>
                            <span>Directed by {{ $movie->director }}</span>
                        </div>

                        @auth
                            <form action="{{ route('movies.toggleFavorite', $movie->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="favorite-btn {{ $movie->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}">
                                    <span class="material-icons">favorite</span>
                                    {{ $movie->isFavoritedBy(auth()->user()) ? 'Remove from Favorites' : 'Add to Favorites' }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="favorite-btn">
                                <span class="material-icons">favorite</span>
                                Login to Add to Favorites
                            </a>
                        @endauth

                        <br>

                        @if($movie->description)
                            <div class="movie-description">
                                <h3>Synopsis</h3>
                                <p>{{ $movie->description }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($movie->trailer_url)
                <div class="trailer-section">
                    <div class="movie-trailer">
                        <h2>Trailer</h2>
                        <div class="trailer-container">
                            <!-- Embed YouTube/Vimeo trailer -->
                            <iframe src="{{ $movie->trailer_url }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
</body>
</html>
