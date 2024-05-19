<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['name' => 'John']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/ctrl', [WelcomeController::class, 'index']);
