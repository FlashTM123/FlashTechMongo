<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký - FlashTech</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
    }

    .register-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4rem 0;
        background: linear-gradient(135deg, #62f38d 0%, #00b8f0 100%);
        position: relative;
        overflow: hidden;
    }

    .register-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .register-container {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .register-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 650px;
    }

    .register-left {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .register-left::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -150px;
        right: -150px;
    }

    .register-left::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        bottom: -100px;
        left: -100px;
    }

    .register-left-content {
        position: relative;
        z-index: 1;
    }

    .register-icon {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .register-icon svg {
        width: 50px;
        height: 50px;
        color: white;
    }

    .register-left h2 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .register-left p {
        font-size: 1.125rem;
        opacity: 0.95;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .register-features {
        text-align: left;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateX(10px);
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        background: white;
        color: #667eea;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .feature-text {
        font-size: 0.9375rem;
        font-weight: 500;
    }

    .register-right {
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .register-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .register-header h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .register-header p {
        color: #64748b;
        font-size: 0.9375rem;
    }

    .register-header p a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .register-header p a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .register-form {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .form-label .required {
        color: #ef4444;
    }

    .form-input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        padding-left: 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        pointer-events: none;
    }

    .form-input-icon svg {
        width: 18px;
        height: 18px;
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #64748b;
        cursor: pointer;
        padding: 0.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: #667eea;
    }

    .password-toggle svg {
        width: 18px;
        height: 18px;
    }

    .form-error {
        font-size: 0.8125rem;
        color: #ef4444;
        margin-top: 0.25rem;
    }

    .form-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .form-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        border: 2px solid #e2e8f0;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 2px;
    }

    .form-checkbox label {
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.6;
        cursor: pointer;
    }

    .form-checkbox label a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }

    .form-checkbox label a:hover {
        text-decoration: underline;
    }

    .register-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .register-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }

    .register-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .register-divider {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .register-divider::before,
    .register-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    .register-divider span {
        color: #94a3b8;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .social-login {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .social-btn {
        padding: 0.875rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        background: white;
        cursor: pointer;
        font-size: 0.9375rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        border-color: #667eea;
        background: #f8fafc;
        transform: translateY(-2px);
    }

    .social-btn svg {
        width: 20px;
        height: 20px;
    }

    .alert {
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.875rem;
    }

    .alert-success {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .alert-error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .alert svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    /* Password Strength Indicator */
    .password-strength {
        margin-top: 0.5rem;
    }

    .strength-bar {
        height: 4px;
        background: #e2e8f0;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }

    .strength-fill {
        height: 100%;
        width: 0;
        transition: all 0.3s ease;
    }

    .strength-fill.weak {
        width: 33%;
        background: #ef4444;
    }

    .strength-fill.medium {
        width: 66%;
        background: #f59e0b;
    }

    .strength-fill.strong {
        width: 100%;
        background: #10b981;
    }

    .strength-text {
        font-size: 0.75rem;
        color: #64748b;
    }

    /* Responsive */
    @media (max-width: 968px) {
        .register-card {
            grid-template-columns: 1fr;
        }

        .register-left {
            display: none;
        }

        .register-right {
            padding: 2rem;
        }
    }

    @media (max-width: 640px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .social-login {
            grid-template-columns: 1fr;
        }

        .register-section {
            padding: 2rem 0;
        }
    }
</style>
</head>
<body>
    <section class="register-section">
    <div class="register-container">
        <div class="register-card">
            <div class="register-left">
                <div class="register-left-content">
                    <div class="register-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                    </div>
                    <h2>Tạo tài khoản mới</h2>
                    <p>Tham gia cộng đồng FlashTech và trải nghiệm mua sắm công nghệ tuyệt vời</p>

                    <div class="register-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                            <div class="feature-text">Bảo mật tuyệt đối</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="feature-text">Ưu đãi dành riêng cho thành viên</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="feature-text">Theo dõi đơn hàng dễ dàng</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="register-right">
                <div class="register-header">
                    <h1>Đăng ký</h1>
                    <p>Đã có tài khoản? <a href="{{ route('customers.login') }}">Đăng nhập ngay</a></p>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <div>
                        <strong>Có lỗi xảy ra:</strong>
                        <ul style="margin: 0.5rem 0 0 1.25rem; padding: 0;">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <form action="{{ route('customers.register.post') }}" method="POST" class="register-form" id="registerForm" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Họ Tên <span class="required">*</span></label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <input type="text" name="full_name" class="form-input" placeholder="Nhập họ tên" value="{{ old('full_name') }}" required>
                        </div>
                        @error('full_name')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email <span class="required">*</span></label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input type="email" name="email" class="form-input" placeholder="example@email.com" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Số điện thoại</label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </span>
                            <input type="tel" name="phone_number" class="form-input" placeholder="0123456789" value="{{ old('phone_number') }}">
                        </div>
                        @error('phone_number')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Địa chỉ</label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </span>
                            <input type="text" name="address" class="form-input" placeholder="Nhập địa chỉ" value="{{ old('address') }}">
                        </div>
                        @error('address')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Ngày sinh</label>
                            <div class="form-input-wrapper">
                                <span class="form-input-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </span>
                                <input type="date" name="date_of_birth" class="form-input" value="{{ old('date_of_birth') }}">
                            </div>
                            @error('date_of_birth')
                            <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Giới tính</label>
                            <div class="form-input-wrapper">
                                <span class="form-input-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 6v6l4 2"></path>
                                    </svg>
                                </span>
                                <select name="gender" class="form-input" style="appearance: auto;">
                                    <option value="">Chọn giới tính</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>
                            @error('gender')
                            <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mật khẩu <span class="required">*</span></label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input type="password" name="password" id="password" class="form-input" placeholder="Nhập mật khẩu" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        <div class="password-strength" id="passwordStrength" style="display: none;">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText"></div>
                        </div>
                        @error('password')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Xác nhận mật khẩu <span class="required">*</span></label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input type="password" name="password_confirmation" id="passwordConfirm" class="form-input" placeholder="Nhập lại mật khẩu" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('passwordConfirm', this)">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ảnh đại diện</label>
                        <div class="form-input-wrapper">
                            <span class="form-input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </span>
                            <input type="file" name="profile_picture" class="form-input" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" style="padding-left: 3rem;">
                        </div>
                        <span class="form-error" style="font-size: 0.75rem; color: #64748b; margin-top: 0.25rem;">Định dạng: JPEG, PNG, JPG, GIF, WEBP. Tối đa 5MB</span>
                        @error('profile_picture')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            Tôi đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo mật</a> của FlashTech
                        </label>
                    </div>

                    <button type="submit" class="register-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                        Đăng ký tài khoản
                    </button>
                </form>

                <div class="register-divider">
                    <span>Hoặc đăng ký với</span>
                </div>

                <div class="social-login">
                    <button class="social-btn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google
                    </button>
                    <button class="social-btn">
                        <svg viewBox="0 0 24 24" fill="#1877f2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';

        const svg = button.querySelector('svg');
        if (isPassword) {
            svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
        } else {
            svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        }
    }

    const passwordInput = document.getElementById('password');
    const strengthDiv = document.getElementById('passwordStrength');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');

    passwordInput.addEventListener('input', function() {
        const password = this.value;

        if (password.length === 0) {
            strengthDiv.style.display = 'none';
            return;
        }

        strengthDiv.style.display = 'block';

        let strength = 0;
        let feedback = '';

        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^a-zA-Z0-9]/.test(password)) strength++;

        strengthFill.className = 'strength-fill';
        if (strength <= 2) {
            strengthFill.classList.add('weak');
            feedback = 'Mật khẩu yếu - Nên thêm ký tự đặc biệt và số';
        } else if (strength <= 4) {
            strengthFill.classList.add('medium');
            feedback = 'Mật khẩu trung bình - Có thể cải thiện';
        } else {
            strengthFill.classList.add('strong');
            feedback = 'Mật khẩu mạnh - Tuyệt vời!';
        }

        strengthText.textContent = feedback;
    });

    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('passwordConfirm').value;

        if (password !== passwordConfirm) {
            e.preventDefault();
            alert('Mật khẩu xác nhận không khớp!');
            return false;
        }

        const terms = document.getElementById('terms');
        if (!terms.checked) {
            e.preventDefault();
            alert('Vui lòng đồng ý với điều khoản dịch vụ!');
            return false;
        }
    });
</script>
</body>
</html>
