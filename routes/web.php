<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtilController;

// Home
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])-> name('world.home');

Route::get('/laraveldocs', [HomeController::class, 'laraveldocs'])-> name('world.laraveldocs');


//Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])-> name('world.dashboard')->middleware('auth');


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
Route::get('/register-users-add', [UserController::class, 'registeruser_Add'])-> name('users.register_add');

//Rota de post que coleta e envia todos os dados para dentro do código
Route::post('/register-users-create', [UserController::class, 'registeruser_Create'])-> name('users.register_create');



// Movies



// Dashboard



// Fallback
Route::fallback([UtilController::class, 'fallback']);
