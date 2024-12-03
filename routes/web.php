<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('pages.home');
})->name('home');

Route::get('/', [UserController::class, 'users'])->name('users');
Route::resource('article', ArticleController::class);

Route::middleware('auth')->group(function () {
    Route::patch('/public/{article}', [ArticleController::class, 'publish'])->name('public');
    Route::get('/check_article', [ArticleController::class, 'check_article'])->name('check_article');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
