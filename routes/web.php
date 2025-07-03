<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('posts', PostController::class)
    ->middleware(['auth', 'verified'])
    ->names('posts');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
