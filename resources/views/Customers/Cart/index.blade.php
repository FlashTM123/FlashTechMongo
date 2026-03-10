@extends('Customers.Layouts.master')

@section('title', 'Giỏ hàng - FlashTech')

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

        .cart-page {
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
            transition: color 0.2s;
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

        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2rem;
            align-items: start;
        }

        /* Cart Items */
        .cart-items-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .cart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .cart-header h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .cart-header .item-count {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .btn-clear-cart {
            background: none;
            border: none;
            color: var(--danger);
            font-size: 0.8125rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            transition: opacity 0.2s;
        }

        .btn-clear-cart:hover {
            opacity: 0.7;
        }

        .btn-clear-cart svg {
            width: 16px;
            height: 16px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 1.25rem;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            align-items: center;
            transition: background 0.2s;
        }

        .cart-item:hover {
            background: var(--gray-50);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            overflow: hidden;
            background: var(--gray-100);
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-item-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .cart-item-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        }

        .cart-item-name:hover {
            color: var(--primary);
        }

        .cart-item-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .price-current {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--primary);
        }

        .price-original {
            font-size: 0.8125rem;
            color: var(--gray-400);
            text-decoration: line-through;
        }

        .cart-item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.75rem;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            overflow: hidden;
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            background: var(--gray-100);
            border: none;
            cursor: pointer;
            font-size: 1.125rem;
            color: var(--dark);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: var(--primary);
            color: var(--white);
        }

        .qty-input {
            width: 48px;
            height: 36px;
            border: none;
            text-align: center;
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--dark);
            background: var(--white);
        }

        .qty-input:focus {
            outline: none;
        }

        .item-total {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--dark);
            white-space: nowrap;
        }

        .btn-remove {
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: 0.375rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-remove:hover {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        .btn-remove svg {
            width: 18px;
            height: 18px;
        }

        /* Cart Summary */
        .cart-summary {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
            position: sticky;
            top: 100px;
        }

        .cart-summary h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-100);
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

        .btn-checkout {
            width: 100%;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1rem;
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

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .btn-checkout svg {
            width: 20px;
            height: 20px;
        }

        .btn-continue {
            width: 100%;
            padding: 0.875rem;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 2px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-600);
            margin-top: 0.75rem;
            text-decoration: none;
        }

        .btn-continue:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-continue svg {
            width: 18px;
            height: 18px;
        }

        /* Empty Cart */
        .cart-empty {
            text-align: center;
            padding: 4rem 2rem;
        }

        .cart-empty svg {
            width: 100px;
            height: 100px;
            color: var(--gray-300);
            margin-bottom: 1.5rem;
        }

        .cart-empty h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .cart-empty p {
            color: var(--gray-500);
            margin-bottom: 1.5rem;
        }

        .btn-shop-now {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-shop-now:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        /* Toast notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            color: var(--white);
            font-weight: 600;
            z-index: 9999;
            transform: translateX(120%);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-success {
            background: var(--success);
        }

        .toast-error {
            background: var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
                gap: 1rem;
            }

            .cart-item-actions {
                grid-column: 1 / -1;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .cart-summary {
                position: static;
            }
        }
    </style>
@endpush

@section('content')
    <div class="cart-page">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span>/</span>
                <span class="current">Giỏ hàng</span>
            </div>

            <h1 class="page-title">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                Giỏ hàng của bạn
            </h1>

            @if (count($cartItems) > 0)
                <div class="cart-layout">
                    <!-- Cart Items -->
                    <div class="cart-items-card">
                        <div class="cart-header">
                            <h3>Sản phẩm <span class="item-count" id="itemCount">({{ count($cartItems) }} sản phẩm)</span></h3>
                            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-clear-cart">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    Xóa tất cả
                                </button>
                            </form>
                        </div>

                        @foreach ($cartItems as $item)
                            <div class="cart-item" id="cart-item-{{ $item['id'] }}">
                                <div class="cart-item-image">
                                    <a href="{{ route('product.detail', $item['product']->slug) }}">
                                        <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                                    </a>
                                </div>
                                <div class="cart-item-info">
                                    <a href="{{ route('product.detail', $item['product']->slug) }}" class="cart-item-name">
                                        {{ $item['product']->name }}
                                    </a>
                                    <div class="cart-item-price">
                                        <span class="price-current">{{ number_format($item['price'], 0, ',', '.') }}₫</span>
                                        @if ($item['product']->sale_price > 0 && $item['product']->sale_price < $item['product']->price)
                                            <span class="price-original">{{ number_format($item['product']->price, 0, ',', '.') }}₫</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="cart-item-actions">
                                    <div class="quantity-selector">
                                        <button class="qty-btn" onclick="updateQuantity('{{ $item['id'] }}', -1)">−</button>
                                        <input type="number" class="qty-input" value="{{ $item['quantity'] }}" min="1"
                                            max="{{ $item['product']->stock_quantity }}"
                                            id="qty-{{ $item['id'] }}"
                                            onchange="setQuantity('{{ $item['id'] }}')">
                                        <button class="qty-btn" onclick="updateQuantity('{{ $item['id'] }}', 1)">+</button>
                                    </div>
                                    <span class="item-total" id="total-{{ $item['id'] }}">{{ number_format($item['total'], 0, ',', '.') }}₫</span>
                                    <button class="btn-remove" onclick="removeItem('{{ $item['id'] }}')" title="Xóa sản phẩm">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <h3>Tóm tắt đơn hàng</h3>
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span id="subtotalValue">{{ number_format($subtotal, 0, ',', '.') }}₫</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span style="color: var(--success)">Miễn phí</span>
                        </div>
                        <div class="summary-row total">
                            <span>Tổng cộng</span>
                            <span class="total-price" id="totalValue">{{ number_format($subtotal, 0, ',', '.') }}₫</span>
                        </div>

                        @if(auth('customer')->check())
                            <a href="{{ route('checkout.index') }}" class="btn-checkout">
                        @else
                            <a href="{{ route('customers.login') }}" class="btn-checkout">
                        @endif
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Tiến hành thanh toán
                        </a>
                        <a href="{{ route('home') }}" class="btn-continue">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            @else
                <div class="cart-items-card">
                    <div class="cart-empty">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <h3>Giỏ hàng trống</h3>
                        <p>Bạn chưa có sản phẩm nào trong giỏ hàng. Hãy khám phá các sản phẩm của chúng tôi!</p>
                        <a href="{{ route('home') }}" class="btn-shop-now">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                            Mua sắm ngay
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast"></div>
@endsection

@push('scripts')
    <script>
        const csrfToken = '{{ csrf_token() }}';

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'toast toast-' + type + ' show';
            setTimeout(() => toast.classList.remove('show'), 3000);
        }

        function updateQuantity(productId, delta) {
            const input = document.getElementById('qty-' + productId);
            let newQty = parseInt(input.value) + delta;
            const max = parseInt(input.max);
            if (newQty < 1) newQty = 1;
            if (newQty > max) newQty = max;
            input.value = newQty;
            setQuantity(productId);
        }

        function setQuantity(productId) {
            const input = document.getElementById('qty-' + productId);
            let qty = parseInt(input.value);
            if (isNaN(qty) || qty < 1) qty = 1;
            if (qty > parseInt(input.max)) qty = parseInt(input.max);
            input.value = qty;

            fetch('{{ route('cart.update') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ product_id: productId, quantity: qty, _method: 'PUT' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('total-' + productId).textContent = data.itemTotal + '₫';
                    document.getElementById('subtotalValue').textContent = data.subtotal + '₫';
                    document.getElementById('totalValue').textContent = data.subtotal + '₫';
                    updateCartBadge(data.cartCount);
                }
            });
        }

        function removeItem(productId) {
            if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;

            fetch('/gio-hang/xoa/' + productId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ _method: 'DELETE' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const item = document.getElementById('cart-item-' + productId);
                    item.style.transition = 'opacity 0.3s, transform 0.3s';
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(50px)';
                    setTimeout(() => {
                        item.remove();
                        document.getElementById('subtotalValue').textContent = data.subtotal + '₫';
                        document.getElementById('totalValue').textContent = data.subtotal + '₫';
                        updateCartBadge(data.cartCount);
                        showToast(data.message);

                        // Nếu hết sản phẩm, reload trang
                        if (data.cartCount === 0) {
                            location.reload();
                        }
                    }, 300);
                }
            });
        }

        function updateCartBadge(count) {
            const badges = document.querySelectorAll('.cart-count');
            badges.forEach(badge => {
                badge.textContent = count;
                badge.style.display = count > 0 ? 'flex' : 'none';
            });
        }
    </script>
@endpush
