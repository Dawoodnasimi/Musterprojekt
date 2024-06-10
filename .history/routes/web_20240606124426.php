<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia::render('Home');
})->name('home');

Route::inertia('/about', 'About');
})->name('about');
