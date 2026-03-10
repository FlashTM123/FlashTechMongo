@extends('Admins.app')
@section('title', 'Chi tiết đơn hàng #' . ($order->order_code ?? ''))
@section('content')

<div class="order-detail-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <a href="{{ route('orders.index') }}" class="back-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5"></path>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Quay lại danh sách
            </a>
            <div class="header-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                    <rect x="9" y="3" width="6" height="4" rx="1"></rect>
                </svg>
                ĐƠN HÀNG #{{ $order->order_code }}
            </div>
            <h1>Chi tiết đơn hàng</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="detail-grid">
        <!-- Order Info Card -->
        <div class="detail-card">
            <div class="card-header">
                <h3>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                        <rect x="9" y="3" width="6" height="4" rx="1"></rect>
                    </svg>
                    Thông tin đơn hàng
                </h3>
            </div>
            <div class="card-body">
                <div class="info-row">
                    <span class="info-label">Mã đơn hàng</span>
                    <span class="info-value"><strong>#{{ $order->order_code }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Ngày đặt</span>
                    <span class="info-value">{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phương thức TT</span>
                    <span class="info-value">
                        @php
                            $paymentLabels = [
                                'cod' => 'Thanh toán khi nhận hàng (COD)',
                                'bank_transfer' => 'Chuyển khoản ngân hàng',
                                'momo' => 'Ví MoMo',
                                'vnpay' => 'VNPay',
                            ];
                        @endphp
                        {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Ghi chú</span>
                    <span class="info-value">{{ $order->notes ?? 'Không có' }}</span>
                </div>
            </div>
        </div>

        <!-- Customer Info Card -->
        <div class="detail-card">
            <div class="card-header">
                <h3>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Thông tin khách hàng
                </h3>
            </div>
            <div class="card-body">
                <div class="info-row">
                    <span class="info-label">Họ tên</span>
                    <span class="info-value"><strong>{{ $order->full_name }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $order->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Số điện thoại</span>
                    <span class="info-value">{{ $order->phone_number }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Địa chỉ giao hàng</span>
                    <span class="info-value">{{ $order->shipping_address }}</span>
                </div>
            </div>
        </div>

        <!-- Status Update Card -->
        <div class="detail-card status-card">
            <div class="card-header">
                <h3>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                    </svg>
                    Cập nhật trạng thái
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="order_status">Trạng thái đơn hàng</label>
                        <select name="order_status" id="order_status" class="form-select">
                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Đã giao hàng</option>
                            <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_status">Trạng thái thanh toán</label>
                        <select name="payment_status" id="payment_status" class="form-select">
                            <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Chưa thanh toán</option>
                            <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                            <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Thất bại</option>
                            <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Hoàn tiền</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Cập nhật
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="detail-card items-card">
        <div class="card-header">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                </svg>
                Sản phẩm trong đơn hàng
            </h3>
            <span class="item-count">{{ count($order->orderDetails ?? []) }} sản phẩm</span>
        </div>
        <div class="table-wrapper">
            <table class="items-table">
                <thead>
                    <tr>
                        <th style="width: 60px">#</th>
                        <th>Sản phẩm</th>
                        <th class="right">Đơn giá</th>
                        <th class="center">Số lượng</th>
                        <th class="right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order->orderDetails ?? [] as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="product-cell">
                                @if($item->product_image)
                                    <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}" class="product-thumb">
                                @else
                                    <div class="product-thumb-placeholder">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </div>
                                @endif
                                <div class="product-info">
                                    <strong>{{ $item->product_name }}</strong>
                                    @if($item->sale_price && $item->sale_price < $item->price)
                                        <span class="original-price">{{ number_format($item->price, 0, ',', '.') }}₫</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="right">
                            <strong>{{ number_format($item->sale_price ?? $item->price, 0, ',', '.') }}₫</strong>
                        </td>
                        <td class="center">
                            <span class="qty-badge">{{ $item->quantity }}</span>
                        </td>
                        <td class="right">
                            <strong class="item-total">{{ number_format($item->total, 0, ',', '.') }}₫</strong>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty-items">Không có sản phẩm</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <div class="summary-row">
                <span>Tạm tính</span>
                <span>{{ number_format($order->subtotal, 0, ',', '.') }}₫</span>
            </div>
            <div class="summary-row">
                <span>Giảm giá</span>
                <span class="discount">-{{ number_format($order->discount, 0, ',', '.') }}₫</span>
            </div>
            <div class="summary-row summary-total">
                <span>Tổng cộng</span>
                <span>{{ number_format($order->total, 0, ',', '.') }}₫</span>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #667eea;
        --primary-dark: #764ba2;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --gray-100: #f8fafc;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-600: #475569;
        --gray-700: #334155;
        --gray-900: #1e293b;
    }

    [data-theme="dark"] {
        --gray-100: #0f172a;
        --gray-200: #1e293b;
        --gray-300: #334155;
        --gray-600: #cbd5e1;
        --gray-700: #e2e8f0;
        --gray-900: #f1f5f9;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    .order-detail-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.6s ease;
    }

    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Header */
    .page-header { margin-bottom: 2rem; }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .back-link:hover { transform: translateX(-4px); }

    .header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 0.75rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .header-left h1 {
        font-size: 2.25rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -1px;
    }

    /* Alert */
    .alert-success {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        color: #166534;
        border-radius: 1rem;
        font-weight: 600;
        margin-bottom: 2rem;
        border: 1px solid #86efac;
    }

    [data-theme="dark"] .alert-success {
        background: linear-gradient(135deg, #047857 0%, #059669 100%);
        color: #dcfce7;
        border-color: #10b981;
    }

    /* Grid */
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    /* Cards */
    .detail-card {
        background: white;
        border-radius: 1.25rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    [data-theme="dark"] .detail-card {
        background: var(--gray-200);
        border-color: var(--gray-300);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 2px solid var(--gray-200);
    }

    [data-theme="dark"] .card-header {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
        border-bottom-color: var(--gray-300);
    }

    .card-header h3 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.125rem;
        font-weight: 800;
        color: var(--gray-900);
    }

    .card-body { padding: 1.5rem 2rem; }

    /* Info Rows */
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 0.875rem 0;
        border-bottom: 1px solid var(--gray-200);
    }

    [data-theme="dark"] .info-row { border-bottom-color: var(--gray-300); }

    .info-row:last-child { border-bottom: none; }

    .info-label {
        color: var(--gray-600);
        font-weight: 500;
        font-size: 0.9rem;
        flex-shrink: 0;
        min-width: 120px;
    }

    .info-value {
        color: var(--gray-900);
        font-size: 0.95rem;
        text-align: right;
        word-break: break-word;
    }

    /* Form */
    .form-group { margin-bottom: 1.25rem; }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-select {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.75rem;
        background-color: white;
        color: var(--gray-900);
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
    }

    [data-theme="dark"] .form-select {
        background-color: var(--gray-100);
        border-color: var(--gray-300);
    }

    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .btn {
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.875rem 1.75rem;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
        width: 100%;
        justify-content: center;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    }

    /* Items Card */
    .items-card { margin-bottom: 2rem; }

    .item-count {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.375rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .table-wrapper { overflow-x: auto; }

    .items-table { width: 100%; border-collapse: collapse; }

    .items-table th {
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 700;
        color: var(--gray-600);
        font-size: 0.8125rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid var(--gray-200);
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    [data-theme="dark"] .items-table th {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
        border-bottom-color: var(--gray-300);
    }

    .items-table th.center, .items-table td.center { text-align: center; }
    .items-table th.right, .items-table td.right { text-align: right; }

    .items-table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--gray-200);
        color: var(--gray-900);
    }

    [data-theme="dark"] .items-table td { border-bottom-color: var(--gray-300); }

    /* Product Cell */
    .product-cell {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .product-thumb {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 0.5rem;
        border: 1px solid var(--gray-200);
    }

    .product-thumb-placeholder {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gray-100);
        border: 2px dashed var(--gray-300);
        border-radius: 0.5rem;
        color: var(--gray-600);
    }

    .product-info { display: flex; flex-direction: column; gap: 0.25rem; }
    .product-info strong { font-size: 0.95rem; }

    .original-price {
        text-decoration: line-through;
        color: var(--gray-600);
        font-size: 0.8rem;
    }

    .qty-badge {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
        font-weight: 700;
        font-size: 0.9rem;
    }

    [data-theme="dark"] .qty-badge {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        color: #dbeafe;
    }

    .item-total { color: var(--danger); font-weight: 700; }

    .empty-items {
        text-align: center;
        padding: 3rem;
        color: var(--gray-600);
    }

    /* Order Summary */
    .order-summary {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-top: 2px solid var(--gray-200);
    }

    [data-theme="dark"] .order-summary {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
        border-top-color: var(--gray-300);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 0.625rem 0;
        font-size: 1rem;
        color: var(--gray-900);
    }

    .summary-row .discount { color: var(--success); }

    .summary-total {
        border-top: 2px solid var(--gray-200);
        margin-top: 0.5rem;
        padding-top: 1rem;
        font-size: 1.25rem;
        font-weight: 800;
    }

    [data-theme="dark"] .summary-total { border-top-color: var(--gray-300); }

    .summary-total span:last-child {
        color: var(--danger);
        font-size: 1.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .order-detail-page { padding: 1rem; }
        .detail-grid { grid-template-columns: 1fr; }
        .header-left h1 { font-size: 1.75rem; }
        .card-body { padding: 1.25rem 1.5rem; }
        .items-table th, .items-table td { padding: 0.75rem 0.75rem; }
    }
</style>

@endsection
