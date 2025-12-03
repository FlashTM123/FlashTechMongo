@extends('Admins.app')
@section('title', 'Brands')
@section('content')

<div class="brands-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <div class="header-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                    <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                BRANDS
            </div>
            <h1>Quản lý thương hiệu</h1>
            <p>Danh sách các thương hiệu hiện có trong hệ thống</p>
        </div>
        <div class="header-right">
            <button class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('brands.create') ?? '#' }}'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Thêm thương hiệu mới
            </button>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="search-box">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" id="searchBrand" placeholder="Tìm kiếm thương hiệu..." class="search-input">
        </div>
        <div class="filter-group">
            <select id="sortBrand" class="filter-select">
                <option value="">📊 Sắp xếp</option>
                <option value="name-asc">Tên A-Z</option>
                <option value="name-desc">Tên Z-A</option>
                <option value="newest">Mới nhất</option>
                <option value="oldest">Cũ nhất</option>
            </select>
        </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <div class="table-header">
            <h3>Danh sách thương hiệu</h3>
            <span class="table-count">{{ count($brands ?? []) }} thương hiệu</span>
        </div>

        <div class="table-wrapper">
            <table class="brands-table">
                <thead>
                    <tr>
                        <th class="checkbox-col">
                            <input type="checkbox" id="selectAll" class="checkbox-input">
                        </th>
                        <th>Tên thương hiệu</th>
                        <th>Logo</th>
                        <th class="center">Sản phẩm</th>
                        <th class="center">Trạng thái</th>
                        <th class="right">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands ?? [] as $brand)
                    <tr class="table-row" data-brand-slug="{{ $brand->slug ?? '' }}">
                        <td class="checkbox-col">
                            <input type="checkbox" class="row-checkbox" value="{{ $brand->slug ?? '' }}">
                        </td>
                        <td>
                            <div class="brand-cell">
                                <strong class="brand-title">{{ $brand->name ?? 'N/A' }}</strong>
                            </div>
                        </td>
                        <td>
                            <div class="logo-cell">
                                @if($brand->logo ?? null)
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" class="brand-logo" title="{{ $brand->name ?? 'Brand Logo' }}">
                                @else
                                <div class="logo-placeholder">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </div>
                                @endif
                            </div>
                        </td>

                        <td class="center">
                            <span class="badge badge-count">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                {{ $brand->products_count ?? 0 }}
                            </span>
                        </td>
                        <td class="center">
                            <span class="status-badge {{ ($brand->is_active ?? false) ? 'status-active' : 'status-inactive' }}">
                                <span class="status-dot"></span>
                                {{ ($brand->is_active ?? false) ? 'Hoạt động' : 'Tạm dừng' }}
                            </span>
                        </td>
                        <td class="right">
                            <div class="action-buttons">
                                <a href="{{ route('brands.edit', $brand->slug ?? '') }}" class="btn-action btn-edit" title="Chỉnh sửa">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>
                                <button class="btn-action btn-delete" onclick="deleteBrand('{{ $brand->slug ?? '' }}', '{{ $brand->name ?? 'Brand' }}')" title="Xóa">
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
                        <td colspan="7" class="empty-state">
                            <div class="empty-content">
                                <svg class="empty-icon" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="9" y1="9" x2="15" y2="9"></line>
                                    <line x1="9" y1="15" x2="15" y2="15"></line>
                                </svg>
                                <h3>Chưa có thương hiệu nào</h3>
                                <p>Bắt đầu bằng cách thêm thương hiệu đầu tiên của bạn</p>
                                <button class="btn btn-primary btn-lg" onclick="window.location.href='{{ route('brands.create') ?? '#' }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
                                    Tạo thương hiệu đầu tiên
                                </button>
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
        --gray-100: #f8fafc;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-600: #475569;
        --gray-700: #334155;
        --gray-900: #1e293b;
        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
    }

    [data-theme="dark"] {
        --gray-100: #0f172a;
        --gray-200: #1e293b;
        --gray-300: #334155;
        --gray-600: #cbd5e1;
        --gray-700: #e2e8f0;
        --gray-900: #f1f5f9;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .brands-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Header Section */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 3rem;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .header-left {
        flex: 1;
        min-width: 300px;
    }

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
        animation: badgePop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes badgePop {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
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

    [data-theme="dark"] .header-left h1 {
        color: #f1f5f9;
    }

    .header-left p {
        color: var(--gray-600);
        font-size: 1.125rem;
        font-weight: 500;
        margin: 0;
        opacity: 0.9;
    }

    .header-right {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .btn-lg {
        padding: 1rem 2rem;
        font-size: 1.0625rem;
        border-radius: 0.875rem;
    }

    .btn {
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        font-size: 1rem;
        outline: 2px solid transparent;
        outline-offset: 2px;
    }

    .btn:focus {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    }

    .btn-primary:active {
        transform: translateY(-2px);
    }

    /* Search and Filter */
    .search-filter-section {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
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
        width: 1.25rem;
        height: 1.25rem;
        animation: searchPulse 2s ease-in-out infinite;
    }

    @keyframes searchPulse {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    .search-input {
        width: 100%;
        padding: 1rem 1.25rem 1rem 3.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        font-size: 1rem;
        background-color: white;
        color: var(--gray-900);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
        transform: translateY(-2px);
    }

    .search-input::placeholder {
        color: var(--gray-600);
        opacity: 0.8;
    }

    .filter-group {
        display: flex;
        gap: 0.75rem;
    }

    .filter-select {
        padding: 1rem 2.5rem 1rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: 1rem;
        background-color: white;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        appearance: none;
        color: var(--gray-900);
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    [data-theme="dark"] .filter-select {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15), 0 8px 20px rgba(102, 126, 234, 0.2);
        transform: translateY(-2px);
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 1.25rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        animation: cardSlide 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s backwards;
        border: 1px solid var(--gray-200);
    }

    [data-theme="dark"] .table-card {
        background: var(--gray-200);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border-color: var(--gray-300);
    }

    @keyframes cardSlide {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem 2.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 2px solid var(--gray-200);
        position: relative;
        overflow: hidden;
    }

    .table-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    [data-theme="dark"] .table-header {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
        border-bottom-color: var(--gray-300);
    }

    .table-header h3 {
        font-size: 1.375rem;
        font-weight: 800;
        color: var(--gray-900);
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .table-count {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.625rem;
        font-size: 0.875rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        letter-spacing: 0.5px;
    }

    /* Table Wrapper */
    .table-wrapper {
        overflow-x: auto;
    }

    .brands-table {
        width: 100%;
        border-collapse: collapse;
    }

    .brands-table thead tr {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    [data-theme="dark"] .brands-table thead tr {
        background: linear-gradient(135deg, var(--gray-300) 0%, var(--gray-200) 100%);
    }

    .brands-table th {
        padding: 1.25rem 1.5rem;
        text-align: left;
        font-weight: 700;
        color: var(--gray-600);
        font-size: 0.8125rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid var(--gray-200);
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.02) 0%, transparent 100%);
    }

    [data-theme="dark"] .brands-table th {
        color: var(--gray-600);
        border-bottom-color: var(--gray-300);
    }

    .brands-table th.center,
    .brands-table td.center {
        text-align: center;
    }

    .brands-table th.right,
    .brands-table td.right {
        text-align: right;
    }

    .brands-table td {
        padding: 1.125rem 1.5rem;
        border-bottom: 1px solid var(--gray-200);
        color: var(--gray-900);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-theme="dark"] .brands-table td {
        border-bottom-color: var(--gray-300);
        color: var(--gray-900);
    }

    .brands-table tbody tr {
        animation: rowFadeIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) backwards;
    }

    @keyframes rowFadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .brands-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .brands-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
    .brands-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .brands-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
    .brands-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
    .brands-table tbody tr:nth-child(n+6) { animation-delay: 0.3s; }

    .table-row {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .table-row:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        box-shadow: inset 0 0 15px rgba(102, 126, 234, 0.08);
        transform: scale(1.01);
    }

    [data-theme="dark"] .table-row:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
    }

    /* Checkbox */
    .checkbox-col {
        width: 60px;
        text-align: center;
    }

    .checkbox-input,
    .row-checkbox {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: var(--primary);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .checkbox-input:hover,
    .row-checkbox:hover {
        filter: brightness(1.1);
        transform: scale(1.1);
    }

    .checkbox-input:checked,
    .row-checkbox:checked {
        animation: checkPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes checkPop {
        0% { transform: scale(0.8); }
        100% { transform: scale(1); }
    }

    /* Brand Cell */
    .brand-cell {
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .brand-title {
        font-weight: 700;
        color: var(--gray-900);
        font-size: 1.0625rem;
        letter-spacing: -0.3px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .table-row:hover .brand-title {
        color: var(--primary);
        transform: translateX(4px);
    }

    .brand-description {
        color: var(--gray-600);
        font-size: 0.875rem;
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        opacity: 0.85;
    }

    /* Logo Cell */
    .logo-cell {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 60px;
    }

    .brand-logo {
        max-width: 50px;
        max-height: 50px;
        object-fit: contain;
        border-radius: 0.5rem;
        background: var(--gray-100);
        padding: 0.25rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .brand-logo {
        background: var(--gray-300);
        border-color: var(--gray-300);
    }

    .brand-logo:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .logo-placeholder {
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

    [data-theme="dark"] .logo-placeholder {
        background: var(--gray-300);
        border-color: var(--gray-300);
    }

    /* Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 0.625rem;
        font-size: 0.825rem;
        font-weight: 700;
        white-space: nowrap;
        letter-spacing: 0.3px;
        animation: badgeSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes badgeSlideIn {
        from {
            opacity: 0;
            transform: translateX(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .badge-count {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #0c2340;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    [data-theme="dark"] .badge-count {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        color: #dbeafe;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.5rem 1rem;
        border-radius: 0.625rem;
        font-size: 0.825rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        animation: badgeSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .status-active {
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        color: #166534;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
    }

    [data-theme="dark"] .status-active {
        background: linear-gradient(135deg, #047857 0%, #10b981 100%);
        color: #dcfce7;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .status-inactive {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
    }

    [data-theme="dark"] .status-inactive {
        background: linear-gradient(135deg, #7f1d1d 0%, #dc2626 100%);
        color: #fee2e2;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: currentColor;
        animation: statusPulse 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes statusPulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.6;
            transform: scale(0.8);
        }
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
    }

    .btn-action {
        width: 40px;
        height: 40px;
        padding: 0;
        border: none;
        border-radius: 0.625rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-action:hover::before {
        width: 100px;
        height: 100px;
    }

    .btn-edit {
        background: linear-gradient(135deg, #e0e7ff 0%, #ddd6fe 100%);
        color: #4f46e5;
        box-shadow: 0 2px 8px rgba(79, 70, 229, 0.15);
    }

    [data-theme="dark"] .btn-edit {
        background: linear-gradient(135deg, #3730a3 0%, #4c1d95 100%);
        color: #c7d2fe;
        box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #c7d2fe 0%, #a5b4fc 100%);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
    }

    [data-theme="dark"] .btn-edit:hover {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.15);
    }

    [data-theme="dark"] .btn-delete {
        background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%);
        color: #fca5a5;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #fca5a5 0%, #f87171 100%);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.35);
    }

    [data-theme="dark"] .btn-delete:hover {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
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
        text-align: center;
        animation: emptyFadeIn 0.5s ease forwards;
    }

    @keyframes emptyFadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .empty-icon {
        color: var(--gray-300);
        opacity: 0.5;
        animation: float 4s cubic-bezier(0.45, 0.05, 0.55, 0.95) infinite;
        filter: drop-shadow(0 4px 12px rgba(102, 126, 234, 0.1));
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        25% { transform: translateY(-15px) rotate(-2deg); }
        50% { transform: translateY(-20px) rotate(0deg); }
        75% { transform: translateY(-15px) rotate(2deg); }
    }

    .empty-content h3 {
        font-size: 1.625rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
    }

    [data-theme="dark"] .empty-content h3 {
        color: #f1f5f9;
    }

    .empty-content p {
        color: var(--gray-600);
        font-size: 1.0625rem;
        margin: 0;
        max-width: 400px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .brands-page {
            padding: 1.5rem;
        }

        .page-header {
            margin-bottom: 2.5rem;
        }

        .header-left h1 {
            font-size: 2rem;
        }

        .table-header {
            padding: 1.5rem 2rem;
        }

        .brands-table th,
        .brands-table td {
            padding: 1rem 1rem;
        }
    }

    @media (max-width: 768px) {
        .brands-page {
            padding: 1rem;
        }

        .page-header {
            flex-direction: column;
            align-items: stretch;
            margin-bottom: 1.5rem;
            gap: 1.5rem;
        }

        .header-left {
            width: 100%;
        }

        .header-left h1 {
            font-size: 1.875rem;
            margin-bottom: 0.25rem;
        }

        .header-left p {
            font-size: 1rem;
        }

        .header-right {
            width: 100%;
        }

        .header-right .btn-lg {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }

        .search-filter-section {
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-box {
            min-width: 100%;
        }

        .filter-group {
            width: 100%;
        }

        .filter-select {
            width: 100%;
        }

        .table-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 1.25rem 1.5rem;
            gap: 0.75rem;
        }

        .table-count {
            align-self: flex-start;
        }

        .brands-table {
            font-size: 0.85rem;
        }

        .brands-table th,
        .brands-table td {
            padding: 0.875rem 0.75rem;
        }

        .brand-title {
            font-size: 1rem;
        }

        .action-buttons {
            flex-direction: row;
            gap: 0.375rem;
        }

        .btn-action {
            width: 36px;
            height: 36px;
        }

        .btn-lg {
            font-size: 1rem;
        }

        .checkbox-col {
            width: 45px;
        }
    }

    @media (max-width: 480px) {
        .brands-page {
            padding: 0.75rem;
        }

        .header-left h1 {
            font-size: 1.5rem;
        }

        .header-badge {
            font-size: 0.65rem;
            padding: 0.5rem 1rem;
        }

        .table-header {
            padding: 1rem 1rem;
        }

        .table-header h3 {
            font-size: 1.125rem;
        }

        .brands-table {
            font-size: 0.8rem;
        }

        .brands-table th,
        .brands-table td {
            padding: 0.75rem 0.5rem;
        }

        .btn-action {
            width: 32px;
            height: 32px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
        }

        .empty-content h3 {
            font-size: 1.25rem;
        }

        .empty-content p {
            font-size: 0.95rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select All Checkbox
        const selectAllCheckbox = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }

        // Row Checkbox
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(rowCheckboxes).every(cb => cb.checked);
                const someChecked = Array.from(rowCheckboxes).some(cb => cb.checked);

                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.indeterminate = someChecked && !allChecked;
                }
            });
        });

        // Search
        const searchInput = document.getElementById('searchBrand');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase();
                const rows = document.querySelectorAll('.table-row');
                let visibleCount = 0;

                rows.forEach(row => {
                    const brandName = row.querySelector('.brand-title')?.textContent.toLowerCase() || '';
                    const description = row.querySelector('.brand-description')?.textContent.toLowerCase() || '';

                    if (brandName.includes(query) || description.includes(query)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                console.log('Found ' + visibleCount + ' matches');
            });
        }
    });

    // Delete Brand Function
   function deleteBrand(brandSlug, brandName) {
        // Send DELETE request via Fetch API
        fetch(`/brands/${brandSlug}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            // Check if redirect (302/303) or success (200/204)
            if (response.ok || response.redirected || response.status === 302 || response.status === 303) {
                // Remove the brand row from the table immediately
                const row = document.querySelector(`.table-row[data-brand-slug="${brandSlug}"]`);
                if (row) {
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px)';
                    setTimeout(() => row.remove(), 300);
                }

                // Show success message
                const successMsg = document.createElement('div');
                successMsg.textContent = `✓ Đã xóa thương hiệu "${brandName}"`;
                successMsg.style.cssText = 'position:fixed;top:20px;right:20px;background:linear-gradient(135deg,#10b981,#059669);color:white;padding:1rem 1.5rem;border-radius:0.75rem;box-shadow:0 10px 25px rgba(16,185,129,0.3);z-index:9999;animation:slideIn 0.3s ease;';
                document.body.appendChild(successMsg);
                setTimeout(() => successMsg.remove(), 3000);
            } else {
                throw new Error('Failed to delete');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Đã xảy ra lỗi khi xóa thương hiệu. Vui lòng thử lại.');
        });
    }
</script>

@endsection
