@extends('Customers.Layouts.master')

@section('title', 'Chi tiết đơn hàng ' . $order->order_code . ' - FlashTech')

@push('styles')
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

        .order-detail-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 1000px;
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
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title svg {
            width: 26px;
            height: 26px;
            color: var(--primary);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
            transition: all 0.2s;
        }

        .btn-back:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-back svg {
            width: 16px;
            height: 16px;
        }

        .btn-download-invoice {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--white);
            background: var(--success);
            border: 2px solid var(--success);
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-download-invoice:hover {
            background: #059669;
            border-color: #059669;
        }

        .btn-download-invoice svg {
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
            text-decoration: none;
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

        /* Status Timeline */
        .order-status {
            padding: 0.375rem 0.875rem;
            border-radius: 20px;
            font-size: 0.8125rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending { background: rgba(245, 158, 11, 0.1); color: var(--warning); }
        .status-processing { background: rgba(59, 130, 246, 0.1); color: var(--info); }
        .status-shipped { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
        .status-delivered { background: rgba(16, 185, 129, 0.1); color: var(--success); }
        .status-cancelled { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

        /* Cards */
        .detail-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .detail-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .detail-card-header h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-card-header h3 svg {
            width: 20px;
            height: 20px;
            color: var(--primary);
        }

        .detail-card-body {
            padding: 1.5rem;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .info-label {
            font-size: 0.8125rem;
            color: var(--gray-400);
        }

        .info-value {
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--dark);
        }

        /* Order Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
        }

        .items-table th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray-400);
            border-bottom: 2px solid var(--gray-100);
        }

        .items-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-100);
            vertical-align: middle;
        }

        .items-table tr:last-child td {
            border-bottom: none;
        }

        .item-product {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            overflow: hidden;
            background: var(--gray-100);
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark);
        }

        .item-price-cell {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .item-qty-cell {
            font-size: 0.875rem;
            color: var(--gray-600);
            text-align: center;
        }

        .item-total-cell {
            font-size: 0.9375rem;
            font-weight: 700;
            color: var(--dark);
            text-align: right;
        }

        /* Summary */
        .order-summary {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-100);
        }

        .summary-rows {
            max-width: 320px;
            margin-left: auto;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            font-size: 0.9375rem;
            color: var(--gray-600);
        }

        .summary-row.total {
            border-top: 2px solid var(--gray-200);
            margin-top: 0.5rem;
            padding-top: 0.75rem;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
        }

        .summary-row.total .total-value {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Payment Status */
        .payment-status {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .payment-unpaid {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .payment-paid {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .items-table thead {
                display: none;
            }

            .items-table td {
                display: block;
                text-align: right;
                padding: 0.5rem 1rem;
            }

            .items-table td::before {
                content: attr(data-label);
                float: left;
                font-weight: 600;
                color: var(--gray-400);
                font-size: 0.75rem;
                text-transform: uppercase;
            }

            .item-product {
                justify-content: flex-end;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
@endpush

@section('content')
    <div class="order-detail-page">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span>/</span>
                <a href="{{ route('customers.orders') }}">Đơn hàng</a>
                <span>/</span>
                <span class="current">{{ $order->order_code }}</span>
            </div>

            <div class="page-header">
                <h1 class="page-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                    </svg>
                    Đơn hàng {{ $order->order_code }}
                </h1>
                <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                    <a href="{{ route('customers.orders') }}" class="btn-back">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Quay lại
                    </a>
                    <a href="{{ route('customers.orders.invoice', $order->_id) }}" class="btn-download-invoice">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Xuất hóa đơn PDF
                    </a>
                    @if (in_array($order->order_status, ['pending', 'processing']))
                        <form action="{{ route('customers.orders.cancel', $order->_id) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                            @csrf
                            <button type="submit" class="btn-cancel-order">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                Hủy đơn hàng
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Order Info -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        Thông tin đơn hàng
                    </h3>
                    @php
                        $statusMap = [
                            'pending' => ['class' => 'status-pending', 'label' => 'Chờ xử lý'],
                            'processing' => ['class' => 'status-processing', 'label' => 'Đang xử lý'],
                            'shipped' => ['class' => 'status-shipped', 'label' => 'Đang giao hàng'],
                            'delivered' => ['class' => 'status-delivered', 'label' => 'Đã giao'],
                            'cancelled' => ['class' => 'status-cancelled', 'label' => 'Đã hủy'],
                        ];
                        $status = $statusMap[$order->order_status] ?? ['class' => 'status-pending', 'label' => $order->order_status];
                        $paymentLabel = match($order->payment_method) {
                            'cod' => 'Thanh toán khi nhận hàng',
                            'bank_transfer' => 'Chuyển khoản ngân hàng',
                            'momo' => 'Ví MoMo',
                            'vnpay' => 'VNPay',
                            default => $order->payment_method,
                        };
                    @endphp
                    <span class="order-status {{ $status['class'] }}">{{ $status['label'] }}</span>
                </div>
                <div class="detail-card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Mã đơn hàng</span>
                            <span class="info-value" style="color: var(--primary);">{{ $order->order_code }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Ngày đặt</span>
                            <span class="info-value">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Phương thức thanh toán</span>
                            <span class="info-value">{{ $paymentLabel }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Trạng thái thanh toán</span>
                            <span class="payment-status {{ $order->payment_status === 'paid' ? 'payment-paid' : 'payment-unpaid' }}">
                                {{ $order->payment_status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                        Thông tin giao hàng
                    </h3>
                </div>
                <div class="detail-card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Người nhận</span>
                            <span class="info-value">{{ $order->full_name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Số điện thoại</span>
                            <span class="info-value">{{ $order->phone_number }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">{{ $order->email }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Địa chỉ giao hàng</span>
                            <span class="info-value">{{ $order->shipping_address }}</span>
                        </div>
                        @if ($order->notes)
                            <div class="info-item" style="grid-column: 1 / -1;">
                                <span class="info-label">Ghi chú</span>
                                <span class="info-value" style="font-weight: 500;">{{ $order->notes }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <h3>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Sản phẩm ({{ $order->orderDetails->count() }})
                    </h3>
                </div>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th style="text-align: center;">SL</th>
                            <th style="text-align: right;">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            <tr>
                                <td data-label="Sản phẩm">
                                    <div class="item-product">
                                        <div class="item-image">
                                            @php
                                                $img = $detail->product_image;
                                                $imgUrl = $img && Str::startsWith($img, 'http') ? $img : asset('storage/' . $img);
                                            @endphp
                                            <img src="{{ $imgUrl }}" alt="{{ $detail->product_name }}">
                                        </div>
                                        <div class="item-name">
                                            {{ $detail->product_name }}
                                            @if(!empty($detail->color))
                                                <br><small style="color: var(--gray-400);">Màu: {{ $detail->color }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Đơn giá" class="item-price-cell">
                                    @if ($detail->sale_price > 0 && $detail->sale_price < $detail->price)
                                        {{ number_format($detail->sale_price, 0, ',', '.') }}₫
                                        <br><small style="text-decoration: line-through; color: var(--gray-400);">{{ number_format($detail->price, 0, ',', '.') }}₫</small>
                                    @else
                                        {{ number_format($detail->price, 0, ',', '.') }}₫
                                    @endif
                                </td>
                                <td data-label="Số lượng" class="item-qty-cell">{{ $detail->quantity }}</td>
                                <td data-label="Thành tiền" class="item-total-cell">{{ number_format($detail->total, 0, ',', '.') }}₫</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="order-summary">
                    <div class="summary-rows">
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span>{{ number_format($order->subtotal, 0, ',', '.') }}₫</span>
                        </div>
                        @if ($order->discount > 0)
                            <div class="summary-row">
                                <span>Giảm giá</span>
                                <span style="color: var(--danger);">-{{ number_format($order->discount, 0, ',', '.') }}₫</span>
                            </div>
                        @endif
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span style="color: var(--success);">Miễn phí</span>
                        </div>
                        <div class="summary-row total">
                            <span>Tổng cộng</span>
                            <span class="total-value">{{ number_format($order->total, 0, ',', '.') }}₫</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
