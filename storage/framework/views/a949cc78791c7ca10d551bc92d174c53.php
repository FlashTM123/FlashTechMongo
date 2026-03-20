<?php $__env->startSection('title', $product->name . ' - FlashTech Premium'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 absolute top-0 inset-x-0 z-0 bg-gradient-to-r from-slate-900 via-indigo-900 to-purple-900">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-30 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-indigo-100 mb-6 bg-white/10 backdrop-blur-md w-fit px-4 py-2 rounded-full border border-white/20">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Trang chủ</a>
            <span class="text-indigo-300">/</span>
            <a href="<?php echo e(route('products.category', strtolower($product->category))); ?>" class="hover:text-white transition-colors"><?php echo e($product->category); ?></a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->brand): ?>
                <span class="text-indigo-300">/</span>
                <a href="#" class="hover:text-white transition-colors"><?php echo e($product->brand->name); ?></a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <span class="text-indigo-300">/</span>
            <span class="text-white font-semibold truncate max-w-[150px] sm:max-w-[300px]"><?php echo e($product->name); ?></span>
        </nav>

        <!-- Main Product Card -->
        <div class="bg-white rounded-[2rem] shadow-2xl shadow-indigo-500/10 border border-slate-100 p-4 sm:p-8 lg:p-10 mb-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16">
                <!-- Gallery Section -->
                <div class="flex flex-col gap-4 sticky top-24 h-fit">
                    <div class="relative aspect-square bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 flex items-center justify-center group">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
                            <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" id="mainImage" class="w-full h-full object-contain p-8 group-hover:scale-110 transition-transform duration-500 cursor-zoom-in">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop" alt="<?php echo e($product->name); ?>" id="mainImage" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->is_featured): ?>
                                <span class="bg-gradient-to-r from-rose-500 to-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg border border-white/20">🔥 HOT</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price && $product->sale_price < $product->price): ?>
                                <?php $discount = round((($product->price - $product->sale_price) / $product->price) * 100); ?>
                                <span class="bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg border border-white/20">-<?php echo e($discount); ?>%</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->images && count($product->images) > 0): ?>
                        <div class="flex gap-3 overflow-x-auto pb-2 custom-scrollbar thumbnail-list">
                            <button onclick="changeImage('<?php echo e($product->image ?? ''); ?>', this)" class="thumbnail-item flex-shrink-0 w-20 h-20 rounded-2xl bg-slate-50 border-2 border-indigo-600 overflow-hidden relative active">
                                <img src="<?php echo e($product->image ?? ''); ?>" class="w-full h-full object-cover" alt="Thumb">
                            </button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <button onclick="changeImage('<?php echo e($image); ?>', this)" class="thumbnail-item flex-shrink-0 w-20 h-20 rounded-2xl bg-slate-50 border-2 border-transparent hover:border-indigo-300 overflow-hidden relative transition-all">
                                    <img src="<?php echo e($image); ?>" class="w-full h-full object-cover" alt="Thumb">
                                </button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Product Info Section -->
                <div class="flex flex-col">
                    <div class="mb-6 border-b border-slate-100 pb-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->brand): ?>
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-bold tracking-wider uppercase mb-4 border border-indigo-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <?php echo e($product->brand->name); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight mb-4"><?php echo e($product->name); ?></h1>
                        
                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-sm">
                            <div class="flex items-center gap-1.5">
                                <?php
                                    $totalReviews = isset($reviews) ? $reviews->count() : ($product->review_count ?? 0);
                                    $rating = $totalReviews > 0 ? (isset($reviews) ? $reviews->avg('rating') : $product->average_rating) : 0;
                                    $fullStars = floor($rating);
                                    $halfStar = $rating - $fullStars >= 0.5;
                                ?>
                                <div class="flex text-amber-400">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $fullStars; $i++): ?>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($halfStar): ?>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 2l2.39 5.378L19 8l-5.06 4.354L15.35 18 10 14.86 4.65 18l1.41-5.646L1 8l6.61-.622L10 2z" opacity="0.5"/></svg>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 5 - $fullStars - ($halfStar ? 1 : 0); $i++): ?>
                                        <svg class="w-4 h-4 text-slate-200 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <span class="font-bold text-slate-700"><?php echo e(number_format($rating, 1)); ?></span>
                                <a href="#tab-reviews" class="text-slate-500 hover:text-indigo-600 transition-colors" onclick="switchTab(document.getElementById('btn-review'), 'reviews')">(<?php echo e($totalReviews); ?> đánh giá)</a>
                            </div>
                            <div class="h-4 w-px bg-slate-200 hidden sm:block"></div>
                            <div class="flex items-center gap-1.5 text-slate-500 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <?php echo e(number_format($product->views_count ?? 0)); ?> lượt xem
                            </div>
                            <div class="h-4 w-px bg-slate-200 hidden sm:block"></div>
                            <div class="flex items-center gap-1.5 text-emerald-600 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <?php echo e(number_format($product->sales_count ?? 0)); ?> đã bán
                            </div>
                        </div>
                    </div>

                    <!-- Price Block -->
                    <div class="bg-gradient-to-r from-indigo-50 via-purple-50 to-white p-6 rounded-3xl border border-indigo-100 flex flex-col mb-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->colors && count($product->colors) > 0): ?>
                            <?php
                                $firstColor = $product->colors[0];
                                $displayPrice = $firstColor['price'];
                                $displaySalePrice = $firstColor['sale_price'] ?? null;
                            ?>
                            <div class="flex flex-wrap items-end gap-3 sm:gap-4 h-12">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($displaySalePrice && $displaySalePrice < $displayPrice): ?>
                                    <span class="text-3xl sm:text-4xl font-black text-rose-500 leading-none tracking-tight" id="colorPrice"><?php echo e(number_format($displaySalePrice, 0, ',', '.')); ?>₫</span>
                                    <span class="text-lg sm:text-xl text-slate-400 line-through font-semibold leading-tight" id="colorOriginalPrice"><?php echo e(number_format($displayPrice, 0, ',', '.')); ?>₫</span>
                                    <span class="bg-rose-100 text-rose-600 text-sm font-bold px-2 py-0.5 rounded-lg border border-rose-200" id="colorDiscount">-<?php echo e(round((($displayPrice - $displaySalePrice) / $displayPrice) * 100)); ?>%</span>
                                <?php else: ?>
                                    <span class="text-3xl sm:text-4xl font-black text-slate-900 leading-none tracking-tight" id="colorPrice"><?php echo e(number_format($displayPrice, 0, ',', '.')); ?>₫</span>
                                    <span class="hidden" id="colorOriginalPrice"></span><span class="hidden" id="colorDiscount"></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="flex flex-wrap items-end gap-3 sm:gap-4 h-12">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->sale_price && $product->sale_price < $product->price): ?>
                                    <span class="text-3xl sm:text-4xl font-black text-rose-500 leading-none tracking-tight"><?php echo e(number_format($product->sale_price, 0, ',', '.')); ?>₫</span>
                                    <span class="text-lg sm:text-xl text-slate-400 line-through font-semibold leading-tight"><?php echo e(number_format($product->price, 0, ',', '.')); ?>₫</span>
                                    <span class="bg-rose-100 text-rose-600 text-sm font-bold px-2 py-0.5 rounded-lg border border-rose-200">-<?php echo e(round((($product->price - $product->sale_price) / $product->price) * 100)); ?>%</span>
                                <?php else: ?>
                                    <span class="text-3xl sm:text-4xl font-black text-slate-900 leading-none tracking-tight"><?php echo e(number_format($product->price, 0, ',', '.')); ?>₫</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <p class="text-[0.8rem] text-slate-500 mt-3 font-medium flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Giá đã bao gồm VAT. Miễn phí vận chuyển toàn quốc.</p>
                    </div>

                    <!-- Variations -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->colors && count($product->colors) > 0): ?>
                        <div class="mb-6">
                            <h3 class="text-sm font-bold text-slate-900 mb-3 uppercase tracking-wider flex items-center gap-2">Chọn phiên bản màu sắc</h3>
                            <div class="flex flex-wrap gap-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $colorItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <?php
                                        $colorImages = $colorItem['images'] ?? [];
                                        $bgMap = ['Đen'=>'#1a1a1a','Trắng'=>'#ffffff','Xanh'=>'#3b82f6','Xanh Đậm'=>'#1e3a8a','Đỏ'=>'#ef4444','Vàng'=>'#fbbf24','Cam'=>'#f97316','Bạc'=>'#e5e7eb','Tím'=>'#a855f7','Hồng'=>'#ec4899'];
                                        $bgDot = $bgMap[$colorItem['color']] ?? '#9ca3af';
                                    ?>
                                    <button type="button" class="color-option group relative flex items-center gap-3 p-2 pr-4 border-2 rounded-2xl transition-all duration-200 <?php echo e($index === 0 ? 'border-indigo-600 bg-indigo-50/50 shadow-md shadow-indigo-500/10 active' : 'border-slate-200 bg-white hover:border-indigo-300 hover:bg-slate-50'); ?>"
                                            onclick="selectColor(this, <?php echo e($index); ?>)"
                                            data-price="<?php echo e($colorItem['price']); ?>"
                                            data-sale-price="<?php echo e($colorItem['sale_price'] ?? ''); ?>"
                                            data-stock="<?php echo e($colorItem['stock'] ?? 0); ?>"
                                            data-images='<?php echo json_encode($colorImages, 15, 512) ?>'>
                                        
                                        <!-- Radio Icon (Visible when active) -->
                                        <div class="absolute -top-2 -right-2 w-5 h-5 bg-indigo-600 text-white rounded-full items-center justify-center opacity-0 scale-50 transition-all duration-200 check-icon hidden">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        </div>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($colorImages)): ?>
                                            <img src="<?php echo e($colorImages[0]); ?>" alt="<?php echo e($colorItem['color']); ?>" class="w-10 h-10 object-cover rounded-xl border border-slate-100 shadow-sm transition-transform group-hover:scale-105">
                                        <?php else: ?>
                                            <span class="w-10 h-10 rounded-xl border border-slate-200 shadow-inner flex shrink-0 transition-transform group-hover:scale-105" style="background: <?php echo e($bgDot); ?>;"></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="flex flex-col items-start text-left">
                                            <span class="font-bold text-sm text-slate-800 color-name leading-tight"><?php echo e($colorItem['color']); ?></span>
                                            <span class="text-[0.7rem] font-medium text-slate-500 mt-0.5">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($colorItem['sale_price']) && $colorItem['sale_price'] < $colorItem['price']): ?>
                                                    <?php echo e(number_format($colorItem['sale_price'], 0, ',', '.')); ?>₫
                                                <?php else: ?>
                                                    <?php echo e(number_format($colorItem['price'], 0, ',', '.')); ?>₫
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </span>
                                        </div>
                                    </button>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!-- Purchase Actions -->
                    <div class="flex flex-col sm:flex-row items-end sm:items-stretch gap-4 mb-8 border-t border-slate-100 pt-8 mt-auto">
                        <!-- Quantity -->
                        <div class="flex flex-col w-full sm:w-auto shrink-0">
                            <label class="text-xs font-bold text-slate-500 mb-2 uppercase tracking-wide">Số lượng</label>
                            <div class="flex items-center bg-slate-100 rounded-2xl border border-slate-200 p-1">
                                <button type="button" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-600 font-bold hover:bg-slate-50 hover:text-indigo-600 transition-colors shadow-sm disabled:opacity-50" onclick="decreaseQty()" id="decreaseBtn">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                                </button>
                                <input type="number" class="w-12 h-10 bg-transparent text-center font-bold text-slate-900 appearance-none focus:outline-none" value="1" min="1" id="qtyInput" onchange="validateQty()">
                                <button type="button" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-600 font-bold hover:bg-slate-50 hover:text-indigo-600 transition-colors shadow-sm disabled:opacity-50" onclick="increaseQty()" id="increaseBtn">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <button class="flex-1 flex w-full items-center justify-center gap-2 bg-slate-900 border-2 border-slate-900 text-white font-bold rounded-2xl px-6 py-3.5 hover:bg-indigo-600 hover:border-indigo-600 hover:shadow-xl hover:shadow-indigo-500/30 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed group" id="addToCartBtn" onclick="addToCart()">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
                            Thêm vào giỏ
                        </button>
                        
                        <!-- Wishlist -->
                        <?php
                            $isInWishlist = false;
                            if (auth('customer')->check()) {
                                $wishlist = auth('customer')->user()->wishlist ?? [];
                                $isInWishlist = in_array($product->_id, $wishlist);
                            }
                        ?>
                        <button class="w-full sm:w-14 h-14 shrink-0 flex items-center justify-center rounded-2xl border-2 transition-all duration-300 <?php echo e($isInWishlist ? 'border-pink-500 bg-pink-50 text-pink-500 shadow-md shadow-pink-500/20' : 'border-slate-200 bg-white text-slate-400 hover:border-pink-300 hover:text-pink-500 hover:bg-pink-50'); ?>" id="wishlistBtn" onclick="toggleWishlist()">
                            <svg class="w-6 h-6 transition-transform <?php echo e($isInWishlist ? 'scale-110' : ''); ?>" fill="<?php echo e($isInWishlist ? 'currentColor' : 'none'); ?>" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Stock Status -->
                    <div class="flex items-center gap-1.5 text-sm font-semibold" id="stockInfo">
                        <?php $displayStock = ($product->colors && count($product->colors) > 0) ? ($product->colors[0]['stock'] ?? 0) : $product->stock_quantity; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($displayStock > 10): ?>
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-emerald-600">Còn hàng (<?php echo e($displayStock); ?> sẵn có)</span>
                        <?php elseif($displayStock > 0): ?>
                            <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            <span class="text-amber-600">Sắp hết (Chỉ còn <?php echo e($displayStock); ?>)</span>
                        <?php else: ?>
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            <span class="text-rose-600">Tạm hết hàng</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Features Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12 pt-10 border-t border-slate-100">
                <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Giao hàng siêu tốc</h4>
                    <p class="text-xs text-slate-500">Nhận hàng trong 2-4 giờ tại HN/HCM</p>
                </div>
                <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Bảo hành 12 tháng</h4>
                    <p class="text-xs text-slate-500">Tại các trung tâm ủy quyền</p>
                </div>
                <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Đổi trả 1 đổi 1</h4>
                    <p class="text-xs text-slate-500">Miễn phí nếu có lỗi NSX (30 ngày)</p>
                </div>
                <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Trả góp 0%</h4>
                    <p class="text-xs text-slate-500">Lãi suất, trả trước chỉ từ 0đ</p>
                </div>
            </div>
        </div>

        <!-- Detail Tabs -->
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-16">
            <div class="flex overflow-x-auto border-b border-slate-100 custom-scrollbar bg-slate-50/50">
                <button class="tab-btn px-8 py-5 text-sm font-bold text-indigo-600 border-b-2 border-indigo-600 whitespace-nowrap bg-white" onclick="switchTab(this, 'description')">Mô tả sản phẩm</button>
                <button class="tab-btn px-8 py-5 text-sm font-bold text-slate-500 border-b-2 border-transparent hover:text-slate-800 hover:bg-white transition-all whitespace-nowrap" onclick="switchTab(this, 'specifications')">Thông số kỹ thuật</button>
                <button class="tab-btn px-8 py-5 text-sm font-bold text-slate-500 border-b-2 border-transparent hover:text-slate-800 hover:bg-white transition-all whitespace-nowrap" id="btn-review" onclick="switchTab(this, 'reviews')">Đánh giá (<?php echo e($reviews->count() ?? 0); ?>)</button>
            </div>
            <div class="p-6 md:p-10">
                <!-- Description -->
                <div id="tab-description" class="custom-tab-pane block prose prose-indigo max-w-none text-slate-600">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->description): ?>
                        <?php echo nl2br(e($product->description)); ?>

                    <?php else: ?>
                        <p class="text-lg"><?php echo e($product->name); ?> là tuyệt tác công nghệ cao cấp mới nhất từ <?php echo e($product->brand->name ?? 'thương hiệu uy tín'); ?>, mang đến phong cách thiết kế đẳng cấp và trải nghiệm đột phá.</p>
                        <h3 class="text-slate-900">Điểm nổi bật</h3>
                        <ul class="list-disc pl-5 marker:text-indigo-500 space-y-2">
                            <li>Thiết kế nguyên khối sang trọng, viền siêu mỏng tỉ mỉ.</li>
                            <li>Hiệu năng vượt trội, bộ vi xử lý thế hệ mới đáp ứng mượt mà cả tác vụ nặng nhất.</li>
                            <li>Đắm chìm trong không gian giải trí với màn hình rực rỡ và âm thanh vòm đỉnh cao.</li>
                            <li>Trải nghiệm trọn vẹn suốt ngày dài nhờ thời lượng pin tối ưu và công nghệ sạc cực nhanh.</li>
                        </ul>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Specs -->
                <div id="tab-specifications" class="custom-tab-pane hidden">
                    <div class="max-w-3xl border border-slate-200 rounded-2xl overflow-hidden">
                        <table class="w-full text-left text-sm text-slate-600">
                            <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($specifications && count($specifications) > 0): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <tr class="<?php echo e($index % 2 === 0 ? 'bg-slate-50' : 'bg-white'); ?> border-b border-slate-100 last:border-0 hover:bg-indigo-50/50 transition-colors">
                                        <th class="py-4 px-6 font-bold text-slate-800 w-1/3"><?php echo e($spec->label ?? $spec->key); ?></th>
                                        <td class="py-4 px-6"><?php echo e($spec->value); ?><?php echo e($spec->unit ? ' ' . $spec->unit : ''); ?></td>
                                    </tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <?php else: ?>
                                <tr class="bg-indigo-50 border-b border-indigo-100"><th colspan="2" class="py-3 px-6 font-bold text-indigo-800 uppercase tracking-widest text-xs">Thông tin chung</th></tr>
                                <tr class="border-b border-slate-100 hover:bg-slate-50"><th class="py-4 px-6 font-bold text-slate-800 w-1/3">Tên sản phẩm</th><td class="py-4 px-6"><?php echo e($product->name); ?></td></tr>
                                <tr class="border-b border-slate-100 bg-slate-50"><th class="py-4 px-6 font-bold text-slate-800 w-1/3">Thương hiệu</th><td class="py-4 px-6"><?php echo e($product->brand->name ?? 'N/A'); ?></td></tr>
                                <tr class="border-b border-slate-100 hover:bg-slate-50"><th class="py-4 px-6 font-bold text-slate-800 w-1/3">Danh mục</th><td class="py-4 px-6"><?php echo e($product->category); ?></td></tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->color): ?>
                                    <tr class="border-b border-slate-100 bg-slate-50"><th class="py-4 px-6 font-bold text-slate-800 w-1/3">Màu sắc</th><td class="py-4 px-6"><?php echo e($product->color); ?></td></tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <tr class="hover:bg-slate-50"><th class="py-4 px-6 font-bold text-slate-800 w-1/3">SKU</th><td class="py-4 px-6 font-mono text-xs bg-slate-100 px-2 py-1 rounded"><?php echo e($product->sku ?? 'N/A'); ?></td></tr>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Reviews -->
                <div id="tab-reviews" class="custom-tab-pane hidden">
                    <?php
                        $totalReviews = $reviews->count();
                        $avgRating = $totalReviews > 0 ? $reviews->avg('rating') : 0;
                        $ratingStats = [];
                        for ($i = 5; $i >= 1; $i--) {
                            $count = $reviews->where('rating', $i)->count();
                            $ratingStats[$i] = ['count' => $count, 'percent' => $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0];
                        }
                    ?>
                    
                    <!-- Review Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-slate-900 text-white rounded-3xl p-8 flex flex-col items-center justify-center text-center shadow-xl shadow-slate-900/20">
                            <h4 class="text-sm font-bold text-indigo-300 uppercase tracking-wider mb-2">Đánh Giá Trung Bình</h4>
                            <div class="text-6xl font-black text-transparent bg-clip-text bg-gradient-to-br from-indigo-400 to-purple-400 mb-2 leading-none"><?php echo e(number_format($avgRating, 1)); ?><span class="text-2xl text-slate-500">/5</span></div>
                            <div class="flex text-amber-400 text-2xl mb-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i=1;$i<=5;$i++): ?> <?php echo e($i<=round($avgRating) ? '★' : '☆'); ?> <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <p class="text-sm text-slate-400">Dựa trên <?php echo e($totalReviews); ?> bài đánh giá</p>
                        </div>
                        
                        <div class="md:col-span-2 bg-slate-50 rounded-3xl p-8 border border-slate-100">
                            <div class="flex flex-col gap-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 5; $i >= 1; $i--): ?>
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 text-sm font-bold text-slate-600 flex items-center gap-1"><?php echo e($i); ?> <span class="text-amber-400">★</span></div>
                                        <div class="flex-1 h-3 rounded-full bg-slate-200 overflow-hidden shadow-inner">
                                            <div class="h-full rounded-full bg-gradient-to-r from-amber-400 to-orange-500" style="width: <?php echo e($ratingStats[$i]['percent']); ?>%"></div>
                                        </div>
                                        <div class="w-12 text-right text-sm text-slate-500 font-medium"><?php echo e($ratingStats[$i]['count']); ?></div>
                                    </div>
                                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Review Form -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth('customer')->check()): ?>
                        <?php $existingReview = $reviews->where('customer_id', auth('customer')->id())->first(); ?>
                        <div class="bg-indigo-50/50 border border-indigo-100 rounded-3xl p-6 sm:p-8 mb-12">
                            <h4 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                <?php echo e($existingReview ? 'Chỉnh sửa đánh giá của bạn' : 'Viết đánh giá của bạn'); ?>

                            </h4>
                            <form action="<?php echo e(route('reviews.store', $product->slug)); ?>" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Đánh giá sao <span class="text-rose-500">*</span></label>
                                    <div class="flex flex-row-reverse justify-end gap-1 text-3xl text-slate-300 star-rating" id="reviewStars">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 5; $i >= 1; $i--): ?>
                                            <input type="radio" name="rating" value="<?php echo e($i); ?>" id="star<?php echo e($i); ?>" class="hidden" <?php echo e(old('rating', $existingReview->rating ?? 5) == $i ? 'checked' : ''); ?>>
                                            <label for="star<?php echo e($i); ?>" class="cursor-pointer hover:text-amber-400 transition-colors">★</label>
                                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Tiêu đề</label>
                                        <input type="text" name="title" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-medium text-slate-700 placeholder:text-slate-400" placeholder="Tóm tắt đánh giá ngắn gọn" value="<?php echo e(old('title', $existingReview->title ?? '')); ?>">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Nội dung <span class="text-rose-500">*</span></label>
                                        <textarea name="comment" rows="4" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all resize-y font-medium text-slate-700 placeholder:text-slate-400" placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm..."><?php echo e(old('comment', $existingReview->comment ?? '')); ?></textarea>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-indigo-200/50">
                                    <button type="submit" class="bg-indigo-600 text-white font-bold px-8 py-3 rounded-xl hover:bg-slate-900 transition-colors shadow-lg shadow-indigo-500/30">
                                        <?php echo e($existingReview ? 'Cập nhật' : 'Gửi đánh giá'); ?>

                                    </button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($existingReview): ?>
                                        <button type="button" class="bg-rose-100 text-rose-600 font-bold px-6 py-3 rounded-xl hover:bg-rose-500 hover:text-white transition-colors" onclick="if(confirm('Chắc chắn xóa đánh giá?')) document.getElementById('delete-review-form').submit();">Xóa</button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </form>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($existingReview): ?>
                                <form id="delete-review-form" action="<?php echo e(route('reviews.destroy', $existingReview->_id)); ?>" method="POST" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="bg-slate-50 border border-slate-200 rounded-3xl p-8 text-center mb-12">
                            <p class="text-slate-600 font-medium mb-4">Bạn đã trải nghiệm sản phẩm này?</p>
                            <a href="<?php echo e(route('customers.login')); ?>" class="inline-flex bg-slate-900 text-white font-bold px-8 py-3 rounded-full hover:bg-indigo-600 shadow-lg shadow-indigo-500/20 transition-all hover:-translate-y-1">Đăng nhập để đánh giá</a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!-- Reviews List -->
                    <div class="space-y-6">
                        <h4 class="text-2xl font-black text-slate-900 border-b border-slate-100 pb-4">Tất cả bài viết</h4>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <div class="bg-white border border-slate-100/80 rounded-3xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 shrink-0 rounded-full overflow-hidden bg-gradient-to-tr from-indigo-500 to-purple-500 text-white flex items-center justify-center font-bold text-xl shadow-inner">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->customer->profile_picture_url): ?>
                                            <img src="<?php echo e($review->customer->profile_picture_url); ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <?php echo e(substr($review->customer->full_name, 0, 1)); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
                                            <h5 class="font-bold text-slate-800"><?php echo e($review->customer->full_name ?? 'Khách ẩn danh'); ?></h5>
                                            <span class="text-xs text-slate-400 font-medium"><?php echo e($review->created_at->diffForHumans()); ?></span>
                                        </div>
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="text-amber-400 text-sm"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i=1;$i<=5;$i++): ?> <?php echo e($i<=$review->rating ? '★' : '☆'); ?> <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->is_verified): ?>
                                                <span class="flex items-center gap-1 text-[0.65rem] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-100"><svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Đã mua hàng</span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($review->title): ?> <h6 class="font-bold text-slate-700 mb-1"><?php echo e($review->title); ?></h6> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <p class="text-slate-600 leading-relaxed text-sm mb-4"><?php echo e($review->comment); ?></p>
                                        
                                        <button class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-indigo-600 bg-slate-50 hover:bg-indigo-50 border border-slate-100 px-3 py-1.5 rounded-lg transition-colors" onclick="markHelpful('<?php echo e($review->_id); ?>', this)">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                            Hữu ích (<span class="helpful-count"><?php echo e($review->helpful_count ?? 0); ?></span>)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <div class="text-center py-12 px-4 border border-dashed border-slate-300 rounded-3xl">
                                <svg class="w-16 h-16 text-slate-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                <p class="text-slate-500 font-medium">Sản phẩm này hiện chưa có đánh giá nào.</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedProducts && count($relatedProducts) > 0): ?>
        <div class="mb-10">
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 mb-8 border-l-4 border-indigo-600 pl-4 py-1">Sản Phẩm Tương Tự</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php echo $__env->make('Customers.Components.product-card', ['product' => $relatedProduct], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<style>
/* For star rating hover trick */
.star-rating input:checked ~ label { color: #fbbf24; }
.star-rating label:hover, .star-rating label:hover ~ label { color: #fbbf24; }
</style>
<script>
    function switchTab(btnElement, targetId) {
        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.className = 'tab-btn px-8 py-5 text-sm font-bold text-slate-500 border-b-2 border-transparent hover:text-slate-800 hover:bg-white transition-all whitespace-nowrap';
        });
        // Set active button
        btnElement.className = 'tab-btn px-8 py-5 text-sm font-bold text-indigo-600 border-b-2 border-indigo-600 whitespace-nowrap bg-white';
        // Toggle content
        document.querySelectorAll('.custom-tab-pane').forEach(c => c.classList.add('hidden'));
        document.getElementById('tab-' + targetId).classList.remove('hidden');
    }

    function changeImage(src, btn) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail-item').forEach(b => {
            b.classList.remove('border-indigo-600', 'active');
            b.classList.add('border-transparent');
        });
        btn.classList.remove('border-transparent');
        btn.classList.add('border-indigo-600', 'active');
    }

    function selectColor(btn, index) {
        document.querySelectorAll('.color-option').forEach(b => {
            b.classList.remove('border-indigo-600', 'bg-indigo-50/50', 'shadow-md', 'shadow-indigo-500/10', 'active');
            b.classList.add('border-slate-200', 'bg-white');
            b.querySelector('.check-icon')?.classList.add('hidden');
            b.querySelector('.check-icon')?.classList.remove('scale-100', 'opacity-100');
        });
        btn.classList.add('border-indigo-600', 'bg-indigo-50/50', 'shadow-md', 'shadow-indigo-500/10', 'active');
        btn.classList.remove('border-slate-200', 'bg-white');
        btn.querySelector('.check-icon')?.classList.remove('hidden');
        
        // Timeout to trigger transition
        setTimeout(() => {
            btn.querySelector('.check-icon')?.classList.add('scale-100', 'opacity-100');
        }, 10);

        const price = parseFloat(btn.dataset.price) || 0;
        const salePrice = parseFloat(btn.dataset.salePrice) || 0;
        const stock = parseInt(btn.dataset.stock) || 0;

        const pEl = document.getElementById('colorPrice');
        const oEl = document.getElementById('colorOriginalPrice');
        const dEl = document.getElementById('colorDiscount');

        const format = (n) => n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        if (salePrice > 0 && salePrice < price) {
            pEl.textContent = format(salePrice) + '₫';
            pEl.className = 'text-3xl sm:text-4xl font-black text-rose-500 leading-none tracking-tight';
            
            oEl.textContent = format(price) + '₫';
            oEl.className = 'text-lg sm:text-xl text-slate-400 line-through font-semibold leading-tight';
            
            dEl.textContent = '-' + Math.round(((price - salePrice)/price)*100) + '%';
            dEl.className = 'bg-rose-100 text-rose-600 text-sm font-bold px-2 py-0.5 rounded-lg border border-rose-200';
        } else {
            pEl.textContent = format(price) + '₫';
            pEl.className = 'text-3xl sm:text-4xl font-black text-slate-900 leading-none tracking-tight';
            oEl.className = 'hidden';
            dEl.className = 'hidden';
        }

        let imgs = [];
        try { imgs = JSON.parse(btn.dataset.images || '[]'); } catch(e){}
        if(imgs.length > 0) {
            changeImage(imgs[0], document.querySelector('.thumbnail-item')); // naive update for first thumb
        }

        const stockInfo = document.getElementById('stockInfo');
        if(stock > 10) {
            stockInfo.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span><span class="text-emerald-600">Còn hàng ('+stock+' sẵn có)</span>';
        } else if(stock > 0) {
            stockInfo.innerHTML = '<span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span><span class="text-amber-600">Sắp hết (Chỉ còn '+stock+')</span>';
        } else {
            stockInfo.innerHTML = '<span class="w-2 h-2 rounded-full bg-rose-500"></span><span class="text-rose-600">Tạm hết hàng</span>';
        }

        maxQty = stock;
        const qInp = document.getElementById('qtyInput');
        qInp.max = stock;
        if(parseInt(qInp.value) > stock) qInp.value = Math.max(stock, 1);
        updateBtns();

        document.getElementById('addToCartBtn').disabled = stock <= 0;
    }

    let maxQty = <?php echo e(($product->colors && count($product->colors) > 0) ? ($product->colors[0]['stock'] ?? 0) : $product->stock_quantity); ?>;
    function decreaseQty() { let el=document.getElementById('qtyInput'); if(el.value>1) el.value--; updateBtns(); }
    function increaseQty() { let el=document.getElementById('qtyInput'); if(el.value<maxQty) el.value++; updateBtns(); }
    function validateQty() { let el=document.getElementById('qtyInput'); let v=parseInt(el.value); if(isNaN(v)||v<1)v=1; if(v>maxQty)v=maxQty; el.value=v; updateBtns(); }
    function updateBtns() {
        let v = parseInt(document.getElementById('qtyInput').value);
        document.getElementById('decreaseBtn').disabled = v <= 1;
        document.getElementById('increaseBtn').disabled = v >= maxQty;
    }

    function addToCart() {
        if(document.getElementById('addToCartBtn').disabled) return;
        const qty = parseInt(document.getElementById('qtyInput').value);
        const btn = document.getElementById('addToCartBtn');
        const orgHtml = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';

        const actC = document.querySelector('.color-option.active .color-name');
        const cVal = actC ? actC.textContent.trim() : null;

        fetch('<?php echo e(route('cart.add')); ?>', {
            method:'POST',
            headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>','Content-Type':'application/json','Accept':'application/json'},
            body:JSON.stringify({product_id:'<?php echo e($product->_id); ?>',quantity:qty,color:cVal})
        }).then(r=>r.json()).then(d=>{
            btn.disabled=false; btn.innerHTML=orgHtml;
            if(d.success) {
                document.querySelectorAll('.cart-count').forEach(b=>{b.textContent=d.cartCount;b.style.display='flex';});
                alert('Đã thêm sản phẩm vào giỏ hàng!');
            }
        }).catch(()=>{ btn.disabled=false; btn.innerHTML=orgHtml; });
    }

    function toggleWishlist() {
        <?php if(auth()->guard('customer')->check()): ?>
            fetch('<?php echo e(route('wishlist.toggle')); ?>', {
                method:'POST',
                headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>','Accept':'application/json'},
                body:JSON.stringify({product_id:'<?php echo e($product->_id); ?>'})
            }).then(r=>r.json()).then(d=>{
                const btn = document.getElementById('wishlistBtn');
                if(d.status === 'added') {
                    btn.className = 'w-full sm:w-14 h-14 shrink-0 flex items-center justify-center rounded-2xl border-2 transition-all duration-300 border-pink-500 bg-pink-50 text-pink-500 shadow-md shadow-pink-500/20';
                    btn.querySelector('svg').setAttribute('fill', 'currentColor');
                } else {
                    btn.className = 'w-full sm:w-14 h-14 shrink-0 flex items-center justify-center rounded-2xl border-2 transition-all duration-300 border-slate-200 bg-white text-slate-400 hover:border-pink-300 hover:text-pink-500 hover:bg-pink-50';
                    btn.querySelector('svg').setAttribute('fill', 'none');
                }
                document.querySelectorAll('.wishlist-count').forEach(b=>{b.textContent=d.count;b.style.display=d.count>0?'':'none';});
            });
        <?php else: ?>
            window.location.href = '<?php echo e(route('customers.login')); ?>';
        <?php endif; ?>
    }

    function markHelpful(id, btn) {
        fetch(`/danh-gia/${id}/helpful`, {
            method:'POST',
            headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>','Content-Type':'application/json'}
        }).then(r=>r.json()).then(d=>{
            btn.querySelector('.helpful-count').textContent = d.helpful_count;
            btn.classList.add('bg-indigo-50', 'text-indigo-600', 'border-indigo-100');
            btn.classList.remove('bg-slate-50', 'text-slate-500');
        });
    }

    // Initialize quantity boundaries
    updateBtns();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Products/detail.blade.php ENDPATH**/ ?>