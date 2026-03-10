@extends('Admins.app')
@section('title', 'Đơn hàng')
@section('content')

<div class="orders-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <div class="header-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                    <rect x="9" y="3" width="6" height="4" rx="1"></rect>
                </svg>
                ORDERS
            </div>
            <h1>Quản lý đơn hàng</h1>
            <p>Danh sách tất cả đơn hàng trong hệ thống</p>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="search-box">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" id="searchOrder" placeholder="Tìm kiếm đơn hàng..." class="search-input">
        </div>
        <div class="filter-group">
            <select id="filterOrderStatus" class="filter-select">
                <option value="">📦 Trạng thái đơn</option>
                <option value="pending">Chờ xử lý</option>
                <option value="processing">Đang xử lý</option>
                <option value="shipped">Đang giao</option>
                <option value="delivered">Đã giao</option>
                <option value="cancelled">Đã hủy</option>
            </select>
            <select id="filterPaymentStatus" class="filter-select">
                <option value="">💳 Thanh toán</option>
                <option value="unpaid">Chưa thanh toán</option>
                <option value="paid">Đã thanh toán</option>
                <option value="failed">Thất bại</option>
                <option value="refunded">Hoàn tiền</option>
            </select>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
        <div class="stat-card stat-total">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                    <rect x="9" y="3" width="6" height="4" rx="1"></rect>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-number">{{ count($orders ?? []) }}</span>
                <span class="stat-label">Tổng đơn hàng</span>
            </div>
        </div>
        <div class="stat-card stat-pending">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-number">{{ collect($orders ?? [])->where('order_status', 'pending')->count() }}</span>
                <span class="stat-label">Chờ xử lý</span>
            </div>
        </div>
        <div class="stat-card stat-shipping">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-number">{{ collect($orders ?? [])->where('order_status', 'shipped')->count() }}</span>
                <span class="stat-label">Đang giao</span>
            </div>
        </div>
        <div class="stat-card stat-delivered">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="stat-info">
                <span class="stat-number">{{ collect($orders ?? [])->where('order_status', 'delivered')->count() }}</span>
                <span class="stat-label">Đã giao</span>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <div class="table-header">
            <h3>Danh sách đơn hàng</h3>
            <span class="table-count">{{ count($orders ?? []) }} đơn hàng</span>
        </div>

        <div class="table-wrapper">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th class="checkbox-col">
                            <input type="checkbox" id="selectAll" class="checkbox-input">
                        </th>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th class="center">Thanh toán</th>
                        <th class="center">Trạng thái đơn</th>
                        <th class="center">Thanh toán</th>
                        <th class="right">Tổng tiền</th>
                        <th class="center">Ngày đặt</th>
                        <th class="right">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders ?? [] as $order)
                    <tr class="table-row" data-order-id="{{ $order->id }}">
                        <td class="checkbox-col">
                            <input type="checkbox" class="row-checkbox" value="{{ $order->id }}">
                        </td>
                        <td>
                            <strong class="order-code">#{{ $order->order_code }}</strong>
                        </td>
                        <td>
                            <div class="customer-cell">
                                <strong class="customer-name">{{ $order->full_name }}</strong>
                                <span class="customer-phone">{{ $order->phone_number }}</span>
                            </div>
                        </td>
                        <td class="center">
                            <span class="badge badge-payment">
                                @php
                                    $paymentLabels = [
                                        'cod' => 'COD',
                                        'bank_transfer' => 'Chuyển khoản',
                                        'momo' => 'MoMo',
                                        'vnpay' => 'VNPay',
                                    ];
                                @endphp
                                {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}
                            </span>
                        </td>
                        <td class="center">
                            @php
                                $orderStatusClasses = [
                                    'pending' => 'status-pending',
                                    'processing' => 'status-processing',
                                    'shipped' => 'status-shipped',
                                    'delivered' => 'status-delivered',
                                    'cancelled' => 'status-cancelled',
                                ];
                                $orderStatusLabels = [
                                    'pending' => 'Chờ xử lý',
                                    'processing' => 'Đang xử lý',
                                    'shipped' => 'Đang giao',
                                    'delivered' => 'Đã giao',
                                    'cancelled' => 'Đã hủy',
                                ];
                            @endphp
                            <span class="status-badge {{ $orderStatusClasses[$order->order_status] ?? 'status-pending' }}">
                                <span class="status-dot"></span>
                                {{ $orderStatusLabels[$order->order_status] ?? $order->order_status }}
                            </span>
                        </td>
                        <td class="center">
                            @php
                                $paymentStatusClasses = [
                                    'unpaid' => 'payment-pending',
                                    'paid' => 'payment-paid',
                                    'failed' => 'payment-failed',
                                    'refunded' => 'payment-refunded',
                                ];
                                $paymentStatusLabels = [
                                    'unpaid' => 'Chưa TT',
                                    'paid' => 'Đã TT',
                                    'failed' => 'Thất bại',
                                    'refunded' => 'Hoàn tiền',
                                ];
                            @endphp
                            <span class="payment-badge {{ $paymentStatusClasses[$order->payment_status] ?? 'payment-pending' }}">
                                {{ $paymentStatusLabels[$order->payment_status] ?? $order->payment_status }}
                            </span>
                        </td>
                        <td class="right">
                            <strong class="order-total">{{ number_format($order->total, 0, ',', '.') }}₫</strong>
                        </td>
                        <td class="center">
                            <span class="order-date">{{ $order->created_at ? $order->created_at->format('d/m/Y') : 'N/A' }}</span>
                        </td>
                        <td class="right">
                            <div class="action-buttons">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn-action btn-view" title="Xem chi tiết">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a>
                                <button class="btn-action btn-delete" onclick="deleteOrder('{{ $order->id }}', '{{ $order->order_code }}')" title="Xóa">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="empty-state">
                            <div class="empty-content">
                                <svg class="empty-icon" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                                    <rect x="9" y="3" width="6" height="4" rx="1"></rect>
                                </svg>
                                <h3>Chưa có đơn hàng nào</h3>
                                <p>Đơn hàng sẽ xuất hiện khi khách hàng đặt hàng</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
        --info: #3b82f6;
        --gray-100: #f8fafc;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-600: #475569;
        --gray-700: #334155;
        --gray-900: #1e293b;
        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
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

    .orders-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .header-left { flex: 1; min-width: 300px; }

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
        font-size: 2.75rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .header-left p {
        color: var(--gray-600);
        font-size: 1.125rem;
        font-weight: 500;
    }

    /* Stats Row */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .stat-card {
        background: var(--gray-200);
        border-color: var(--gray-300);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .stat-total .stat-icon { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
    .stat-pending .stat-icon { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; }
    .stat-shipping .stat-icon { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; }
    .stat-delivered .stat-icon { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; }

    .stat-info { display: flex; flex-direction: column; }
    .stat-number { font-size: 1.75rem; font-weight: 800; color: var(--gray-900); }
    .stat-label { font-size: 0.875rem; color: var(--gray-600); font-weight: 500; }

    /* Search and Filter */
    .search-filter-section {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .search-box {
        flex: 1;
        min-width: 280px;
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        padding: 1rem 1.25rem 1rem 3.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        font-size: 1rem;
        background-color: white;
        color: var(--gray-900);
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    [data-theme="dark"] .search-input {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
        color: var(--gray-900);
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15), 0 8px 20px rgba(102, 126, 234, 0.2);
    }

    .filter-group { display: flex; gap: 0.75rem; }

    .filter-select {
        padding: 1rem 2.5rem 1rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        background-color: white;
        appearance: none;
        color: var(--gray-900);
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
    }

    [data-theme="dark"] .filter-select {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 1.25rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: 1px solid var(--gray-200);
    }

    [data-theme="dark"] .table-card {
        background: var(--gray-200);
        border-color: var(--gray-300);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem 2.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 2px solid var(--gray-200);
    }

    [data-theme="dark"] .table-header {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
        border-bottom-color: var(--gray-300);
    }

    .table-header h3 { font-size: 1.375rem; font-weight: 800; color: var(--gray-900); }

    .table-count {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.625rem;
        font-size: 0.875rem;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .table-wrapper { overflow-x: auto; }

    .orders-table { width: 100%; border-collapse: collapse; }

    .orders-table thead tr {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    [data-theme="dark"] .orders-table thead tr {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
    }

    .orders-table th {
        padding: 1.25rem 1.25rem;
        text-align: left;
        font-weight: 700;
        color: var(--gray-600);
        font-size: 0.8125rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid var(--gray-200);
    }

    .orders-table th.center, .orders-table td.center { text-align: center; }
    .orders-table th.right, .orders-table td.right { text-align: right; }

    .orders-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--gray-200);
        color: var(--gray-900);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .orders-table td { border-bottom-color: var(--gray-300); }

    .table-row { transition: all 0.3s ease; }

    .table-row:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    }

    [data-theme="dark"] .table-row:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
    }

    /* Checkbox */
    .checkbox-col { width: 50px; text-align: center; }
    .checkbox-input, .row-checkbox { width: 18px; height: 18px; cursor: pointer; accent-color: var(--primary); }

    /* Order Code */
    .order-code { color: var(--primary); font-weight: 700; font-size: 0.95rem; }

    /* Customer Cell */
    .customer-cell { display: flex; flex-direction: column; gap: 0.25rem; }
    .customer-name { font-weight: 600; font-size: 0.95rem; }
    .customer-phone { color: var(--gray-600); font-size: 0.8rem; }

    /* Badges */
    .badge-payment {
        background: linear-gradient(135deg, #e0e7ff 0%, #ddd6fe 100%);
        color: #4f46e5;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        font-weight: 600;
    }

    [data-theme="dark"] .badge-payment {
        background: linear-gradient(135deg, #3730a3 0%, #4c1d95 100%);
        color: #c7d2fe;
    }

    /* Order Status */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.875rem;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: currentColor;
        animation: statusPulse 2.5s ease infinite;
    }

    @keyframes statusPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.8); }
    }

    .status-pending { background: #fef3c7; color: #92400e; }
    .status-processing { background: #dbeafe; color: #1e40af; }
    .status-shipped { background: #e0e7ff; color: #3730a3; }
    .status-delivered { background: #dcfce7; color: #166534; }
    .status-cancelled { background: #fee2e2; color: #991b1b; }

    [data-theme="dark"] .status-pending { background: #78350f; color: #fef3c7; }
    [data-theme="dark"] .status-processing { background: #1e40af; color: #dbeafe; }
    [data-theme="dark"] .status-shipped { background: #3730a3; color: #e0e7ff; }
    [data-theme="dark"] .status-delivered { background: #047857; color: #dcfce7; }
    [data-theme="dark"] .status-cancelled { background: #7f1d1d; color: #fee2e2; }

    /* Payment Status */
    .payment-badge {
        display: inline-flex;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.775rem;
        font-weight: 700;
    }

    .payment-pending { background: #fef3c7; color: #92400e; }
    .payment-paid { background: #dcfce7; color: #166534; }
    .payment-failed { background: #fee2e2; color: #991b1b; }
    .payment-refunded { background: #e0e7ff; color: #3730a3; }

    [data-theme="dark"] .payment-pending { background: #78350f; color: #fef3c7; }
    [data-theme="dark"] .payment-paid { background: #047857; color: #dcfce7; }
    [data-theme="dark"] .payment-failed { background: #7f1d1d; color: #fee2e2; }
    [data-theme="dark"] .payment-refunded { background: #3730a3; color: #e0e7ff; }

    /* Order Total */
    .order-total { color: var(--danger); font-weight: 700; font-size: 0.95rem; white-space: nowrap; }
    .order-date { color: var(--gray-600); font-size: 0.875rem; }

    /* Action Buttons */
    .action-buttons { display: flex; gap: 0.5rem; justify-content: flex-end; }

    .btn-action {
        width: 38px;
        height: 38px;
        padding: 0;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .btn-view {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #2563eb;
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #bfdbfe 0%, #93c5fd 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    [data-theme="dark"] .btn-view {
        background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
        color: #bfdbfe;
    }

    .btn-delete {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #fca5a5 0%, #f87171 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    [data-theme="dark"] .btn-delete {
        background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%);
        color: #fca5a5;
    }

    /* Empty State */
    .empty-state {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 5rem 2rem;
        text-align: center;
    }

    [data-theme="dark"] .empty-state {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
    }

    .empty-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }

    .empty-icon {
        color: var(--gray-300);
        opacity: 0.5;
        animation: float 4s ease infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .empty-content h3 {
        font-size: 1.625rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .empty-content p { color: var(--gray-600); font-size: 1.0625rem; }

    /* Responsive */
    @media (max-width: 768px) {
        .orders-page { padding: 1rem; }
        .header-left h1 { font-size: 1.875rem; }
        .stats-row { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
        .search-filter-section { flex-direction: column; }
        .filter-group { width: 100%; flex-direction: column; }
        .filter-select { width: 100%; }
        .table-header { padding: 1.25rem 1.5rem; flex-direction: column; gap: 0.75rem; align-items: flex-start; }
        .orders-table th, .orders-table td { padding: 0.75rem 0.5rem; font-size: 0.85rem; }
    }

    @media (max-width: 480px) {
        .stats-row { grid-template-columns: 1fr; }
        .header-left h1 { font-size: 1.5rem; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select All
        const selectAll = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');

        if (selectAll) {
            selectAll.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => cb.checked = this.checked);
            });
        }

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
                const someChecked = Array.from(rowCheckboxes).some(c => c.checked);
                if (selectAll) {
                    selectAll.checked = allChecked;
                    selectAll.indeterminate = someChecked && !allChecked;
                }
            });
        });

        // Client-side search
        const searchInput = document.getElementById('searchOrder');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase();
                document.querySelectorAll('.table-row').forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(query) ? '' : 'none';
                });
            });
        }

        // Client-side filter by order status
        const filterOrderStatus = document.getElementById('filterOrderStatus');
        const filterPaymentStatus = document.getElementById('filterPaymentStatus');

        function applyFilters() {
            const orderStatus = filterOrderStatus ? filterOrderStatus.value : '';
            const paymentStatus = filterPaymentStatus ? filterPaymentStatus.value : '';

            document.querySelectorAll('.table-row').forEach(row => {
                const orderBadge = row.querySelector('.status-badge');
                const paymentBadge = row.querySelector('.payment-badge');

                let showOrder = true;
                let showPayment = true;

                if (orderStatus && orderBadge) {
                    showOrder = orderBadge.classList.contains('status-' + orderStatus);
                }
                if (paymentStatus && paymentBadge) {
                    showPayment = paymentBadge.classList.contains('payment-' + paymentStatus);
                }

                row.style.display = (showOrder && showPayment) ? '' : 'none';
            });
        }

        if (filterOrderStatus) filterOrderStatus.addEventListener('change', applyFilters);
        if (filterPaymentStatus) filterPaymentStatus.addEventListener('change', applyFilters);
    });

    function deleteOrder(orderId, orderCode) {
        if (!confirm(`Bạn có chắc chắn muốn xóa đơn hàng #${orderCode}?`)) return;

        fetch(`/admin/orders/${orderId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok || response.redirected) {
                const row = document.querySelector(`.table-row[data-order-id="${orderId}"]`);
                if (row) {
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px)';
                    setTimeout(() => row.remove(), 300);
                }

                const msg = document.createElement('div');
                msg.textContent = `✓ Đã xóa đơn hàng #${orderCode}`;
                msg.style.cssText = 'position:fixed;top:20px;right:20px;background:linear-gradient(135deg,#10b981,#059669);color:white;padding:1rem 1.5rem;border-radius:0.75rem;box-shadow:0 10px 25px rgba(16,185,129,0.3);z-index:9999;';
                document.body.appendChild(msg);
                setTimeout(() => msg.remove(), 3000);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

@endsection
