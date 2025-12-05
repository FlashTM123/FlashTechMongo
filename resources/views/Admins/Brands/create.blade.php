@extends('Admins.app')
@section('title', 'Create Brand')
@section('content')

<div class="create-brand-page">
    <!-- Page Header -->
    <div class="page-header">
        <a href="{{ route('brands.index') }}" class="back-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Quay lại
        </a>
        <div class="header-text">
            <div class="header-badge">🏆 THƯƠNG HIỆU MỚI</div>
            <h1>Tạo thương hiệu mới</h1>
            <p>Thêm một thương hiệu mới vào hệ thống của bạn</p>
        </div>
    </div>

    <!-- Main Form Container -->
    <div class="form-wrapper">
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
            @csrf

            <div class="form-grid">
                <!-- Left Column -->
                <div class="form-section">
                    <div class="section-title">
                        <span class="icon">📋</span>
                        <h2>Thông tin cơ bản</h2>
                    </div>

                    <!-- Brand Name -->
                    <div class="form-group">
                        <label for="name">
                            <span class="label-text">Tên thương hiệu</span>
                            <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            </svg>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-input @error('name') error @enderror"
                                placeholder="VD: Apple, Samsung, Sony..."
                                value="{{ old('name') }}"
                                required
                            >
                        </div>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">
                            <span class="label-text">Slug (URL)</span>
                            <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            </svg>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                class="form-input @error('slug') error @enderror"
                                placeholder="apple, samsung, sony..."
                                value="{{ old('slug') }}"
                                required
                            >
                        </div>
                        @error('slug')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <p class="field-hint">Tự động sinh từ tên hoặc nhập thủ công</p>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">
                            <span class="label-text">Mô tả</span>
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-textarea @error('description') error @enderror"
                            placeholder="Nhập mô tả chi tiết về thương hiệu..."
                            rows="4"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <div class="char-count">
                            <span id="charCount">0</span>/500 ký tự
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="form-group">
                        <label for="website">
                            <span class="label-text">Website chính thức</span>
                        </label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            <input
                                type="url"
                                id="website"
                                name="website"
                                class="form-input @error('website') error @enderror"
                                placeholder="https://example.com"
                                value="{{ old('website') }}"
                            >
                        </div>
                        @error('website')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Toggle -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="label-text">Trạng thái</span>
                        </label>
                        <div class="toggle-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input
                                type="checkbox"
                                id="is_active"
                                name="is_active"
                                value="1"
                                class="toggle-input"
                                {{ old('is_active') ? 'checked' : '' }}
                            >
                            <label for="is_active" class="toggle-label">
                                <span class="toggle-slider"></span>
                                <span class="toggle-text">Hoạt động</span>
                            </label>
                        </div>
                        <p class="field-hint">Bật để thương hiệu có thể được sử dụng cho các sản phẩm</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="form-section">
                    <div class="section-title">
                        <span class="icon">🎨</span>
                        <h2>Logo & Hình ảnh</h2>
                    </div>

                    <!-- Logo Upload -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="label-text">Tải lên Logo</span>
                        </label>
                        <div class="logo-upload-area" id="logoUploadArea">
                            <svg class="upload-icon" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            <h3>Kéo thả logo tại đây</h3>
                            <p>hoặc <span class="upload-link">nhấp để chọn</span></p>
                            <span class="file-info">PNG, JPG, GIF • Max 5MB</span>
                            <input
                                type="file"
                                id="logo"
                                name="logo"
                                class="file-input"
                                accept="image/*"
                            >
                        </div>
                        @error('logo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Logo Preview -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="label-text">Xem trước Logo</span>
                        </label>
                        <div class="logo-preview" id="logoPreview">
                            <div class="preview-empty">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.8">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <p>Logo sẽ xuất hiện ở đây</p>
                            </div>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div class="info-card">
                        <div class="info-icon">💡</div>
                        <div class="info-content">
                            <h4>Gợi ý tải lên Logo</h4>
                            <ul>
                                <li>Sử dụng hình ảnh vuông hoặc tròn</li>
                                <li>Nền trong suốt cho kết quả tốt nhất</li>
                                <li>Độ phân giải tối thiểu 200x200px</li>
                                <li>Tập trung vào chi tiết chính của logo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('brands.index') }}" class="btn btn-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Hủy
                </a>
                <button type="submit" class="btn btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Tạo thương hiệu
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    :root {
        --primary: #667eea;
        --primary-dark: #764ba2;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
    }

    [data-theme="dark"] {
        --gray-50: #0f172a;
        --gray-100: #0f172a;
        --gray-200: #1e293b;
        --gray-300: #334155;
        --gray-400: #64748b;
        --gray-500: #94a3b8;
        --gray-600: #cbd5e1;
        --gray-700: #e2e8f0;
        --gray-800: #f1f5f9;
        --gray-900: #ffffff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    .create-brand-page {
        max-width: 1300px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes pageLoad {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Header */
    .page-header {
        margin-bottom: 3rem;
        display: flex;
        align-items: center;
        gap: 2rem;
        animation: slideDown 0.6s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 44px;
        height: 44px;
        background-color: var(--gray-100);
        color: var(--gray-700);
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        flex-shrink: 0;
    }

    [data-theme="dark"] .back-btn {
        background-color: var(--gray-200);
        color: var(--gray-600);
    }

    .back-btn:hover {
        background-color: var(--gray-200);
        border-color: var(--primary);
        transform: translateX(-4px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    [data-theme="dark"] .back-btn:hover {
        background-color: var(--gray-300);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .header-text {
        flex: 1;
    }

    .header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
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

    .header-text h1 {
        font-size: 2.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -1px;
    }

    [data-theme="dark"] .header-text h1 {
        -webkit-text-fill-color: unset;
        color: #fff;
    }

    .header-text p {
        color: var(--gray-500);
        font-size: 1.0625rem;
        font-weight: 500;
        margin: 0;
    }

    [data-theme="dark"] .header-text p {
        color: var(--gray-400);
    }

    /* Form Wrapper */
    .form-wrapper {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        padding: 3rem;
        animation: formSlide 0.8s ease 0.2s both;
        border: 1px solid var(--gray-100);
    }

    [data-theme="dark"] .form-wrapper {
        background: var(--gray-100);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border-color: var(--gray-200);
    }

    @keyframes formSlide {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3.5rem;
        margin-bottom: 2.5rem;
    }

    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }
    }

    /* Form Section */
    .form-section {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--gray-100);
        margin-bottom: 0.5rem;
    }

    [data-theme="dark"] .section-title {
        border-bottom-color: var(--gray-200);
    }

    .section-title .icon {
        font-size: 1.75rem;
        display: flex;
        align-items: center;
    }

    .section-title h2 {
        font-size: 1.375rem;
        font-weight: 700;
        color: var(--gray-900);
        margin: 0;
    }

    [data-theme="dark"] .section-title h2 {
        color: var(--gray-900);
    }

    /* Form Group */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        animation: fadeInUp 0.6s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.15s; }
    .form-group:nth-child(3) { animation-delay: 0.2s; }
    .form-group:nth-child(4) { animation-delay: 0.25s; }
    .form-group:nth-child(5) { animation-delay: 0.3s; }

    /* Form Label */
    label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--gray-700);
        font-size: 0.95rem;
        cursor: pointer;
    }

    [data-theme="dark"] label {
        color: var(--gray-700);
    }

    .label-text {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .required {
        color: var(--danger);
        font-size: 1.2rem;
        line-height: 1;
    }

    /* Input Wrapper */
    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        color: var(--gray-400);
        pointer-events: none;
        transition: all 0.3s ease;
        width: 20px;
        height: 20px;
    }

    .input-wrapper:has(.form-input:focus) .input-icon {
        color: var(--primary);
        transform: scale(1.2);
    }

    /* Form Input */
    .form-input {
        width: 100%;
        padding: 0.95rem 1rem 0.95rem 2.75rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.875rem;
        font-size: 1rem;
        font-family: inherit;
        background-color: #fff;
        color: var(--gray-900);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-theme="dark"] .form-input {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
        color: var(--gray-900);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15), 0 8px 20px rgba(102, 126, 234, 0.2);
        transform: translateY(-2px);
    }

    .form-input::placeholder {
        color: var(--gray-400);
    }

    .form-input.error {
        border-color: var(--danger);
        background-color: rgba(239, 68, 68, 0.05);
    }

    [data-theme="dark"] .form-input.error {
        background-color: rgba(239, 68, 68, 0.1);
    }

    /* Textarea */
    .form-textarea {
        width: 100%;
        padding: 1rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.875rem;
        font-size: 1rem;
        font-family: inherit;
        resize: vertical;
        min-height: 120px;
        background-color: #fff;
        color: var(--gray-900);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .form-textarea {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
        color: var(--gray-900);
    }

    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15), 0 8px 20px rgba(102, 126, 234, 0.2);
    }

    .form-textarea.error {
        border-color: var(--danger);
        background-color: rgba(239, 68, 68, 0.05);
    }

    /* Character Count */
    .char-count {
        font-size: 0.8rem;
        color: var(--gray-500);
        text-align: right;
        font-weight: 500;
    }

    [data-theme="dark"] .char-count {
        color: var(--gray-400);
    }

    /* Field Hint */
    .field-hint {
        font-size: 0.8rem;
        color: var(--gray-500);
        margin-top: -0.25rem;
    }

    [data-theme="dark"] .field-hint {
        color: var(--gray-400);
    }

    /* Error Message */
    .error-message {
        font-size: 0.8rem;
        color: var(--danger);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        animation: shake 0.3s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Toggle Switch */
    .form-label {
        font-weight: 600;
        color: var(--gray-700);
    }

    [data-theme="dark"] .form-label {
        color: var(--gray-700);
    }

    .toggle-switch {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background-color: var(--gray-50);
        border-radius: 0.875rem;
        border: 2px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .toggle-switch {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
    }

    .toggle-input {
        display: none;
    }

    .toggle-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        cursor: pointer;
        margin: 0;
    }

    .toggle-slider {
        position: relative;
        width: 52px;
        height: 30px;
        background-color: var(--gray-300);
        border-radius: 15px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        flex-shrink: 0;
    }

    .toggle-slider::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 26px;
        height: 26px;
        background-color: #fff;
        border-radius: 50%;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .toggle-input:checked + .toggle-label .toggle-slider {
        background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
    }

    .toggle-input:checked + .toggle-label .toggle-slider::after {
        left: 24px;
    }

    .toggle-text {
        font-weight: 600;
        color: var(--gray-700);
    }

    [data-theme="dark"] .toggle-text {
        color: var(--gray-700);
    }

    /* Logo Upload Area */
    .logo-upload-area {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 3rem;
        border: 2px dashed var(--gray-300);
        border-radius: 1.25rem;
        background: linear-gradient(135deg, var(--gray-50) 0%, rgba(102, 126, 234, 0.05) 100%);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        min-height: 240px;
    }

    [data-theme="dark"] .logo-upload-area {
        background: linear-gradient(135deg, var(--gray-200) 0%, rgba(102, 126, 234, 0.1) 100%);
        border-color: var(--gray-300);
    }

    .logo-upload-area:hover {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(102, 126, 234, 0.1) 100%);
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
    }

    [data-theme="dark"] .logo-upload-area:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(102, 126, 234, 0.2) 100%);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
    }

    .logo-upload-area.dragover {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(102, 126, 234, 0.2) 100%);
        transform: scale(1.02);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.25);
    }

    .upload-icon {
        color: var(--primary);
        opacity: 0.8;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
    }

    .logo-upload-area h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--gray-900);
    }

    [data-theme="dark"] .logo-upload-area h3 {
        color: var(--gray-900);
    }

    .logo-upload-area p {
        margin: 0;
        color: var(--gray-600);
        font-size: 1rem;
    }

    [data-theme="dark"] .logo-upload-area p {
        color: var(--gray-500);
    }

    .upload-link {
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .upload-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .file-info {
        font-size: 0.8rem;
        color: var(--gray-500);
        font-weight: 500;
    }

    [data-theme="dark"] .file-info {
        color: var(--gray-400);
    }

    .file-input {
        display: none;
    }

    /* Logo Preview */
    .logo-preview {
        width: 100%;
        height: 240px;
        border: 2px solid var(--gray-200);
        border-radius: 1.25rem;
        background-color: var(--gray-50);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    [data-theme="dark"] .logo-preview {
        background-color: var(--gray-200);
        border-color: var(--gray-300);
    }

    .preview-empty {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        color: var(--gray-400);
        text-align: center;
    }

    .preview-empty svg {
        opacity: 0.5;
        animation: float 4s ease-in-out infinite;
    }

    .preview-empty p {
        margin: 0;
        font-size: 1rem;
        font-weight: 500;
    }

    .preview-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 1rem;
        animation: fadeInImage 0.4s ease;
    }

    @keyframes fadeInImage {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Info Card */
    .info-card {
        display: flex;
        gap: 1.5rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.05) 100%);
        border: 1.5px solid rgba(102, 126, 234, 0.2);
        border-radius: 1rem;
        animation: slideInRight 0.6s ease 0.3s both;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    [data-theme="dark"] .info-card {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .info-icon {
        font-size: 2rem;
        flex-shrink: 0;
        display: flex;
        align-items: center;
    }

    .info-content h4 {
        margin: 0 0 0.75rem 0;
        font-size: 1rem;
        font-weight: 700;
        color: var(--gray-900);
    }

    [data-theme="dark"] .info-content h4 {
        color: var(--gray-900);
    }

    .info-content ul {
        margin: 0;
        padding-left: 1.25rem;
        color: var(--gray-700);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    [data-theme="dark"] .info-content ul {
        color: var(--gray-600);
    }

    .info-content li {
        margin-bottom: 0.5rem;
    }

    .info-content li:last-child {
        margin-bottom: 0;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: flex-end;
        padding-top: 2.5rem;
        border-top: 2px solid var(--gray-100);
        animation: slideUp 0.6s ease 0.4s both;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    [data-theme="dark"] .form-actions {
        border-top-color: var(--gray-200);
    }

    /* Buttons */
    .btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 0.875rem;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        min-height: 48px;
    }

    .btn::before {
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

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: #fff;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
    }

    .btn-primary:active {
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: var(--gray-200);
        color: var(--gray-700);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    [data-theme="dark"] .btn-secondary {
        background-color: var(--gray-300);
        color: var(--gray-700);
    }

    .btn-secondary:hover {
        background-color: var(--gray-300);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    [data-theme="dark"] .btn-secondary:hover {
        background-color: var(--gray-400);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .create-brand-page {
            padding: 1rem;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .header-text h1 {
            font-size: 1.75rem;
        }

        .form-wrapper {
            padding: 1.5rem;
        }

        .form-grid {
            gap: 2rem;
        }

        .section-title {
            padding-bottom: 1rem;
        }

        .logo-upload-area {
            padding: 2rem;
            min-height: 200px;
        }

        .logo-preview {
            height: 200px;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            width: 100%;
        }

        .info-card {
            gap: 1rem;
        }
    }

    @media (max-width: 480px) {
        .create-brand-page {
            padding: 0.75rem;
        }

        .header-text h1 {
            font-size: 1.5rem;
        }

        .form-wrapper {
            padding: 1.25rem;
        }

        .form-input,
        .form-textarea {
            font-size: 16px;
        }

        .btn {
            padding: 0.875rem 1.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const descriptionInput = document.getElementById('description');
        const logoUploadArea = document.getElementById('logoUploadArea');
        const logoInput = document.getElementById('logo');
        const logoPreview = document.getElementById('logoPreview');
        const charCount = document.getElementById('charCount');

        // Auto-generate slug from name
        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                const slug = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                slugInput.value = slug;
            });
        }

        // Character counter
        if (descriptionInput && charCount) {
            descriptionInput.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                if (this.value.length > 500) {
                    this.value = this.value.substring(0, 500);
                    charCount.textContent = '500';
                }
            });
            charCount.textContent = descriptionInput.value.length;
        }

        // Logo upload - Drag and drop
        if (logoUploadArea && logoInput) {
            logoUploadArea.addEventListener('click', () => logoInput.click());

            ['dragover', 'dragenter'].forEach(eventName => {
                logoUploadArea.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    logoUploadArea.classList.add('dragover');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                logoUploadArea.addEventListener(eventName, () => {
                    logoUploadArea.classList.remove('dragover');
                });
            });

            logoUploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    logoInput.files = files;
                    handleLogoChange();
                }
            });

            logoInput.addEventListener('change', handleLogoChange);

            function handleLogoChange() {
                const file = logoInput.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        logoPreview.innerHTML = `<img src="${e.target.result}" alt="Logo preview" class="preview-image">`;
                    };
                    reader.readAsDataURL(file);
                } else if (file) {
                    alert('Vui lòng chọn một tệp hình ảnh hợp lệ');
                    logoInput.value = '';
                }
            }
        }

        // Form validation
        const form = document.querySelector('.create-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!nameInput.value.trim()) {
                    e.preventDefault();
                    alert('Vui lòng nhập tên thương hiệu');
                    nameInput.focus();
                    return false;
                }
            });
        }
    });
</script>

@endsection
