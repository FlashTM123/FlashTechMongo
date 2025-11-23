<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::post('/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulkDelete');
    Route::get('/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{users}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{users}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('settings.index');
});

// API routes for AJAX
Route::prefix('api/users')->group(function () {
    Route::get('/search', [UserController::class, 'search'])->name('api.users.search');
});

Route::prefix('api/settings')->group(function () {
    Route::post('/language', [SettingController::class, 'updateLanguage'])->name('api.settings.language');
    Route::post('/timezone', [SettingController::class, 'updateTimezone'])->name('api.settings.timezone');
    Route::post('/theme', [SettingController::class, 'updateTheme'])->name('api.settings.theme');
    Route::post('/display-mode', [SettingController::class, 'updateDisplayMode'])->name('api.settings.display-mode');
});
