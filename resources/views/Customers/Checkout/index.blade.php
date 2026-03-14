@extends('Customers.Layouts.master')

@section('title', 'Thanh toán - FlashTech')

@push('styles')
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #1e293b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --white: #ffffff;
        }

        .checkout-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .breadcrumb a {
            color: var(--gray-600);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .current {
            color: var(--dark);
            font-weight: 500;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title svg {
            width: 28px;
            height: 28px;
            color: var(--primary);
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 2rem;
            align-items: start;
        }

        /* Form Card */
        .checkout-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
        }

        .checkout-card h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-100);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkout-card h3 svg {
            width: 20px;
            height: 20px;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-group label .required {
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.9375rem;
            color: var(--dark);
            transition: border-color 0.2s;
            background: var(--white);
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-error {
            color: var(--danger);
            font-size: 0.8125rem;
            margin-top: 0.375rem;
        }

        /* Payment Methods */
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .payment-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }

        .payment-label:hover {
            border-color: var(--primary);
            background: rgba(102, 126, 234, 0.03);
        }

        .payment-option input:checked + .payment-label {
            border-color: var(--primary);
            background: rgba(102, 126, 234, 0.08);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .payment-icon {
            font-size: 1.75rem;
        }

        .payment-name {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--dark);
        }

        .payment-desc {
            font-size: 0.6875rem;
            color: var(--gray-500);
        }

        /* Order Summary Sidebar */
        .order-summary {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            position: sticky;
            top: 100px;
        }

        .order-summary h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .summary-item {
            display: flex;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .summary-item:last-of-type {
            border-bottom: none;
        }

        .summary-item-image {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            overflow: hidden;
            background: var(--gray-100);
            flex-shrink: 0;
        }

        .summary-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .summary-item-info {
            flex: 1;
            min-width: 0;
        }

        .summary-item-name {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 0.25rem;
        }

        .summary-item-qty {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .summary-item-price {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--primary);
            white-space: nowrap;
            align-self: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.625rem 0;
            font-size: 0.9375rem;
            color: var(--gray-600);
        }

        .summary-row.total {
            border-top: 2px solid var(--gray-200);
            margin-top: 0.75rem;
            padding-top: 1rem;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
        }

        .summary-row.total .total-price {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-place-order {
            width: 100%;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.0625rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            margin-top: 1.25rem;
        }

        .btn-place-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .btn-place-order:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        .btn-place-order svg {
            width: 20px;
            height: 20px;
        }

        .btn-back-cart {
            width: 100%;
            padding: 0.875rem;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 2px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-600);
            margin-top: 0.75rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-back-cart:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-back-cart svg {
            width: 18px;
            height: 18px;
        }

        /* Alert */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9375rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }
        }
    </style>
@endpush

@section('content')
    <div class="checkout-page">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span>/</span>
                <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                <span>/</span>
                <span class="current">Thanh toán</span>
            </div>

            <h1 class="page-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>
                Thanh toán
            </h1>

            <form action="{{ route('checkout.placeOrder') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="checkout-layout">
                    <!-- Checkout Form -->
                    <div>
                        <div class="checkout-card" style="margin-bottom: 1.5rem;">
                            <h3>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Thông tin giao hàng
                            </h3>

                            <div class="form-group">
                                <label>Họ và tên <span class="required">*</span></label>
                                <input type="text" name="full_name" class="form-control"
                                    value="{{ old('full_name', $customer->full_name ?? '') }}" required>
                                @error('full_name')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $customer->email ?? '') }}" required>
                                    @error('email')
                                        <div class="form-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="tel" name="phone_number" class="form-control"
                                        value="{{ old('phone_number', $customer->phone_number ?? '') }}" required>
                                    @error('phone_number')
                                        <div class="form-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ giao hàng <span class="required">*</span></label>
                                <input type="text" name="shipping_address" class="form-control"
                                    value="{{ old('shipping_address', $customer->address ?? '') }}" required>
                                @error('shipping_address')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ghi chú đơn hàng</label>
                                <textarea name="notes" class="form-control" placeholder="Ghi chú thêm cho đơn hàng (tùy chọn)...">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        <div class="checkout-card">
                            <h3>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Phương thức thanh toán
                            </h3>

                            <div class="payment-methods">
                                <div class="payment-option">
                                    <input type="radio" name="payment_method" value="cod" id="pay-cod"
                                        {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}>
                                    <label for="pay-cod" class="payment-label">
                                        <span class="payment-icon">💵</span>
                                        <span class="payment-name">Thanh toán khi nhận hàng</span>
                                        <span class="payment-desc">COD</span>
                                    </label>
                                </div>

                                <div class="payment-option">
                                    <input type="radio" name="payment_method" value="bank_transfer" id="pay-bank"
                                        {{ old('payment_method') === 'bank_transfer' ? 'checked' : '' }}>
                                    <label for="pay-bank" class="payment-label">
                                        <span class="payment-icon">🏦</span>
                                        <span class="payment-name">Chuyển khoản ngân hàng</span>
                                        <span class="payment-desc">Bank Transfer</span>
                                    </label>
                                </div>

                                <div class="payment-option">
                                    <input type="radio" name="payment_method" value="momo" id="pay-momo"
                                        {{ old('payment_method') === 'momo' ? 'checked' : '' }}>
                                    <label for="pay-momo" class="payment-label">
                                        <span class="payment-icon">📱</span>
                                        <span class="payment-name">Ví MoMo</span>
                                        <span class="payment-desc">MoMo Wallet</span>
                                    </label>
                                </div>

                                <div class="payment-option">
                                    <input type="radio" name="payment_method" value="vnpay" id="pay-vnpay"
                                        {{ old('payment_method') === 'vnpay' ? 'checked' : '' }}>
                                    <label for="pay-vnpay" class="payment-label">
                                        <span class="payment-icon">💳</span>
                                        <span class="payment-name">VNPay</span>
                                        <span class="payment-desc">Thanh toán online</span>
                                    </label>
                                </div>
                            </div>

                            @error('payment_method')
                                <div class="form-error" style="margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="order-summary">
                        <h3>Đơn hàng của bạn ({{ count($cartItems) }} sản phẩm)</h3>

                        @foreach ($cartItems as $item)
                            <div class="summary-item">
                                <div class="summary-item-image">
                                    @php
                                        $img = $item['product']->image;
                                        $imgUrl = $img && Str::startsWith($img, 'http') ? $img : asset('storage/' . $img);
                                    @endphp
                                    <img src="{{ $imgUrl }}" alt="{{ $item['product']->name }}">
                                </div>
                                <div class="summary-item-info">
                                    <div class="summary-item-name">{{ $item['product']->name }}</div>
                                    <div class="summary-item-qty">
                                        SL: {{ $item['quantity'] }}
                                        @if(!empty($item['color']))
                                            | Màu: {{ $item['color'] }}
                                        @endif
                                    </div>
                                </div>
                                <div class="summary-item-price">{{ number_format($item['total'], 0, ',', '.') }}₫</div>
                            </div>
                        @endforeach

                        <div style="margin-top: 1rem;">
                            <div class="summary-row">
                                <span>Tạm tính</span>
                                <span>{{ number_format($subtotal, 0, ',', '.') }}₫</span>
                            </div>
                            <div class="summary-row">
                                <span>Phí vận chuyển</span>
                                <span style="color: var(--success)">Miễn phí</span>
                            </div>
                            <div class="summary-row total">
                                <span>Tổng cộng</span>
                                <span class="total-price">{{ number_format($subtotal, 0, ',', '.') }}₫</span>
                            </div>
                        </div>

                        <button type="submit" class="btn-place-order" id="placeOrderBtn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            Đặt hàng
                        </button>

                        <a href="{{ route('cart.index') }}" class="btn-back-cart">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            Quay lại giỏ hàng
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function() {
            const btn = document.getElementById('placeOrderBtn');
            btn.disabled = true;
            btn.innerHTML = '<svg class="animate-spin" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> Đang xử lý...';
        });
    </script>
@endpush
