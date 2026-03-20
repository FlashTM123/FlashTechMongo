<?php $__env->startSection('title', 'Đặt hàng thành công - FlashTech Premium'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden flex items-center justify-center">
    <!-- Background Decor -->
    <div class="absolute inset-x-0 top-0 h-96 bg-gradient-to-b from-indigo-900 via-slate-900 to-transparent -z-10"></div>
    <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-emerald-500/20 blur-[120px] rounded-full mix-blend-screen pointer-events-none -z-10"></div>

    <div class="container mx-auto px-4 pt-10 sm:pt-20 relative z-10 w-full max-w-2xl">
        <div class="bg-white rounded-[2rem] shadow-2xl shadow-slate-200/50 border border-slate-100 p-8 sm:p-12 text-center relative overflow-hidden">
            <!-- Deco corner -->
            <div class="absolute -top-16 -right-16 w-32 h-32 bg-emerald-50 rounded-full blur-2xl"></div>
            
            <div class="w-24 h-24 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg shadow-emerald-500/30 relative z-10 animate-[bounce_1s_ease-in-out_infinite]">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
            </div>

            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mb-3 tracking-tight">Đặt Hàng Thành Công!</h1>
            <p class="text-slate-500 font-medium mb-10 max-w-md mx-auto">Cảm ơn bạn đã tin tưởng mua sắm tại FlashTech. Đơn hàng của bạn đã nhận và đang được xử lý.</p>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-100 text-left mb-10">
                <h4 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2 pb-4 border-b border-slate-200">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Thông tin đơn hàng
                </h4>

                <div class="flex flex-col gap-4 text-sm mb-8">
                    <div class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm">
                        <span class="text-slate-500 font-medium">Mã đơn hàng</span>
                        <span class="font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg tracking-widest"><?php echo e($order->order_code); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 border-b border-slate-100 pb-3">
                        <span class="text-slate-500 font-medium min-w-[120px]">Người nhận</span>
                        <span class="font-bold text-slate-800 text-right"><?php echo e($order->full_name); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 border-b border-slate-100 pb-3">
                        <span class="text-slate-500 font-medium min-w-[120px]">Số điện thoại</span>
                        <span class="font-bold text-slate-800 text-right"><?php echo e($order->phone_number); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 border-b border-slate-100 pb-3">
                        <span class="text-slate-500 font-medium min-w-[120px]">Địa chỉ giao</span>
                        <span class="font-bold text-slate-800 text-right"><?php echo e($order->shipping_address); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 border-b border-slate-100 pb-3">
                        <span class="text-slate-500 font-medium min-w-[120px]">Thanh toán</span>
                        <span class="font-bold text-slate-800 text-right">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($order->payment_method):
                                case ('cod'): ?> Lấy trực tiếp (COD) <?php break; ?>
                                <?php case ('bank_transfer'): ?> Chuyển khoản ngân hàng <?php break; ?>
                                <?php case ('momo'): ?> Ví MoMo <?php break; ?>
                                <?php case ('vnpay'): ?> VNPay <?php break; ?>
                            <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                </div>

                <div class="mb-6 max-h-[250px] overflow-y-auto custom-scrollbar pr-2 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <div class="flex gap-4 items-center bg-white p-3 rounded-2xl border border-slate-100 shadow-sm">
                            <div class="w-16 h-16 shrink-0 bg-slate-50 rounded-xl border border-slate-100 p-1">
                                <?php $imgUrl = ($detail->product_image && Str::startsWith($detail->product_image, 'http')) ? $detail->product_image : asset('storage/' . $detail->product_image); ?>
                                <img src="<?php echo e($imgUrl); ?>" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h5 class="text-xs font-bold text-slate-800 line-clamp-2 leading-snug mb-1"><?php echo e($detail->product_name); ?></h5>
                                <div class="text-[10px] text-slate-500 font-medium">SL: <?php echo e($detail->quantity); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($detail->color)): ?> | Màu: <?php echo e($detail->color); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                            </div>
                            <div class="text-sm font-black text-indigo-600 shrink-0"><?php echo e(number_format($detail->total, 0, ',', '.')); ?>₫</div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <div class="flex justify-between items-end pt-6 border-t border-slate-200 border-dashed">
                    <span class="text-slate-500 font-bold uppercase tracking-widest text-xs">Tổng Thanh Toán</span>
                    <span class="text-2xl sm:text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500"><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="<?php echo e(route('home')); ?>" class="group w-full sm:w-auto flex items-center justify-center gap-2 bg-slate-900 text-white font-bold px-8 py-4 rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Tiếp tục mua sắm
                </a>
                <a href="<?php echo e(route('customers.orders')); ?>" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-white text-slate-600 border-2 border-slate-200 font-bold px-8 py-4 rounded-2xl hover:border-indigo-600 hover:text-indigo-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Theo dõi đơn hàng
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Checkout/success.blade.php ENDPATH**/ ?>