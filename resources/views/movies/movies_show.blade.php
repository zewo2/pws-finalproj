
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Details</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')

    <h1 style="text-align: center">Movie Details</h1>

    <h4>Movie Data - {{$movie->title}}</h4>

    {{-- Usamos na mesma o post para o update para termos acesso ao request e às validações --}}
    <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">

        {{-- enctype="multipart/form-data" permite aos formulários processar ficheiros que não sejam strings --}}
        @csrf {{-- validação de segurança do Laravel --}}

        @method('PUT') {{-- método PUT para atualizar dados --}}
        <input type="hidden" name="id" value="{{$movie->id}}">

        <div class="mb-3">
            <label for="InputName1" class="form-label">Title</label>
            <input name="name" value="{{$movie->title}}" type="text" class="form-control" id="InputName1" required>
            @error('name')
                <div class="text-danger">Invalid Title</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="InputPhoto1" class="form-label">Poster</label>
            <input name="poster" type="file" accept="image/*" class="form-control" id="InputPhoto1">
            {{-- accept="image/*" permite aceitar todo o tipo de imagens, pode ser usado para restringir o formato das imagens aceites --}}
            @error('poster')
                <div class="text-danger">Invalid Format</div>
            @enderror
        </div>
        {{-- disabled não manda para o backend
        no caso de ser o dado necessário para verif, usar o readonly pois este manda para o backend --}}
        <div class="mb-3">
            <label for="Inputgenre1" class="form-label">Genre</label>
            <input name="genrel" value="{{$movie->genre}}" disabled type="text" class="form-control" id="Inputgenre1" aria-describedby="emailHelp" required>
            <div id="genreHelp" class="form-text">Invalid Genre</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Check1" required>
            <label class="form-check-label" for="Check1">I have a very solid snake</label>
            @error('checkbox')
                <div class="text-danger">Checkbox not ticked</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    @endsection

</body>

</html>
