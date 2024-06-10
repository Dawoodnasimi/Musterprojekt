<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(2)
    return inertia::render('Home');
});

Route::get('/about', function () {
    return inertia::render('About');
});