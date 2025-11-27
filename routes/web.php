<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});


// Protected routes - Require authentication
Route::middleware(['auth'])->group(function () {

    // Dashboard - All authenticated users
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    // Users Management - Admin only
    Route::middleware(['role:admin'])->prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::post('/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulkDelete');
        Route::get('/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{users}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{users}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Customers Management - Admin, Moderator, Employee
    Route::middleware(['role:admin,moderator,employee'])->prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

    // Settings - Admin, Moderator, Employee
    Route::middleware(['role:admin,moderator,employee'])->prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
    });
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
