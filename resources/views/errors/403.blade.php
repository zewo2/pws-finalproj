<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 - Access Denied | MSF Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
</head>
<body>
    <div class="error-container">
        <div class="icon-404">🔒</div>
        <h1 class="error-code">403</h1>
        <h2 class="error-message">Access Denied</h2>
        <p class="error-description">
            You don't have permission to access this page.<br>
            Admin or Editor privileges are required to view this content.
        </p>
        <div class="button-group">
            <a href="{{ route('world.home') }}" class="btn-home">
                ← Back to Home
            </a>
            <a href="{{ route('dashboard.dashboard') }}" class="btn-secondary">
                Go to Dashboard
            </a>
        </div>
    </div>
</body>
</html>
