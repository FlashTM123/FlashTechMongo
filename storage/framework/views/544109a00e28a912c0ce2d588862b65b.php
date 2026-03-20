<?php $__env->startSection('title', 'Home - FlashTech Premium Store'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="relative pt-8 pb-20 lg:pt-16 lg:pb-28 overflow-hidden bg-slate-50">
    <!-- Background Elements -->
    <div class="absolute top-0 inset-x-0 h-full bg-gradient-to-b from-indigo-50 to-white pointer-events-none"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
    <div class="absolute top-1/2 -left-24 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-8">
            <!-- Hero Text -->
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-100 text-indigo-700 font-bold text-sm mb-6 border border-indigo-200">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-600"></span>
                    </span>
                    Flash Sale - Giảm đến 50%
                </div>
                <h1 class="text-5xl lg:text-6xl xl:text-7xl font-black text-slate-900 tracking-tight leading-[1.1] mb-6">
                    Công Nghệ Đỉnh Cao<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600">Giá Siêu Hời</span>
                </h1>
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto lg:mx-0 font-medium pb-2">
                    Khám phá bộ sưu tập smartphone, laptop, tablet và phụ kiện công nghệ mới nhất
                    với giá tốt nhất thị trường. Freeship toàn quốc, bảo hành chính hãng.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#featured" class="px-8 py-4 rounded-full bg-slate-900 text-white font-bold hover:bg-indigo-600 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/30 transition-all duration-300 text-center w-full sm:w-auto">
                        Mua Ngay
                    </a>
                    <a href="<?php echo e(route('products.category', 'smartphone')); ?>" class="px-8 py-4 rounded-full bg-white text-slate-700 border border-slate-200 font-bold hover:border-indigo-300 hover:text-indigo-600 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/50 transition-all duration-300 flex items-center justify-center gap-2 w-full sm:w-auto overflow-hidden group">
                        Khám Phá
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
                <!-- Trust Indicators -->
                <div class="mt-10 flex items-center justify-center lg:justify-start gap-6 text-sm font-semibold text-slate-500">
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Chính hãng 100%</div>
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg> Freeship </div>
                </div>
            </div>

            <!-- Hero Image / Glass Card -->
            <div class="flex-1 w-full max-w-xl lg:max-w-none relative mt-10 lg:mt-0">
                <div class="relative w-full aspect-square rounded-[3rem] bg-gradient-to-tr from-indigo-100 to-purple-50 p-4 sm:p-8 transform rotate-3 hover:rotate-0 transition-all duration-500 shadow-2xl">
                    <div class="w-full h-full bg-white/60 backdrop-blur-xl rounded-[2.5rem] border border-white p-6 shadow-inner relative overflow-hidden flex flex-col items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&q=80&w=800&h=800" alt="Tech Setup" class="w-full h-full object-cover rounded-[2rem] shadow-md absolute inset-0 opacity-90 transition-transform duration-700 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8 bg-white/90 backdrop-blur-md rounded-2xl p-5 shadow-xl border border-white/50 transform translate-y-4 hover:translate-y-0 transition-transform">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-xs font-bold text-indigo-600 mb-1 uppercase tracking-wider">New Arrival</div>
                                    <div class="text-xl font-bold text-slate-800">Samsung S24 Ultra</div>
                                </div>
                                <div class="h-10 w-10 bg-slate-900 rounded-full flex items-center justify-center text-white shadow-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white relative border-b border-slate-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-black text-slate-900 mb-4">Danh Mục Mua Sắm</h2>
            <p class="text-slate-500 font-medium max-w-2xl mx-auto">Tìm kiếm thiết bị công nghệ phù hợp với nhu cầu và phong cách của bạn.</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
            <!-- Smartphone -->
            <a href="<?php echo e(route('products.category', 'smartphone')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-indigo-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-indigo-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center">
                <div class="w-16 h-16 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Điện thoại</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Smartphone'] ?? 0); ?></span>
            </a>
            <!-- Laptop -->
            <a href="<?php echo e(route('products.category', 'laptop')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-emerald-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="11" rx="1.5"></rect><path d="M2 19h20"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Laptop</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Laptop'] ?? 0); ?></span>
            </a>
            <!-- Tablet -->
            <a href="<?php echo e(route('products.category', 'tablet')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-purple-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-purple-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center">
                <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"></rect><circle cx="12" cy="18" r="1"></circle></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Tablet</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Tablet'] ?? 0); ?></span>
            </a>
            <!-- Accessories -->
            <a href="<?php echo e(route('products.category', 'accessory')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-rose-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-rose-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center">
                <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 12a8 8 0 0 1 16 0"></path><rect x="3" y="12" width="4" height="7" rx="1.5"></rect><rect x="17" y="12" width="4" height="7" rx="1.5"></rect></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Phụ kiện</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Accessory'] ?? 0); ?></span>
            </a>
            <!-- Components -->
            <a href="<?php echo e(route('products.category', 'component')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-sky-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-sky-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center hidden md:flex">
                <div class="w-16 h-16 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14 6a4 4 0 0 0 4 4l-6.5 6.5a2.1 2.1 0 1 1-3-3L15 7a4 4 0 0 0-1-1z"></path><path d="M5 19l2 2"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Linh kiện</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Component'] ?? 0); ?></span>
            </a>
            <!-- Computer -->
            <a href="<?php echo e(route('products.category', 'computer')); ?>" class="group bg-slate-50 hover:bg-white border text-center border-slate-100 hover:border-amber-100 p-6 rounded-3xl hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col items-center hidden md:flex">
                <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="1.5"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Computer</h3>
                <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-0.5 rounded-full"><?php echo e($categoryCounts['Computer'] ?? 0); ?></span>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="featured" class="py-16 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col sm:flex-row items-center justify-between mb-10 gap-4">
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-2 flex items-center gap-2">
                    <span class="text-indigo-600">⚡</span> Sản Phẩm Nổi Bật
                </h2>
                <p class="text-slate-500 font-medium">Những sản phẩm công nghệ bán chạy nhất tuần qua.</p>
            </div>
            <a href="<?php echo e(route('products.search')); ?>" class="text-indigo-600 font-bold hover:text-indigo-700 flex items-center gap-1 group">
                Xem tất cả <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php echo $__env->make('Customers.Components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full py-12 text-center text-slate-500 font-medium bg-white rounded-3xl border border-slate-100">
                    Chưa có sản phẩm nổi bật
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<!-- Flash Deals Banner -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="relative w-full rounded-[2.5rem] bg-gradient-to-r from-slate-900 via-indigo-900 to-purple-900 overflow-hidden p-8 sm:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 border border-slate-800 text-center md:text-left">
            <!-- decorative circles -->
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-500 rounded-full mix-blend-screen filter blur-[80px] opacity-40"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-fuchsia-500 rounded-full mix-blend-screen filter blur-[80px] opacity-40"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/20 text-red-300 font-bold text-xs mb-4 border border-red-500/30">
                    🔥 Giờ Vàng Giá Sốc
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-white mb-4 tracking-tight">Flash Sale Cuối Tuần</h2>
                <p class="text-indigo-200 font-medium text-lg max-w-lg mb-8 md:mb-0">Giảm thêm 10% khi thanh toán qua thẻ tín dụng. Nhanh tay săn deal ngon, số lượng có hạn!</p>
            </div>
            
            <div class="relative z-10 bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20 shadow-xl shrink-0">
                <div class="text-center text-white font-bold mb-4 uppercase tracking-wider text-sm">Kết thúc sau</div>
                <div class="flex items-center gap-3 justify-center deals-timer">
                    <div class="w-16 h-16 rounded-xl bg-slate-900 flex flex-col items-center justify-center shadow-inner border border-white/10">
                        <span class="text-2xl font-black text-white timer-value">12</span>
                        <span class="text-[0.6rem] text-slate-400 uppercase font-bold">Giờ</span>
                    </div>
                    <span class="text-2xl font-bold text-white/50">:</span>
                    <div class="w-16 h-16 rounded-xl bg-slate-900 flex flex-col items-center justify-center shadow-inner border border-white/10">
                        <span class="text-2xl font-black text-white timer-value">34</span>
                        <span class="text-[0.6rem] text-slate-400 uppercase font-bold">Phút</span>
                    </div>
                    <span class="text-2xl font-bold text-white/50">:</span>
                    <div class="w-16 h-16 rounded-xl bg-slate-900 flex flex-col items-center justify-center shadow-inner border border-white/10">
                        <span class="text-2xl font-black text-rose-400 timer-value">56</span>
                        <span class="text-[0.6rem] text-slate-400 uppercase font-bold">Giây</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Rows -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
    ['name' => 'Smartphone', 'slug' => 'smartphone', 'data' => $smartphones],
    ['name' => 'Laptop', 'slug' => 'laptop', 'data' => $laptops],
    ['name' => 'Tablet', 'slug' => 'tablet', 'data' => $tablets],
    ['name' => 'Phụ kiện', 'slug' => 'accessory', 'data' => $accessories],
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category['data']->count() > 0): ?>
    <section class="py-12 <?php echo e($loop->even ? 'bg-white' : 'bg-slate-50'); ?>">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-4">
                <h2 class="text-2xl md:text-3xl font-black text-slate-900"><?php echo e($category['name']); ?> Mới Nhất</h2>
                <a href="<?php echo e(route('products.category', $category['slug'])); ?>" class="px-5 py-2 rounded-full bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition-colors text-sm">
                    Xem tất cả <?php echo e($category['name']); ?>

                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $category['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php echo $__env->make('Customers.Components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

<!-- Brands Section -->
<section class="py-16 bg-white border-t border-slate-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-black text-slate-400 uppercase tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-slate-400 to-slate-500">Đối Tác Chính Hãng</h2>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16 opacity-60 hover:opacity-100 transition-opacity duration-500">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $logoUrl = "https://logo.clearbit.com/".strtolower($brand->name).".com"; ?>
                <img src="<?php echo e($logoUrl); ?>" alt="<?php echo e($brand->name); ?>" class="h-8 md:h-12 object-contain grayscale hover:grayscale-0 hover:scale-110 transition-all duration-300" onerror="this.src='https://via.placeholder.com/120x60/ffffff/94a3b8?text=<?php echo e(urlencode($brand->name)); ?>'">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <img src="https://logo.clearbit.com/apple.com" alt="Apple" class="h-10 md:h-12 object-contain grayscale hover:grayscale-0 hover:scale-110 transition-all duration-300">
                <img src="https://logo.clearbit.com/samsung.com" alt="Samsung" class="h-10 md:h-12 object-contain grayscale hover:grayscale-0 hover:scale-110 transition-all duration-300">
                <img src="https://logo.clearbit.com/asus.com" alt="Asus" class="h-10 md:h-12 object-contain grayscale hover:grayscale-0 hover:scale-110 transition-all duration-300">
                <img src="https://logo.clearbit.com/dell.com" alt="Dell" class="h-10 md:h-12 object-contain grayscale hover:grayscale-0 hover:scale-110 transition-all duration-300">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Basic Timer Logic
    const timerBoxes = document.querySelectorAll('.timer-value');
    if (timerBoxes.length === 3) {
        setInterval(() => {
            let h = parseInt(timerBoxes[0].textContent);
            let m = parseInt(timerBoxes[1].textContent);
            let s = parseInt(timerBoxes[2].textContent);
            s--;
            if (s < 0) { s = 59; m--; }
            if (m < 0) { m = 59; h--; }
            if (h < 0) { h = 23; }
            timerBoxes[0].textContent = h.toString().padStart(2, '0');
            timerBoxes[1].textContent = m.toString().padStart(2, '0');
            timerBoxes[2].textContent = s.toString().padStart(2, '0');
        }, 1000);
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Home/home.blade.php ENDPATH**/ ?>