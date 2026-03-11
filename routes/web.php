<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Customer Authentication Routes
Route::get('/dang-ky', [CustomerAuthController::class, 'showRegisterForm'])->name('customers.register');
Route::post('/dang-ky', [CustomerAuthController::class, 'register'])->name('customers.register.post');
Route::get('/dang-nhap', [CustomerAuthController::class, 'showLoginForm'])->name('customers.login');
Route::post('/dang-nhap', [CustomerAuthController::class, 'login'])->name('customers.login.post');
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customers.logout');
Route::get('/auth/google', [CustomerAuthController::class, 'redirectToGoogle'])->name('customers.login.google');
Route::get('/auth/google/callback', [CustomerAuthController::class, 'handleGoogleCallback'])->name('customers.login.google.callback');

Route::get('/fix-storage', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    if (file_exists($link)) {
        @unlink($link);
    }

    symlink($target, $link);
    return 'Storage link created successfully.';
});


// Customer Home Route
Route::get('/', [\App\Http\Controllers\CustomerHomeController::class, 'index'])->name('home');

// Product Detail Route
Route::get('/product/{slug}', [\App\Http\Controllers\CustomerHomeController::class, 'productDetail'])->name('product.detail');

// Category Route
Route::get('/danh-muc/{category}', [\App\Http\Controllers\CustomerHomeController::class, 'category'])->name('products.category');


// Reviews
Route::middleware(['auth:customer'])->group(function () {
    Route::post('/san-pham/{product}/danh-gia', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/danh-gia/{review}/helpful', [App\Http\Controllers\ReviewController::class, 'helpful'])->name('reviews.helpful');
    Route::delete('/danh-gia/{review}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Cart Routes
Route::middleware(['auth:customer'])->prefix('gio-hang')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/them', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cap-nhat', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/xoa/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/xoa-het', [CartController::class, 'clear'])->name('cart.clear');
});

// Checkout Routes
Route::middleware(['auth:customer'])->prefix('thanh-toan')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/dat-hang', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/thanh-cong/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
});

// Customer Profile Routes
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\CustomerHomeController::class, 'profile'])->name('customers.profile');
    Route::get('/ho-so-ca-nhan', [\App\Http\Controllers\CustomerHomeController::class, 'profile_detail'])->name('customers.profile.detail');
    Route::get('/chinh-sua-ho-so', [\App\Http\Controllers\CustomerHomeController::class, 'editProfile'])->name('customers.profile.edit');
    Route::put('/chinh-sua-ho-so', [\App\Http\Controllers\CustomerHomeController::class, 'updateProfile'])->name('customers.profile.update');
    Route::get('/doi-mat-khau', [\App\Http\Controllers\CustomerHomeController::class, 'changePassword'])->name('customers.password.change');
    Route::put('/doi-mat-khau', [\App\Http\Controllers\CustomerHomeController::class, 'updatePassword'])->name('customers.password.update');
    Route::get('/don-hang', [\App\Http\Controllers\CustomerHomeController::class, 'orderHistory'])->name('customers.orders');
    Route::get('/don-hang/{id}', [\App\Http\Controllers\CustomerHomeController::class, 'orderDetail'])->name('customers.orders.detail');
    Route::post('/don-hang/{id}/huy', [\App\Http\Controllers\CustomerHomeController::class, 'cancelOrder'])->name('customers.orders.cancel');
    Route::get('/yeu-thich', [\App\Http\Controllers\CustomerHomeController::class, 'wishlist'])->name('wishlist.index');
    Route::post('/yeu-thich/toggle', [\App\Http\Controllers\CustomerHomeController::class, 'toggleWishlist'])->name('wishlist.toggle');
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

    // Orders Management - Admin, Moderator, Employee
    Route::middleware(['role:admin,moderator,employee'])->prefix('admin/orders')->group(function () {
        Route::get('/', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/{id}', [OrdersController::class, 'show'])->name('orders.show');
        Route::put('/{id}', [OrdersController::class, 'update'])->name('orders.update');
        Route::delete('/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
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
