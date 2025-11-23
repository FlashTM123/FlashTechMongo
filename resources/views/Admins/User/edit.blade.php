@extends('Admins.app')
@section('title', 'Sửa người dùng ' . $users->name)
@section('content')

<div class="edit-user-page">
    <div class="page-header">
        <div class="header-left">
            <a href="{{ url('/users') }}" class="back-btn">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Quay lại
            </a>
            <div class="header-content">
                <div class="title-with-badge">
                    <h1>Chỉnh sửa người dùng</h1>
                    <span class="user-id-badge">ID: {{ $users->_id ?? $users->id }}</span>
                </div>
                <p>Cập nhật thông tin cho <strong>{{ $users->name }}</strong></p>
            </div>
        </div>
        <div class="header-right">
            <div class="user-preview-card">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($users->name) }}&background=667eea&color=fff&size=80" alt="{{ $users->name }}" class="preview-avatar">
                <div class="preview-info">
                    <h3>{{ $users->name }}</h3>
                    <p>{{ $users->email }}</p>
                    <span class="badge badge-{{ $users->role == 'admin' ? 'danger' : ($users->role == 'moderator' ? 'warning' : ($users->role == 'employee' ? 'info' : 'secondary')) }}">
                        {{ ucfirst($users->role ?? 'user') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-container">
        <form action="{{ route('users.update', $users->id) }}" method="POST" class="user-form">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Left Column -->
                <div class="form-section">
                    <div class="section-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h3>Thông tin cơ bản</h3>
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">
                            Họ và tên <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Nhập họ và tên" value="{{ old('name', $users->name) }}" required>
                        </div>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <input type="email" id="email" name="email" class="form-input" placeholder="example@email.com" value="{{ old('email', $users->email) }}" required>
                        </div>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="password-header">
                            <label class="form-label">Mật khẩu</label>
                            <button type="button" class="toggle-password-section" onclick="togglePasswordSection()">
                                <svg class="lock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span id="toggleText">Thay đổi mật khẩu</span>
                            </button>
                        </div>

                        <div id="passwordSection" class="password-section" style="display: none;">
                            <div class="input-wrapper">
                                <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Nhập mật khẩu mới">
                                <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password')">
                                    <svg class="eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror

                            <div class="input-wrapper" style="margin-top: 1rem;">
                                <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Xác nhận mật khẩu mới">
                                <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">
                                    <svg class="eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="info-text">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Để trống nếu không muốn thay đổi mật khẩu
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="form-section">
                    <div class="section-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3>Thông tin liên hệ & vai trò</h3>
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="form-label">
                            Số điện thoại
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <input type="text" id="phone_number" name="phone_number" class="form-input" placeholder="0123456789" value="{{ old('phone_number', $users->phone_number) }}">
                        </div>
                        @error('phone_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">
                            Địa chỉ
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <textarea id="address" name="address" class="form-textarea" placeholder="Nhập địa chỉ" rows="3">{{ old('address', $users->address) }}</textarea>
                        </div>
                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">
                            Vai trò <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <select id="role" name="role" class="form-select" required>
                                <option value="">Chọn vai trò</option>
                                <option value="user" {{ old('role', $users->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="employee" {{ old('role', $users->role) == 'employee' ? 'selected' : '' }}>Employee</option>
                                <option value="moderator" {{ old('role', $users->role) == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                <option value="admin" {{ old('role', $users->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        @error('role')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Trạng thái tài khoản
                        </label>
                        <div class="status-controls">
                            <div class="status-toggle-card" id="activeCard" onclick="toggleStatus('active')">
                                <div class="status-icon active-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="status-info">
                                    <h4>Hoạt động</h4>
                                    <p>Người dùng có thể đăng nhập và sử dụng hệ thống</p>
                                </div>
                                <div class="status-check">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="status-toggle-card" id="blockedCard" onclick="toggleStatus('blocked')">
                                <div class="status-icon blocked-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                    </svg>
                                </div>
                                <div class="status-info">
                                    <h4>Bị khóa</h4>
                                    <p>Người dùng không thể đăng nhập hoặc truy cập hệ thống</p>
                                </div>
                                <div class="status-check">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="statusInput" name="is_blocked" value="0">
                    </div>

                    <div class="info-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="info-content">
                            <h4>Thông tin tài khoản:</h4>
                            <ul>
                                <li><strong>Ngày tạo:</strong> {{ $users->created_at ? $users->created_at->format('d/m/Y H:i') : 'N/A' }}</li>
                                <li><strong>Cập nhật:</strong> {{ $users->updated_at ? $users->updated_at->format('d/m/Y H:i') : 'N/A' }}</li>
                                <li><strong>Trạng thái:</strong> <span id="statusDisplay" class="status-active">Hoạt động</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <button type="button" onclick="window.location='{{ url('/users') }}'" class="btn btn-cancel">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Hủy bỏ
                </button>
                <button type="button" onclick="confirmDelete()" class="btn btn-delete">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Xóa người dùng
                </button>
                <button type="submit" class="btn btn-submit">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Form (Hidden) -->
<form id="deleteForm" action="{{ route('users.destroy', $users->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<style>
    .edit-user-page {
        max-width: 1400px;
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
        align-items: flex-start;
        margin-bottom: 2rem;
        gap: 2rem;
    }

    .header-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: fit-content;
    }

    .back-btn:hover {
        color: #667eea;
        transform: translateX(-4px);
    }

    .back-btn svg {
        width: 20px;
        height: 20px;
    }

    .title-with-badge {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .header-content h1 {
        font-size: 2.25rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .user-id-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 700;
        color: #475569;
        border: 2px solid #cbd5e1;
    }

    [data-theme="dark"] .user-id-badge {
        background: linear-gradient(135deg, #2d3748 0%, #1a1f2e 100%);
        color: #cbd5e1;
        border-color: #3b4252;
    }

    .header-content p {
        color: #64748b;
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        font-weight: 500;
    }

    [data-theme="dark"] .header-content p {
        color: #94a3b8;
    }

    .header-content strong {
        color: #1e293b;
        font-weight: 700;
    }

    [data-theme="dark"] .header-content strong {
        color: #f1f5f9;
    }

    .header-right {
        flex-shrink: 0;
    }

    .user-preview-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        min-width: 320px;
    }

    [data-theme="dark"] .user-preview-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #0f1419 100%);
        border-color: #2d3748;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .user-preview-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
        border-color: #667eea;
    }

    .preview-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 4px solid #667eea;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .preview-info h3 {
        margin: 0 0 0.5rem 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .preview-info h3 {
        color: #f1f5f9;
    }

    .preview-info p {
        margin: 0 0 0.75rem 0;
        color: #64748b;
        font-size: 0.925rem;
    }

    [data-theme="dark"] .preview-info p {
        color: #94a3b8;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.375rem 0.875rem;
        border-radius: 20px;
        font-size: 0.8125rem;
        font-weight: 700;
        letter-spacing: 0.02em;
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

    .form-container {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    [data-theme="dark"] .form-container {
        background: #1a1f2e;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .user-form {
        padding: 2.5rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 3rem;
        margin-bottom: 2.5rem;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid;
        border-image: linear-gradient(90deg, #667eea, #764ba2) 1;
    }

    .section-header svg {
        width: 24px;
        height: 24px;
        color: #667eea;
    }

    .section-header h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .section-header h3 {
        color: #f1f5f9;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.625rem;
        font-size: 0.95rem;
    }

    [data-theme="dark"] .form-label {
        color: #e2e8f0;
    }

    .required {
        color: #ef4444;
        font-weight: 700;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: #94a3b8;
        pointer-events: none;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
        color: #1e293b;
        font-family: inherit;
    }

    [data-theme="dark"] .form-input,
    [data-theme="dark"] .form-select {
        background: #0f1419;
        border-color: #2d3748;
        color: #e2e8f0;
    }

    .form-textarea {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
        color: #1e293b;
        font-family: inherit;
        resize: vertical;
        min-height: 100px;
    }

    [data-theme="dark"] .form-textarea {
        background: #0f1419;
        border-color: #2d3748;
        color: #e2e8f0;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        transform: translateY(-1px);
    }

    .password-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.625rem;
    }

    .toggle-password-section {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .toggle-password-section:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .toggle-password-section svg {
        width: 16px;
        height: 16px;
    }

    .password-section {
        margin-top: 1rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        animation: slideDown 0.3s ease;
    }

    [data-theme="dark"] .password-section {
        background: linear-gradient(135deg, #252836 0%, #1a1f2e 100%);
        border-color: #2d3748;
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

    .toggle-password {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #94a3b8;
        transition: all 0.3s ease;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .toggle-password:hover {
        color: #667eea;
    }

    .eye-icon {
        width: 20px;
        height: 20px;
    }

    .info-text {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.75rem;
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
    }

    [data-theme="dark"] .info-text {
        color: #94a3b8;
    }

    .info-text svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .error-message {
        display: block;
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        font-weight: 500;
    }

    .info-box {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border: 2px solid #93c5fd;
        border-radius: 12px;
        padding: 1.25rem;
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    [data-theme="dark"] .info-box {
        background: linear-gradient(135deg, #1e3a5f 0%, #1a2f4d 100%);
        border-color: #3b82f6;
    }

    .info-box svg {
        width: 24px;
        height: 24px;
        color: #3b82f6;
        flex-shrink: 0;
    }

    .info-content h4 {
        margin: 0 0 0.75rem 0;
        color: #1e40af;
        font-size: 0.95rem;
        font-weight: 700;
    }

    [data-theme="dark"] .info-content h4 {
        color: #93c5fd;
    }

    .info-content ul {
        margin: 0;
        padding: 0;
        list-style: none;
        color: #1e40af;
    }

    [data-theme="dark"] .info-content ul {
        color: #93c5fd;
    }

    .info-content li {
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .info-content strong {
        font-weight: 700;
    }

    .status-active {
        color: #059669;
        font-weight: 700;
    }

    .status-blocked {
        color: #dc2626;
        font-weight: 700;
    }

    .status-controls {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .status-toggle-card {
        position: relative;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 3px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    [data-theme="dark"] .status-toggle-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #0f1419 100%);
        border-color: #2d3748;
    }

    .status-toggle-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .status-toggle-card.selected {
        border-width: 3px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        transform: scale(1.02);
    }

    .status-toggle-card.selected.active-selected {
        border-color: #10b981;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    }

    .status-toggle-card.selected.blocked-selected {
        border-color: #ef4444;
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    }

    .status-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .status-toggle-card:hover .status-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .active-icon {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .blocked-icon {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .status-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .status-info h4 {
        margin: 0 0 0.5rem 0;
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
    }

    [data-theme="dark"] .status-info h4 {
        color: #f1f5f9;
    }

    .status-info p {
        margin: 0;
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.5;
    }

    [data-theme="dark"] .status-info p {
        color: #94a3b8;
    }

    .status-check {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 32px;
        height: 32px;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .status-toggle-card.selected .status-check {
        opacity: 1;
        transform: scale(1.1);
    }

    .status-check svg {
        width: 100%;
        height: 100%;
    }

    .status-toggle-card.selected.active-selected .status-check {
        color: #10b981;
    }

    .status-toggle-card.selected.blocked-selected .status-check {
        color: #ef4444;
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    [data-theme="dark"] .form-footer {
        border-top-color: #2d3748;
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
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn svg {
        width: 20px;
        height: 20px;
    }

    .btn-cancel {
        background: #ffffff;
        color: #64748b;
        border: 2px solid #e2e8f0;
    }

    .btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(239, 68, 68, 0.4);
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 1024px) {
        .page-header {
            flex-direction: column;
        }

        .user-preview-card {
            min-width: 100%;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .user-form {
            padding: 1.5rem;
        }

        .form-footer {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .title-with-badge {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<script>
    function toggleStatus(status) {
        const activeCard = document.getElementById('activeCard');
        const blockedCard = document.getElementById('blockedCard');
        const statusInput = document.getElementById('statusInput');
        const statusDisplay = document.getElementById('statusDisplay');

        if (status === 'active') {
            activeCard.classList.add('selected', 'active-selected');
            blockedCard.classList.remove('selected', 'blocked-selected');
            statusInput.value = '0';
            statusDisplay.textContent = 'Hoạt động';
            statusDisplay.className = 'status-active';
        } else {
            blockedCard.classList.add('selected', 'blocked-selected');
            activeCard.classList.remove('selected', 'active-selected');
            statusInput.value = '1';
            statusDisplay.textContent = 'Bị khóa';
            statusDisplay.className = 'status-blocked';
        }
    }

    // Initialize status on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Check if user is blocked from backend data
        const isBlocked = {{ $users->is_blocked ?? 0 }};
        if (isBlocked) {
            toggleStatus('blocked');
        } else {
            toggleStatus('active');
        }
    });

    function togglePasswordSection() {
        const section = document.getElementById('passwordSection');
        const toggleText = document.getElementById('toggleText');

        if (section.style.display === 'none') {
            section.style.display = 'block';
            toggleText.textContent = 'Ẩn mật khẩu';
        } else {
            section.style.display = 'none';
            toggleText.textContent = 'Thay đổi mật khẩu';
            // Clear password fields
            document.getElementById('password').value = '';
            document.getElementById('password_confirmation').value = '';
        }
    }

    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }

    function confirmDelete() {
        if (confirm('Bạn có chắc chắn muốn xóa người dùng này? Hành động này không thể hoàn tác!')) {
            document.getElementById('deleteForm').submit();
        }
    }

    // Form validation
    document.querySelector('.user-form')?.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmation = document.getElementById('password_confirmation').value;

        // Only validate if password section is visible and has value
        if (password && password !== confirmation) {
            e.preventDefault();
            alert('Mật khẩu xác nhận không khớp!');
            return false;
        }
    });
</script>

@endsection
