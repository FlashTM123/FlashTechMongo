<?php $__env->startSection('title', 'Thông tin cá nhân - FlashTech Premium'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-[250px] sm:h-[300px] bg-slate-900 absolute top-0 inset-x-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-purple-900/80 to-slate-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-30 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-5xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-300 mb-8 w-fit px-1">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Trang chủ</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-bold tracking-wide">Hồ sơ cá nhân</span>
        </nav>

        <!-- Profile Card -->
        <div class="bg-white/70 backdrop-blur-xl rounded-[2.5rem] shadow-2xl shadow-indigo-500/10 border border-white p-6 sm:p-10 mb-8 relative">
            
            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start relative z-10">
                <!-- Avatar & Status -->
                <div class="relative shrink-0">
                    <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full border-8 border-white shadow-xl shadow-slate-200/50 bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center overflow-hidden">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($customer->profile_picture_url): ?>
                            <img src="<?php echo e($customer->profile_picture_url); ?>" alt="<?php echo e($customer->full_name); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <span class="text-5xl font-black text-white"><?php echo e(substr($customer->full_name, 0, 1)); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="absolute bottom-2 right-2 w-8 h-8 rounded-full border-4 border-white bg-emerald-500 shadow-sm" title="Đang hoạt động"></div>
                </div>

                <!-- Bio Info -->
                <div class="flex-1 text-center md:text-left mt-2">
                    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mb-2"><?php echo e($customer->full_name); ?></h1>
                    
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 mb-6">
                        <div class="flex items-center gap-2 text-slate-500 font-medium bg-slate-100/80 px-4 py-2 rounded-xl">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            <?php echo e($customer->email); ?>

                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($customer->google_id): ?>
                            <div class="flex items-center gap-2 font-bold text-slate-700 bg-white border border-slate-200 shadow-sm px-4 py-2 rounded-xl">
                                <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                                Liên kết Google
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-3">
                        <a href="<?php echo e(route('customers.profile.edit')); ?>" class="group flex items-center gap-2 bg-indigo-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-indigo-500/30 hover:bg-slate-900 transition-all">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Chỉnh sửa hồ sơ
                        </a>
                        <a href="<?php echo e(route('customers.password.change')); ?>" class="flex items-center gap-2 bg-white text-slate-700 font-bold px-6 py-3 rounded-xl border border-slate-200 shadow-sm hover:border-indigo-600 hover:text-indigo-600 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 11V7a5 5 0 0110 0v4"></path></svg>
                            Đổi mật khẩu
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Ribbon -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-10 p-4 bg-slate-50/50 rounded-3xl border border-slate-100">
                <div class="bg-white rounded-2xl p-4 flex items-center justify-center gap-4 border border-slate-100/50 shadow-sm hover:-translate-y-1 transition-transform">
                    <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <div class="text-left">
                        <div class="text-3xl font-black text-slate-800"><?php echo e($ordersCount ?? 0); ?></div>
                        <div class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Đơn hàng</div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 flex items-center justify-center gap-4 border border-slate-100/50 shadow-sm hover:-translate-y-1 transition-transform">
                    <div class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-left">
                        <div class="text-3xl font-black text-slate-800"><?php echo e(number_format($customer->loyalty_points ?? 0)); ?></div>
                        <div class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Điểm tích lũy</div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 flex items-center justify-center gap-4 border border-slate-100/50 shadow-sm hover:-translate-y-1 transition-transform">
                    <div class="w-14 h-14 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                    </div>
                    <div class="text-left">
                        <div class="text-3xl font-black text-slate-800"><?php echo e($reviewsCount ?? 0); ?></div>
                        <div class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Đánh giá</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Card -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 h-full flex flex-col group">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-800">Thông tin liên hệ</h3>
                </div>

                <div class="flex flex-col gap-6 flex-1">
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Mã khách hàng</span>
                        <span class="font-black text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg tracking-widest"><?php echo e($customer->customer_code); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 pb-4 border-b border-slate-50">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Số điện thoại</span>
                        <span class="font-bold text-slate-800"><?php echo e($customer->phone_number ?? '— Chưa cập nhật'); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 pb-4 border-b border-slate-50">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Giới tính</span>
                        <span class="font-bold text-slate-800">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($customer->gender == 'male'): ?> Nam
                            <?php elseif($customer->gender == 'female'): ?> Nữ
                            <?php else: ?> — Chưa cập nhật
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                    <div class="flex justify-between items-start flex-col sm:flex-row gap-1">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Địa chỉ</span>
                        <span class="font-bold text-slate-800 sm:text-right"><?php echo e($customer->address ?? '— Chưa cập nhật'); ?></span>
                    </div>
                </div>
            </div>

            <!-- Account Card -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 h-full flex flex-col group">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-800">Tài khoản & Bảo mật</h3>
                </div>

                <div class="flex flex-col gap-6 flex-1">
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 pb-4 border-b border-slate-50">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Trạng thái</span>
                        <span class="font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg">Hoạt động</span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 pb-4 border-b border-slate-50">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Xác thực</span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($customer->google_id): ?>
                            <span class="font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Google Oauth</span>
                        <?php elseif($customer->email_verified_at): ?>
                            <span class="font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg">Đã xác thực Email</span>
                        <?php else: ?>
                            <span class="font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-lg">Chưa xác thực</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1 pb-4 border-b border-slate-50">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Tham gia ngày</span>
                        <span class="font-bold text-slate-800"><?php echo e($customer->created_at->format('d/m/Y')); ?></span>
                    </div>
                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row gap-1">
                        <span class="text-sm font-medium text-slate-500 min-w-[120px]">Cập nhật cuối</span>
                        <span class="font-bold text-slate-800"><?php echo e($customer->updated_at->format('d/m/Y H:i')); ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/profile_detail.blade.php ENDPATH**/ ?>