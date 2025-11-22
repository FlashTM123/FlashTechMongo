@extends('Admins.app')
@section('title', 'Quản lý người dùng')
@section('content')

<div class="user-management">
    <div class="page-header">
        <div class="header-left">
            <h1>Quản lý người dùng</h1>
            <p>Quản lý tất cả người dùng trong hệ thống</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="window.location='{{ url('/users/create') }}'">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Thêm người dùng
            </button>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $users->count() }}</h3>
                <p>Tổng người dùng</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $users->where('is_blocked', false)->count() }}</h3>
                <p>Đang hoạt động</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>0</h3>
                <p>Chờ xác thực</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon red">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
            </div>
            <div class="stat-info">
                <h3>{{ $users->where('is_blocked', true)->count() }}</h3>
                <p>Bị khóa</p>
            </div>
        </div>
    </div>

    <div class="content-card">
        <div class="card-header">
            <div class="search-box">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Tìm kiếm theo tên, email, số điện thoại...">
                <div class="spinner" id="searchSpinner">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
            <div class="filter-actions">
                <button class="btn btn-outline">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    Lọc
                </button>
                <button class="btn btn-outline">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Xuất
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th>Người dùng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" class="row-checkbox">
                        </td>
                        <td>
                            <div class="user-cell">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'User') }}&background=667eea&color=fff" alt="{{ $user->name ?? 'User' }}" class="user-avatar">
                                <div class="user-info">
                                    <h4>{{ $user->name ?? 'N/A' }}</h4>
                                    <span>ID: {{ $user->_id ?? $user->id }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->email ?? 'N/A' }}</td>
                        <td>{{ $user->phone_number ?? 'N/A' }}</td>
                        <td>{{ $user->address ?? 'N/A' }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge badge-danger">Admin</span>
                            @elseif($user->role == 'manager')
                                <span class="badge badge-warning">Manager</span>
                            @else
                                <span class="badge badge-success">User</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($user->is_blocked) && $user->is_blocked)
                                <span class="status-badge status-blocked">
                                    <span class="status-dot"></span>
                                    Bị khóa
                                </span>
                            @else
                                <span class="status-badge status-active">
                                    <span class="status-dot"></span>
                                    Hoạt động
                                </span>
                            @endif
                        </td>
                        <td>{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" title="Xem">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn-icon" title="Sửa">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                               <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn-icon danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">
                                       <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                       </svg>
                                   </button>
                               </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            <div class="empty-state">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <h3>Chưa có người dùng nào</h3>
                                <p>Bắt đầu bằng cách thêm người dùng mới</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="pagination-wrapper" id="paginationWrapper">
            <div class="pagination-info" id="paginationInfo">
                <p>Hiển thị <strong>{{ $users->firstItem() }}</strong> đến <strong>{{ $users->lastItem() }}</strong> trong tổng số <strong>{{ $users->total() }}</strong> người dùng</p>
            </div>
            <div class="pagination" id="paginationLinks">
                {{-- Previous Button --}}
                @if ($users->onFirstPage())
                    <span class="page-link disabled">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="page-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach(range(1, $users->lastPage()) as $page)
                    @if($page == $users->currentPage())
                        <span class="page-link active">{{ $page }}</span>
                    @else
                        <a href="{{ $users->url($page) }}" class="page-link">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="page-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="page-link disabled">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    .user-management {
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
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid transparent;
        background: linear-gradient(to right, #667eea, #764ba2) bottom no-repeat;
        background-size: 100% 2px;
    }

    .header-left h1 {
        font-size: 2.25rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.5px;
    }

    .header-left p {
        color: #64748b;
        margin: 0;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
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

    .btn-outline {
        background: #ffffff;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .btn-outline:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 16px;
        padding: 1.75rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .stat-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 28px rgba(102, 126, 234, 0.25), 0 0 0 1px rgba(102, 126, 234, 0.1);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-icon {
        width: 68px;
        height: 68px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        position: relative;
    }

    .stat-card:hover .stat-icon {
        transform: rotate(5deg) scale(1.1);
    }

    .stat-icon::after {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: 18px;
        background: inherit;
        opacity: 0.2;
        filter: blur(8px);
    }

    .stat-icon svg {
        width: 32px;
        height: 32px;
        color: #ffffff;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        position: relative;
        z-index: 1;
    }

    .stat-icon.purple {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .stat-icon.green {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stat-icon.orange {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stat-icon.red {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .stat-info h3 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0;
        letter-spacing: -1px;
        line-height: 1;
    }

    .stat-info p {
        color: #64748b;
        margin: 0.5rem 0 0 0;
        font-size: 0.925rem;
        font-weight: 600;
        letter-spacing: 0.02em;
    }

    .content-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .content-card:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(102, 126, 234, 0.1);
    }

    .card-header {
        padding: 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
    }

    .search-box {
        flex: 1;
        max-width: 400px;
        position: relative;
    }

    .search-box svg {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: #94a3b8;
    }

    .search-box input {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .search-box .spinner {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        display: none;
    }

    .search-box .spinner.active {
        display: block;
    }

    .spinner svg {
        width: 20px;
        height: 20px;
        color: #667eea;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .search-box input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        transform: translateY(-1px);
    }

    .filter-actions {
        display: flex;
        gap: 0.75rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 1.25rem 1.5rem;
        text-align: left;
        font-weight: 700;
        color: #334155;
        font-size: 0.8125rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        border-bottom: 2px solid #e2e8f0;
    }

    .data-table td {
        padding: 1.25rem 1.5rem;
        border-top: 1px solid #f1f5f9;
        transition: all 0.2s ease;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
    }

    .data-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 50%);
        transform: scale(1.005);
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.08);
    }

    .user-cell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 3px solid #e2e8f0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .data-table tr:hover .user-avatar {
        border-color: #667eea;
        transform: scale(1.1);
    }

    .user-info h4 {
        margin: 0;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1e293b;
    }

    .user-info span {
        font-size: 0.8rem;
        color: #94a3b8;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8125rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .badge-success {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
    }

    .badge-warning {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
    }

    .badge-danger {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8125rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        transition: all 0.3s ease;
    }

    .status-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
    }

    .status-active {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
        border: 2px solid #10b981;
    }

    .status-active .status-dot {
        background: #10b981;
        box-shadow: 0 0 8px #10b981;
    }

    .status-inactive {
        background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        color: #374151;
        border: 2px solid #9ca3af;
    }

    .status-inactive .status-dot {
        background: #9ca3af;
    }

    .status-blocked {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        border: 2px solid #ef4444;
    }

    .status-blocked .status-dot {
        background: #ef4444;
        box-shadow: 0 0 8px #ef4444;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.7;
            transform: scale(1.2);
        }
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-icon {
        width: 40px;
        height: 40px;
        border: 2px solid transparent;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: #64748b;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
        position: relative;
        overflow: hidden;
    }

    .btn-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-icon:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-icon.danger:hover {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        box-shadow: 0 6px 16px rgba(239, 68, 68, 0.4);
    }

    .btn-icon svg {
        position: relative;
        z-index: 1;
    }

    .btn-icon svg {
        width: 18px;
        height: 18px;
    }

    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 0.5rem 0;
    }

    .empty-state p {
        color: #64748b;
        margin: 0;
    }

    .text-center {
        text-align: center;
    }

    .pagination-wrapper {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-top: 2px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .pagination-info p {
        margin: 0;
        color: #64748b;
        font-size: 0.925rem;
        font-weight: 500;
    }

    .pagination-info strong {
        color: #1e293b;
        font-weight: 700;
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .page-link {
        min-width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.925rem;
        text-decoration: none;
        color: #64748b;
        background: #ffffff;
        border: 2px solid #e2e8f0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0 0.75rem;
    }

    .page-link:hover:not(.disabled):not(.active) {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .page-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        cursor: default;
    }

    .page-link.disabled {
        background: #f1f5f9;
        color: #cbd5e1;
        border-color: #e2e8f0;
        cursor: not-allowed;
        opacity: 0.5;
    }

    .page-link svg {
        width: 18px;
        height: 18px;
    }

    @media (max-width: 768px) {
        .pagination-wrapper {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }

        .pagination {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .card-header {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            max-width: 100%;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.getElementById('selectAll')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    // Live search functionality
    let searchTimeout;
    const searchInput = document.getElementById('searchInput');
    const searchSpinner = document.getElementById('searchSpinner');
    const userTableBody = document.getElementById('userTableBody');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const paginationInfo = document.getElementById('paginationInfo');
    const paginationLinks = document.getElementById('paginationLinks');

    searchInput?.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 500); // Đợi 500ms sau khi người dùng ngừng gõ
    });

    function performSearch(query, page = 1) {
        searchSpinner.classList.add('active');

        fetch(`/api/users/search?query=${encodeURIComponent(query)}&page=${page}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateTable(data.data);
                    updatePagination(data.pagination, query);
                }
            })
            .catch(error => {
                console.error('Search error:', error);
            })
            .finally(() => {
                searchSpinner.classList.remove('active');
            });
    }

    function updateTable(users) {
        if (users.length === 0) {
            userTableBody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center">
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <h3>Không tìm thấy người dùng</h3>
                            <p>Thử tìm kiếm với từ khóa khác</p>
                        </div>
                    </td>
                </tr>
            `;
            return;
        }

        userTableBody.innerHTML = users.map(user => {
            const roleClass = user.role === 'admin' ? 'danger' : user.role === 'manager' ? 'warning' : 'success';
            const roleName = user.role === 'admin' ? 'Admin' : user.role === 'manager' ? 'Manager' : 'User';
            const createdAt = user.created_at ? new Date(user.created_at).toLocaleString('vi-VN') : 'N/A';

            return `
                <tr>
                    <td>
                        <input type="checkbox" class="row-checkbox">
                    </td>
                    <td>
                        <div class="user-cell">
                            <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(user.name || 'User')}&background=667eea&color=fff" alt="${user.name || 'User'}" class="user-avatar">
                            <div class="user-info">
                                <h4>${user.name || 'N/A'}</h4>
                                <span>ID: ${user._id || user.id}</span>
                            </div>
                        </div>
                    </td>
                    <td>${user.email || 'N/A'}</td>
                    <td>${user.phone_number || 'N/A'}</td>
                    <td>${user.address || 'N/A'}</td>
                    <td>
                        <span class="badge badge-${roleClass}">${roleName}</span>
                    </td>
                    <td>
                        ${user.is_blocked ? `
                            <span class="status-badge status-blocked">
                                <span class="status-dot"></span>
                                Bị khóa
                            </span>
                        ` : `
                            <span class="status-badge status-active">
                                <span class="status-dot"></span>
                                Hoạt động
                            </span>
                        `}
                    </td>
                    <td>${createdAt}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon" title="Xem">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button class="btn-icon" title="Sửa">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="btn-icon danger" title="Xóa">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }).join('');
    }

    function updatePagination(pagination, query) {
        if (!pagination || pagination.last_page <= 1) {
            if (paginationWrapper) {
                paginationWrapper.style.display = 'none';
            }
            return;
        }

        if (paginationWrapper) {
            paginationWrapper.style.display = 'flex';
        }

        // Update info
        if (paginationInfo) {
            paginationInfo.innerHTML = `
                <p>Hiển thị <strong>${pagination.first_item || 0}</strong> đến <strong>${pagination.last_item || 0}</strong> trong tổng số <strong>${pagination.total}</strong> người dùng</p>
            `;
        }

        // Update links
        if (paginationLinks) {
            let linksHtml = '';

            // Previous button
            if (pagination.current_page === 1) {
                linksHtml += `
                    <span class="page-link disabled">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                `;
            } else {
                linksHtml += `
                    <a href="#" class="page-link" onclick="event.preventDefault(); performSearch('${query}', ${pagination.current_page - 1})">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                `;
            }

            // Page numbers
            for (let i = 1; i <= pagination.last_page; i++) {
                if (i === pagination.current_page) {
                    linksHtml += `<span class="page-link active">${i}</span>`;
                } else {
                    linksHtml += `<a href="#" class="page-link" onclick="event.preventDefault(); performSearch('${query}', ${i})">${i}</a>`;
                }
            }

            // Next button
            if (pagination.current_page === pagination.last_page) {
                linksHtml += `
                    <span class="page-link disabled">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                `;
            } else {
                linksHtml += `
                    <a href="#" class="page-link" onclick="event.preventDefault(); performSearch('${query}', ${pagination.current_page + 1})">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                `;
            }

            paginationLinks.innerHTML = linksHtml;
        }
    }
</script>

@endsection
