<!-- Product Card Component -->
<div class="group relative bg-white rounded-3xl border border-slate-100 hover:border-indigo-100 p-3 sm:p-4 hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-300 flex flex-col h-full hover:-translate-y-1">
    <!-- Image Wrapper -->
    <div class="relative aspect-[4/5] bg-slate-50 rounded-2xl overflow-hidden mb-4 flex items-center justify-center">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
            <?php $imgUrl = Str::startsWith($product->image, 'http') ? $product->image : asset($product->image); ?>
            <img src="<?php echo e($imgUrl); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=500&h=600';" alt="<?php echo e(Str::limit($product->name, 50)); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <?php else: ?>
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=500&h=600" alt="<?php echo e(Str::limit($product->name, 50)); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Badges -->
        <div class="absolute top-2 left-2 flex flex-col gap-1.5 items-start">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->is_featured): ?>
                <span class="bg-gradient-to-r from-rose-500 to-red-500 text-white text-[0.65rem] font-bold px-2 py-0.5 rounded-full shadow-sm">🔥 HOT</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price && $product->sale_price < $product->price): ?>
                <?php $discount = round((($product->price - $product->sale_price) / $product->price) * 100); ?>
                <span class="bg-gradient-to-r from-amber-500 to-orange-500 text-white text-[0.65rem] font-bold px-2 py-0.5 rounded-full shadow-sm">-<?php echo e($discount); ?>%</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Quick Actions (Hover) -->
        <div class="absolute top-2 right-2 flex flex-col gap-2 opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 transition-all duration-300 z-20">
            <button onclick="event.preventDefault(); event.stopPropagation(); addToComparisonList('<?php echo e((string)$product->_id); ?>')" class="w-8 h-8 md:w-9 md:h-9 bg-white/90 backdrop-blur-md rounded-full flex items-center justify-center text-slate-600 hover:text-indigo-600 hover:bg-white shadow-sm hover:shadow-md transition-all z-20 tooltip tooltip-left" data-tip="So sánh">
                <svg class="w-4 h-4 md:w-4.5 md:h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l-2 2m8-2l2 2m-2-2v13M5 19h14"/></svg>
            </button>
            <button onclick="event.preventDefault(); event.stopPropagation(); location.href='<?php echo e(route('wishlist.index')); ?>'" class="w-8 h-8 md:w-9 md:h-9 bg-white/90 backdrop-blur-md rounded-full flex items-center justify-center text-slate-600 hover:text-pink-600 hover:bg-white shadow-sm hover:shadow-md transition-all z-20 tooltip tooltip-left" data-tip="Yêu thích">
                <svg class="w-4 h-4 md:w-4.5 md:h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </button>
        </div>
    </div>

    <!-- Product Info -->
    <div class="flex flex-col flex-1 relative px-1">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->brand): ?>
            <div class="text-[0.7rem] font-bold text-indigo-500 uppercase tracking-wider mb-1 relative z-20"><?php echo e($product->brand->name); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <h3 class="font-bold text-slate-800 text-sm leading-tight mb-2 line-clamp-2 min-h-[2.5rem] group-hover:text-indigo-600 transition-colors">
            <a href="<?php echo e(route('product.detail', $product->slug)); ?>" class="after:absolute after:inset-0 after:z-10 focus:outline-none">
                <?php echo e($product->name); ?>

            </a>
        </h3>

        <!-- Rating -->
        <div class="flex items-center gap-1.5 mb-3">
            <?php
                $rating = $product->rating ?? 5;
                $fullStars = floor($rating);
                $halfStar = ($rating - $fullStars) >= 0.5;
            ?>
            <div class="flex text-amber-400 text-xs">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $fullStars; $i++): ?>
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($halfStar): ?>
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M10 2l2.39 5.378L19 8l-5.06 4.354L15.35 18 10 14.86 4.65 18l1.41-5.646L1 8l6.61-.622L10 2z" opacity="0.5"/></svg>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < (5 - $fullStars - ($halfStar ? 1 : 0)); $i++): ?>
                    <svg class="w-3.5 h-3.5 text-slate-200 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <span class="text-[0.65rem] font-bold text-slate-400">(<?php echo e($product->sales_count ?? 0); ?>)</span>
        </div>

        <div class="mt-auto">
            <!-- Price -->
            <div class="mb-3 flex flex-col justify-end min-h-[2.5rem]">
                <?php
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
                    <span class="text-[0.7rem] text-slate-400 line-through font-semibold"><?php echo e(number_format($cardPrice, 0, ',', '.')); ?>₫</span>
                    <span class="text-[1.1rem] font-black text-rose-500 leading-none mt-0.5"><?php echo e(number_format($cardSalePrice, 0, ',', '.')); ?>₫</span>
                <?php else: ?>
                    <span class="text-[1.1rem] font-black text-slate-800 leading-none"><?php echo e(number_format($cardPrice, 0, ',', '.')); ?>₫</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Footer Actions -->
            <?php
                $cardStock = ($hasColors) ? collect($product->colors)->sum('stock') : $product->stock_quantity;
            ?>
            <div class="flex items-center justify-between mt-1 border-t border-slate-100 pt-3">
                <div class="flex items-center gap-1.5 text-[0.7rem] font-bold <?php echo e($cardStock > 0 ? 'text-emerald-500' : 'text-rose-500'); ?>">
                    <span class="w-1.5 h-1.5 rounded-full <?php echo e($cardStock > 0 ? 'bg-emerald-500 animate-pulse' : 'bg-rose-500'); ?>"></span>
                    <?php echo e($cardStock > 0 ? 'Còn hàng' : 'Hết hàng'); ?>

                </div>
                <!-- Prevent button from triggering the outer anchor tag -->
                <button <?php echo e($cardStock <= 0 ? 'disabled' : ''); ?> onclick="event.preventDefault(); event.stopPropagation(); addToCartFromCard('<?php echo e($product->_id); ?>')" class="w-8 h-8 rounded-full flex items-center justify-center transition-all z-20 relative group/btn <?php echo e($cardStock > 0 ? 'bg-slate-100 text-slate-700 hover:bg-indigo-600 hover:text-white hover:shadow-lg hover:shadow-indigo-500/30 hover:-translate-y-0.5' : 'bg-slate-50 text-slate-300 cursor-not-allowed'); ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Components/product-card.blade.php ENDPATH**/ ?>