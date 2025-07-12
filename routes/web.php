<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Inspiring;

Route::get('/', function () {
    $quote = Inspiring::quote();
    return view('welcome', compact("quote"))->render();
});
