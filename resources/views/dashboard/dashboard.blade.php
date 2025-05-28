<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')
        @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        {{-- podemos usar o número do user type, mas usamos a constante para tornar o código mais legivel --}}
            <div class="alert alert-danger" role="alert">
                Conta de administrador!
            </div>
        @endif

        <h5>Olá {{ Auth::user()->name }}, bem vindo à Dashboard.</h5>
    @endsection

</body>

</html>
