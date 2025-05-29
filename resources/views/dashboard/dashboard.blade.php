<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')

        <h5>Hello {{ Auth::user()->name }}, welcome to the your dashboard.</h5>

    @endsection

</body>

</html>
