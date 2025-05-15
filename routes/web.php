<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtilController;

// Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])-> name('world.home');
Route::get('/laraveldocs', [HomeController::class, 'laraveldocs'])-> name('world.laraveldocs');


// Users



// Movies



// Dashboard



// Fallback
Route::fallback([UtilController::class, 'fallback']);
