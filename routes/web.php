<?php

use App\Http\Controllers\FeatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeatureController::class, 'index'])->name('features.index');
