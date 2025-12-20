@extends('Admins.app')
@section('title', 'Products')
@section('content')

<div class="products-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <div class="header-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                PRODUCTS
            </div>
            <h1>Quản lý sản phẩm</h1>
            <p>Danh sách các sản phẩm hiện có trong hệ thống</p>
        </div>
        <div class="header-right">
            <button class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('products.create') }}'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Thêm sản phẩm mới
            </button>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('products.index') }}" class="search-filter-section">
        <div class="search-box">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm sản phẩm..." class="search-input">
        </div>
        <div class="filter-group">
            <select name="brand_id" class="filter-select" onchange="this.form.submit()">
                <option value="">🏷️ Tất cả thương hiệu</option>
                @foreach($brands ?? [] as $brand)
                <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
                @endforeach
            </select>
            <select name="category" class="filter-select" onchange="this.form.submit()">
                <option value="">📋 Tất cả danh mục</option>
                <option value="Smartphone" {{ request('category') == 'Smartphone' ? 'selected' : '' }}>📱 Smartphone</option>
                <option value="Tablet" {{ request('category') == 'Tablet' ? 'selected' : '' }}>📲 Tablet</option>
                <option value="Laptop" {{ request('category') == 'Laptop' ? 'selected' : '' }}>💻 Laptop</option>
                <option value="Computer" {{ request('category') == 'Computer' ? 'selected' : '' }}>🖥️ Computer</option>
                <option value="Accessory" {{ request('category') == 'Accessory' ? 'selected' : '' }}>🎧 Accessory</option>
                <option value="Component" {{ request('category') == 'Component' ? 'selected' : '' }}>🛠️ Component</option>
                <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>📦 Other</option>
            </select>
            <select name="status" class="filter-select" onchange="this.form.submit()">
                <option value="">📊 Trạng thái</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Tạm dừng</option>
            </select>
            <select name="sort" class="filter-select" onchange="this.form.submit()">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>⏰ Mới nhất</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>⏰ Cũ nhất</option>
                <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>🔤 Tên A-Z</option>
                <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>🔤 Tên Z-A</option>
                <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>💰 Giá thấp → cao</option>
                <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>💰 Giá cao → thấp</option>
            </select>
            @if(request()->hasAny(['search', 'brand_id', 'status', 'sort']))
            <a href="{{ route('products.index') }}" class="btn-reset" title="Xóa bộ lọc">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </a>
            @endif
        </div>
    </form>

    <!-- Products Grid -->
    <div class="products-grid">
        @forelse($products ?? [] as $product)
        <div class="product-card" data-product-slug="{{ $product->slug }}">
            <!-- Featured Badge -->
            @if($product->is_featured)
            <div class="featured-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                Nổi bật
            </div>
            @endif

            <!-- Sale Badge -->
            @if($product->sale_price && $product->sale_price < $product->price)
            <div class="sale-badge">-{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%</div>
            @endif

            <!-- Product Image -->
            <div class="product-image">
                @if($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                <div class="image-placeholder">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <div class="product-brand">{{ $product->brand->name ?? 'N/A' }}</div>
                <h3 class="product-name">{{ $product->name }}</h3>

                <div class="product-meta">
                    <div class="meta-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        {{ $product->views_count ?? 0 }} lượt xem
                    </div>
                    <div class="meta-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        {{ $product->sales_count ?? 0 }} đã bán
                    </div>
                </div>

                <div class="product-price">
                    @if($product->sale_price && $product->sale_price < $product->price)
                    <span class="price-sale">{{ number_format($product->sale_price, 0, ',', '.') }}₫</span>
                    <span class="price-original">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                    @else
                    <span class="price-current">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                    @endif
                </div>

                <div class="product-stock">
                    <span class="stock-badge {{ $product->stock_quantity > 10 ? 'stock-high' : ($product->stock_quantity > 0 ? 'stock-low' : 'stock-out') }}">
                        <span class="stock-dot"></span>
                        @if($product->stock_quantity > 10)
                            Còn hàng ({{ $product->stock_quantity }})
                        @elseif($product->stock_quantity > 0)
                            Sắp hết ({{ $product->stock_quantity }})
                        @else
                            Hết hàng
                        @endif
                    </span>
                </div>

                <div class="product-status">
                    <span class="status-badge {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                        {{ $product->is_active ? 'Hoạt động' : 'Tạm dừng' }}
                    </span>
                </div>
            </div>

            <!-- Product Actions -->
            <div class="product-actions">
                <a href="{{ route('products.edit', $product->slug) }}" class="btn-action btn-edit" title="Chỉnh sửa">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </a>
                <button class="btn-action btn-delete" onclick="deleteProduct('{{ $product->slug }}', '{{ $product->name }}')" title="Xóa">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <svg class="empty-icon" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h3>Chưa có sản phẩm nào</h3>
            <p>Bắt đầu bằng cách thêm sản phẩm đầu tiên của bạn</p>
            <button class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('products.create') }}'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tạo sản phẩm đầu tiên
            </button>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
    <div class="pagination-wrapper">
        {{ $products->links() }}
    </div>
    @endif
