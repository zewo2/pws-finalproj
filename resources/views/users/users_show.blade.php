<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Details</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')

    <h1 style="text-align: center">User Details</h1>

    <h4>User Data - {{$user->name}}</h4>

    {{-- Usamos na mesma o post para o update para termos acesso ao request e às validações --}}
    <form method="POST" action="{{route('users.update')}}" enctype="multipart/form-data">

        {{-- enctype="multipart/form-data" permite aos formulários processar ficheiros que não sejam strings --}}
        @csrf {{-- validação de segurança do Laravel --}}

        @method('PUT') {{-- método PUT para atualizar dados --}}
        <input type="hidden" name="id" value="{{$user->id}}">

        <div class="mb-3">
            <label for="InputName1" class="form-label">Username</label>
            <input name="name" value="{{$user->name}}" type="text" class="form-control" id="InputName1" required>
            @error('name')
                <div class="text-danger">Invalid Username</div>
            @enderror
        </div>
        {{-- disabled não manda para o backend
        no caso de ser o dado necessário para verif, usar o readonly pois este manda para o backend --}}
        <div class="mb-3">
            <label for="InputEmail1" class="form-label">Email</label>
            <input name="email" value="{{$user->email}}" disabled type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We will never share your email with third parties.</div>
        </div>
        <div class="mb-3">
            <label for="InputPhoto1" class="form-label">Photo</label>
            <input name="user_photo" type="file" accept="image/*" class="form-control" id="InputPhoto1">
            {{-- accept="image/*" permite aceitar todo o tipo de imagens, pode ser usado para restringir o formato das imagens aceites --}}
            @error('user_photo')
                <div class="text-danger">Invalid Format</div>
            @enderror
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
