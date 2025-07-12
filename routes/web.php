<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

//auth
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/profile/update', [AuthController::class, 'update'])->name('profile.update');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

//booking


//This step should be done at the end.
Route::get('/{url}', function ($url) {
    return view($url);
});