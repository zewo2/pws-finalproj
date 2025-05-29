<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    @extends('layouts.be_master')

    @section('content')
        @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        {{-- podemos usar o número do user type, mas usamos a constante para tornar o código mais legivel --}}
            <div class="alert alert-danger" role="alert">
                Administrator account!
            </div>
        @endif

        @if (Auth::user()->user_type == \App\Models\User::TYPE_EDITOR)
        {{-- podemos usar o número do user type, mas usamos a constante para tornar o código mais legivel --}}
            <div class="alert alert-warning" role="alert">
                Editor account!
            </div>
        @endif

        <h5>Hello {{ Auth::user()->name }}, welcome to the Maintenance Dashboard.</h5>
    @endsection

</body>

</html>
