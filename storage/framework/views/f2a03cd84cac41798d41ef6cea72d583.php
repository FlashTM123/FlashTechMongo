<?php $__env->startSection('title', 'Thanh toán - FlashTech Premium'); ?>

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
            <a href="<?php echo e(route('cart.index')); ?>" class="hover:text-indigo-600 transition-colors">Giỏ hàng</a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-800 font-bold">Thanh toán</span>
        </nav>

        <div class="flex items-center gap-4 mb-10">
            <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">Thanh Toán</h1>
                <p class="text-slate-500 font-medium">Hoàn tất đơn hàng của bạn</p>
            </div>
        </div>

        <form action="<?php echo e(route('checkout.placeOrder')); ?>" method="POST" id="checkoutForm">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                
                <!-- Checkout Form -->
                <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-6">
                    
                    <!-- Shipping Box -->
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2 pb-4 border-b border-slate-100">
                            <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">1</span>
                            Thông tin giao hàng
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Họ và tên <span class="text-rose-500">*</span></label>
                                <input type="text" name="full_name" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-medium text-slate-800 placeholder:text-slate-400" value="<?php echo e(old('full_name', $customer->full_name ?? '')); ?>" placeholder="Nhập họ và tên đầy đủ..." required>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email <span class="text-rose-500">*</span></label>
                                <input type="email" name="email" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-medium text-slate-800 placeholder:text-slate-400" value="<?php echo e(old('email', $customer->email ?? '')); ?>" placeholder="example@gmail.com" required>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Số điện thoại <span class="text-rose-500">*</span></label>
                                <input type="tel" name="phone_number" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-medium text-slate-800 placeholder:text-slate-400" value="<?php echo e(old('phone_number', $customer->phone_number ?? '')); ?>" placeholder="09xxxxxxxxx" required>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Địa chỉ giao hàng <span class="text-rose-500">*</span></label>
                                <input type="text" name="shipping_address" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-medium text-slate-800 placeholder:text-slate-400" value="<?php echo e(old('shipping_address', $customer->address ?? '')); ?>" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố..." required>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-1 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Ghi chú đơn hàng</label>
                                <textarea name="notes" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all resize-y font-medium text-slate-800 placeholder:text-slate-400" placeholder="Ghi chú thêm về thời gian giao hàng hoặc địa chỉ... (tùy chọn)"><?php echo e(old('notes')); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods Box -->
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2 pb-4 border-b border-slate-100">
                            <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">2</span>
                            Phương thức thanh toán
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                            <!-- COD -->
                            <label class="group relative cursor-pointer">
                                <input type="radio" name="payment_method" value="cod" class="peer sr-only" <?php echo e(old('payment_method', 'cod') === 'cod' ? 'checked' : ''); ?>>
                                <div class="flex items-center gap-4 p-4 border-2 border-slate-200 rounded-2xl bg-white transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/50 hover:border-indigo-300">
                                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center text-2xl shadow-sm border border-slate-100">💵</div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 text-sm">Thanh toán khi nhận hàng</h4>
                                        <p class="text-xs text-slate-500">COD</p>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-indigo-600 peer-checked:bg-indigo-600 transition-colors">
                                        <div class="w-2.5 h-2.5 rounded-full bg-white scale-0 transition-transform peer-checked:scale-100" style="display: <?php echo e(old('payment_method', 'cod') === 'cod' ? 'block' : 'none'); ?>"></div>
                                    </div>
                                </div>
                            </label>

                            <!-- Bank Transfer -->
                            <label class="group relative cursor-pointer">
                                <input type="radio" name="payment_method" value="bank_transfer" class="peer sr-only" <?php echo e(old('payment_method') === 'bank_transfer' ? 'checked' : ''); ?>>
                                <div class="flex items-center gap-4 p-4 border-2 border-slate-200 rounded-2xl bg-white transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/50 hover:border-indigo-300">
                                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center text-2xl shadow-sm border border-slate-100">🏦</div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 text-sm">Chuyển khoản</h4 >
                                        <p class="text-xs text-slate-500">Bank Transfer</p>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-indigo-600 transition-colors"></div>
                                </div>
                            </label>

                            <!-- MoMo -->
                            <label class="group relative cursor-pointer">
                                <input type="radio" name="payment_method" value="momo" class="peer sr-only" <?php echo e(old('payment_method') === 'momo' ? 'checked' : ''); ?>>
                                <div class="flex items-center gap-4 p-4 border-2 border-slate-200 rounded-2xl bg-white transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/50 hover:border-indigo-300">
                                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center text-2xl shadow-sm border border-slate-100">📱</div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 text-sm">Ví MoMo</h4>
                                        <p class="text-xs text-slate-500">MoMo Wallet</p>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-indigo-600 transition-colors"></div>
                                </div>
                            </label>

                            <!-- VNPay -->
                            <label class="group relative cursor-pointer">
                                <input type="radio" name="payment_method" value="vnpay" class="peer sr-only" <?php echo e(old('payment_method') === 'vnpay' ? 'checked' : ''); ?>>
                                <div class="flex items-center gap-4 p-4 border-2 border-slate-200 rounded-2xl bg-white transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/50 hover:border-indigo-300">
                                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center text-2xl shadow-sm border border-slate-100">💳</div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 text-sm">VNPay</h4>
                                        <p class="text-xs text-slate-500">Thanh toán online</p>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-indigo-600 transition-colors"></div>
                                </div>
                            </label>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-xs text-rose-500 mt-2 block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8 lg:sticky lg:top-24 h-fit">
                        <h3 class="text-xl font-black text-slate-800 mb-6 drop-shadow-sm border-b border-slate-100 pb-4">
                            Đơn Hàng <span class="text-slate-400 text-base font-medium">(<?php echo e(count($cartItems)); ?> sản phẩm)</span>
                        </h3>

                        <!-- Items Preview -->
                        <div class="flex flex-col gap-4 mb-6 max-h-[300px] overflow-y-auto custom-scrollbar pr-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <div class="flex gap-4">
                                    <div class="w-16 h-16 shrink-0 bg-slate-50 rounded-xl border border-slate-100 p-1 relative">
                                        <?php 
                                            $img = !empty($item['product']->product_image) ? $item['product']->product_image : (!empty($item['product']->image) ? $item['product']->image : '');
                                            $imgUrl = empty($img) ? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' : (Str::startsWith($img, 'http') ? $img : asset('storage/' . $img));
                                        ?>
                                        <img src="<?php echo e($imgUrl); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';" alt="<?php echo e($item['product']->name); ?>" class="w-full h-full object-contain">
                                        <span class="absolute -top-2 -right-2 w-5 h-5 bg-slate-800 text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm border border-white"><?php echo e($item['quantity']); ?></span>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-center">
                                        <h4 class="text-xs font-bold text-slate-800 line-clamp-2 leading-tight mb-1"><?php echo e($item['product']->name); ?></h4>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($item['color'])): ?>
                                            <span class="text-[10px] text-slate-500 mb-1">Màu: <?php echo e($item['color']); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <span class="text-sm font-black text-indigo-600"><?php echo e(number_format($item['total'], 0, ',', '.')); ?>₫</span>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>

                        <!-- Coupon Section -->
                        <div class="bg-slate-50 border border-slate-200/70 rounded-2xl p-4 mb-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedCoupon): ?>
                                <div class="flex items-center justify-between bg-emerald-50 border border-emerald-200 rounded-xl p-3">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">Đã áp dụng mã</span>
                                        <span class="text-sm font-black text-emerald-800"><?php echo e($appliedCoupon['code']); ?></span>
                                    </div>
                                    <button type="button" class="text-xs font-bold text-rose-500 hover:text-rose-700 transition-colors" onclick="removeCoupon()">Hủy bỏ</button>
                                </div>
                                <input type="hidden" name="coupon_code" value="<?php echo e($appliedCoupon['code']); ?>">
                            <?php else: ?>
                                <div class="flex gap-2">
                                    <div class="relative flex-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                        </div>
                                        <input type="text" id="couponCode" class="w-full bg-white border border-slate-200 rounded-xl pl-9 pr-4 py-2.5 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all text-sm font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium uppercase" placeholder="Nhập mã ưu đãi..." maxlength="50">
                                    </div>
                                    <button type="button" class="bg-indigo-600 hover:bg-slate-900 text-white font-bold text-sm px-4 py-2.5 rounded-xl transition-colors shadow-md shadow-indigo-500/20 whitespace-nowrap disabled:opacity-50" onclick="applyCoupon()" id="couponBtn">Áp dụng</button>
                                </div>
                                <div id="couponMessage" class="hidden mt-2 text-xs font-medium px-2 py-1 rounded-md"></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <!-- Calculations -->
                        <div class="flex flex-col gap-3 mb-6 text-sm font-medium">
                            <div class="flex justify-between items-center text-slate-600">
                                <span>Tạm tính</span>
                                <span class="font-bold text-slate-800" id="subtotalDisplay"><?php echo e(number_format($subtotal, 0, ',', '.')); ?>₫</span>
                            </div>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedCoupon): ?>
                                <div class="flex justify-between items-center text-emerald-600 pb-3 border-b border-slate-100 border-dashed">
                                    <span>Giảm giá</span>
                                    <span class="font-bold" id="discountDisplay">-<?php echo e(number_format($appliedCoupon['discount'], 0, ',', '.')); ?>₫</span>
                                </div>
                            <?php else: ?>
                                <div class="hidden justify-between items-center text-emerald-600 pb-3 border-b border-slate-100 border-dashed" id="discountRow">
                                    <span>Giảm giá</span>
                                    <span class="font-bold" id="discountDisplay">-0₫</span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="flex justify-between items-center text-slate-600 pt-1">
                                <span>Phí vận chuyển</span>
                                <span class="font-bold text-emerald-500 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">Miễn phí</span>
                            </div>
                        </div>

                        <div class="border-t border-slate-200 pt-6 mb-8">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-slate-500 font-bold uppercase tracking-wider text-xs">Tổng Thanh Toán</span>
                                <span class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600" id="totalDisplay">
                                    <?php echo e(number_format($subtotal - ($appliedCoupon['discount'] ?? 0), 0, ',', '.')); ?>₫
                                </span>
                            </div>
                            <p class="text-right text-[10px] text-slate-400 font-medium">(Đã bao gồm VAT)</p>
                        </div>

                        <button type="submit" class="group w-full flex items-center justify-center gap-2 bg-slate-900 text-white font-bold px-6 py-4 rounded-2xl border-2 border-slate-900 shadow-xl shadow-slate-900/20 hover:bg-indigo-600 hover:border-indigo-600 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="group-hover:-translate-x-1 transition-transform">Hoàn tất đặt hàng</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </button>

                        <a href="<?php echo e(route('cart.index')); ?>" class="w-full flex items-center justify-center text-slate-500 font-bold px-6 py-4 rounded-2xl hover:bg-slate-50 hover:text-indigo-600 transition-colors mt-3 gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kiểm tra lại giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Radio button styling trick
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('input[name="payment_method"]').forEach(r => {
                const dot = r.closest('label').querySelector('.rounded-full > div');
                if(dot) dot.style.display = 'none';
            });
            const selectedDot = this.closest('label').querySelector('.rounded-full > div');
            if(selectedDot) selectedDot.style.display = 'block';
        });
    });

    // Form submission styling
    document.getElementById('checkoutForm').addEventListener('submit', function() {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';
    });

    const subtotal = <?php echo e($subtotal); ?>;

    function showCouponMessage(msg, type) {
        const el = document.getElementById('couponMessage');
        el.textContent = msg;
        el.classList.remove('hidden', 'bg-emerald-50', 'text-emerald-600', 'bg-rose-50', 'text-rose-600');
        if(type === 'success') {
            el.classList.add('bg-emerald-50', 'text-emerald-600');
        } else {
            el.classList.add('bg-rose-50', 'text-rose-600');
        }
    }

    async function applyCoupon() {
        const code = document.getElementById('couponCode').value.trim();
        const btn = document.getElementById('couponBtn');

        if (!code) {
            showCouponMessage('Vui lòng nhập mã ưu đãi!', 'error');
            return;
        }

        btn.disabled = true;
        btn.textContent = 'Đang xử lý...';

        try {
            const response = await fetch('<?php echo e(route("checkout.validateCoupon")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('[name="_token"]').value,
                },
                body: JSON.stringify({
                    code: code,
                    subtotal: subtotal,
                }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.reload();
            } else {
                showCouponMessage(data.message || 'Mã ưu đãi không hợp lệ!', 'error');
                btn.disabled = false;
                btn.textContent = 'Áp dụng';
            }
        } catch (error) {
            showCouponMessage('Có lỗi xảy ra, vui lòng thử lại!', 'error');
            btn.disabled = false;
            btn.textContent = 'Áp dụng';
        }
    }

    async function removeCoupon() {
        try {
            const response = await fetch('<?php echo e(route("checkout.removeCoupon")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('[name="_token"]').value,
                },
            });

            if (response.ok) {
                window.location.reload();
            }
        } catch (error) {
            console.error('Remove coupon error:', error);
        }
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Checkout/index.blade.php ENDPATH**/ ?>