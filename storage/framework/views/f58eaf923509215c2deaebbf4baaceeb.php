<?php $__env->startSection('title', 'Đơn hàng của tôi - FlashTech Premium'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-purple-900/80 to-slate-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-30 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-5xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-300 mb-8 w-fit px-1">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Trang chủ</a>
            <span class="text-white/30">/</span>
            <a href="<?php echo e(route('customers.profile.detail')); ?>" class="hover:text-white transition-colors">Hồ sơ</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-bold tracking-wide">Đơn hàng của tôi</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight mb-2">Đơn Hàng Của Tôi</h1>
                <p class="text-slate-500 font-medium">Theo dõi và quản lý các giao dịch mua sắm của bạn</p>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="flex overflow-x-auto gap-2 mb-8 pb-2 custom-scrollbar hide-scroll-on-mobile">
            <a href="<?php echo e(route('customers.orders')); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(!request('status') ? 'bg-slate-900 text-white shadow-lg shadow-slate-900/20' : 'bg-white text-slate-600 border border-slate-200 hover:border-indigo-600 hover:text-indigo-600'); ?>">Tất cả</a>
            <a href="<?php echo e(route('customers.orders', ['status' => 'pending'])); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(request('status') === 'pending' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-indigo-600 hover:text-indigo-600'); ?>">Chờ xử lý</a>
            <a href="<?php echo e(route('customers.orders', ['status' => 'processing'])); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(request('status') === 'processing' ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-blue-600 hover:text-blue-600'); ?>">Đang xử lý</a>
            <a href="<?php echo e(route('customers.orders', ['status' => 'shipped'])); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(request('status') === 'shipped' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-purple-600 hover:text-purple-600'); ?>">Đang giao hàng</a>
            <a href="<?php echo e(route('customers.orders', ['status' => 'delivered'])); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(request('status') === 'delivered' ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-emerald-500 hover:text-emerald-600'); ?>">Đã giao</a>
            <a href="<?php echo e(route('customers.orders', ['status' => 'cancelled'])); ?>" class="whitespace-nowrap px-6 py-2.5 rounded-xl font-bold transition-all <?php echo e(request('status') === 'cancelled' ? 'bg-rose-500 text-white shadow-lg shadow-rose-500/30' : 'bg-white text-slate-600 border border-slate-200 hover:border-rose-500 hover:text-rose-500'); ?>">Đã hủy</a>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->count() > 0): ?>
            <div class="flex flex-col gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php
                        $statusMap = [
                            'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'border' => 'border-amber-200', 'label' => 'Chờ xử lý', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>'],
                            'processing' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'border' => 'border-blue-200', 'label' => 'Đang xử lý', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>'],
                            'shipped' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'border-purple-200', 'label' => 'Đang giao hàng', 'icon' => '<path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>'],
                            'delivered' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'border-emerald-200', 'label' => 'Đã giao thành công', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>'],
                            'cancelled' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-600', 'border' => 'border-rose-200', 'label' => 'Đã hủy', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>'],
                        ];
                        $status = $statusMap[$order->order_status] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-600', 'border' => 'border-slate-200', 'label' => $order->order_status, 'icon' => ''];
                    ?>

                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-slate-200/80 transition-shadow">
                        <!-- Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-6 border-b border-slate-100 bg-slate-50/50">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h3 class="font-black text-slate-800 text-lg"><?php echo e($order->order_code); ?></h3>
                                    </div>
                                    <div class="text-sm font-medium text-slate-500"><?php echo e($order->created_at->format('d/m/Y - H:i')); ?></div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 px-4 py-2 <?php echo e($status['bg']); ?> <?php echo e($status['text']); ?> <?php echo e($status['border']); ?> border rounded-full font-bold text-sm w-fit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><?php echo $status['icon']; ?></svg>
                                <?php echo e($status['label']); ?>

                            </div>
                        </div>

                        <!-- Body (Items preview) -->
                        <div class="p-6">
                            <div class="flex flex-col gap-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->orderDetails->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition-colors">
                                        <div class="w-20 h-20 rounded-xl bg-white border border-slate-100 shadow-sm shrink-0 flex items-center justify-center p-2">
                                            <?php 
                                                $img = !empty($detail->product_image) ? $detail->product_image : (!empty($detail->image) ? $detail->image : (optional($detail->product)->image ?: ''));
                                                $imgUrl = empty($img) ? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' : (Str::startsWith($img, 'http') ? $img : asset('storage/' . $img));
                                            ?>
                                            <img src="<?php echo e($imgUrl); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';" alt="<?php echo e($detail->product_name); ?>" class="w-full h-full object-contain">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-bold text-slate-800 truncate mb-1"><?php echo e($detail->product_name); ?></h4>
                                            <div class="text-sm font-medium text-slate-500 flex items-center gap-2">
                                                <span class="bg-slate-100 px-2.5 py-1 rounded-lg">x<?php echo e($detail->quantity); ?></span>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($detail->color)): ?>
                                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                                                    <span>Phân loại: <span class="text-slate-700"><?php echo e($detail->color); ?></span></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="font-black text-rose-600 pl-4 whitespace-nowrap"><?php echo e(number_format($detail->total, 0, ',', '.')); ?>₫</div>
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->orderDetails->count() > 3): ?>
                                    <div class="text-center pt-2">
                                        <span class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 bg-slate-50 px-4 py-2 rounded-xl">
                                            Và <?php echo e($order->orderDetails->count() - 3); ?> sản phẩm khác <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                                        </span>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 p-6 border-t border-slate-100 bg-slate-50/50">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">
                                <div>
                                    <div class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-1">Tổng thanh toán</div>
                                    <div class="text-2xl font-black text-slate-900"><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</div>
                                </div>
                                <div class="hidden sm:block w-px h-10 bg-slate-200"></div>
                                <div>
                                    <div class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-1.5">Hình thức</div>
                                    <div class="flex items-center gap-2 text-sm font-bold text-slate-700">
                                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($order->payment_method):
                                            case ('cod'): ?> Thanh toán khi nhận hàng <?php break; ?>
                                            <?php case ('bank_transfer'): ?> Chuyển tiền qua QR <?php break; ?>
                                            <?php case ('momo'): ?> Ví MoMo <?php break; ?>
                                            <?php case ('vnpay'): ?> VNPay <?php break; ?>
                                        <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($order->order_status, ['pending', 'processing'])): ?>
                                    <form action="<?php echo e(route('customers.orders.cancel', $order->_id)); ?>" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="px-5 py-2.5 bg-white text-rose-500 border border-rose-200 hover:bg-rose-50 hover:border-rose-300 font-bold rounded-xl transition-colors hidden sm:block">Hủy đơn</button>
                                        <button type="submit" class="w-10 h-10 bg-white text-rose-500 border border-rose-200 hover:bg-rose-50 rounded-xl flex items-center justify-center sm:hidden"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                                    </form>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <a href="<?php echo e(route('customers.orders.detail', $order->_id)); ?>" class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-2.5 bg-slate-900 text-white font-bold rounded-xl shadow-lg shadow-slate-900/20 hover:bg-indigo-600 transition-all group">
                                    Chi tiết <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->hasPages()): ?>
                <div class="mt-8 flex justify-center">
                    <?php echo e($orders->onEachSide(1)->links('pagination::tailwind')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <!-- Empty State -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 md:p-20 text-center flex flex-col items-center justify-center max-w-2xl mx-auto mt-10">
                <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center mb-8 border-4 border-slate-100 shadow-inner relative">
                    <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                    <!-- Floating dash -->
                    <div class="absolute -top-2 right-0 w-8 h-8 text-indigo-400 rotate-12"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg></div>
                </div>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-4">Chưa có đơn hàng nào</h3>
                <p class="text-slate-500 font-medium mb-10">Bạn chưa phát sinh giao dịch nào thuộc trạng thái này. Khám phá các sản phẩm nổi bật ngay!</p>
                <a href="<?php echo e(route('home')); ?>" class="group bg-slate-900 text-white font-bold px-10 py-4 rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all flex items-center gap-3">
                    Tiếp tục mua sắm <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<style>
/* Custom Pagination specific to Tailwind override */
.pagination { display: flex; justify-content: center; gap: 0.5rem; list-style: none; padding: 0; }
.page-item.active .page-link { background-color: #4f46e5; color: white; border-color: #4f46e5; }
.page-link { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 12px; font-weight: 700; color: #475569; background: white; border: 1px solid #e2e8f0; transition: all 0.2s; }
.page-link:hover { border-color: #4f46e5; color: #4f46e5; }
.page-item.disabled .page-link { opacity: 0.5; cursor: not-allowed; }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Orders/index.blade.php ENDPATH**/ ?>