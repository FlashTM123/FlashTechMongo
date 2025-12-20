@extends('Customers.Layouts.master')
@section('title', 'Thông tin cá nhân')
@section('content')

<div class="profile-page">
    <div class="profile-container">
        <!-- Profile Card -->
        <div class="profile-card">
            <!-- Cover -->
            <div class="profile-cover">
                <div class="cover-overlay"></div>
            </div>

            <!-- Avatar -->
            <div class="profile-avatar-wrapper">
                <div class="profile-avatar">
                    @if($customer->profile_picture)
                        <img src="{{ $customer->profile_picture }}" alt="{{ $customer->full_name }}">
                    @else
                        <div class="avatar-placeholder">{{ substr($customer->full_name, 0, 1) }}</div>
                    @endif
                </div>
                <span class="status-badge online"></span>
            </div>

            <!-- User Info -->
            <div class="profile-info">
                <h1 class="profile-name">{{ $customer->full_name }}</h1>
                <p class="profile-email">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ $customer->email }}
                </p>
                @if($customer->google_id)
                <span class="google-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Đăng nhập bằng Google
                </span>
                @endif
            </div>

            <!-- Stats Row -->
            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-icon blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">0</span>
                        <span class="stat-label">Đơn hàng</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">{{ number_format($customer->loyalty_points ?? 0) }}</span>
                        <span class="stat-label">Điểm tích lũy</span>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon yellow">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <span class="stat-value">0</span>
                        <span class="stat-label">Đánh giá</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="profile-details">
            <div class="details-grid">
                <!-- Contact Info -->
                <div class="detail-card">
                    <div class="detail-header">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <h3>Thông tin liên hệ</h3>
                    </div>
                    <div class="detail-body">
                        <div class="detail-row">
                            <span class="detail-label">Mã khách hàng</span>
                            <span class="detail-value highlight">{{ $customer->customer_code }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Số điện thoại</span>
                            <span class="detail-value">{{ $customer->phone_number ?? 'Chưa cập nhật' }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Địa chỉ</span>
                            <span class="detail-value">{{ $customer->address ?? 'Chưa cập nhật' }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Giới tính</span>
                            <span class="detail-value">
                                @if($customer->gender == 'male') Nam
                                @elseif($customer->gender == 'female') Nữ
                                @else Chưa cập nhật
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Account Info -->
                <div class="detail-card">
                    <div class="detail-header">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <h3>Thông tin tài khoản</h3>
                    </div>
                    <div class="detail-body">
                        <div class="detail-row">
                            <span class="detail-label">Trạng thái</span>
                            <span class="status-tag active">Hoạt động</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Xác thực</span>
                            @if($customer->google_id)
                                <span class="status-tag google">Google</span>
                            @elseif($customer->email_verified_at)
                                <span class="status-tag verified">Đã xác thực</span>
                            @else
                                <span class="status-tag pending">Chưa xác thực</span>
                            @endif
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Ngày tham gia</span>
                            <span class="detail-value">{{ $customer->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Cập nhật cuối</span>
                            <span class="detail-value">{{ $customer->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="profile-actions">
                <a href="#" class="btn btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Chỉnh sửa hồ sơ
                </a>
                <a href="#" class="btn btn-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    Đổi mật khẩu
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Trang chủ
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Profile Page Styles */
.profile-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
    padding: 40px 20px;
}

.profile-container {
    max-width: 900px;
    margin: 0 auto;
}

/* Profile Card */
.profile-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 30px;
}

.profile-cover {
    height: 180px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    position: relative;
}

.cover-overlay {
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

/* Avatar */
.profile-avatar-wrapper {
    display: flex;
    justify-content: center;
    margin-top: -70px;
    position: relative;
    z-index: 10;
}

.profile-avatar {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 6px solid #fff;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.avatar-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 56px;
    font-weight: 700;
    color: #fff;
}

.status-badge {
    position: absolute;
    bottom: 10px;
    right: calc(50% - 70px);
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 4px solid #fff;
}

.status-badge.online {
    background: #22c55e;
}

/* Profile Info */
.profile-info {
    text-align: center;
    padding: 20px 30px 30px;
}

.profile-name {
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 8px;
}

.profile-email {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #6b7280;
    font-size: 15px;
    margin: 0 0 15px;
}

.profile-email svg {
    color: #9ca3af;
}

.google-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #f3f4f6;
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 13px;
    color: #4b5563;
    font-weight: 500;
}

/* Stats */
.profile-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1px;
    background: #e5e7eb;
    border-top: 1px solid #e5e7eb;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 25px;
    background: #fff;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-icon.blue {
    background: #eff6ff;
    color: #3b82f6;
}

.stat-icon.green {
    background: #f0fdf4;
    color: #22c55e;
}

.stat-icon.yellow {
    background: #fefce8;
    color: #eab308;
}

.stat-content {
    display: flex;
    flex-direction: column;
}

.stat-value {
    font-size: 24px;
    font-weight: 700;
    color: #1f2937;
}

.stat-label {
    font-size: 13px;
    color: #6b7280;
}

/* Details Section */
.profile-details {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    padding: 30px;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
    margin-bottom: 30px;
}

.detail-card {
    background: #f9fafb;
    border-radius: 16px;
    padding: 25px;
}

.detail-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e5e7eb;
}

.detail-header svg {
    color: #667eea;
}

.detail-header h3 {
    font-size: 16px;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.detail-body {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.detail-label {
    font-size: 14px;
    color: #6b7280;
}

.detail-value {
    font-size: 14px;
    font-weight: 500;
    color: #1f2937;
}

.detail-value.highlight {
    color: #667eea;
    font-weight: 600;
}

/* Status Tags */
.status-tag {
    display: inline-flex;
    align-items: center;
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
}

.status-tag.active {
    background: #dcfce7;
    color: #16a34a;
}

.status-tag.google {
    background: #dbeafe;
    color: #2563eb;
}

.status-tag.verified {
    background: #dcfce7;
    color: #16a34a;
}

.status-tag.pending {
    background: #fef3c7;
    color: #d97706;
}

/* Action Buttons */
.profile-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
}

.btn-secondary {
    background: #1f2937;
    color: #fff;
}

.btn-secondary:hover {
    background: #374151;
    transform: translateY(-2px);
}

.btn-outline {
    background: #fff;
    color: #4b5563;
    border: 2px solid #e5e7eb;
}

.btn-outline:hover {
    border-color: #667eea;
    color: #667eea;
}

/* Responsive */
@media (max-width: 768px) {
    .profile-page {
        padding: 20px 15px;
    }

    .profile-stats {
        grid-template-columns: 1fr;
    }

    .details-grid {
        grid-template-columns: 1fr;
    }

    .profile-actions {
        flex-direction: column;
    }

    .btn {
        justify-content: center;
    }

    .profile-name {
        font-size: 24px;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.profile-card {
    animation: fadeInUp 0.6s ease-out;
}

.profile-details {
    animation: fadeInUp 0.6s ease-out 0.2s both;
}
</style>

@endsection
