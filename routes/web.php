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

// Users com auth
Route::middleware(['auth', 'admin_or_editor'])->group(function () {
    Route::resource('maintenance-movies', MovieController::class, [
        'names' => [
            'index' => 'movies.all',
            'create' => 'movies.add',
            'store' => 'movies.create',
            'show' => 'movies.show',
            'update' => 'movies.update',
            'destroy' => 'movies.delete',
        ],
        'parameters' => ['maintenance-movies' => 'id']
    ]);
});


// Fallback
Route::fallback([UtilController::class, 'fallback']);
