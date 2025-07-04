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

Route::get("posts", [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/index');
Route::get("posts/create", [PostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/create');
Route::post("posts/store", [PostController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/store');
Route::get("posts/{post}", [PostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/show');
Route::get("posts/{post}/edit", [PostController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/edit');
Route::post("posts/{post}", [PostController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/update');
Route::delete("posts/{post}", [PostController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('Posts/destroy');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
