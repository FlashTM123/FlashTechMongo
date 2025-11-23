@extends('Admins.app')
@section('title', 'Thêm người dùng')
@section('content')

<div class="create-user-page">
    <div class="page-header">
        <div class="header-left">
            <a href="{{ url('/users') }}" class="back-btn">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Quay lại
            </a>
            <div class="header-content">
                <h1>Thêm người dùng mới</h1>
                <p>Điền thông tin để tạo người dùng mới trong hệ thống</p>
            </div>
        </div>
    </div>

    <div class="form-container">
        <form action="{{ route('users.store') }}" method="POST" class="user-form">
            @csrf

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
                            Username <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Nhập họ và tên" value="{{ old('name') }}" required>
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
                            <input type="email" id="email" name="email" class="form-input" placeholder="example@email.com" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            Mật khẩu <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Nhập mật khẩu" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <svg class="eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            Xác nhận mật khẩu <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Nhập lại mật khẩu" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation')">
                                <svg class="eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
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
                            <input type="text" id="phone_number" name="phone_number" class="form-input" placeholder="0123456789" value="{{ old('phone_number') }}">
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
                            <textarea id="address" name="address" class="form-textarea" placeholder="Nhập địa chỉ" rows="3">{{ old('address') }}</textarea>
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
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        @error('role')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="info-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="info-content">
                            <h4>Lưu ý về vai trò:</h4>
                            <ul>
                                <li><strong>User:</strong> Quyền cơ bản</li>
                                <li><strong>Moderator:</strong> Quản lý nội dung</li>
                                <li><strong>Employee:</strong> Nhân viên</li>
                                <li><strong>Admin:</strong> Toàn quyền hệ thống</li>
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
                <button type="reset" class="btn btn-reset">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Đặt lại
                </button>
                <button type="submit" class="btn btn-submit">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Tạo người dùng
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .create-user-page {
        max-width: 1400px;
        margin: 0 auto;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .header-left {
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

    .header-content h1 {
        font-size: 2.25rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.5px;
    }

    .header-content p {
        color: #64748b;
        margin: 0;
        font-size: 1rem;
        font-weight: 500;
    }

    [data-theme="dark"] .header-content p {
        color: #94a3b8;
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
        padding-left: 1.25rem;
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

    .btn-reset {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .btn-reset:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
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
    }
</style>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }

    // Form validation
    document.querySelector('.user-form')?.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmation = document.getElementById('password_confirmation').value;

        if (password !== confirmation) {
            e.preventDefault();
            alert('Mật khẩu xác nhận không khớp!');
            return false;
        }
    });
</script>

@endsection
