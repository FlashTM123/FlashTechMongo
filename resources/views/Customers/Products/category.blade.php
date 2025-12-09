@extends('Customers.Layouts.master')

@section('title', $categoryInfo['name'] . ' - FlashTech')

@section('content')
<div class="category-page">
    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Trang chủ
                </a>
                <span class="breadcrumb-separator">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </span>
                <span class="breadcrumb-current">{{ $categoryInfo['name'] }}</span>
            </nav>
        </div>
    </div>

    <!-- Category Header -->
    <div class="category-header">
        <div class="container">
            <div class="category-header-content">
                <div class="category-icon">
                    @switch($categoryInfo['slug'])
                        @case('smartphone')
                            📱
                            @break
                        @case('laptop')
                            💻
                            @break
                        @case('tablet')
                            📲
                            @break
                        @case('computer')
                            🖥️
                            @break
                        @case('accessory')
                            🎧
                            @break
                        @default
                            📦
                    @endswitch
                </div>
                <div class="category-info">
                    <h1 class="category-title">{{ $categoryInfo['name'] }}</h1>
                    <p class="category-count">{{ $categoryInfo['count'] }} sản phẩm</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="category-content">
            <!-- Sidebar Filters -->
            <aside class="filter-sidebar">
                <form action="{{ route('products.category', $categoryInfo['slug']) }}" method="GET" id="filterForm">
                    <!-- Search -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                            Tìm kiếm
                        </h3>
                        <div class="filter-content">
                            <input type="text" name="search" class="filter-search-input" placeholder="Tìm sản phẩm..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Brand Filter -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                            Thương hiệu
                        </h3>
                        <div class="filter-content">
                            <div class="brand-list">
                                <label class="brand-item">
                                    <input type="radio" name="brand" value="" {{ !request('brand') ? 'checked' : '' }}>
                                    <span class="brand-name">Tất cả thương hiệu</span>
                                </label>
                                @foreach($brands as $brand)
                                <label class="brand-item">
                                    <input type="radio" name="brand" value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'checked' : '' }}>
                                    <span class="brand-name">{{ $brand->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            Khoảng giá
                        </h3>
                        <div class="filter-content">
                            <div class="price-range">
                                <div class="price-input-group">
                                    <label>Từ</label>
                                    <input type="number" name="min_price" class="price-input" placeholder="0" value="{{ request('min_price') }}">
                                    <span class="currency">₫</span>
                                </div>
                                <div class="price-separator">-</div>
                                <div class="price-input-group">
                                    <label>Đến</label>
                                    <input type="number" name="max_price" class="price-input" placeholder="50,000,000" value="{{ request('max_price') }}">
                                    <span class="currency">₫</span>
                                </div>
                            </div>
                            <div class="price-presets">
                                <button type="button" class="price-preset" data-min="0" data-max="5000000">Dưới 5 triệu</button>
                                <button type="button" class="price-preset" data-min="5000000" data-max="10000000">5 - 10 triệu</button>
                                <button type="button" class="price-preset" data-min="10000000" data-max="20000000">10 - 20 triệu</button>
                                <button type="button" class="price-preset" data-min="20000000" data-max="50000000">20 - 50 triệu</button>
                                <button type="button" class="price-preset" data-min="50000000" data-max="">Trên 50 triệu</button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Actions -->
                    <div class="filter-actions">
                        <button type="submit" class="btn-filter-apply">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            Áp dụng
                        </button>
                        <a href="{{ route('products.category', $categoryInfo['slug']) }}" class="btn-filter-reset">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                <path d="M3 3v5h5"></path>
                            </svg>
                            Đặt lại
                        </a>
                    </div>
                </form>
            </aside>

            <!-- Products Grid -->
            <main class="products-main">
                <!-- Toolbar -->
                <div class="products-toolbar">
                    <div class="toolbar-left">
                        <span class="result-count">
                            Hiển thị <strong>{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong>
                            trong <strong>{{ $products->total() }}</strong> sản phẩm
                        </span>
                    </div>
                    <div class="toolbar-right">
                        <div class="sort-group">
                            <label for="sortSelect">Sắp xếp:</label>
                            <select name="sort" id="sortSelect" class="sort-select" onchange="updateSort(this.value)">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Phổ biến nhất</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp → Cao</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao → Thấp</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên: A → Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z → A</option>
                            </select>
                        </div>
                        <div class="view-modes">
                            <button class="view-mode active" data-view="grid" title="Dạng lưới">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </button>
                            <button class="view-mode" data-view="list" title="Dạng danh sách">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="8" y1="6" x2="21" y2="6"></line>
                                    <line x1="8" y1="12" x2="21" y2="12"></line>
                                    <line x1="8" y1="18" x2="21" y2="18"></line>
                                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                <div class="products-grid" id="productsGrid">
                    @foreach($products as $product)
                        @include('Customers.Components.product-card', ['product' => $product])
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $products->links('Customers.Components.pagination') }}
                </div>
                @else
                <div class="no-products">
                    <div class="no-products-icon">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                            <path d="M8 8l6 6"></path>
                            <path d="M14 8l-6 6"></path>
                        </svg>
                    </div>
                    <h3>Không tìm thấy sản phẩm</h3>
                    <p>Thử thay đổi bộ lọc hoặc từ khóa tìm kiếm</p>
                    <a href="{{ route('products.category', $categoryInfo['slug']) }}" class="btn-back-all">
                        Xem tất cả {{ $categoryInfo['name'] }}
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>
</div>

<style>
/* Category Page Styles */
.category-page {
    background: var(--gray-50);
    min-height: 100vh;
    padding-bottom: 4rem;
}

/* Product Card Styles */
.product-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.product-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
    border-color: var(--primary);
}

