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
                <label for="Inputdirector1" class="form-label">Director</label>
                <input name="director" type="text" class="form-control" id="Inputdirector1" required>
                @error('director')
                    <div class="text-danger">Invalid Director</div>
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
