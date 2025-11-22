<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{users}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{users}', [UserController::class, 'destroy'])->name('users.destroy');
});

// API routes for AJAX
Route::prefix('api/users')->group(function () {
    Route::get('/search', [UserController::class, 'search'])->name('api.users.search');
});
