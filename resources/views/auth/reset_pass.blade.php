<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')
        <h1 style="text-align: center">Recuperar Password</h1>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf {{-- validação de segurança do Laravel --}}
            <div class="mb-3">
                <label for="InputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">Nunca iremos partilhar o seu email com outros.</div>
                @error('email')
                    <div class="text-danger">Email Inválido</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required>
                <label class="form-check-label" for="Check1">lalilulelo</label>
                @error('checkbox')
                    <div class="text-danger">Validação Checkbox Inválida</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Recuperar Password</button>
        </form>
    @endsection

</body>

</html>
