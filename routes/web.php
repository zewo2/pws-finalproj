<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaintenanceController;

// Home
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])-> name('world.home');

Route::get('/laraveldocs', [HomeController::class, 'laraveldocs'])-> name('world.laraveldocs');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])-> name('dashboard.dashboard')->middleware('auth');

Route::middleware(['auth', 'admin_or_editor'])->group(function () {
    Route::get('/maintenance-dashboard', [MaintenanceController::class, 'index'])
         ->name('maintenance.dashboard');
});

// Users com auth
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin-users', UserController::class, [
        'names' => [
            'index' => 'users.all',
            'create' => 'users.add',
            'store' => 'users.create',
            'show' => 'users.show',
            'update' => 'users.update',
            'destroy' => 'users.delete',
        ],
        'parameters' => ['admin-users' => 'id']
    ]);
});

// Register Users
Route::resource('register-users', RegisterController::class, [
    'names' => [
        'create' => 'register.usr_add',
        'store' => 'register.usr_create',
    ]
    ]);

// Public movie listing
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/public/{movie}', [MovieController::class, 'publicShow'])
     ->name('movies.publicshow');

// Favorite toggle route
Route::middleware('auth')->group(function () {
    Route::post('/movies/{movie}/favorite', [MovieController::class, 'toggleFavorite'])
         ->name('movies.toggleFavorite');
});

Route::get('/favorites', [MovieController::class, 'favorites'])
     ->name('movies.favorites')
     ->middleware('auth');

// Movie Maintenance auth
Route::middleware(['auth', 'admin_or_editor'])->group(function () {
    Route::resource('maintenance-movies', MovieController::class, [
        'names' => [
            'create' => 'movies.create',
            'store' => 'movies.store',
            'show' => 'movies.show',
            'update' => 'movies.update',
            'destroy' => 'movies.delete',
            'edit' => 'movies.edit',
        ],
        'parameters' => ['maintenance-movies' => 'movie']
    ]);
});


Route::get('/all-movies', [MovieController::class, 'all'])->name('movies.all')
     ->middleware(['auth', 'admin_or_editor']);


// Fallback
Route::fallback([UtilController::class, 'fallback']);
