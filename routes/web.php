<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

// Home
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])-> name('world.home');

Route::get('/laraveldocs', [HomeController::class, 'laraveldocs'])-> name('world.laraveldocs');


//Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])-> name('dashboard.dashboard')->middleware('auth');


// Users com auth
Route::resource('admin-users', UserController::class, [
    'names' => [
        'index' => 'users.all',
        'create' => 'users.add',
        'store' => 'users.create',
        'show' => 'users.show',
        'update' => 'users.update',
        'destroy' => 'users.delete',
    ]
])->middleware('auth');

// Register Users
Route::resource('register-users', RegisterController::class, [
    'names' => [
        'create' => 'register.usr_add',
        'store' => 'register.usr_create',
    ]
    ]);

// Movies



// Dashboard



// Fallback
Route::fallback([UtilController::class, 'fallback']);
