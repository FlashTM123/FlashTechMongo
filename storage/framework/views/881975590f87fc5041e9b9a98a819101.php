<?php $__env->startSection('title', 'Đơn hàng của tôi - FlashTech'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --dark: #1e293b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --white: #ffffff;
        }

        .orders-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .breadcrumb a {
            color: var(--gray-600);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .current {
            color: var(--dark);
            font-weight: 500;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title svg {
            width: 28px;
            height: 28px;
            color: var(--primary);
        }

        /* Filter tabs */
        .filter-tabs {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 0.5rem 1.25rem;
            border-radius: 20px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            border: 2px solid var(--gray-200);
            color: var(--gray-600);
            background: var(--white);
        }

        .filter-tab:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-tab.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border-color: transparent;
        }

        /* Order Cards */
        .order-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 1rem;
            overflow: hidden;
            transition: box-shadow 0.2s;
        }

        .order-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .order-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .order-code {
            font-size: 0.9375rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-code svg {
            width: 18px;
            height: 18px;
        }

        .order-date {
            font-size: 0.8125rem;
            color: var(--gray-400);
        }

        .order-status {
            padding: 0.375rem 0.875rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status-processing {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .status-shipped {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
        }

        .status-delivered {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .order-card-body {
            padding: 1rem 1.5rem;
        }

        .order-items-preview {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .order-item-row {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .order-item-image {
            width: 56px;
            height: 56px;
            border-radius: 10px;
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
            min-width: 0;
        }

        .order-item-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .order-item-qty {
            font-size: 0.75rem;
            color: var(--gray-400);
            margin-top: 0.125rem;
        }

        .order-item-price {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--dark);
            white-space: nowrap;
        }

        .order-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--gray-100);
            background: var(--gray-50);
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .order-total {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-total-label {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .order-total-value {
            font-size: 1.125rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-view-detail {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--primary);
            border: 2px solid var(--primary);
            transition: all 0.2s;
        }

        .btn-view-detail:hover {
            background: var(--primary);
            color: var(--white);
        }

        .btn-view-detail svg {
            width: 16px;
            height: 16px;
        }

        .btn-cancel-order {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--white);
            background: var(--danger);
            border: 2px solid var(--danger);
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-cancel-order:hover {
            background: #dc2626;
            border-color: #dc2626;
        }

        .btn-cancel-order svg {
            width: 16px;
            height: 16px;
        }

        .order-actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Payment info */
        .payment-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8125rem;
            color: var(--gray-500);
        }

        .payment-info svg {
            width: 16px;
            height: 16px;
        }

        /* Empty state */
        .empty-orders {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .empty-orders svg {
            width: 90px;
            height: 90px;
            color: var(--gray-300);
            margin-bottom: 1.5rem;
        }

        .empty-orders h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .empty-orders p {
            color: var(--gray-500);
            margin-bottom: 1.5rem;
        }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-shop:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        /* Pagination */
        .pagination-wrapper {
            margin-top: 1.5rem;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper .pagination {
            display: flex;
            gap: 0.375rem;
            list-style: none;
            padding: 0;
        }

        .pagination-wrapper .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--gray-600);
            background: var(--white);
            border: 2px solid var(--gray-200);
            transition: all 0.2s;
        }

        .pagination-wrapper .page-item .page-link:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .pagination-wrapper .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border-color: transparent;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-card-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-item-row {
                gap: 0.75rem;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="orders-page">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo e(route('home')); ?>">Trang chủ</a>
                <span>/</span>
                <span class="current">Đơn hàng của tôi</span>
            </div>

            <div class="page-header">
                <h1 class="page-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                    </svg>
                    Đơn hàng của tôi
                </h1>

                <div class="filter-tabs">
                    <a href="<?php echo e(route('customers.orders')); ?>" class="filter-tab <?php echo e(!request('status') ? 'active' : ''); ?>">Tất cả</a>
                    <a href="<?php echo e(route('customers.orders', ['status' => 'pending'])); ?>" class="filter-tab <?php echo e(request('status') === 'pending' ? 'active' : ''); ?>">Chờ xử lý</a>
                    <a href="<?php echo e(route('customers.orders', ['status' => 'processing'])); ?>" class="filter-tab <?php echo e(request('status') === 'processing' ? 'active' : ''); ?>">Đang xử lý</a>
                    <a href="<?php echo e(route('customers.orders', ['status' => 'shipped'])); ?>" class="filter-tab <?php echo e(request('status') === 'shipped' ? 'active' : ''); ?>">Đang giao hàng</a>
                    <a href="<?php echo e(route('customers.orders', ['status' => 'delivered'])); ?>" class="filter-tab <?php echo e(request('status') === 'delivered' ? 'active' : ''); ?>">Đã giao</a>
                    <a href="<?php echo e(route('customers.orders', ['status' => 'cancelled'])); ?>" class="filter-tab <?php echo e(request('status') === 'cancelled' ? 'active' : ''); ?>">Đã hủy</a>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->count() > 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="order-card">
                        <div class="order-card-header">
                            <div>
                                <div class="order-code">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    </svg>
                                    <?php echo e($order->order_code); ?>

                                </div>
                                <div class="order-date"><?php echo e($order->created_at->format('d/m/Y H:i')); ?></div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <?php
                                    $statusMap = [
                                        'pending' => ['class' => 'status-pending', 'label' => 'Chờ xử lý'],
                                        'processing' => ['class' => 'status-processing', 'label' => 'Đang xử lý'],
                                        'shipped' => ['class' => 'status-shipped', 'label' => 'Đang giao hàng'],
                                        'delivered' => ['class' => 'status-delivered', 'label' => 'Đã giao'],
                                        'cancelled' => ['class' => 'status-cancelled', 'label' => 'Đã hủy'],
                                    ];
                                    $status = $statusMap[$order->order_status] ?? ['class' => 'status-pending', 'label' => $order->order_status];
                                ?>
                                <span class="order-status <?php echo e($status['class']); ?>"><?php echo e($status['label']); ?></span>
                            </div>
                        </div>

                        <div class="order-card-body">
                            <div class="order-items-preview">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->orderDetails->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <div class="order-item-row">
                                        <div class="order-item-image">
                                            <?php
                                                $img = $detail->product_image ?? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';
                                            ?>
                                            <img src="<?php echo e($img); ?>" alt="<?php echo e($detail->product_name); ?>">
                                        </div>
                                        <div class="order-item-info">
                                            <div class="order-item-name"><?php echo e($detail->product_name); ?></div>
                                            <div class="order-item-qty">
                                                x<?php echo e($detail->quantity); ?>

                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($detail->color)): ?>
                                                    | Màu: <?php echo e($detail->color); ?>

                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="order-item-price"><?php echo e(number_format($detail->total, 0, ',', '.')); ?>₫</div>
                                    </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->orderDetails->count() > 3): ?>
                                    <div style="font-size: 0.8125rem; color: var(--gray-400); padding-left: 0.5rem;">
                                        và <?php echo e($order->orderDetails->count() - 3); ?> sản phẩm khác...
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        <div class="order-card-footer">
                            <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                                <div class="order-total">
                                    <span class="order-total-label">Tổng:</span>
                                    <span class="order-total-value"><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</span>
                                </div>
                                <div class="payment-info">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($order->payment_method):
                                        case ('cod'): ?> Thanh toán khi nhận hàng <?php break; ?>
                                        <?php case ('bank_transfer'): ?> Chuyển khoản <?php break; ?>
                                        <?php case ('momo'): ?> Ví MoMo <?php break; ?>
                                        <?php case ('vnpay'): ?> VNPay <?php break; ?>
                                    <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <div class="order-actions">
                                <a href="<?php echo e(route('customers.orders.detail', $order->_id)); ?>" class="btn-view-detail">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    Xem chi tiết
                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($order->order_status, ['pending', 'processing'])): ?>
                                    <form action="<?php echo e(route('customers.orders.cancel', $order->_id)); ?>" method="POST"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn-cancel-order">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            Hủy
                                        </button>
                                    </form>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->hasPages()): ?>
                    <div class="pagination-wrapper">
                        <?php echo e($orders->links()); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <div class="empty-orders">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                    </svg>
                    <h3>Chưa có đơn hàng nào</h3>
                    <p>Bạn chưa có đơn hàng nào. Hãy mua sắm ngay!</p>
                    <a href="<?php echo e(route('home')); ?>" class="btn-shop">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                        Mua sắm ngay
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Customers.Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/flashtm/FlashTechMongo/resources/views/Customers/Orders/index.blade.php ENDPATH**/ ?>