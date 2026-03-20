<?php $__env->startSection('title', 'Giỏ hàng - FlashTech Premium'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-400 mb-8 border border-white/20 bg-white/10 backdrop-blur-md w-fit px-4 py-2 rounded-full shadow-sm">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-800 font-bold">Giỏ hàng của bạn</span>
        </nav>

        <div class="flex items-center gap-4 mb-10">
            <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
            </div>
            <div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">Giỏ Hàng</h1>
                <p class="text-slate-500 font-medium">Kiểm tra thông tin sản phẩm trước khi thanh toán</p>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($cartItems) > 0): ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                
                <!-- Cart Items Box -->
                <div class="lg:col-span-8 flex flex-col gap-6">
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                        
                        <!-- Header -->
                        <div class="flex items-center justify-between px-6 sm:px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                Sản phẩm 
                                <span class="bg-indigo-100 text-indigo-700 text-xs px-2.5 py-1 rounded-lg" id="itemCount"><?php echo e(count($cartItems)); ?></span>
                            </h3>
                            <form action="<?php echo e(route('cart.clear')); ?>" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="group flex items-center gap-1.5 text-sm font-bold text-rose-500 hover:text-rose-600 transition-colors bg-rose-50 px-3 py-1.5 rounded-xl border border-rose-100">
                                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                    Xóa tất cả
                                </button>
                            </form>
                        </div>

                        <!-- Items List -->
                        <div class="flex flex-col">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <div class="group flex flex-col sm:flex-row gap-6 p-6 sm:p-8 border-b border-slate-50 last:border-0 hover:bg-indigo-50/30 transition-colors" id="cart-item-<?php echo e($item['id']); ?>">
                                    <!-- Image Image -->
                                    <a href="<?php echo e(route('product.detail', $item['product']->slug)); ?>" class="w-24 h-24 sm:w-32 sm:h-32 shrink-0 bg-slate-50 rounded-2xl border border-slate-100 p-2 overflow-hidden relative">
                                        <?php 
                                            $img = $item['product']->image ?? ''; 
                                            $cartImg = empty($img) ? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' : (Str::startsWith($img, 'http') ? $img : asset('storage/' . $img));
                                        ?>
                                        <img src="<?php echo e($cartImg); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';" alt="<?php echo e($item['product']->name); ?>" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                    </a>
                                    
                                    <!-- Info & Actions -->
                                    <div class="flex-1 flex flex-col justify-between gap-4">
                                        <div class="flex justify-between items-start gap-4">
                                            <div>
                                                <a href="<?php echo e(route('product.detail', $item['product']->slug)); ?>" class="text-lg font-bold text-slate-800 hover:text-indigo-600 transition-colors line-clamp-2 leading-snug mb-2"><?php echo e($item['product']->name); ?></a>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($item['color'])): ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                                        <span class="w-2 h-2 rounded-full shadow-inner border border-slate-300" style="background-color: <?php echo e(['Đen'=>'#1a1a1a','Trắng'=>'#fff','Xanh'=>'#3b82f6','Đỏ'=>'#ef4444'][$item['color']] ?? '#9ca3af'); ?>"></span>
                                                        <?php echo e($item['color']); ?>

                                                    </span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <button onclick="removeItem('<?php echo e($item['id']); ?>')" class="shrink-0 p-2 text-slate-300 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition-all" title="Xóa">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </div>

                                        <div class="flex flex-wrap items-end justify-between gap-4 mt-auto">
                                            <!-- Price -->
                                            <div class="flex flex-col gap-1">
                                                <span class="text-xl font-black text-indigo-600"><?php echo e(number_format($item['price'], 0, ',', '.')); ?>₫</span>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['product']->sale_price > 0 && $item['product']->sale_price < $item['product']->price): ?>
                                                    <span class="text-xs font-bold text-slate-400 line-through"><?php echo e(number_format($item['product']->price, 0, ',', '.')); ?>₫</span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>

                                            <!-- Qty & Total -->
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-xl overflow-hidden p-1">
                                                    <button class="w-8 h-8 flex items-center justify-center bg-white rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 shadow-sm transition-colors font-bold disabled:opacity-50" onclick="updateQuantity('<?php echo e($item['id']); ?>', -1)" id="dec-<?php echo e($item['id']); ?>">‒</button>
                                                    
                                                    <?php
                                                        $colorStock = $item['product']->stock_quantity ?? 0;
                                                        if (!empty($item['color']) && $item['product']->colors) {
                                                            foreach ($item['product']->colors as $c) {
                                                                if (($c['color'] ?? '') === $item['color']) {
                                                                    $colorStock = (int) ($c['stock'] ?? 0);
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    <input type="number" class="w-12 h-8 text-center bg-transparent font-bold text-slate-800 focus:outline-none" value="<?php echo e($item['quantity']); ?>" min="1" max="<?php echo e($colorStock); ?>" id="qty-<?php echo e($item['id']); ?>" onchange="setQuantity('<?php echo e($item['id']); ?>')">
                                                    
                                                    <button class="w-8 h-8 flex items-center justify-center bg-white rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 shadow-sm transition-colors font-bold disabled:opacity-50" onclick="updateQuantity('<?php echo e($item['id']); ?>', 1)" id="inc-<?php echo e($item['id']); ?>">+</button>
                                                </div>
                                                <div class="text-right min-w-[100px]">
                                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-1">Thành tiền</span>
                                                    <span class="text-lg font-black text-slate-800" id="total-<?php echo e($item['id']); ?>"><?php echo e(number_format($item['total'], 0, ',', '.')); ?>₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Policy Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                            <p class="text-xs font-bold text-indigo-900 leading-tight">100% Chính hãng<br><span class="text-indigo-600 font-medium">Bảo hành ủy quyền</span></p>
                        </div>
                        <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                            <p class="text-xs font-bold text-emerald-900 leading-tight">1 đổi 1 trong 30 ngày<br><span class="text-emerald-600 font-medium">Nếu có lỗi từ NSX</span></p>
                        </div>
                        <div class="bg-amber-50 border border-amber-100 rounded-2xl p-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg></div>
                            <p class="text-xs font-bold text-amber-900 leading-tight">Giao hàng siêu tốc<br><span class="text-amber-600 font-medium">Flashtech Logistics</span></p>
                        </div>
                    </div>
                </div>

                <!-- Summary Sidebar -->
                <div class="lg:col-span-4 lg:sticky lg:top-24 h-fit space-y-6">
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8">
                        <h3 class="text-xl font-black text-slate-800 mb-6 drop-shadow-sm">Tóm Tắt Đơn Hàng</h3>
                        
                        <div class="flex flex-col gap-4 mb-6 text-sm font-medium">
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Tạm tính</span>
                                <span class="font-bold text-slate-800" id="subtotalValue"><?php echo e(number_format($subtotal, 0, ',', '.')); ?>₫</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Phí vận chuyển</span>
                                <span class="font-bold text-emerald-500 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">Miễn phí</span>
                            </div>
                        </div>

                        <div class="border-t border-slate-100 border-dashed pt-6 mb-8">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-slate-500 font-bold uppercase tracking-wider text-xs">Tổng Thanh Toán</span>
                                <span class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600" id="totalValue">
                                    <?php echo e(number_format($subtotal, 0, ',', '.')); ?>₫
                                </span>
                            </div>
                            <p class="text-right text-[10px] text-slate-400 font-medium">(Đã bao gồm VAT)</p>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth('customer')->check()): ?>
                            <a href="<?php echo e(route('checkout.index')); ?>" class="group w-full flex items-center justify-center gap-2 bg-slate-900 text-white font-bold px-6 py-4 rounded-2xl border-2 border-slate-900 shadow-xl shadow-slate-900/20 hover:bg-indigo-600 hover:border-indigo-600 transition-all duration-300">
                                <span class="group-hover:-translate-x-1 transition-transform">Tiến hành thanh toán</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('customers.login')); ?>" class="w-full flex items-center justify-center gap-2 bg-slate-900 text-white font-bold px-6 py-4 rounded-2xl hover:bg-indigo-600 transition-all shadow-xl shadow-slate-900/20">
                                Đăng nhập để thanh toán
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <a href="<?php echo e(route('home')); ?>" class="w-full flex items-center justify-center text-slate-500 font-bold px-6 py-4 rounded-2xl hover:bg-slate-50 hover:text-indigo-600 transition-colors mt-3 gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Tiếp tục mua sắm
                        </a>
                    </div>

                    <!-- Secure Image -->
                    <div class="flex items-center justify-center gap-4 text-slate-400 text-xs font-bold">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> Thanh toán bảo mật</span>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg> Cam kết 100%</span>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Empty Cart -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 md:p-20 text-center flex flex-col items-center justify-center max-w-3xl mx-auto mt-10">
                <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mb-8 border-4 border-slate-100 shadow-inner">
                    <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path></svg>
                </div>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-4">Giỏ hàng trống!</h3>
                <p class="text-slate-500 font-medium mb-10 max-w-md mx-auto">Có vẻ như bạn chưa chọn được sản phẩm nào ưng ý. Hãy khám phá và mua sắm các thiết bị công nghệ hấp dẫn của chúng tôi nhé!</p>
                <a href="<?php echo e(route('home')); ?>" class="group bg-slate-900 text-white font-bold px-10 py-4 rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all flex items-center gap-3">
                    Bắt đầu mua sắm <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<!-- Toast Container -->
<div id="toast" class="fixed top-5 right-5 z-[9999] transition-all transform translate-x-[120%] opacity-0 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl">
    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-sm"></span>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    const csrfToken = '<?php echo e(csrf_token()); ?>';

    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        toast.querySelector('span').textContent = message;
        if(type === 'success') {
            toast.className = 'fixed top-5 right-5 z-[9999] transition-all transform translate-x-0 opacity-100 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl shadow-emerald-500/30 bg-emerald-500';
            toast.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        } else {
            toast.className = 'fixed top-5 right-5 z-[9999] transition-all transform translate-x-0 opacity-100 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl shadow-rose-500/30 bg-rose-500';
            toast.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        }
        setTimeout(() => {
            toast.classList.remove('translate-x-0', 'opacity-100');
            toast.classList.add('translate-x-[120%]', 'opacity-0');
        }, 3000);
    }

    function updateBtns(id) {
        let el = document.getElementById('qty-' + id);
        let val = parseInt(el.value);
        let max = parseInt(el.max);
        document.getElementById('dec-' + id).disabled = val <= 1;
        document.getElementById('inc-' + id).disabled = val >= max;
    }

    function updateQuantity(productId, delta) {
        const input = document.getElementById('qty-' + productId);
        let newQty = parseInt(input.value) + delta;
        const max = parseInt(input.max);
        if (newQty < 1) newQty = 1;
        if (newQty > max) newQty = max;
        input.value = newQty;
        setQuantity(productId);
    }

    function setQuantity(productId) {
        const input = document.getElementById('qty-' + productId);
        let qty = parseInt(input.value);
        const max = parseInt(input.max);
        if (isNaN(qty) || qty < 1) qty = 1;
        if (qty > max) qty = max;
        input.value = qty;
        
        updateBtns(productId);

        fetch('<?php echo e(route('cart.update')); ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({ product_id: productId, quantity: qty, _method: 'PUT' })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('total-' + productId).textContent = data.itemTotal + '₫';
                document.getElementById('subtotalValue').textContent = data.subtotal + '₫';
                document.getElementById('totalValue').textContent = data.subtotal + '₫';
                updateCartBadge(data.cartCount);
            } else {
                showToast(data.message || 'Lỗi server', 'error');
            }
        });
    }

    function removeItem(productId) {
        if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;

        fetch('/gio-hang/xoa/' + productId, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({ _method: 'DELETE' })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const item = document.getElementById('cart-item-' + productId);
                item.style.height = item.offsetHeight + 'px';
                item.classList.add('transition-all', 'duration-500', 'ease-in-out', 'translate-x-full', 'opacity-0');
                
                setTimeout(() => {
                    item.style.height = '0';
                    item.style.padding = '0';
                    item.style.margin = '0';
                    item.style.border = '0';
                }, 300);

                setTimeout(() => {
                    item.remove();
                    document.getElementById('subtotalValue').textContent = data.subtotal + '₫';
                    document.getElementById('totalValue').textContent = data.subtotal + '₫';
                    updateCartBadge(data.cartCount);
                    document.getElementById('itemCount').textContent = data.cartCount;
                    showToast(data.message);

                    if (data.cartCount === 0) {
                        location.reload();
                    }
                }, 500);
            }
        });
    }

    function updateCartBadge(count) {
        const badges = document.querySelectorAll('.cart-count');
        badges.forEach(badge => {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        });
    }

    // Init qty buttons
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[id^="qty-"]').forEach(el => {
            let id = el.id.split('-')[1];
            updateBtns(id);
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Cart/index.blade.php ENDPATH**/ ?>