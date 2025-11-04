<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Not Found | MSF Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
</head>
<body>
    <div class="error-container">
        <div class="icon-404">🎬</div>
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Content Not Found</h2>
        <p class="error-description">
            The movie, user, or resource you're looking for doesn't exist or has been removed.<br>
            It might have been deleted or the link might be broken.
        </p>
        <div class="button-group">
            <a href="{{ route('world.home') }}" class="btn-home">
                ← Back to Home
            </a>
            <a href="{{ route('movies.index') }}" class="btn-secondary">
                Browse Movies
            </a>
        </div>
    </div>
</body>
</html>
