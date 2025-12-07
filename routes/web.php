<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerAuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// Customer Authentication Routes
Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customers.register');
Route::post('/register', [CustomerAuthController::class, 'register'])->name('customers.register.post');
Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('customers.login');
Route::post('/login', [CustomerAuthController::class, 'login'])->name('customers.login.post');
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customers.logout');

// Customer Home Route
Route::get('/', [\App\Http\Controllers\CustomerHomeController::class, 'index'])->name('home');


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

    // Brands Management - Admin, Employee
    Route::middleware(['role:admin,employee'])->prefix('brands')->group(function () {
        Route::get('/', [\App\Http\Controllers\BrandController::class, 'index'])->name('brands.index');
        Route::get('/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brands.create');
        Route::post('/', [\App\Http\Controllers\BrandController::class, 'store'])->name('brands.store');
        Route::get('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])->name('brands.update');
        Route::delete('/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brands.destroy');
    });

    // Customers Management - Admin, Moderator, Employee
    Route::middleware(['role:admin,moderator,employee'])->prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

    Route::middleware(['role:admin,employee'])->prefix('products')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
        Route::post('/', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
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
