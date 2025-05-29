<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration Form</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')
        <h1 style="text-align: center">User Registration Form</h1>

        <form method="POST" action="{{ route('register.usr_create') }}">
            @csrf {{-- validação de segurança do Laravel --}}
            <div class="mb-3">
                <label for="InputName1" class="form-label">Username</label>
                <input name="name" type="text" class="form-control" id="InputName1" required>
                @error('name')
                    <div class="text-danger">Invalid Username</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We will never share your email with third parties.</div>
                @error('email')
                    <div class="text-danger">Invalid Email</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="InputPassword1" required>
                @error('password')
                    <div class="text-danger">Invalid Password</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required>
                <label class="form-check-label" for="Check1">I have a very solid snake</label>
                @error('checkbox')
                    <div class="text-danger">Checkbox not ticked</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    @endsection

</body>

</html>