.product-image-wrapper {
    position: relative;
    padding-top: 75%;
    background: var(--gray-100);
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

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
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
    stroke: var(--gray-800);
}

.product-info {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.product-brand {
    font-size: 0.875rem;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.product-name {
    font-size: 1rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 0.75rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.4;
    min-height: 2.8rem;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.stars {
    color: #fbbf24;
    font-size: 0.875rem;
}

.rating-count {
    font-size: 0.8125rem;
    color: var(--gray-500);
}

.product-price {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    margin-top: auto;
}

.price-current {
    font-size: 1.375rem;
    font-weight: 800;
    color: #ef4444;
}

.price-original {
    font-size: 0.9375rem;
    color: var(--gray-400);
    text-decoration: line-through;
}

.price-discount {
    padding: 0.25rem 0.5rem;
    background: #fee2e2;
    color: #ef4444;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 700;
}

.product-footer {
    padding: 0 1.5rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 0.75rem;
}

.stock-status {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: #10b981;
    font-weight: 600;
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
    background: linear-gradient(135deg, var(--primary), var(--secondary));
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
    box-shadow: none;
}

/* Breadcrumb */
.breadcrumb-section {
    background: white;
    padding: 1rem 0;
    border-bottom: 1px solid var(--gray-200);
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.breadcrumb-link {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    color: var(--gray-600);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-link:hover {
    color: var(--primary);
}

.breadcrumb-separator {
    color: var(--gray-400);
}

.breadcrumb-current {
    color: var(--gray-800);
    font-weight: 600;
}

/* Category Header */
.category-header {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    padding: 2.5rem 0;
    margin-bottom: 2rem;
}

.category-header-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    backdrop-filter: blur(10px);
}

.category-title {
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.25rem;
}

.category-count {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1rem;
}

/* Category Content Layout */
.category-content {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 2rem;
}

/* Filter Sidebar */
.filter-sidebar {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    height: fit-content;
    position: sticky;
    top: 100px;
    box-shadow: var(--shadow-sm);
}

.filter-group {
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--gray-200);
}

.filter-group:last-of-type {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.filter-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 1rem;
}

.filter-title svg {
    color: var(--primary);
}

.filter-content {
    padding-left: 0.25rem;
}

.filter-search-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray-300);
    border-radius: 8px;
    font-size: 0.875rem;
    transition: all 0.2s;
}

.filter-search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Brand List */
.brand-list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    max-height: 250px;
    overflow-y: auto;
}

.brand-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s;
}

.brand-item:hover {
    background: var(--gray-100);
}

.brand-item input[type="radio"] {
    width: 18px;
    height: 18px;
    accent-color: var(--primary);
}

