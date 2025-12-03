@extends('Admins.app')
@section('title', 'Dashboard')
@section('content')

<div class="dashboard-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <h1>Dashboard</h1>
            <p>Chào mừng trở lại, <strong>{{ Auth::user()->name }}</strong>! 👋</p>
        </div>
        <div class="header-right">
            <div class="date-time-card">
                <div class="date-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="date-info">
                    <div class="current-date" id="currentDate"></div>
                    <div class="current-time" id="currentTime"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon users-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Tổng người dùng</h3>
                <div class="stat-value">{{ number_format($totalUsers) }}</div>
                <div class="stat-footer">
                    <span class="stat-badge success">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                        </svg>
                        Hoạt động
                    </span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon active-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Người dùng hoạt động</h3>
                <div class="stat-value">{{ number_format($activeUsers) }}</div>
                <div class="stat-footer">
                    <span class="stat-badge success">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ number_format(($activeUsers / $totalUsers) * 100, 1) }}% tổng số
                    </span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon blocked-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Người dùng bị khóa</h3>
                <div class="stat-value">{{ number_format($blockedUsers) }}</div>
                <div class="stat-footer">
                    <span class="stat-badge danger">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/>
                        </svg>
                        {{ number_format(($blockedUsers / $totalUsers) * 100, 1) }}% tổng số
                    </span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon admin-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Quản trị viên</h3>
                <div class="stat-value">{{ number_format($adminUsers + $moderatorUsers) }}</div>
                <div class="stat-footer">
                    <span class="stat-badge info">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        {{ $adminUsers }} Admin, {{ $moderatorUsers }} Moderator
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Statistics (collapsible to keep page short) -->
    <div class="customer-stats">
        <div class="collapsible-header">
            <div class="header-content">
                <svg class="header-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M7 20H2v-2a3 3 0 015.856-1.487M15 7a4 4 0 11-8 0 4 4 0 018 0zM6 10h12M6 14h12M6 18h12"/>
                </svg>
                <h3>Thống kê khách hàng</h3>
            </div>
            <button id="toggleCustomers" class="toggle-btn" aria-expanded="false">
                <svg class="toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </button>
        </div>

        <div id="customerContent" class="collapsible-body" style="display: none;">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon users-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 0112 4a8 8 0 016.879 13.804M12 14a4 4 0 110-8 4 4 0 010 8z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Tổng khách hàng</h3>
                        <div class="stat-value">{{ number_format($totalCustomers ?? 0) }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon active-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Khách hàng hoạt động</h3>
                        <div class="stat-value">{{ number_format($activeCustomers ?? 0) }}</div>
                        <div class="stat-footer">
                            <span class="stat-badge success">
                                Hoạt động
                            </span>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon admin-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Khách hàng VIP</h3>
                        <div class="stat-value">{{ number_format($vipCustomers ?? 0) }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon blocked-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636L5.636 18.364M5.636 5.636l12.728 12.728"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Khách hàng không hoạt động</h3>
                        <div class="stat-value">{{ number_format($inactiveCustomers ?? 0) }}</div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="recent-users-list">
                    @forelse($recentCustomers ?? [] as $customer)
                        <div class="recent-user-item">
                            <div class="user-avatar">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=10b981&color=fff&size=48" alt="{{ $customer->name }}">
                            </div>
                            <div class="user-details">
                                <h4>{{ $customer->name }}</h4>
                                <p>{{ $customer->email ?? '-' }}</p>
                            </div>
                            <div class="user-meta">
                                <span class="badge badge-{{ ($customer->status ?? 'active') == 'vip' ? 'danger' : 'success' }}">
                                    {{ ucfirst($customer->status ?? 'active') }}
                                </span>
                                <span class="user-date">{{ optional($customer->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <p>Chưa có khách hàng mới</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Row -->
    <!-- User Statistics (collapsible section) -->
    <div class="user-stats">
        <div class="collapsible-header">
            <div class="header-content">
                <svg class="header-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <h3>Thống kê người dùng</h3>
            </div>
            <button id="toggleUsers" class="toggle-btn" aria-expanded="false">
                <svg class="toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </button>
        </div>

        <div id="userContent" class="collapsible-body" style="display: none;">
            <div class="content-grid">
                <!-- Users by Role Chart -->
                <div class="content-card chart-card">
                    <div class="card-header">
                        <h3>
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                            </svg>
                            Phân bổ người dùng theo vai trò
                        </h3>
                    </div>
            <div class="card-body">
                <div class="role-chart">
                    @foreach($usersByRole as $role => $count)
                        @php
                            $percentage = $totalUsers > 0 ? ($count / $totalUsers) * 100 : 0;
                            $roleNames = [
                                'admin' => 'Admin',
                                'moderator' => 'Moderator',
                                'employee' => 'Employee',
                                'user' => 'User'
                            ];
                            $roleColors = [
                                'admin' => '#ef4444',
                                'moderator' => '#f59e0b',
                                'employee' => '#3b82f6',
                                'user' => '#10b981'
                            ];
                        @endphp
                        <div class="role-item">
                            <div class="role-info">
                                <div class="role-dot" style="background: {{ $roleColors[$role] }}"></div>
                                <span class="role-name">{{ $roleNames[$role] }}</span>
                                <span class="role-count">{{ number_format($count) }}</span>
                            </div>
                            <div class="role-bar-container">
                                <div class="role-bar" style="width: {{ $percentage }}%; background: {{ $roleColors[$role] }}"></div>
                            </div>
                            <span class="role-percentage">{{ number_format($percentage, 1) }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="content-card table-card">
            <div class="card-header">
                <h3>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Người dùng mới nhất
                </h3>
                <a href="{{ url('/users') }}" class="view-all-btn">
                    Xem tất cả
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="card-body">
                <div class="recent-users-list">
                    @forelse($recentUsers as $user)
                        <div class="recent-user-item">
                            <div class="user-avatar">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=667eea&color=fff&size=48" alt="{{ $user->name }}">
                            </div>
                            <div class="user-details">
                                <h4>{{ $user->name }}</h4>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="user-meta">
                                <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'moderator' ? 'warning' : 'success') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                                <span class="user-date">{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p>Chưa có người dùng nào</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>

    <div class="quick-actions">
        <h3>
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            Thao tác nhanh
        </h3>
        <div class="actions-grid">
            <a href="{{ url('/users/create') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h4>Thêm người dùng</h4>
                <p>Tạo tài khoản người dùng mới</p>
            </a>

            <a href="{{ url('/users') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h4>Quản lý người dùng</h4>
                <p>Xem và chỉnh sửa người dùng</p>
            </a>

            <a href="{{ url('/settings') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h4>Cài đặt hệ thống</h4>
                <p>Tùy chỉnh giao diện và cấu hình</p>
            </a>

            <a href="#" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h4>Báo cáo thống kê</h4>
                <p>Xem báo cáo chi tiết</p>
            </a>
        </div>
    </div>
</div>

<style>
    .dashboard-page {
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
        font-size: 2.5rem;
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
        font-size: 1.1rem;
    }

    [data-theme="dark"] .header-left p {
        color: #94a3b8;
    }

    .header-left strong {
        color: #1e293b;
        font-weight: 700;
    }

    [data-theme="dark"] .header-left strong {
        color: #f1f5f9;
    }

    .date-time-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1rem 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    [data-theme="dark"] .date-time-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #0f1419 100%);
        border-color: #2d3748;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .date-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .date-icon svg {
        width: 24px;
        height: 24px;
        color: #ffffff;
    }

    .date-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .current-date {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .current-date {
        color: #f1f5f9;
    }

    .current-time {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 600;
    }

    [data-theme="dark"] .current-time {
        color: #94a3b8;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.75rem;
        display: flex;
        gap: 1.25rem;
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
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .users-icon {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .active-icon {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .blocked-icon {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .admin-icon {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stat-icon svg {
        width: 32px;
        height: 32px;
        color: #ffffff;
    }

    .stat-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .stat-content h3 {
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    [data-theme="dark"] .stat-content h3 {
        color: #94a3b8;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }

    [data-theme="dark"] .stat-value {
        color: #f1f5f9;
    }

    .stat-footer {
        margin-top: auto;
    }

    .stat-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .stat-badge svg {
        width: 14px;
        height: 14px;
    }

    .stat-badge.success {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
    }

    .stat-badge.danger {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
    }

    .stat-badge.info {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
    }

    .content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .content-card {
        background: #ffffff;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .card-header h3 {
        color: #f1f5f9;
    }

    .card-header h3 svg {
        width: 20px;
        height: 20px;
        color: #667eea;
    }

    .view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        color: #667eea;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .view-all-btn:hover {
        color: #764ba2;
        transform: translateX(4px);
    }

    .view-all-btn svg {
        width: 16px;
        height: 16px;
    }

    .card-body {
        padding: 1.5rem;
    }

    .role-chart {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .role-item {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .role-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        min-width: 150px;
    }

    .role-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .role-name {
        font-weight: 600;
        color: #1e293b;
    }

    [data-theme="dark"] .role-name {
        color: #f1f5f9;
    }

    .role-count {
        font-weight: 700;
        color: #667eea;
        margin-left: auto;
    }

    .role-bar-container {
        flex: 1;
        height: 8px;
        background: #f1f5f9;
        border-radius: 4px;
        overflow: hidden;
    }

    [data-theme="dark"] .role-bar-container {
        background: #0f1419;
    }

    .role-bar {
        height: 100%;
        border-radius: 4px;
        transition: width 0.5s ease;
    }

    .role-percentage {
        font-weight: 700;
        color: #64748b;
        min-width: 50px;
        text-align: right;
        font-size: 0.875rem;
    }

    [data-theme="dark"] .role-percentage {
        color: #94a3b8;
    }

    .recent-users-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .recent-user-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .recent-user-item {
        background: linear-gradient(135deg, #0f1419 0%, #1a1f2e 100%);
        border-color: #2d3748;
    }

    .recent-user-item:hover {
        transform: translateX(4px);
        border-color: #667eea;
    }

    .user-avatar {
        flex-shrink: 0;
    }

    .user-avatar img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 2px solid #667eea;
    }

    .user-details {
        flex: 1;
    }

    .user-details h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .user-details h4 {
        color: #f1f5f9;
    }

    .user-details p {
        margin: 0;
        font-size: 0.875rem;
        color: #64748b;
    }

    [data-theme="dark"] .user-details p {
        color: #94a3b8;
    }

    .user-meta {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.5rem;
    }

    .badge {
        display: inline-flex;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
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

    .user-date {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 600;
    }

    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem;
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
        font-size: 0.95rem;
        margin: 0;
    }

    .quick-actions {
        margin-bottom: 2rem;
    }

    .quick-actions > h3 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 1.5rem 0;
    }

    [data-theme="dark"] .quick-actions > h3 {
        color: #f1f5f9;
    }

    .quick-actions > h3 svg {
        width: 24px;
        height: 24px;
        color: #667eea;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .action-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.75rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    [data-theme="dark"] .action-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #0f1419 100%);
        border-color: #2d3748;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .action-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
        border-color: #667eea;
    }

    .action-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .action-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .action-card h4 {
        margin: 0;
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .action-card h4 {
        color: #f1f5f9;
    }

    .action-card p {
        margin: 0;
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.5;
    }

    [data-theme="dark"] .action-card p {
        color: #94a3b8;
    }

    /* Customer stats collapsible */
    .customer-stats {
        margin-bottom: 2rem;
        border-radius: 16px;
        overflow: visible;
        animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .customer-stats .collapsible-header,
    .user-stats .collapsible-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 16px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.2);
        position: relative;
        overflow: hidden;
    }

    .user-stats .collapsible-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.2);
    }

    .customer-stats .collapsible-header::before,
    .user-stats .collapsible-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.1) 100%);
        pointer-events: none;
    }

    .customer-stats .collapsible-header:hover,
    .user-stats .collapsible-header:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(102, 126, 234, 0.3);
    }

    .user-stats .collapsible-header:hover {
        box-shadow: 0 12px 32px rgba(16, 185, 129, 0.3);
    }

    [data-theme="dark"] .customer-stats .collapsible-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #7c3aed 100%);
        box-shadow: 0 8px 24px rgba(124, 58, 237, 0.2);
    }

    [data-theme="dark"] .customer-stats .collapsible-header:hover {
        box-shadow: 0 12px 32px rgba(124, 58, 237, 0.3);
    }

    [data-theme="dark"] .user-stats .collapsible-header {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.2);
    }

    [data-theme="dark"] .user-stats .collapsible-header:hover {
        box-shadow: 0 12px 32px rgba(16, 185, 129, 0.3);
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .header-icon {
        width: 28px;
        height: 28px;
        color: #ffffff;
        flex-shrink: 0;
        animation: iconPulse 2s ease-in-out infinite;
    }

    @keyframes iconPulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .customer-stats .collapsible-header h3,
    .user-stats .collapsible-header h3 {
        display: flex;
        align-items: center;
        gap: 0;
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: -0.3px;
    }

    .toggle-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.4);
        padding: 0.75rem;
        border-radius: 12px;
        color: #ffffff;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        backdrop-filter: blur(10px);
        flex-shrink: 0;
    }

    .toggle-icon {
        width: 20px;
        height: 20px;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .toggle-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.6);
        transform: translateY(-2px);
    }

    .toggle-btn[aria-expanded="true"] .toggle-icon {
        transform: rotate(180deg);
    }

    [data-theme="dark"] .toggle-btn {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
    }

    [data-theme="dark"] .toggle-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .collapsible-body {
        animation: expandHeight 0.4s ease forwards;
        overflow: hidden;
    }

    @keyframes expandHeight {
        from {
            opacity: 0;
            max-height: 0;
            margin-top: 0;
        }
        to {
            opacity: 1;
            max-height: 2000px;
            margin-top: 1.5rem;
        }
    }

    .collapsible-body[style*="display: none"] {
        animation: collapseHeight 0.4s ease forwards;
    }

    @keyframes collapseHeight {
        from {
            opacity: 1;
            max-height: 2000px;
            margin-top: 1.5rem;
        }
        to {
            opacity: 0;
            max-height: 0;
            margin-top: 0;
        }
    }

    /* User stats collapsible */
    .user-stats {
        margin-bottom: 2rem;
        border-radius: 16px;
        overflow: visible;
        animation: slideDown 0.4s ease;
    }


    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .date-time-card {
            width: 100%;
        }

        .customer-stats .collapsible-header,
        .user-stats .collapsible-header {
            padding: 1rem 1.5rem;
        }

        .customer-stats .collapsible-header h3,
        .user-stats .collapsible-header h3 {
            font-size: 1.1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update date and time
        function updateDateTime() {
            const now = new Date();

            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateStr = now.toLocaleDateString('vi-VN', dateOptions);

            const timeStr = now.toLocaleTimeString('vi-VN', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            const dateElement = document.getElementById('currentDate');
            const timeElement = document.getElementById('currentTime');

            if (dateElement) dateElement.textContent = dateStr;
            if (timeElement) timeElement.textContent = timeStr;
        }

        // Update immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);

        // Collapsible customer stats: remember state in localStorage
        try {
            const toggleBtn = document.getElementById('toggleCustomers');
            const customerContent = document.getElementById('customerContent');
            if (toggleBtn && customerContent) {
                const STORAGE_KEY = 'dashboard_customers_open';
                const saved = localStorage.getItem(STORAGE_KEY);
                const isOpen = saved === '1';
                const setState = (open) => {
                    if (open) {
                        customerContent.style.display = 'block';
                    } else {
                        customerContent.style.display = 'none';
                    }
                    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                };

                setState(isOpen);

                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentlyOpen = customerContent.style.display !== 'none';
                    const nextOpen = !currentlyOpen;
                    setState(nextOpen);
                    try { localStorage.setItem(STORAGE_KEY, nextOpen ? '1' : '0'); } catch (e) { /* ignore */ }
                });
            }
        } catch (e) {
            // safe fail for older browsers
            console.error(e);
        }

        // Collapsible user stats: remember state in localStorage
        try {
            const toggleBtn = document.getElementById('toggleUsers');
            const userContent = document.getElementById('userContent');
            if (toggleBtn && userContent) {
                const STORAGE_KEY = 'dashboard_users_open';
                const saved = localStorage.getItem(STORAGE_KEY);
                const isOpen = saved === '1';
                const setState = (open) => {
                    if (open) {
                        userContent.style.display = 'block';
                    } else {
                        userContent.style.display = 'none';
                    }
                    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                };

                setState(isOpen);

                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentlyOpen = userContent.style.display !== 'none';
                    const nextOpen = !currentlyOpen;
                    setState(nextOpen);
                    try { localStorage.setItem(STORAGE_KEY, nextOpen ? '1' : '0'); } catch (e) { /* ignore */ }
                });
            }
        } catch (e) {
            // safe fail for older browsers
            console.error(e);
        }
    });
</script>

@endsection
