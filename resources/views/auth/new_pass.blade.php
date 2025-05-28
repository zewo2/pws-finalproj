<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Pssword</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')
        <h1 style="text-align: center">Atualizar Password</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf {{-- validação de segurança do Laravel --}}
            <div class="mb-3">
                <label for="InputEmail1" class="form-label">Email</label>
                <input name="email" value="{{request()->email}}" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">Nunca iremos partilhar o seu email com outros.</div>
                @error('email')
                    <div class="text-danger">Email Inválido</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="InputPassword1" required>
                @error('password')
                    <div class="text-danger">Password Inválida</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Confirmar Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="InputPassword1" required>
                @error('password')
                    <div class="text-danger">Password Inválida</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required>
                <label class="form-check-label" for="Check1">lalilulelo</label>
                @error('checkbox')
                    <div class="text-danger">Validação Checkbox Inválida</div>
                @enderror
            </div>

            <input type="hidden" name="token" value="{{request()->token}}">
            <button type="submit" class="btn btn-primary">Atualizar Password</button>
        </form>
    @endsection

</body>

</html>
