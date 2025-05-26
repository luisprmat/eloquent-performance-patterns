<?php

use App\Http\Controllers\FeatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeatureController::class, 'index'])->name('features.index');
Route::get('/features/{feature}', [FeatureController::class, 'show'])->name('features.show');
