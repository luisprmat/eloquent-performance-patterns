<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books');
Route::get('/users', [UserController::class, 'index'])->name('users');
