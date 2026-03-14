@extends('Customers.Layouts.master')
@section('title', 'Sản phẩm yêu thích - FlashTech')

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

        .wishlist-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 1100px;
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

        .breadcrumb a { color: var(--gray-600); text-decoration: none; }
        .breadcrumb a:hover { color: var(--primary); }
        .breadcrumb .current { color: var(--dark); font-weight: 500; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title svg { width: 26px; height: 26px; color: #ef4444; }

        .wishlist-count {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8125rem;
            font-weight: 700;
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.25rem;
        }

        .wishlist-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            overflow: hidden;
            transition: all 0.3s;
            position: relative;
        }

        .wishlist-card:hover {
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .wishlist-card-image {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: var(--gray-50);
        }

        .wishlist-card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 1rem;
            transition: transform 0.3s;
        }

        .wishlist-card:hover .wishlist-card-image img { transform: scale(1.05); }

        .btn-remove-wishlist {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: var(--white);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ef4444;
            transition: all 0.2s;
            z-index: 2;
        }

        .btn-remove-wishlist:hover { background: #ef4444; color: var(--white); transform: scale(1.1); }
        .btn-remove-wishlist svg { width: 18px; height: 18px; }

        .sale-badge {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            background: var(--danger);
            color: var(--white);
            padding: 0.25rem 0.625rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .wishlist-card-body { padding: 1rem 1.25rem; }

        .wishlist-card-brand {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.375rem;
        }

        .wishlist-card-name {
            font-size: 0.9375rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.4;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .wishlist-card-name a { color: inherit; text-decoration: none; }
        .wishlist-card-name a:hover { color: var(--primary); }

        .wishlist-card-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .price-current {
            font-size: 1.125rem;
            font-weight: 800;
            color: var(--danger);
        }

        .price-old {
            font-size: 0.8125rem;
            color: var(--gray-400);
            text-decoration: line-through;
        }

        .wishlist-card-stock {
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .stock-in { color: var(--success); }
        .stock-out { color: var(--danger); }

        .btn-add-cart {
            width: 100%;
            padding: 0.625rem;
            border-radius: 10px;
            border: none;
            font-size: 0.8125rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
        }

        .btn-add-cart:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(102,126,234,0.4); }
        .btn-add-cart:disabled { opacity: 0.5; cursor: not-allowed; transform: none; box-shadow: none; }
        .btn-add-cart svg { width: 16px; height: 16px; }

        .empty-wishlist {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }

        .empty-wishlist svg { width: 80px; height: 80px; color: var(--gray-300); margin-bottom: 1.5rem; }

        .empty-wishlist h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .empty-wishlist p { color: var(--gray-500); margin-bottom: 1.5rem; }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            transition: all 0.2s;
        }

        .btn-shop:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(102,126,234,0.4); }

        .alert-success {
            padding: 1rem 1.25rem;
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.2);
            border-radius: 10px;
            color: #065f46;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        @media (max-width: 640px) {
            .wishlist-grid { grid-template-columns: repeat(2, 1fr); gap: 0.75rem; }
            .wishlist-card-image { height: 160px; }
            .wishlist-card-body { padding: 0.75rem; }
            .wishlist-card-name { font-size: 0.8125rem; }
            .price-current { font-size: 0.9375rem; }
        }
    </style>
@endpush

@section('content')
    <div class="wishlist-page">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span>›</span>
                <span class="current">Sản phẩm yêu thích</span>
            </div>

            <div class="page-header">
                <h1 class="page-title">
                    <svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                    Sản phẩm yêu thích
                    @if($wishlistProducts->count() > 0)
                        <span class="wishlist-count">{{ $wishlistProducts->count() }} sản phẩm</span>
                    @endif
                </h1>
            </div>

            @if($wishlistProducts->count() > 0)
                <div class="wishlist-grid">
                    @foreach($wishlistProducts as $product)
                        <div class="wishlist-card" id="wishlist-item-{{ $product->_id }}">
                            <div class="wishlist-card-image">
                                <button class="btn-remove-wishlist" onclick="removeWishlist('{{ $product->_id }}')" title="Xóa khỏi yêu thích">
                                    <svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                    </svg>
                                </button>
                                @php
                                    $price = (int)($product->price ?? 0);
                                    $salePrice = (int)($product->sale_price ?? 0);
                                    $discount = ($price > 0 && $salePrice > 0 && $salePrice < $price) ? round((($price - $salePrice) / $price) * 100) : 0;
                                @endphp
                                @if($discount > 0)
                                    <span class="sale-badge">-{{ $discount }}%</span>
                                @endif
                                <a href="{{ route('product.detail', $product->slug) }}">
                                    <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="wishlist-card-body">
                                @if($product->brand)
                                    <div class="wishlist-card-brand">{{ $product->brand->name }}</div>
                                @endif
                                <div class="wishlist-card-name">
                                    <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                </div>
                                <div class="wishlist-card-price">
                                    @if((int)($product->sale_price ?? 0) > 0 && (int)($product->sale_price ?? 0) < (int)($product->price ?? 0))
                                        <span class="price-current">{{ number_format((int)($product->sale_price ?? 0), 0, ',', '.') }}₫</span>
                                        <span class="price-old">{{ number_format((int)($product->price ?? 0), 0, ',', '.') }}₫</span>
                                    @else
                                        <span class="price-current">{{ number_format((int)($product->price ?? 0), 0, ',', '.') }}₫</span>
                                    @endif
                                </div>
                                <div class="wishlist-card-stock {{ $product->stock_quantity > 0 ? 'stock-in' : 'stock-out' }}">
                                    {{ $product->stock_quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                </div>
                                <button class="btn-add-cart" {{ $product->stock_quantity <= 0 ? 'disabled' : '' }} onclick="addToCartFromWishlist('{{ $product->_id }}')">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/>
                                    </svg>
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-wishlist">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                    <h3>Chưa có sản phẩm yêu thích</h3>
                    <p>Hãy khám phá và thêm sản phẩm bạn yêu thích vào danh sách!</p>
                    <a href="{{ route('home') }}" class="btn-shop">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        Khám phá sản phẩm
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function removeWishlist(productId) {
            if (!confirm('Bạn có chắc muốn xóa sản phẩm này khỏi danh sách yêu thích?')) return;

            fetch('{{ route("wishlist.toggle") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'removed') {
                    const card = document.getElementById('wishlist-item-' + productId);
                    card.style.transition = 'all 0.3s';
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        card.remove();
                        const remaining = document.querySelectorAll('.wishlist-card');
                        if (remaining.length === 0) location.reload();
                        const countEl = document.querySelector('.wishlist-count');
                        if (countEl) countEl.textContent = remaining.length + ' sản phẩm';
                    }, 300);
                }
            });
        }

        function addToCartFromWishlist(productId) {
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    const badge = document.querySelector('.cart-count');
                    if (badge) badge.textContent = data.cartCount;
                }
            });
        }
    </script>
@endpush
