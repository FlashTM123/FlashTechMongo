@extends('Customers.Layouts.master')
@section('title', 'Home - FlashTech')

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 4rem;
    }

    .hero-text {
        flex: 1;
        color: white;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        animation: slideInDown 0.6s ease;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        animation: slideInLeft 0.8s ease;
    }

    .hero-title .highlight {
        background: linear-gradient(90deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 1.25rem;
        opacity: 0.95;
        margin-bottom: 2.5rem;
        line-height: 1.7;
        animation: slideInLeft 1s ease;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        animation: slideInUp 1.2s ease;
    }

    .hero-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.0625rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .hero-btn-primary {
        background: white;
        color: #667eea;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hero-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .hero-btn-secondary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .hero-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-3px);
    }

    .hero-image {
        flex: 1;
        position: relative;
        animation: float 3s ease-in-out infinite;
    }

    .hero-image img {
        width: 100%;
        height: auto;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.3));
    }

    /* Categories Section */
    .categories-section {
        padding: 4rem 0;
        background: #f8fafc;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.75rem;
    }

    .section-description {
        font-size: 1.125rem;
        color: #64748b;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.5rem;
    }

    .category-card {
        background: white;
        border-radius: 16px;
        padding: 2rem 1.5rem;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .category-card:hover::before {
        opacity: 0.05;
    }

    .category-card:hover {
        transform: translateY(-8px);
        border-color: #667eea;
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.15);
    }

    .category-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        display: block;
        position: relative;
        z-index: 1;
    }

    .category-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .category-count {
        font-size: 0.875rem;
        color: #64748b;
        position: relative;
        z-index: 1;
    }

    /* Featured Products */
    .featured-section {
        padding: 4rem 0;
        background: white;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }

    .product-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        border-color: #667eea;
    }

    .product-image-wrapper {
        position: relative;
        padding-top: 75%;
        background: #f8fafc;
        overflow: hidden;
    }

    .product-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .product-badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .product-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-hot {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        animation: pulse 2s ease infinite;
    }

    .badge-new {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .badge-sale {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
    }

    .product-actions {
        position: absolute;
        top: 1rem;
        right: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-card:hover .product-actions {
        opacity: 1;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        background: white;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .action-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .action-btn svg {
        width: 18px;
        height: 18px;
        stroke: #1e293b;
    }

    .product-info {
        padding: 1.5rem;
    }

    .product-brand {
        font-size: 0.875rem;
        color: #667eea;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .product-name {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
        min-height: 2.8rem;
        word-break: break-word;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        flex-wrap: wrap;
    }

    .stars {
        color: #fbbf24;
        font-size: 0.875rem;
        white-space: nowrap;
    }

    .rating-count {
        font-size: 0.8125rem;
        color: #64748b;
        white-space: nowrap;
    }

    .product-price {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        margin-bottom: 1rem;
        min-height: 3.5rem;
    }

    .price-current {
        font-size: 1.375rem;
        font-weight: 800;
        color: #ef4444;
        line-height: 1;
        word-break: break-all;
    }

    .price-original {
        font-size: 1rem;
        color: #94a3b8;
        text-decoration: line-through;
        line-height: 1;
    }

    .price-discount {
        padding: 0.25rem 0.5rem;
        background: #fee2e2;
        color: #ef4444;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        align-self: flex-start;
    }

    .product-footer {
        padding: 0 1.5rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .stock-status {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.8125rem;
        color: #10b981;
        font-weight: 600;
        white-space: nowrap;
    }

    .stock-dot {
        width: 8px;
        height: 8px;
        background: #10b981;
        border-radius: 50%;
        animation: pulse 2s ease infinite;
    }

    .add-to-cart-btn {
        padding: 0.625rem 1rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }

    .add-to-cart-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .add-to-cart-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .add-to-cart-btn:disabled:hover {
        transform: none;
    }

    /* Deals Section */
    .deals-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .deals-section::before {
        content: '🔥';
        position: absolute;
        font-size: 20rem;
        opacity: 0.05;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .deals-content {
        position: relative;
        z-index: 1;
    }

    .deals-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .deals-timer {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .timer-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 1.5rem;
        min-width: 100px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .timer-value {
        font-size: 2.5rem;
        font-weight: 800;
        display: block;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .timer-label {
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
    }

    /* Brands Section */
    .brands-section {
        padding: 4rem 0;
        background: white;
    }

    .brands-slider {
        display: flex;
        gap: 3rem;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .brand-logo {
        opacity: 0.6;
        transition: all 0.3s ease;
        filter: grayscale(1);
        height: 60px;
    }

    .brand-logo:hover {
        opacity: 1;
        filter: grayscale(0);
        transform: scale(1.1);
    }

    /* Animations */
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.8;
            transform: scale(1.05);
        }
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-content {
            flex-direction: column;
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-buttons {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 3rem 0;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-description {
            font-size: 1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .categories-grid {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .deals-timer {
            gap: 1rem;
        }

        .timer-box {
            min-width: 80px;
            padding: 1rem;
        }

        .timer-value {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                    </svg>
                    Flash Sale - Giảm đến 50%
                </div>
                <h1 class="hero-title">
                    Công Nghệ Hàng Đầu<br>
                    Giá <span class="highlight">Siêu Hời</span>
                </h1>
                <p class="hero-description">
                    Khám phá bộ sưu tập smartphone, laptop, tablet và phụ kiện công nghệ mới nhất
                    với giá tốt nhất thị trường. Freeship toàn quốc, bảo hành chính hãng.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="hero-btn hero-btn-primary">
                        Mua Ngay
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>
                    <a href="#" class="hero-btn hero-btn-secondary">
                        Xem Sản Phẩm
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <svg width="500" height="400" viewBox="0 0 500 400" fill="none">
                    <rect x="100" y="50" width="300" height="300" rx="30" fill="white" opacity="0.2"/>
                    <rect x="130" y="80" width="240" height="240" rx="20" fill="white" opacity="0.3"/>
                    <circle cx="250" cy="200" r="80" fill="white" opacity="0.5"/>
                    <path d="M220 200L240 220L280 180" stroke="white" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Danh Mục</span>
            <h2 class="section-title">Khám Phá Sản Phẩm</h2>
            <p class="section-description">Tìm kiếm công nghệ phù hợp với nhu cầu của bạn</p>
        </div>
        <div class="categories-grid">
            <a href="#smartphones" class="category-card">
                <span class="category-icon">📱</span>
                <h3 class="category-name">Smartphone</h3>
                <p class="category-count">{{ $categoryCounts['Smartphone'] ?? 0 }} sản phẩm</p>
            </a>
            <a href="#laptops" class="category-card">
                <span class="category-icon">💻</span>
                <h3 class="category-name">Laptop</h3>
                <p class="category-count">{{ $categoryCounts['Laptop'] ?? 0 }} sản phẩm</p>
            </a>
            <a href="#tablets" class="category-card">
                <span class="category-icon">📲</span>
                <h3 class="category-name">Tablet</h3>
                <p class="category-count">{{ $categoryCounts['Tablet'] ?? 0 }} sản phẩm</p>
            </a>
            <a href="#computers" class="category-card">
                <span class="category-icon">🖥️</span>
                <h3 class="category-name">Computer</h3>
                <p class="category-count">{{ $categoryCounts['Computer'] ?? 0 }} sản phẩm</p>
            </a>
            <a href="#accessories" class="category-card">
                <span class="category-icon">🎧</span>
                <h3 class="category-name">Phụ kiện</h3>
                <p class="category-count">{{ $categoryCounts['Accessory'] ?? 0 }} sản phẩm</p>
            </a>
            <a href="#accessories" class="category-card">
                <span class="category-icon">📦</span>
                <h3 class="category-name">Khác</h3>
                <p class="category-count">{{ $categoryCounts['Other'] ?? 0 }} sản phẩm</p>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Sản Phẩm</span>
            <h2 class="section-title">Sản Phẩm Nổi Bật</h2>
            <p class="section-description">Những sản phẩm được yêu thích nhất</p>
        </div>
        <div class="products-grid">
            @forelse($featuredProducts as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @empty
                <p style="text-align: center; padding: 3rem; color: #64748b; grid-column: 1 / -1;">
                    Chưa có sản phẩm nổi bật
                </p>
            @endforelse
        </div>
    </div>
</section>

<!-- Smartphones Section -->
@if($smartphones->count() > 0)
<section class="featured-section" id="smartphones" style="background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📱 Smartphone</span>
            <h2 class="section-title">Điện Thoại Thông Minh</h2>
            <p class="section-description">Các mẫu smartphone mới nhất</p>
        </div>
        <div class="products-grid">
            @foreach($smartphones as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Laptops Section -->
@if($laptops->count() > 0)
<section class="featured-section" id="laptops">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">💻 Laptop</span>
            <h2 class="section-title">Laptop & Máy Tính Xách Tay</h2>
            <p class="section-description">Laptop cho mọi nhu cầu làm việc và giải trí</p>
        </div>
        <div class="products-grid">
            @foreach($laptops as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Tablets Section -->
@if($tablets->count() > 0)
<section class="featured-section" id="tablets" style="background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">📲 Tablet</span>
            <h2 class="section-title">Máy Tính Bảng</h2>
            <p class="section-description">Tablet tiện lợi cho học tập và giải trí</p>
        </div>
        <div class="products-grid">
            @foreach($tablets as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Computers Section -->
@if($computers->count() > 0)
<section class="featured-section" id="computers">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">🖥️ Computer</span>
            <h2 class="section-title">PC & Máy Tính Để Bàn</h2>
            <p class="section-description">Máy tính bàn hiệu năng cao</p>
        </div>
        <div class="products-grid">
            @foreach($computers as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Accessories Section -->
@if($accessories->count() > 0)
<section class="featured-section" id="accessories" style="background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">🎧 Phụ Kiện</span>
            <h2 class="section-title">Phụ Kiện Công Nghệ</h2>
            <p class="section-description">Phụ kiện chất lượng cao cho thiết bị của bạn</p>
        </div>
        <div class="products-grid">
            @foreach($accessories as $product)
                @include('Customers.Components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Flash Deals Section -->
<section class="deals-section">
    <div class="container">
        <div class="deals-content">
            <div class="deals-header">
                <span class="section-badge">🔥 Flash Sale</span>
                <h2 class="section-title" style="color: white;">Giờ Vàng Giá Sốc</h2>
                <p class="section-description" style="color: rgba(255,255,255,0.8);">Nhanh tay chốt đơn trước khi hết giờ!</p>
                <div class="deals-timer">
                    <div class="timer-box">
                        <span class="timer-value">12</span>
                        <span class="timer-label">Giờ</span>
                    </div>
                    <div class="timer-box">
                        <span class="timer-value">34</span>
                        <span class="timer-label">Phút</span>
                    </div>
                    <div class="timer-box">
                        <span class="timer-value">56</span>
                        <span class="timer-label">Giây</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Thương Hiệu</span>
            <h2 class="section-title">Đối Tác Chính Hãng</h2>
            <p class="section-description">Cam kết 100% sản phẩm chính hãng</p>
        </div>
        <div class="brands-slider">
            @forelse($brands as $brand)
                @php
                    $brandName = strtolower($brand->name);
                    $logoUrl = "https://logo.clearbit.com/{$brandName}.com";
                @endphp
                <img src="{{ $logoUrl }}"
                     alt="{{ $brand->name }}"
                     class="brand-logo"
                     onerror="this.src='https://via.placeholder.com/120x60?text={{ urlencode($brand->name) }}'">
            @empty
                <img src="https://logo.clearbit.com/apple.com" alt="Apple" class="brand-logo">
                <img src="https://logo.clearbit.com/samsung.com" alt="Samsung" class="brand-logo">
                <img src="https://logo.clearbit.com/dell.com" alt="Dell" class="brand-logo">
                <img src="https://logo.clearbit.com/hp.com" alt="HP" class="brand-logo">
                <img src="https://logo.clearbit.com/lenovo.com" alt="Lenovo" class="brand-logo">
                <img src="https://logo.clearbit.com/asus.com" alt="Asus" class="brand-logo">
                <img src="https://logo.clearbit.com/sony.com" alt="Sony" class="brand-logo">
                <img src="https://logo.clearbit.com/xiaomi.com" alt="Xiaomi" class="brand-logo">
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Countdown Timer
    function updateTimer() {
        const timerBoxes = document.querySelectorAll('.timer-box');
        if (timerBoxes.length === 0) return;

        setInterval(() => {
            const hours = parseInt(timerBoxes[0].querySelector('.timer-value').textContent);
            let minutes = parseInt(timerBoxes[1].querySelector('.timer-value').textContent);
            let seconds = parseInt(timerBoxes[2].querySelector('.timer-value').textContent);

            seconds--;
            if (seconds < 0) {
                seconds = 59;
                minutes--;
                if (minutes < 0) {
                    minutes = 59;
                }
            }

            timerBoxes[1].querySelector('.timer-value').textContent = minutes.toString().padStart(2, '0');
            timerBoxes[2].querySelector('.timer-value').textContent = seconds.toString().padStart(2, '0');
        }, 1000);
    }

    updateTimer();

    // Add to Cart
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
        });
    });

    // Wishlist
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const svg = this.querySelector('svg');
            if (svg.querySelector('path').getAttribute('d').includes('M20.84')) {
                alert('Đã thêm vào danh sách yêu thích!');
            }
        });
    });
</script>
@endpush

