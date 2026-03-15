<!-- Product Card Component -->
<a href="<?php echo e(route('product.detail', $product->slug)); ?>" class="product-card-link">
<div class="product-card">
    <div class="product-image-wrapper">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
            <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="product-image">
        <?php else: ?>
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=400&fit=crop" alt="<?php echo e($product->name); ?>" class="product-image">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="product-badges">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->is_featured): ?>
                <span class="product-badge badge-hot">🔥 Hot</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price && $product->sale_price < $product->price): ?>
                <?php
                    $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                ?>
                <span class="product-badge badge-sale">-<?php echo e($discount); ?>%</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->brand): ?>
            <div class="product-brand"><?php echo e($product->brand->name); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <h3 class="product-name" title="<?php echo e($product->name); ?>"><?php echo e(Str::limit($product->name, 50)); ?></h3>

        <div class="product-rating">
            <?php
                $rating = $product->rating ?? 5;
                $fullStars = floor($rating);
                $halfStar = ($rating - $fullStars) >= 0.5;
            ?>
            <div class="stars">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $fullStars; $i++): ?>★<?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($halfStar): ?>☆<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < (5 - $fullStars - ($halfStar ? 1 : 0)); $i++): ?>☆<?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="rating-count">(<?php echo e($product->sales_count ?? 0); ?>)</span>
        </div>

        <div class="product-price">
            <?php
                // Nếu có colors, dùng giá cao nhất
                $hasColors = $product->colors && count($product->colors) > 0;
                if ($hasColors) {
                    $colorPrices = collect($product->colors);
                    $cardPrice = $colorPrices->max('price');
                    $cardSalePrice = $colorPrices->max('sale_price');
                } else {
                    $cardPrice = $product->price;
                    $cardSalePrice = $product->sale_price;
                }
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cardSalePrice && $cardSalePrice < $cardPrice): ?>
                <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 0.5rem;">
                    <span class="price-current"><?php echo e(number_format($cardSalePrice, 0, ',', '.')); ?>₫</span>
                    <span class="price-original"><?php echo e(number_format($cardPrice, 0, ',', '.')); ?>₫</span>
                </div>
                <?php
                    $discount = round((($cardPrice - $cardSalePrice) / $cardPrice) * 100);
                ?>
                <span class="price-discount" style="margin-top: 0.25rem; display: inline-block;">-<?php echo e($discount); ?>%</span>
            <?php else: ?>
                <span class="price-current"><?php echo e(number_format($cardPrice, 0, ',', '.')); ?>₫</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <div class="product-footer">
        <?php
            $cardStock = ($product->colors && count($product->colors) > 0)
                ? collect($product->colors)->sum('stock')
                : $product->stock_quantity;
        ?>
        <div class="stock-status">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cardStock > 0): ?>
                <span class="stock-dot"></span>
                Còn hàng
            <?php else: ?>
                <span class="stock-dot" style="background: #ef4444;"></span>
                <span style="color: #ef4444;">Hết hàng</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <button class="add-to-cart-btn" <?php echo e($cardStock <= 0 ? 'disabled' : ''); ?> onclick="event.preventDefault(); event.stopPropagation(); addToCartFromCard('<?php echo e($product->_id); ?>')">
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
<?php /**PATH /home/flashtm/FlashTechMongo/resources/views/Customers/Components/product-card.blade.php ENDPATH**/ ?>