.brand-name {
    font-size: 0.875rem;
    color: var(--gray-700);
}

/* Price Range */
.price-range {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.price-input-group {
    flex: 1;
}

.price-input-group label {
    display: block;
    font-size: 0.75rem;
    color: var(--gray-500);
    margin-bottom: 0.25rem;
}

.price-input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid var(--gray-300);
    border-radius: 6px;
    font-size: 0.8125rem;
}

.price-input:focus {
    outline: none;
    border-color: var(--primary);
}

.price-separator {
    color: var(--gray-400);
    padding-top: 1rem;
}

.currency {
    font-size: 0.75rem;
    color: var(--gray-500);
}

.price-presets {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.price-preset {
    padding: 0.375rem 0.75rem;
    background: var(--gray-100);
    border: 1px solid var(--gray-200);
    border-radius: 20px;
    font-size: 0.75rem;
    color: var(--gray-700);
    cursor: pointer;
    transition: all 0.2s;
}

.price-preset:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

/* Filter Actions */
.filter-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: 1.5rem;
}

.btn-filter-apply {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-filter-apply:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-filter-reset {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    background: var(--gray-100);
    color: var(--gray-700);
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-filter-reset:hover {
    background: var(--gray-200);
}

/* Products Main */
.products-main {
    min-width: 0;
}

/* Products Toolbar */
.products-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-sm);
}

.result-count {
    font-size: 0.875rem;
    color: var(--gray-600);
}

.result-count strong {
    color: var(--gray-800);
}

.toolbar-right {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.sort-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sort-group label {
    font-size: 0.875rem;
    color: var(--gray-600);
}

.sort-select {
    padding: 0.5rem 2rem 0.5rem 0.75rem;
    border: 1px solid var(--gray-300);
    border-radius: 8px;
    font-size: 0.875rem;
    background: white;
    cursor: pointer;
}

.sort-select:focus {
    outline: none;
    border-color: var(--primary);
}

.view-modes {
    display: flex;
    gap: 0.25rem;
    background: var(--gray-100);
    padding: 0.25rem;
    border-radius: 8px;
}

.view-mode {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    border-radius: 6px;
    color: var(--gray-500);
    cursor: pointer;
    transition: all 0.2s;
}

.view-mode:hover {
    color: var(--gray-700);
}

.view-mode.active {
    background: white;
    color: var(--primary);
    box-shadow: var(--shadow-sm);
}

/* Products Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.5rem;
}

.products-grid.list-view {
    grid-template-columns: 1fr;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

/* No Products */
.no-products {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow-sm);
}

.no-products-icon {
    color: var(--gray-300);
    margin-bottom: 1.5rem;
}

.no-products h3 {
    font-size: 1.25rem;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
}

.no-products p {
    color: var(--gray-500);
    margin-bottom: 1.5rem;
}

.btn-back-all {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--primary);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.2s;
}

.btn-back-all:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1024px) {
    .category-content {
        grid-template-columns: 1fr;
    }

    .filter-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .category-header-content {
        flex-direction: column;
        text-align: center;
    }

    .category-title {
        font-size: 1.5rem;
    }

    .products-toolbar {
        flex-direction: column;
        gap: 1rem;
    }

    .toolbar-right {
        width: 100%;
        justify-content: space-between;
    }

    .products-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .products-grid {
        grid-template-columns: 1fr;
    }

    .price-range {
        flex-direction: column;
    }

    .price-separator {
        display: none;
    }
}
</style>

<script>
// Update sort
function updateSort(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', value);
    window.location.href = url.toString();
}

// Price presets
document.querySelectorAll('.price-preset').forEach(btn => {
    btn.addEventListener('click', function() {
        const min = this.dataset.min;
        const max = this.dataset.max;

        document.querySelector('input[name="min_price"]').value = min;
        document.querySelector('input[name="max_price"]').value = max;
    });
});

// View mode toggle
document.querySelectorAll('.view-mode').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.view-mode').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const view = this.dataset.view;
        const grid = document.getElementById('productsGrid');

        if (view === 'list') {
            grid.classList.add('list-view');
        } else {
            grid.classList.remove('list-view');
        }
    });
});
</script>
@endsection
