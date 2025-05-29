<!DOCTYPE html>
<html lang="en">

<head>
    <title>Movie Creation Form</title>
</head>

<body>
    @extends('layouts.be_master')

    @section('content')
        <h1 style="text-align: center">Movie Creation Form</h1>

        <form method="POST" action="{{ route('movies.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="InputTitle1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="InputTitle1" required>
                @error('title')
                    <div class="text-danger">Invalid Title</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="InputPhoto1" class="form-label">Poster</label>
                <input name="poster" type="file" accept="image/*" class="form-control" id="InputPhoto1">
                @error('poster')
                    <div class="text-danger">Invalid Format</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genreSelect" class="form-label">Genre</label>
                <select name="genre" class="form-select" id="genreSelect" required>
                    <option value="" disabled selected>Select a genre</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Romance">Romance</option>
                    <option value="Animation">Animation</option>
                    <option value="Documentary">Documentary</option>
                    <option value="Other">Other</option>
                </select>
                @error('genre')
                    <div class="text-danger">Please select a valid genre</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="InputTrailer1" class="form-label">Trailer URL</label>
                <input name="trailer_url" type="url" class="form-control"
                    id="InputTrailer1">
                <small class="text-muted">Must be an embed URL</small>
                @error('trailer_url')
                    <div class="text-danger">Invalid URL format</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="InputDescription1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="InputDescription1" maxlength="255"></textarea>
                <small class="text-muted">Max 255 characters</small>
                @error('description')
                    <div class="text-danger">Description too long</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="InputReleaseDate1" class="form-label">Release Date</label>
                <input name="release_date" type="date" class="form-control"
                    id="InputReleaseDate1">
                @error('release_date')
                    <div class="text-danger">Invalid date</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Inputdirector1" class="form-label">Director</label>
                <input name="director" type="text" class="form-control"
                    id="Inputdirector1" aria-describedby="emailHelp" required>
                @error('director')
                    <div class="text-danger">Invalid Director</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="InputRating1" class="form-label">Rating (0-10)</label>
                <input name="rating" type="number" step="0.1" min="0"
                    max="10" class="form-control" id="InputRating1">
                @error('rating')
                    <div class="text-danger">Must be between 0 and 10</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required>
                <label class="form-check-label" for="Check1">I have a very solid snake</label>
                @error('checkbox')
                    <div class="text-danger">Checkbox not ticked</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Movie</button>
        </form>
    @endsection
</body>

</html>
