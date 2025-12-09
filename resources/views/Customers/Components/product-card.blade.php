<!-- Product Card Component -->
<a href="{{ route('product.detail', $product->slug) }}" class="product-card-link">
<div class="product-card">
    <div class="product-image-wrapper">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        @else
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=400&fit=crop" alt="{{ $product->name }}" class="product-image">
        @endif

        <div class="product-badges">
            @if($product->is_featured)
                <span class="product-badge badge-hot">🔥 Hot</span>
            @endif
            @if($product->sale_price && $product->sale_price < $product->price)
                @php
                    $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                @endphp
                <span class="product-badge badge-sale">-{{ $discount }}%</span>
            @endif
        </div>

        <div class="product-actions">
            <button class="action-btn" title="Thêm vào yêu thích" onclick="event.preventDefault(); event.stopPropagation();">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </button>
            <button class="action-btn" title="Xem nhanh" onclick="event.preventDefault(); event.stopPropagation();">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            </button>
        </div>
    </div>

    <div class="product-info">
        @if($product->brand)
            <div class="product-brand">{{ $product->brand->name }}</div>
        @endif
        <h3 class="product-name" title="{{ $product->name }}">{{ Str::limit($product->name, 50) }}</h3>

        <div class="product-rating">
            @php
                $rating = $product->rating ?? 5;
                $fullStars = floor($rating);
                $halfStar = ($rating - $fullStars) >= 0.5;
            @endphp
            <div class="stars">
                @for($i = 0; $i < $fullStars; $i++)★@endfor
                @if($halfStar)☆@endif
                @for($i = 0; $i < (5 - $fullStars - ($halfStar ? 1 : 0)); $i++)☆@endfor
            </div>
            <span class="rating-count">({{ $product->sales_count ?? 0 }})</span>
        </div>

        <div class="product-price">
            @if($product->sale_price && $product->sale_price < $product->price)
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 0.5rem;">
                    <span class="price-current">{{ number_format($product->sale_price, 0, ',', '.') }}₫</span>
                    <span class="price-original">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                </div>
                @php
                    $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                @endphp
                <span class="price-discount" style="margin-top: 0.25rem; display: inline-block;">-{{ $discount }}%</span>
            @else
                <span class="price-current">{{ number_format($product->price, 0, ',', '.') }}₫</span>
            @endif
        </div>
    </div>

    <div class="product-footer">
        <div class="stock-status">
            @if($product->stock_quantity > 0)
                <span class="stock-dot"></span>
                Còn hàng
            @else
                <span class="stock-dot" style="background: #ef4444;"></span>
                <span style="color: #ef4444;">Hết hàng</span>
            @endif
        </div>
        <button class="add-to-cart-btn" {{ $product->stock_quantity <= 0 ? 'disabled' : '' }} onclick="event.preventDefault(); event.stopPropagation();">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            Thêm
        </button>
    </div>
</div>
</a>
