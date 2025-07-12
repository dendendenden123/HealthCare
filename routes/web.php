<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

//auth
Route::post('/login/auth', [AuthController::class, 'login'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
Route::post('/profile/update', [AuthController::class, 'update'])->name('profile.update');

//This step should be done at the end.
Route::get('/{url}', function ($url) {

    return view($url);
});





