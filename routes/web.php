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

// Test route to debug authentication
Route::get('/test-auth', function() {
    return [
        'customer_auth' => \Illuminate\Support\Facades\Auth::guard('customer')->check(),
        'customer_user' => \Illuminate\Support\Facades\Auth::guard('customer')->user()?->email,
        'web_auth' => \Illuminate\Support\Facades\Auth::guard('web')->check(),
        'web_user' => \Illuminate\Support\Facades\Auth::guard('web')->user()?->email,
        'session_data' => session()->all(),
    ];
});

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

// Payment Callback Routes (không cần auth vì là callback từ payment gateway)
Route::get('/payment/vnpay/return', [CheckoutController::class, 'vnpayReturn'])->name('payment.vnpay.return');
Route::get('/payment/momo/return', [CheckoutController::class, 'momoReturn'])->name('payment.momo.return');
Route::post('/payment/momo/notify', [CheckoutController::class, 'momoNotify'])->name('payment.momo.notify');

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
    Route::get('/don-hang/{id}/hoa-don', [\App\Http\Controllers\CustomerHomeController::class, 'downloadInvoice'])->name('customers.orders.invoice');
    Route::post('/don-hang/{id}/huy', [\App\Http\Controllers\CustomerHomeController::class, 'cancelOrder'])->name('customers.orders.cancel');
    Route::get('/yeu-thich', [\App\Http\Controllers\CustomerHomeController::class, 'wishlist'])->name('wishlist.index');
    Route::post('/yeu-thich/toggle', [\App\Http\Controllers\CustomerHomeController::class, 'toggleWishlist'])->name('wishlist.toggle');

    // Product Comparison Routes
    Route::prefix('so-sanh')->group(function () {
        Route::get('/', [App\Http\Controllers\ComparisonController::class, 'index'])->name('comparison.index');
        Route::post('/them/{product}', [App\Http\Controllers\ComparisonController::class, 'add'])->name('comparison.add');
        Route::delete('/xoa/{productId}', [App\Http\Controllers\ComparisonController::class, 'remove'])->name('comparison.remove');
        Route::delete('/xoa-het', [App\Http\Controllers\ComparisonController::class, 'clear'])->name('comparison.clear');
        Route::get('/api/count', [App\Http\Controllers\ComparisonController::class, 'count'])->name('comparison.count');
        Route::get('/api/check/{productId}', [App\Http\Controllers\ComparisonController::class, 'isInComparison'])->name('comparison.isInComparison');
    });

    // Chat Support Routes
    Route::prefix('tro-giup')->group(function () {
        Route::get('/', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
        Route::post('/tao-phong', [App\Http\Controllers\ChatController::class, 'create'])->name('chat.create');
        Route::post('/phong/{chatRoom}/gui-tin', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.sendMessage');
        Route::get('/phong/{chatRoom}/tin-nhan', [App\Http\Controllers\ChatController::class, 'getMessages'])->name('chat.getMessages');
        Route::post('/phong/{chatRoom}/dong', [App\Http\Controllers\ChatController::class, 'close'])->name('chat.close');
        Route::get('/api/widget', [App\Http\Controllers\ChatController::class, 'widget'])->name('chat.widget');
    });

    // Notification Routes
    Route::prefix('thong-bao')->group(function () {
        Route::get('/', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/api/chua-doc', [App\Http\Controllers\NotificationController::class, 'getUnread'])->name('notifications.getUnread');
        Route::post('/{notification}/da-doc', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
        Route::post('/api/tat-ca-da-doc', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::delete('/{notification}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
        Route::delete('/xoa-het', [App\Http\Controllers\NotificationController::class, 'clearAll'])->name('notifications.clearAll');
        Route::get('/api/dem', [App\Http\Controllers\NotificationController::class, 'count'])->name('notifications.count');
    });
});

// Language Route
Route::get('/lang/{locale}', function($locale) {
    if (in_array($locale, array_keys(config('locale.locales')))) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');

// Protected routes - Require authentication (Old admin - removed, now using Filament at /admin)
