<?php $__env->startSection('title', 'Đặt hàng thành công - FlashTech'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --success: #10b981;
            --dark: #1e293b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --white: #ffffff;
        }

        .success-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 3rem 0;
        }

        .container {
            max-width: 720px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .success-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 3rem 2rem;
            text-align: center;
        }

        .success-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--success), #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .success-icon svg {
            width: 45px;
            height: 45px;
            color: var(--white);
        }

        .success-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .success-message {
            color: var(--gray-500);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .order-info {
            background: var(--gray-50);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }

        .order-info h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-200);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            font-size: 0.9375rem;
        }

        .info-row .label {
            color: var(--gray-500);
        }

        .info-row .value {
            font-weight: 600;
            color: var(--dark);
        }

        .info-row .value.highlight {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 1.125rem;
            font-weight: 800;
        }

        .order-code {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
        }

        /* Order items */
        .order-items {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            overflow: hidden;
            background: var(--gray-100);
            flex-shrink: 0;
        }

        .order-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-item-info {
            flex: 1;
            text-align: left;
        }

        .order-item-name {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--dark);
        }

        .order-item-qty {
            font-size: 0.75rem;
            color: var(--gray-400);
        }

        .order-item-price {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--primary);
            white-space: nowrap;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-size: 0.9375rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .btn-outline {
            background: var(--white);
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="success-page">
        <div class="container">
            <div class="success-card">
                <div class="success-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>

                <h1 class="success-title">Đặt hàng thành công!</h1>
                <p class="success-message">Cảm ơn bạn đã mua hàng tại FlashTech. Đơn hàng của bạn đã được tiếp nhận và sẽ được xử lý sớm nhất.</p>

                <div class="order-info">
                    <h4>Thông tin đơn hàng</h4>
                    <div class="info-row">
                        <span class="label">Mã đơn hàng</span>
                        <span class="order-code"><?php echo e($order->order_code); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Người nhận</span>
                        <span class="value"><?php echo e($order->full_name); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Số điện thoại</span>
                        <span class="value"><?php echo e($order->phone_number); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Địa chỉ</span>
                        <span class="value"><?php echo e($order->shipping_address); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Thanh toán</span>
                        <span class="value">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($order->payment_method):
                                case ('cod'): ?> Thanh toán khi nhận hàng <?php break; ?>
                                <?php case ('bank_transfer'): ?> Chuyển khoản ngân hàng <?php break; ?>
                                <?php case ('momo'): ?> Ví MoMo <?php break; ?>
                                <?php case ('vnpay'): ?> VNPay <?php break; ?>
                            <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>

                    <div class="order-items">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <div class="order-item">
                                <div class="order-item-image">
                                    <?php
                                        $img = $detail->product_image;
                                        $imgUrl = $img && Str::startsWith($img, 'http') ? $img : asset('storage/' . $img);
                                    ?>
                                    <img src="<?php echo e($imgUrl); ?>" alt="<?php echo e($detail->product_name); ?>">
                                </div>
                                <div class="order-item-info">
                                    <div class="order-item-name"><?php echo e($detail->product_name); ?></div>
                                    <div class="order-item-qty">
                                        SL: <?php echo e($detail->quantity); ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($detail->color)): ?>
                                            | Màu: <?php echo e($detail->color); ?>

                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                <div class="order-item-price"><?php echo e(number_format($detail->total, 0, ',', '.')); ?>₫</div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                    <div class="info-row" style="margin-top: 1rem; padding-top: 1rem; border-top: 2px solid var(--gray-200);">
                        <span class="label" style="font-weight: 700; color: var(--dark); font-size: 1.0625rem;">Tổng cộng</span>
                        <span class="value highlight"><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</span>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                        Tiếp tục mua sắm
                    </a>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-outline">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Về trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/FlashTechMongo/resources/views/Customers/Checkout/success.blade.php ENDPATH**/ ?>