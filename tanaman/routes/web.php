<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('tanaman', TanamanController::class);
Route::resource('perawatan', PerawatanController::class);
Route::resource('kategori', KategoriController::class);
