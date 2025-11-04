<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    @extends('layouts.fe_master')

    @section('content')

        <h5>Hello {{ Auth::user()->name }}, welcome to your dashboard.</h5>

        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-black text-white">
                        <h5 class="mb-0">My Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if(Auth::user()->user_photo)
                                    <img src="{{ asset('storage/' . Auth::user()->user_photo) }}"
                                         alt="{{ Auth::user()->name }}"
                                         class="rounded-circle img-fluid mb-3"
                                         style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #31353a;">
                                @else
                                    <img src="{{ asset('images/defaultuser.jpg') }}"
                                         alt="Default User"
                                         class="rounded-circle img-fluid mb-3"
                                         style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #31353a;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4 class="mb-3">{{ Auth::user()->name }}</h4>

                                <div class="mb-3">
                                    <label class="text-muted fw-bold">Email:</label>
                                    <p class="mb-0">{{ Auth::user()->email }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="text-muted fw-bold">Account Type:</label>
                                    <p class="mb-0">
                                        @if(Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
                                            <span class="badge bg-danger">Administrator</span>
                                        @elseif(Auth::user()->user_type == \App\Models\User::TYPE_EDITOR)
                                            <span class="badge bg-warning">Editor</span>
                                        @else
                                            <span class="badge bg-success">User</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label class="text-muted fw-bold">Favorite Movies:</label>
                                    <p class="mb-0">
                                        <span class="badge bg-secondary fs-5">{{ Auth::user()->favorites()->count() }}</span>
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('movies.favorites') }}" class="btn btn-info">
                                        <i class="bi bi-heart-fill"></i> View My Favorites
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

</body>

</html>
