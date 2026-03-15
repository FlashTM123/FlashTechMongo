<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// API Routes
Route::get('/api/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');


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
    Route::post('/api/validate-coupon', [CheckoutController::class, 'validateCoupon'])->name('checkout.validateCoupon');
    Route::post('/api/remove-coupon', [CheckoutController::class, 'removeCoupon'])->name('checkout.removeCoupon');
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

// Protected routes - Require authentication (Old admin - removed, now using Filament at /admin)
