@extends('Admins.app')
@section('title', 'Quản lý khách hàng')
@section('content')

<div class="customers-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <h1>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Quản lý khách hàng
            </h1>
            <p>Quản lý thông tin và giao dịch của khách hàng</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Tổng khách hàng</h3>
                <div class="stat-value">{{ number_format($stats['total']) }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon active-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Đang hoạt động</h3>
                <div class="stat-value">{{ number_format($stats['active']) }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bronze-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Bronze</h3>
                <div class="stat-value">{{ number_format($stats['bronze']) }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon silver-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Silver</h3>
                <div class="stat-value">{{ number_format($stats['silver']) }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon gold-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Gold</h3>
                <div class="stat-value">{{ number_format($stats['gold']) }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon platinum-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Platinum</h3>
                <div class="stat-value">{{ number_format($stats['platinum']) }}</div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="content-card">
        <div class="card-header">
            <h3>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Tìm kiếm & Lọc
            </h3>
        </div>
        <div class="filter-section">
            <form method="GET" action="{{ route('customers.index') }}" class="filter-form" id="filterForm">
                <div class="search-box">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" id="searchInput" placeholder="Tìm theo tên, email, SĐT, mã KH..." value="{{ request('search') }}" class="search-input">
                </div>

                <div class="filter-group">
                    <select name="tier" id="tierSelect" class="filter-select">
                        <option value="">Tất cả hạng</option>
                        <option value="bronze" {{ request('tier') == 'bronze' ? 'selected' : '' }}>Bronze</option>
                        <option value="silver" {{ request('tier') == 'silver' ? 'selected' : '' }}>Silver</option>
                        <option value="gold" {{ request('tier') == 'gold' ? 'selected' : '' }}>Gold</option>
                        <option value="platinum" {{ request('tier') == 'platinum' ? 'selected' : '' }}>Platinum</option>
                    </select>

                    <select name="status" id="statusSelect" class="filter-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                        <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>Bị khóa</option>
                    </select>

                    <select name="sort_by" id="sortBySelect" class="filter-select">
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Ngày tạo</option>
                        <option value="full_name" {{ request('sort_by') == 'full_name' ? 'selected' : '' }}>Tên</option>
                        <option value="loyalty_points" {{ request('sort_by') == 'loyalty_points' ? 'selected' : '' }}>Điểm thưởng</option>
                        <option value="total_spent" {{ request('sort_by') == 'total_spent' ? 'selected' : '' }}>Tổng chi tiêu</option>
                    </select>

                    <button type="submit" class="btn btn-filter">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Lọc
                    </button>

                    @if(request()->hasAny(['search', 'tier', 'status', 'sort_by']))
                        <a href="{{ route('customers.index') }}" class="btn btn-reset">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Đặt lại
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="content-card">
        <div class="card-header">
            <h3>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Danh sách khách hàng
            </h3>
            <span class="result-count">{{ $customers->total() }} kết quả</span>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Khách hàng</th>
                        <th>Liên hệ</th>
                        <th>Hạng thành viên</th>
                        <th>Điểm thưởng</th>
                        <th>Tổng chi tiêu</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="customersTableBody">
                    @forelse($customers as $customer)
                        <tr>
                            <td>
                                <span class="customer-code">{{ $customer->customer_code ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">
                                        @if($customer->profile_picture)
                                            <img src="{{ asset('storage/' . $customer->profile_picture) }}" alt="{{ $customer->full_name }}">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->full_name) }}&background=667eea&color=fff&size=128" alt="{{ $customer->full_name }}">
                                        @endif
                                    </div>
                                    <div class="customer-details">
                                        <div class="customer-name">{{ $customer->full_name }}</div>
                                        <div class="customer-type">
                                            @if($customer->customer_type == 'business')
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                                {{ $customer->company_name ?? 'Doanh nghiệp' }}
                                            @else
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Cá nhân
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $customer->email }}
                                    </div>
                                    <div class="contact-item">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        {{ $customer->phone_number }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="tier-badge tier-{{ $customer->membership_tier ?? 'bronze' }}">
                                    @php
                                        $tierIcons = [
                                            'bronze' => '🥉',
                                            'silver' => '🥈',
                                            'gold' => '🥇',
                                            'platinum' => '💎'
                                        ];
                                        $tierNames = [
                                            'bronze' => 'Đồng',
                                            'silver' => 'Bạc',
                                            'gold' => 'Vàng',
                                            'platinum' => 'Bạch kim'
                                        ];
                                    @endphp
                                    {{ $tierIcons[$customer->membership_tier ?? 'bronze'] }}
                                    {{ $tierNames[$customer->membership_tier ?? 'bronze'] }}
                                </span>
                            </td>
                            <td>
                                <div class="loyalty-points">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                    {{ number_format($customer->loyalty_points ?? 0) }}
                                </div>
                            </td>
                            <td>
                                <div class="total-spent">
                                    {{ number_format($customer->total_spent ?? 0) }} đ
                                </div>
                            </td>
                            <td>
                                @php
                                    $status = $customer->status ?? 'active';
                                    $statusLabels = [
                                        'active' => 'Hoạt động',
                                        'inactive' => 'Không hoạt động',
                                        'blocked' => 'Bị khóa'
                                    ];
                                @endphp
                                <span class="status-badge status-{{ $status }}">
                                    {{ $statusLabels[$status] }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button type="button" class="btn-action btn-delete" onclick="deleteCustomer('{{ $customer->id }}', '{{ $customer->full_name }}')" title="Xóa">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <p>Không tìm thấy khách hàng nào</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($customers->hasPages())
            <div class="pagination-container">
                <div class="pagination-info">
                    <div class="pagination-text">
                        Hiển thị <strong>{{ $customers->firstItem() }}</strong> đến <strong>{{ $customers->lastItem() }}</strong>
                        trong tổng số <strong>{{ $customers->total() }}</strong> khách hàng
                    </div>
                </div>

                <nav>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($customers->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->appends(request()->query())->previousPageUrl() }}">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                            @if ($page == $customers->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $customers->appends(request()->query())->url($page) }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($customers->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->appends(request()->query())->nextPageUrl() }}">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>

<style>
    .customers-page {
        max-width: 1600px;
        margin: 0 auto;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .header-left h1 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0 0 0.5rem 0;
    }

    .header-left h1 svg {
        width: 40px;
        height: 40px;
        color: #667eea;
        -webkit-text-fill-color: initial;
    }

    .header-left p {
        color: #64748b;
        margin: 0;
        font-size: 1.1rem;
    }

    [data-theme="dark"] .header-left p {
        color: #94a3b8;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.75rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn svg {
        width: 20px;
        height: 20px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        gap: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    [data-theme="dark"] .stat-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #0f1419 100%);
        border-color: #2d3748;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
        border-color: #667eea;
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .total-icon { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .active-icon { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
    .bronze-icon { background: linear-gradient(135deg, #cd7f32 0%, #b86f28 100%); }
    .silver-icon { background: linear-gradient(135deg, #c0c0c0 0%, #a8a8a8 100%); }
    .gold-icon { background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%); }
    .platinum-icon { background: linear-gradient(135deg, #e5e4e2 0%, #bcc6cc 100%); }

    .stat-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .stat-content h3 {
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        margin: 0 0 0.5rem 0;
        text-transform: uppercase;
    }

    [data-theme="dark"] .stat-content h3 {
        color: #94a3b8;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1e293b;
    }

    [data-theme="dark"] .stat-value {
        color: #f1f5f9;
    }

    .content-card {
        background: #ffffff;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    [data-theme="dark"] .content-card {
        background: #1a1f2e;
        border-color: #2d3748;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 2px solid #e2e8f0;
    }

    [data-theme="dark"] .card-header {
        border-bottom-color: #2d3748;
    }

    .card-header h3 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .card-header h3 {
        color: #f1f5f9;
    }

    .card-header h3 svg {
        width: 24px;
        height: 24px;
        color: #667eea;
    }

    .result-count {
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 20px;
    }

    [data-theme="dark"] .result-count {
        background: linear-gradient(135deg, #252836 0%, #1a1f2e 100%);
        color: #94a3b8;
    }

    .filter-section {
        padding: 1.5rem;
    }

    .filter-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .search-box {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: #94a3b8;
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        padding: 1rem 1rem 1rem 3.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
        color: #1e293b;
    }

    [data-theme="dark"] .search-input {
        background: #0f1419;
        border-color: #2d3748;
        color: #e2e8f0;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .filter-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .filter-select {
        flex: 1;
        min-width: 150px;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        background: #ffffff;
        color: #1e293b;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .filter-select {
        background: #0f1419;
        border-color: #2d3748;
        color: #e2e8f0;
    }

    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .btn-filter, .btn-reset {
        padding: 0.875rem 1.5rem;
        white-space: nowrap;
    }

    .btn-filter {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
    }

    .btn-reset {
        background: #ffffff;
        color: #64748b;
        border: 2px solid #e2e8f0;
    }

    [data-theme="dark"] .btn-reset {
        background: #1a1f2e;
        color: #94a3b8;
        border-color: #2d3748;
    }

    .table-container {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    [data-theme="dark"] .data-table thead {
        background: linear-gradient(135deg, #0f1419 0%, #1a1f2e 100%);
    }

    .data-table th {
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 700;
        font-size: 0.875rem;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        white-space: nowrap;
    }

    [data-theme="dark"] .data-table th {
        color: #f1f5f9;
    }

    .data-table tbody tr {
        border-bottom: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .data-table tbody tr {
        border-bottom-color: #2d3748;
    }

    .data-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    [data-theme="dark"] .data-table tbody tr:hover {
        background: linear-gradient(135deg, #1a1f2e 0%, #252836 100%);
    }

    .data-table td {
        padding: 1.25rem 1.5rem;
        color: #1e293b;
    }

    [data-theme="dark"] .data-table td {
        color: #e2e8f0;
    }

    .customer-code {
        font-family: monospace;
        font-weight: 700;
        color: #667eea;
        font-size: 0.95rem;
    }

    .customer-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .customer-avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #667eea;
    }

    .customer-name {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    [data-theme="dark"] .customer-name {
        color: #f1f5f9;
    }

    .customer-type {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.8125rem;
        color: #64748b;
    }

    [data-theme="dark"] .customer-type {
        color: #94a3b8;
    }

    .customer-type svg {
        width: 14px;
        height: 14px;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #64748b;
    }

    [data-theme="dark"] .contact-item {
        color: #94a3b8;
    }

    .contact-item svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    .tier-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8125rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .tier-bronze {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
    }

    .tier-silver {
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        color: #475569;
    }

    .tier-gold {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
    }

    .tier-platinum {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
    }

    .loyalty-points {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 700;
        color: #f59e0b;
    }

    .loyalty-points svg {
        width: 18px;
        height: 18px;
    }

    .total-spent {
        font-weight: 700;
        color: #10b981;
    }

    .status-badge {
        display: inline-block;
        padding: 0.375rem 0.875rem;
        border-radius: 12px;
        font-size: 0.8125rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-active {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
    }

    .status-inactive {
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        color: #475569;
    }

    .status-blocked {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background: none;
    }

    .btn-action svg {
        width: 18px;
        height: 18px;
    }

    .btn-edit {
        color: #3b82f6;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-delete {
        color: #ef4444;
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state svg {
        width: 64px;
        height: 64px;
        color: #cbd5e1;
        margin-bottom: 1rem;
    }

    [data-theme="dark"] .empty-state svg {
        color: #475569;
    }

    .empty-state p {
        color: #94a3b8;
        font-size: 1rem;
        margin: 0;
    }

    .pagination-container {
        padding: 1.5rem;
        border-top: 2px solid #e2e8f0;
    }

    [data-theme="dark"] .pagination-container {
        border-top-color: #2d3748;
    }

    /* Pagination Styles */
    .pagination {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination .page-item {
        display: flex;
    }

    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0.5rem 0.875rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        color: #64748b;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    [data-theme="dark"] .pagination .page-link {
        background: #1a1f2e;
        border-color: #2d3748;
        color: #94a3b8;
    }

    .pagination .page-link:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }

    .pagination .page-link svg {
        width: 18px;
        height: 18px;
    }

    /* Pagination info text */
    .pagination-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .pagination-text {
        font-size: 0.875rem;
        color: #64748b;
    }

    [data-theme="dark"] .pagination-text {
        color: #94a3b8;
    }

    .pagination-text strong {
        color: #667eea;
        font-weight: 700;
    }

    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .filter-group {
            flex-direction: column;
        }

        .filter-select {
            width: 100%;
        }

        .table-container {
            overflow-x: scroll;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination {
            flex-wrap: wrap;
        }


    }

    /* Loading spinner animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(102, 126, 234, 0.3);
        border-radius: 50%;
        border-top-color: #667eea;
        animation: spin 0.8s linear infinite;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tierSelect = document.getElementById('tierSelect');
    const statusSelect = document.getElementById('statusSelect');
    const sortBySelect = document.getElementById('sortBySelect');
    const filterForm = document.getElementById('filterForm');
    let searchTimeout;

    // Prevent form submission
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearch();
    });

    // Search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch();
        }, 500);
    });

    // Instant search on filter change
    tierSelect.addEventListener('change', () => performSearch());
    statusSelect.addEventListener('change', () => performSearch());
    sortBySelect.addEventListener('change', () => performSearch());

    function performSearch(page = 1) {
        const searchValue = searchInput.value;
        const tierValue = tierSelect.value;
        const statusValue = statusSelect.value;
        const sortByValue = sortBySelect.value;

        // Build query parameters
        const params = new URLSearchParams();
        if (searchValue) params.append('search', searchValue);
        if (tierValue) params.append('tier', tierValue);
        if (statusValue) params.append('status', statusValue);
        if (sortByValue) params.append('sort_by', sortByValue);
        params.append('page', page);

        // Show loading state
        const tableBody = document.getElementById('customersTableBody');
        tableBody.innerHTML = '<tr><td colspan="8" class="text-center"><div class="loading-spinner"></div></td></tr>';

        // Fetch data
        fetch(`{{ route('customers.index') }}?${params.toString()}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            updateTable(data.customers);
            updateStats(data.stats);
            updateResultCount(data.pagination);
            updatePagination(data.pagination);
        })
        .catch(error => {
            console.error('Error:', error);
            tableBody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Đã xảy ra lỗi khi tải dữ liệu</td></tr>';
        });
    }

    function updateTable(customers) {
        const tableBody = document.getElementById('customersTableBody');

        if (customers.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="8">
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p>Không tìm thấy khách hàng nào</p>
                        </div>
                    </td>
                </tr>
            `;
            return;
        }

        let html = '';
        customers.forEach(customer => {
            const tierLabels = {
                'bronze': '🥉 Bronze',
                'silver': '🥈 Silver',
                'gold': '🥇 Gold',
                'platinum': '💎 Platinum'
            };

            const statusLabels = {
                'active': 'Hoạt động',
                'inactive': 'Không hoạt động',
                'blocked': 'Đã chặn'
            };

            const avatarUrl = customer.profile_picture
                ? `/storage/${customer.profile_picture}`
                : `https://ui-avatars.com/api/?name=${encodeURIComponent(customer.full_name)}&background=667eea&color=fff&size=128`;

            html += `
                <tr>
                    <td>${customer.customer_code || 'N/A'}</td>
                    <td>
                        <div class="customer-info">
                            <img src="${avatarUrl}" alt="${customer.full_name}" class="customer-avatar">
                            <div>
                                <div class="customer-name">${customer.full_name}</div>
                                <div class="customer-email">${customer.email || 'N/A'}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="contact-info">
                            <div>${customer.phone_number || 'N/A'}</div>
                            <small>${customer.city || 'N/A'}</small>
                        </div>
                    </td>
                    <td>
                        <span class="tier-badge tier-${customer.membership_tier}">
                            ${tierLabels[customer.membership_tier] || customer.membership_tier}
                        </span>
                    </td>
                    <td>${Number(customer.loyalty_points || 0).toLocaleString('vi-VN')}</td>
                    <td>${Number(customer.total_spent || 0).toLocaleString('vi-VN')} ₫</td>
                    <td>
                        <span class="status-badge status-${customer.status}">
                            ${statusLabels[customer.status] || customer.status}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button type="button" class="btn-action btn-delete" onclick="deleteCustomer('${customer._id || customer.id}', '${customer.full_name}')" title="Xóa">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        });

        tableBody.innerHTML = html;
    }

    function updateStats(stats) {
        document.querySelectorAll('.stat-value').forEach((el, index) => {
            const statKeys = ['total', 'active', 'bronze', 'silver', 'gold', 'platinum'];
            if (statKeys[index] && stats[statKeys[index]] !== undefined) {
                el.textContent = Number(stats[statKeys[index]]).toLocaleString('vi-VN');
            }
        });
    }

    function updateResultCount(pagination) {
        const resultText = document.querySelector('.pagination-text');
        if (resultText) {
            resultText.innerHTML = `Hiển thị <strong>${pagination.from || 0}</strong> đến <strong>${pagination.to || 0}</strong> trong tổng số <strong>${pagination.total || 0}</strong> khách hàng`;
        }
    }

    function updatePagination(pagination) {
        const paginationContainer = document.querySelector('.pagination');
        if (!paginationContainer) return;

        let html = '';

        // Previous button
        if (pagination.current_page > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="${pagination.current_page - 1}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
            </li>`;
        } else {
            html += `<li class="page-item disabled">
                <span class="page-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </span>
            </li>`;
        }

        // Page numbers
        for (let i = 1; i <= pagination.last_page; i++) {
            if (i === pagination.current_page) {
                html += `<li class="page-item active">
                    <span class="page-link">${i}</span>
                </li>`;
            } else {
                html += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
            }
        }

        // Next button
        if (pagination.current_page < pagination.last_page) {
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="${pagination.current_page + 1}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </li>`;
        } else {
            html += `<li class="page-item disabled">
                <span class="page-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            </li>`;
        }

        paginationContainer.innerHTML = html;

        // Add click handlers to pagination links
        paginationContainer.querySelectorAll('a[data-page]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.getAttribute('data-page');
                performSearch(page);
            });
        });
    }

    // Delete customer function
    function deleteCustomer(customerId, customerName) {
        if (!confirm(`Bạn có chắc chắn muốn xóa khách hàng "${customerName}"?`)) {
            return;
        }

        fetch(`/customers/${customerId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                // Refresh the current page
                performSearch();
            } else {
                showNotification(data.message || 'Có lỗi xảy ra!', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Có lỗi xảy ra khi xóa khách hàng!', 'error');
        });
    }

    // Notification system
    function showNotification(message, type = 'success') {
        // Remove any existing notification
        const existingNotification = document.querySelector('.notification-toast');
        if (existingNotification) {
            existingNotification.remove();
        }

        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification-toast notification-${type}`;

        const icon = type === 'success'
            ? '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
            : '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';

        notification.innerHTML = `
            <div class="notification-icon">${icon}</div>
            <div class="notification-message">${message}</div>
            <button class="notification-close" onclick="this.parentElement.remove()">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        `;

        document.body.appendChild(notification);

        // Trigger animation
        setTimeout(() => notification.classList.add('show'), 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }

    // Make functions available globally
    window.performSearch = performSearch;
    window.deleteCustomer = deleteCustomer;
    window.showNotification = showNotification;
});
</script>

<style>
/* Notification Toast Styles */
.notification-toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    z-index: 10000;
    min-width: 320px;
    max-width: 500px;
    transform: translateX(400px);
    opacity: 0;
    transition: all 0.3s ease;
}

.notification-toast.show {
    transform: translateX(0);
    opacity: 1;
}

.notification-success {
    border-left: 4px solid #10b981;
}

.notification-error {
    border-left: 4px solid #ef4444;
}

.notification-icon {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
}

.notification-success .notification-icon {
    color: #10b981;
}

.notification-error .notification-icon {
    color: #ef4444;
}

.notification-icon svg {
    width: 100%;
    height: 100%;
}

.notification-message {
    flex: 1;
    font-size: 0.95rem;
    color: #1e293b;
    font-weight: 500;
}

.notification-close {
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    background: none;
    border: none;
    cursor: pointer;
    color: #64748b;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
}

.notification-close:hover {
    color: #1e293b;
}

.notification-close svg {
    width: 100%;
    height: 100%;
}

[data-theme="dark"] .notification-toast {
    background: #1e293b;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
}

[data-theme="dark"] .notification-message {
    color: #f1f5f9;
}

[data-theme="dark"] .notification-close {
    color: #94a3b8;
}

[data-theme="dark"] .notification-close:hover {
    color: #f1f5f9;
}
</style>

@endsection
