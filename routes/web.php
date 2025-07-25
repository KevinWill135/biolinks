<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BioLinksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', LogoutController::class)->name('logout');

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links/create', [LinkController::class, 'store']);

    Route::middleware('can:update,link')->group(function () {
        /**Criation before edit */
        Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
        Route::put('/links/{link}/edit', [LinkController::class, 'update']);
        Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');

        Route::patch('/links/{link}/down', [LinkController::class, 'down'])->name('links.down');
        Route::patch('/links/{link}/up', [LinkController::class, 'up'])->name('links.up');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);
});

Route::get('/{user:handler}', BioLinksController::class);
