<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CmsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/our-services', [HomeController::class, 'ourServices'])->name('our-services');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// CMS Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/cms', [CmsController::class, 'index'])->name('cms.index');
});