</div>

<style>
    :root {
        --primary: #667eea;
        --primary-dark: #764ba2;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
        --gray-100: #f8fafc;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-600: #475569;
        --gray-700: #334155;
        --gray-900: #1e293b;
    }

    [data-theme="dark"] {
        --gray-100: #0f172a;
        --gray-200: #1e293b;
        --gray-300: #334155;
        --gray-600: #cbd5e1;
        --gray-700: #e2e8f0;
        --gray-900: #f1f5f9;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .products-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Header Section */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 3rem;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .header-left {
        flex: 1;
        min-width: 300px;
    }

    .header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 0.75rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        animation: badgePop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes badgePop {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .header-left h1 {
        font-size: 2.75rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .header-left p {
        color: var(--gray-600);
        font-size: 1.125rem;
        font-weight: 500;
        opacity: 0.9;
    }

    .header-right {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .btn-lg {
        padding: 1rem 2rem;
        font-size: 1.0625rem;
        border-radius: 0.875rem;
    }

    .btn {
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    }

    /* Search and Filter */
    .search-filter-section {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .search-box {
        flex: 1;
        min-width: 280px;
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        padding: 1rem 1.25rem 1rem 3.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        font-size: 1rem;
        background-color: white;
        color: var(--gray-900);
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .filter-group {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .filter-select {
        padding: 1rem 2.5rem 1rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        background-color: white;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        appearance: none;
        color: var(--gray-900);
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .btn-reset {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
        border-radius: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.15);
    }

    .btn-reset:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.25);
    }

    /* Products Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .product-card {
        background: white;
        border-radius: 1.25rem;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        animation: cardFadeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) backwards;
    }

    @keyframes cardFadeIn {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .product-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
    }

    /* Badges */
    .featured-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
    }

    .sale-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 800;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    /* Product Image */
    .product-image {
        width: 100%;
        height: 240px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .image-placeholder {
        color: var(--gray-300);
    }

    /* Product Info */
    .product-info {
        padding: 1.5rem;
    }

    .product-brand {
        color: var(--primary);
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .product-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 1rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 3em;
    }

    .product-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.8125rem;
        color: var(--gray-600);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .product-price {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .price-current,
    .price-sale {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .price-original {
        font-size: 1rem;
        color: var(--gray-600);
        text-decoration: line-through;
    }

    .product-stock {
        margin-bottom: 1rem;
    }

    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .stock-high {
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        color: #166534;
    }

    .stock-low {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
    }

    .stock-out {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
    }

    .stock-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: currentColor;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .product-status {
        margin-bottom: 1rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .status-active {
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        color: #166534;
    }

    .status-inactive {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
    }

    /* Product Actions */
    .product-actions {
        display: flex;
        gap: 0.75rem;
        padding: 0 1.5rem 1.5rem;
    }

    .btn-action {
        flex: 1;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 0.75rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-edit {
        background: linear-gradient(135deg, #e0e7ff 0%, #ddd6fe 100%);
        color: #4f46e5;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
    }

    .btn-delete {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.25);
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        padding: 5rem 2rem;
        text-align: center;
    }

    .empty-icon {
        color: var(--gray-300);
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 1.625rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .empty-state p {
        color: var(--gray-600);
        font-size: 1.0625rem;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .products-page {
            padding: 1rem;
        }

        .page-header {
            flex-direction: column;
            margin-bottom: 2rem;
        }

        .header-left h1 {
            font-size: 2rem;
        }

        .search-filter-section {
            flex-direction: column;
        }

        .filter-group {
            width: 100%;
        }

        .filter-select {
            flex: 1;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }
    }
</style>

<script>
    function deleteProduct(productSlug, productName) {
        fetch(`/products/${productSlug}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok || response.redirected || response.status === 302 || response.status === 303) {
                const card = document.querySelector(`.product-card[data-product-slug="${productSlug}"]`);
                if (card) {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.8)';
                    setTimeout(() => card.remove(), 300);
                }

                const successMsg = document.createElement('div');
                successMsg.textContent = `✓ Đã xóa sản phẩm "${productName}"`;
                successMsg.style.cssText = 'position:fixed;top:20px;right:20px;background:linear-gradient(135deg,#10b981,#059669);color:white;padding:1rem 1.5rem;border-radius:0.75rem;box-shadow:0 10px 25px rgba(16,185,129,0.3);z-index:9999;';
                document.body.appendChild(successMsg);
                setTimeout(() => successMsg.remove(), 3000);
            } else {
                throw new Error('Failed to delete');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Đã xảy ra lỗi khi xóa sản phẩm.');
        });
    }
</script>

@endsection
