@extends('Customers.Layouts.master')

@section('title', $product->name . ' - FlashTech')

@push('styles')
<style>
    :root {
        --primary: #667eea;
        --primary-dark: #5a67d8;
        --secondary: #764ba2;
        --accent: #f093fb;
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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .product-detail-page {
        background: var(--gray-50);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Breadcrumb */
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        color: var(--gray-500);
        flex-wrap: wrap;
    }

    .breadcrumb a {
        color: var(--gray-600);
        text-decoration: none;
        transition: color 0.2s;
    }

    .breadcrumb a:hover {
        color: var(--primary);
    }

    .breadcrumb span {
        color: var(--gray-400);
    }

    .breadcrumb .current {
        color: var(--dark);
        font-weight: 500;
    }

    /* Main Layout */
    .product-detail-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    /* Gallery Section */
    .product-gallery {
        position: sticky;
        top: 100px;
        align-self: start;
    }

    .main-image-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        background: var(--gray-100);
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .main-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
        cursor: zoom-in;
    }

    .main-image:hover {
        transform: scale(1.05);
    }

    .image-badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .badge {
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .badge-hot {
        background: linear-gradient(135deg, #ff512f, #f09819);
        color: var(--white);
    }

    .badge-sale {
        background: var(--danger);
        color: var(--white);
    }

    .badge-new {
        background: var(--success);
        color: var(--white);
    }

    .thumbnail-list {
        display: flex;
        gap: 0.75rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }

    .thumbnail-item {
        flex-shrink: 0;
        width: 80px;
        height: 80px;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.2s ease;
        background: var(--gray-100);
    }

    .thumbnail-item:hover,
    .thumbnail-item.active {
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .thumbnail-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Product Info Section */
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .product-brand {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.875rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--white);
        border-radius: 20px;
        font-size: 0.8125rem;
        font-weight: 600;
        width: fit-content;
    }

    .product-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.3;
    }

    .product-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .rating-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stars {
        display: flex;
        gap: 2px;
        color: #fbbf24;
        font-size: 1.125rem;
    }

    .rating-text {
        font-size: 0.875rem;
        color: var(--gray-600);
    }

    .meta-divider {
        width: 1px;
        height: 20px;
        background: var(--gray-300);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.875rem;
        color: var(--gray-600);
    }

    .meta-item svg {
        width: 16px;
        height: 16px;
    }

    /* Price Section */
    .price-section {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        padding: 1.5rem;
        border-radius: 16px;
        border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .price-row {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .price-current {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .price-original {
        font-size: 1.25rem;
        color: var(--gray-400);
        text-decoration: line-through;
    }

    .discount-badge {
        padding: 0.375rem 0.75rem;
        background: var(--danger);
        color: var(--white);
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 700;
    }

    .price-note {
        margin-top: 0.75rem;
        font-size: 0.8125rem;
        color: var(--gray-500);
    }

    /* Color Selection */
    .option-section {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .option-label {
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--dark);
    }

    .color-options {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .color-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1rem;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: var(--white);
    }

    .color-option:hover,
    .color-option.active {
        border-color: var(--primary);
        background: rgba(102, 126, 234, 0.05);
    }

    .color-dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid var(--gray-200);
    }

    .color-name {
        font-size: 0.875rem;
        color: var(--dark);
    }

    /* Quantity */
    .quantity-wrapper {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        overflow: hidden;
    }

    .qty-btn {
        width: 44px;
        height: 44px;
        background: var(--gray-100);
        border: none;
        cursor: pointer;
        font-size: 1.25rem;
        color: var(--dark);
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-btn:hover:not(:disabled) {
        background: var(--primary);
        color: var(--white);
    }

    .qty-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .qty-input {
        width: 60px;
        height: 44px;
        border: none;
        text-align: center;
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        background: var(--white);
    }

    .qty-input:focus {
        outline: none;
    }

    .stock-info {
        font-size: 0.875rem;
        color: var(--gray-500);
    }

    .stock-info.in-stock {
        color: var(--success);
    }

    .stock-info.low-stock {
        color: var(--warning);
    }

    .stock-info.out-of-stock {
        color: var(--danger);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
    }

    .btn {
        flex: 1;
        padding: 1rem 1.5rem;
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
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: var(--white);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    .btn-secondary {
        background: var(--white);
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-secondary:hover {
        background: rgba(102, 126, 234, 0.1);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn svg {
        width: 20px;
        height: 20px;
    }

    /* Features */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: 12px;
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        flex-shrink: 0;
    }

    .feature-icon svg {
        width: 20px;
        height: 20px;
    }

    .feature-text {
        font-size: 0.8125rem;
        color: var(--gray-600);
        line-height: 1.4;
    }

    .feature-text strong {
        display: block;
        color: var(--dark);
        font-weight: 600;
    }

    /* Tabs Section */
    .product-tabs-section {
        margin-top: 3rem;
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .tabs-header {
        display: flex;
        border-bottom: 2px solid var(--gray-200);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    .tab-btn {
        padding: 1rem 1.5rem;
        background: none;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-500);
        cursor: pointer;
        position: relative;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .tab-btn:hover {
        color: var(--primary);
    }

    .tab-btn.active {
        color: var(--primary);
    }

    .tab-btn.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Description Tab */
    .product-description {
        color: var(--gray-700);
        line-height: 1.8;
        font-size: 1rem;
    }

    .product-description h3 {
        color: var(--dark);
        margin: 1.5rem 0 1rem;
        font-size: 1.25rem;
    }

    .product-description ul {
        padding-left: 1.5rem;
        margin: 1rem 0;
    }

    .product-description li {
        margin-bottom: 0.5rem;
    }

    /* Specifications Tab */
    .specs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .specs-table tr:nth-child(even) {
        background: var(--gray-50);
    }

    .specs-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .specs-table td:first-child {
        font-weight: 600;
        color: var(--dark);
        width: 35%;
    }

    .specs-table td:last-child {
        color: var(--gray-700);
    }

    .specs-group-title {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        padding: 0.75rem 1.25rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.5px;
    }

    /* Reviews Tab */
    .reviews-summary {
        display: flex;
        gap: 3rem;
        padding: 2rem;
        background: var(--gray-50);
        border-radius: 16px;
        margin-bottom: 2rem;
    }

    .rating-big {
        text-align: center;
    }

    .rating-number {
        font-size: 4rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
    }

    .rating-stars {
        font-size: 1.5rem;
        color: #fbbf24;
        margin: 0.5rem 0;
    }

    .rating-count {
        color: var(--gray-500);
        font-size: 0.875rem;
    }

    .rating-bars {
        flex: 1;
    }

    .rating-bar-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .rating-bar-label {
        font-size: 0.875rem;
        color: var(--gray-600);
        width: 60px;
    }

    .rating-bar {
        flex: 1;
        height: 8px;
        background: var(--gray-200);
        border-radius: 4px;
        overflow: hidden;
    }

    .rating-bar-fill {
        height: 100%;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 4px;
    }

    .rating-bar-count {
        font-size: 0.8125rem;
        color: var(--gray-500);
        width: 40px;
        text-align: right;
    }

    .review-item {
        padding: 1.5rem 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .review-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.75rem;
    }

    .reviewer-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
        background: var(--gray-200);
    }

    .reviewer-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .reviewer-info {
        flex: 1;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--dark);
    }

    .review-date {
        font-size: 0.8125rem;
        color: var(--gray-500);
    }

    .review-stars {
        color: #fbbf24;
    }

    .review-content {
        color: var(--gray-700);
        line-height: 1.6;
    }

    .no-reviews {
        text-align: center;
        padding: 3rem;
        color: var(--gray-500);
    }

    .no-reviews svg {
        width: 64px;
        height: 64px;
        color: var(--gray-300);
        margin-bottom: 1rem;
    }

    /* Related Products */
    .related-products-section {
        margin-top: 3rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--dark);
    }

    .view-all-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        transition: gap 0.2s;
    }

    .view-all-link:hover {
        gap: 0.625rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .product-detail-wrapper {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .product-gallery {
            position: static;
        }

        .products-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .product-detail-wrapper {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.5rem;
        }

        .price-current {
            font-size: 1.5rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }

        .reviews-summary {
            flex-direction: column;
            gap: 1.5rem;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .product-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .meta-divider {
            display: none;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .thumbnail-item {
            width: 60px;
            height: 60px;
        }
    }
</style>
@endpush

@section('content')
<div class="product-detail-page">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span>›</span>
            <a href="#">{{ $product->category }}</a>
            <span>›</span>
            @if($product->brand)
                <a href="#">{{ $product->brand->name }}</a>
                <span>›</span>
            @endif
            <span class="current">{{ Str::limit($product->name, 40) }}</span>
        </nav>

        <!-- Main Product Detail -->
        <div class="product-detail-wrapper">
            <!-- Gallery -->
            <div class="product-gallery">
                <div class="main-image-wrapper">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="main-image" id="mainImage">
                    @else
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&h=600&fit=crop" alt="{{ $product->name }}" class="main-image" id="mainImage">
                    @endif

                    <div class="image-badges">
                        @if($product->is_featured)
                            <span class="badge badge-hot">🔥 Hot</span>
                        @endif
                        @if($product->sale_price && $product->sale_price < $product->price)
                            @php
                                $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                            @endphp
                            <span class="badge badge-sale">-{{ $discount }}%</span>
                        @endif
                    </div>
                </div>

                <!-- Thumbnails -->
                @if($product->images && count($product->images) > 0)
                <div class="thumbnail-list">
                    <div class="thumbnail-item active" onclick="changeImage('{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&h=600&fit=crop' }}', this)">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Thumbnail">
                        @else
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop" alt="Thumbnail">
                        @endif
                    </div>
                    @foreach($product->images as $image)
                        <div class="thumbnail-item" onclick="changeImage('{{ asset('storage/' . $image) }}', this)">
                            <img src="{{ asset('storage/' . $image) }}" alt="Thumbnail">
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="product-info">
                @if($product->brand)
                    <span class="product-brand">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                        {{ $product->brand->name }}
                    </span>
                @endif

                <h1 class="product-title">{{ $product->name }}</h1>

                <div class="product-meta">
                    <div class="rating-wrapper">
                        <div class="stars">
                            @php
                                $rating = $product->rating ?? 5;
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5;
                            @endphp
                            @for($i = 0; $i < $fullStars; $i++)★@endfor
                            @if($halfStar)☆@endif
                            @for($i = 0; $i < (5 - $fullStars - ($halfStar ? 1 : 0)); $i++)☆@endfor
                        </div>
                        <span class="rating-text">{{ number_format($rating, 1) }} ({{ $product->sales_count ?? 0 }} đánh giá)</span>
                    </div>

                    <div class="meta-divider"></div>

                    <div class="meta-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        {{ number_format($product->views_count ?? 0) }} lượt xem
                    </div>

                    <div class="meta-divider"></div>

                    <div class="meta-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        {{ number_format($product->sales_count ?? 0) }} đã bán
                    </div>
                </div>

                <!-- Price -->
                <div class="price-section">
                    <div class="price-row">
                        @if($product->sale_price && $product->sale_price < $product->price)
                            <span class="price-current">{{ number_format($product->sale_price, 0, ',', '.') }}₫</span>
                            <span class="price-original">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            <span class="discount-badge">-{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%</span>
                        @else
                            <span class="price-current">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                        @endif
                    </div>
                    <p class="price-note">Giá đã bao gồm VAT. Miễn phí vận chuyển cho đơn hàng từ 500.000₫</p>
                </div>

                <!-- Color Selection -->
                @if($product->color)
                <div class="option-section">
                    <label class="option-label">Màu sắc:</label>
                    <div class="color-options">
                        <div class="color-option active">
                            <span class="color-dot" style="background: {{ $product->color == 'Đen' ? '#1a1a1a' : ($product->color == 'Trắng' ? '#ffffff' : ($product->color == 'Xanh' ? '#3b82f6' : ($product->color == 'Đỏ' ? '#ef4444' : ($product->color == 'Vàng' ? '#fbbf24' : '#9ca3af')))) }};"></span>
                            <span class="color-name">{{ $product->color }}</span>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Quantity -->
                <div class="option-section">
                    <label class="option-label">Số lượng:</label>
                    <div class="quantity-wrapper">
                        <div class="quantity-selector">
                            <button class="qty-btn" onclick="decreaseQty()" id="decreaseBtn">−</button>
                            <input type="number" class="qty-input" value="1" min="1" max="{{ $product->stock_quantity }}" id="qtyInput" onchange="validateQty()">
                            <button class="qty-btn" onclick="increaseQty()" id="increaseBtn">+</button>
                        </div>
                        @if($product->stock_quantity > 10)
                            <span class="stock-info in-stock">✓ Còn {{ $product->stock_quantity }} sản phẩm</span>
                        @elseif($product->stock_quantity > 0)
                            <span class="stock-info low-stock">⚠ Chỉ còn {{ $product->stock_quantity }} sản phẩm</span>
                        @else
                            <span class="stock-info out-of-stock">✕ Hết hàng</span>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary" {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Thêm vào giỏ hàng
                    </button>
                    <button class="btn btn-secondary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        Yêu thích
                    </button>
                </div>

                <!-- Features -->
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Giao hàng nhanh</strong>
                            Nhận hàng trong 2-4 ngày
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Bảo hành chính hãng</strong>
                            12 tháng tại trung tâm
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Đổi trả miễn phí</strong>
                            Trong vòng 7 ngày
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Sản phẩm chính hãng</strong>
                            100% nguyên seal
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="product-tabs-section">
            <div class="tabs-header">
                <button class="tab-btn active" onclick="switchTab('description')">Mô tả sản phẩm</button>
                <button class="tab-btn" onclick="switchTab('specifications')">Thông số kỹ thuật</button>
                <button class="tab-btn" onclick="switchTab('reviews')">Đánh giá ({{ $product->sales_count ?? 0 }})</button>
            </div>

            <!-- Description Tab -->
            <div class="tab-content active" id="tab-description">
                <div class="product-description">
                    @if($product->description)
                        {!! nl2br(e($product->description)) !!}
                    @else
                        <p>{{ $product->name }} là sản phẩm công nghệ cao cấp đến từ thương hiệu {{ $product->brand->name ?? 'uy tín' }}.</p>

                        <h3>Điểm nổi bật</h3>
                        <ul>
                            <li>Thiết kế sang trọng, hiện đại</li>
                            <li>Hiệu năng mạnh mẽ, đáp ứng mọi nhu cầu</li>
                            <li>Chất lượng hình ảnh/âm thanh xuất sắc</li>
                            <li>Thời lượng pin ấn tượng</li>
                            <li>Bảo hành chính hãng 12 tháng</li>
                        </ul>

                        <h3>Trong hộp bao gồm</h3>
                        <ul>
                            <li>1 x {{ $product->name }}</li>
                            <li>1 x Sạc và cáp kết nối</li>
                            <li>1 x Sách hướng dẫn sử dụng</li>
                            <li>1 x Phiếu bảo hành</li>
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Specifications Tab -->
            <div class="tab-content" id="tab-specifications">
                @if($specifications && count($specifications) > 0)
                    <table class="specs-table">
                        @php
                            $currentGroup = '';
                        @endphp
                        @foreach($specifications as $spec)
                            <tr>
                                <td>{{ $spec->label ?? $spec->key }}</td>
                                <td>{{ $spec->value }}{{ $spec->unit ? ' ' . $spec->unit : '' }}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <table class="specs-table">
                        <tr class="specs-group-title">
                            <td colspan="2">Thông tin chung</td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Thương hiệu</td>
                            <td>{{ $product->brand->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Danh mục</td>
                            <td>{{ $product->category }}</td>
                        </tr>
                        @if($product->color)
                        <tr>
                            <td>Màu sắc</td>
                            <td>{{ $product->color }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Mã SKU</td>
                            <td>{{ $product->sku ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Tình trạng</td>
                            <td>{{ $product->stock_quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</td>
                        </tr>
                    </table>
                @endif
            </div>

            <!-- Reviews Tab -->
            <div class="tab-content" id="tab-reviews">
                <div class="reviews-summary">
                    <div class="rating-big">
                        <div class="rating-number">{{ number_format($product->rating ?? 5, 1) }}</div>
                        <div class="rating-stars">★★★★★</div>
                        <div class="rating-count">{{ $product->sales_count ?? 0 }} đánh giá</div>
                    </div>
                    <div class="rating-bars">
                        @for($i = 5; $i >= 1; $i--)
                            <div class="rating-bar-item">
                                <span class="rating-bar-label">{{ $i }} sao</span>
                                <div class="rating-bar">
                                    <div class="rating-bar-fill" style="width: {{ $i == 5 ? '70' : ($i == 4 ? '20' : ($i == 3 ? '7' : ($i == 2 ? '2' : '1'))) }}%;"></div>
                                </div>
                                <span class="rating-bar-count">{{ $i == 5 ? '70' : ($i == 4 ? '20' : ($i == 3 ? '7' : ($i == 2 ? '2' : '1'))) }}%</span>
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="no-reviews">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                    <p>Hãy là người đầu tiên đánh giá!</p>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts && count($relatedProducts) > 0)
        <section class="related-products-section">
            <div class="section-header">
                <h2 class="section-title">Sản phẩm liên quan</h2>
                <a href="#" class="view-all-link">
                    Xem tất cả
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
            <div class="products-grid">
                @foreach($relatedProducts as $relatedProduct)
                    @include('Customers.Components.product-card', ['product' => $relatedProduct])
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Change main image
    function changeImage(src, element) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail-item').forEach(item => item.classList.remove('active'));
        element.classList.add('active');
    }

    // Quantity functions
    const maxQty = {{ $product->stock_quantity }};

    function decreaseQty() {
        const input = document.getElementById('qtyInput');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
        updateBtns();
    }

    function increaseQty() {
        const input = document.getElementById('qtyInput');
        if (parseInt(input.value) < maxQty) {
            input.value = parseInt(input.value) + 1;
        }
        updateBtns();
    }

    function validateQty() {
        const input = document.getElementById('qtyInput');
        let val = parseInt(input.value);
        if (isNaN(val) || val < 1) val = 1;
        if (val > maxQty) val = maxQty;
        input.value = val;
        updateBtns();
    }

    function updateBtns() {
        const input = document.getElementById('qtyInput');
        document.getElementById('decreaseBtn').disabled = parseInt(input.value) <= 1;
        document.getElementById('increaseBtn').disabled = parseInt(input.value) >= maxQty;
    }

    // Tab switching
    function switchTab(tabName) {
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Update tab content
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
        document.getElementById('tab-' + tabName).classList.add('active');
    }

    // Initialize
    updateBtns();
</script>
@endpush
