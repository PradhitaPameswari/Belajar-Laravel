<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/signin', [UserController::class, 'showSignInForm']);
Route::post('/signin', [UserController::class, 'signIn']);

Route::get('/signup', [UserController::class, 'showSignUpForm']);
Route::post('/signup', [UserController::class, 'signUp']);

Route::get('/blog', [UserController::class, 'blog']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
