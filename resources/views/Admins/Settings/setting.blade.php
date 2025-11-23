@extends('Admins.app')
@section('title', 'Cài đặt hệ thống')
@section('content')

<div class="settings-management">
    <div class="page-header">
        <div class="header-left">
            <h1>Cài đặt hệ thống</h1>
            <p>Quản lý cấu hình và thiết lập website</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="saveAllSettings()">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                </svg>
                Lưu tất cả
            </button>
        </div>
    </div>

    <div class="settings-container">
        <!-- Sidebar Navigation -->
        <div class="settings-sidebar theme-element">
            <div class="sidebar-menu">
                <a href="#general" class="menu-item active" onclick="switchTab(event, 'general')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                    <span>Thông tin chung</span>
                </a>
                <a href="#system" class="menu-item" onclick="switchTab(event, 'system')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Cấu hình hệ thống</span>
                </a>
                <a href="#email" class="menu-item" onclick="switchTab(event, 'email')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Cấu hình Email</span>
                </a>
                <a href="#social" class="menu-item" onclick="switchTab(event, 'social')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Mạng xã hội</span>
                </a>
                <a href="#seo" class="menu-item" onclick="switchTab(event, 'seo')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>SEO & Analytics</span>
                </a>
                <a href="#payment" class="menu-item" onclick="switchTab(event, 'payment')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span>Thanh toán</span>
                </a>
                <a href="#security" class="menu-item" onclick="switchTab(event, 'security')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>Bảo mật</span>
                </a>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="settings-content theme-element">
            <!-- General Settings -->
            <div id="general" class="settings-section active">
                <div class="section-header">
                    <h2>Thông tin chung</h2>
                    <p>Cấu hình thông tin cơ bản của website</p>
                </div>

                <form class="settings-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Tên website</label>
                            <input type="text" class="form-control" value="FlashTech" placeholder="Nhập tên website">
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="text" class="form-control" value="Công nghệ cho tương lai" placeholder="Nhập slogan">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email liên hệ</label>
                            <input type="email" class="form-control" value="contact@flashtech.com" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="tel" class="form-control" value="0123456789" placeholder="0123456789">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea class="form-control" rows="2" placeholder="Nhập địa chỉ">123 Đường ABC, Quận 1, TP.HCM</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Logo (200x60px)</label>
                            <div class="upload-area">
                                <img src="https://via.placeholder.com/200x60/667eea/ffffff?text=Logo" alt="Logo" class="preview-image">
                                <input type="file" class="file-input" accept="image/*">
                                <button type="button" class="btn btn-outline">Chọn ảnh</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Favicon (32x32px)</label>
                            <div class="upload-area">
                                <img src="https://via.placeholder.com/32x32/764ba2/ffffff?text=F" alt="Favicon" class="preview-image small">
                                <input type="file" class="file-input" accept="image/*">
                                <button type="button" class="btn btn-outline">Chọn ảnh</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô tả website</label>
                        <textarea class="form-control" rows="4" placeholder="Nhập mô tả">FlashTech là nền tảng công nghệ hàng đầu, cung cấp các giải pháp hiện đại và tiên tiến.</textarea>
                    </div>
                </form>
            </div>

            <!-- System Settings -->
            <div id="system" class="settings-section">
                <div class="section-header">
                    <h2>Cấu hình hệ thống</h2>
                    <p>Thiết lập các tham số cơ bản của hệ thống</p>
                </div>

                <form class="settings-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Múi giờ</label>
                            <select class="form-control" onchange="updateTimezone(this.value)">
                                <option value="Asia/Ho_Chi_Minh" selected>Asia/Ho_Chi_Minh (GMT+7)</option>
                                <option value="Asia/Bangkok">Asia/Bangkok (GMT+7)</option>
                                <option value="Asia/Tokyo">Asia/Tokyo (GMT+9)</option>
                                <option value="UTC">UTC (GMT+0)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngôn ngữ mặc định</label>
                            <select class="form-control" onchange="changeLanguage(this.value)">
                                <option value="vi" selected>Tiếng Việt</option>
                                <option value="en">English</option>
                                <option value="ja">日本語</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Giao diện trang quản trị</label>
                        <div class="theme-selector">
                            <div class="theme-option" data-theme="gradient" onclick="changeColorTheme('gradient')">
                                <div class="theme-preview gradient-theme">
                                    <div class="preview-sidebar"></div>
                                    <div class="preview-content">
                                        <div class="preview-header"></div>
                                        <div class="preview-card"></div>
                                    </div>
                                </div>
                                <div class="theme-info">
                                    <h4>Gradient Purple</h4>
                                    <span class="theme-badge active">Đang dùng</span>
                                </div>
                            </div>

                            <div class="theme-option" data-theme="blue" onclick="changeColorTheme('blue')">
                                <div class="theme-preview blue-theme">
                                    <div class="preview-sidebar"></div>
                                    <div class="preview-content">
                                        <div class="preview-header"></div>
                                        <div class="preview-card"></div>
                                    </div>
                                </div>
                                <div class="theme-info">
                                    <h4>Ocean Blue</h4>
                                    <span class="theme-badge">Chọn</span>
                                </div>
                            </div>

                            <div class="theme-option" data-theme="green" onclick="changeColorTheme('green')">
                                <div class="theme-preview green-theme">
                                    <div class="preview-sidebar"></div>
                                    <div class="preview-content">
                                        <div class="preview-header"></div>
                                        <div class="preview-card"></div>
                                    </div>
                                </div>
                                <div class="theme-info">
                                    <h4>Forest Green</h4>
                                    <span class="theme-badge">Chọn</span>
                                </div>
                            </div>

                            <div class="theme-option" data-theme="orange" onclick="changeColorTheme('orange')">
                                <div class="theme-preview orange-theme">
                                    <div class="preview-sidebar"></div>
                                    <div class="preview-content">
                                        <div class="preview-header"></div>
                                        <div class="preview-card"></div>
                                    </div>
                                </div>
                                <div class="theme-info">
                                    <h4>Sunset Orange</h4>
                                    <span class="theme-badge">Chọn</span>
                                </div>
                            </div>

                            <div class="theme-option" data-theme="pink" onclick="changeColorTheme('pink')">
                                <div class="theme-preview pink-theme">
                                    <div class="preview-sidebar"></div>
                                    <div class="preview-content">
                                        <div class="preview-header"></div>
                                        <div class="preview-card"></div>
                                    </div>
                                </div>
                                <div class="theme-info">
                                    <h4>Pink Rose</h4>
                                    <span class="theme-badge">Chọn</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Chế độ hiển thị</label>
                        <div class="mode-selector">
                            <div class="mode-option" data-mode="light" onclick="changeDisplayMode('light')">
                                <div class="mode-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <div class="mode-info">
                                    <h4>Light Mode</h4>
                                    <p>Giao diện sáng</p>
                                </div>
                            </div>

                            <div class="mode-option active" data-mode="dark" onclick="changeDisplayMode('dark')">
                                <div class="mode-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                    </svg>
                                </div>
                                <div class="mode-info">
                                    <h4>Dark Mode</h4>
                                    <p>Giao diện tối</p>
                                </div>
                            </div>

                            <div class="mode-option" data-mode="system" onclick="changeDisplayMode('system')">
                                <div class="mode-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="mode-info">
                                    <h4>Use System</h4>
                                    <p>Theo hệ thống</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Định dạng ngày tháng</label>
                            <select class="form-control">
                                <option value="d/m/Y" selected>DD/MM/YYYY</option>
                                <option value="m/d/Y">MM/DD/YYYY</option>
                                <option value="Y-m-d">YYYY-MM-DD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Định dạng tiền tệ</label>
                            <select class="form-control">
                                <option value="VND" selected>VND (₫)</option>
                                <option value="USD">USD ($)</option>
                                <option value="EUR">EUR (€)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Số bản ghi mỗi trang</label>
                        <input type="number" class="form-control" value="10" min="5" max="100">
                    </div>

                    <div class="form-group">
                        <div class="switch-group">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                            <div class="switch-info">
                                <h4>Chế độ bảo trì</h4>
                                <p>Kích hoạt để tạm khóa website, chỉ admin có thể truy cập</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="switch-group">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                            <div class="switch-info">
                                <h4>Cho phép đăng ký</h4>
                                <p>Cho phép người dùng mới đăng ký tài khoản</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Email Settings -->
            <div id="email" class="settings-section">
                <div class="section-header">
                    <h2>Cấu hình Email</h2>
                    <p>Thiết lập SMTP để gửi email tự động</p>
                </div>

                <form class="settings-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>SMTP Host</label>
                            <input type="text" class="form-control" placeholder="smtp.gmail.com">
                        </div>
                        <div class="form-group">
                            <label>SMTP Port</label>
                            <input type="number" class="form-control" placeholder="587">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email gửi đi</label>
                            <input type="email" class="form-control" placeholder="noreply@flashtech.com">
                        </div>
                        <div class="form-group">
                            <label>Tên người gửi</label>
                            <input type="text" class="form-control" placeholder="FlashTech">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="username@gmail.com">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="••••••••">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mã hóa</label>
                        <select class="form-control">
                            <option value="tls" selected>TLS</option>
                            <option value="ssl">SSL</option>
                            <option value="none">None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-outline">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Gửi email test
                        </button>
                    </div>
                </form>
            </div>

            <!-- Social Media -->
            <div id="social" class="settings-section">
                <div class="section-header">
                    <h2>Mạng xã hội</h2>
                    <p>Liên kết các trang mạng xã hội của bạn</p>
                </div>

                <form class="settings-form">
                    <div class="form-group">
                        <label>
                            <svg class="social-icon facebook" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </label>
                        <input type="url" class="form-control" placeholder="https://facebook.com/flashtech">
                    </div>

                    <div class="form-group">
                        <label>
                            <svg class="social-icon instagram" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            Instagram
                        </label>
                        <input type="url" class="form-control" placeholder="https://instagram.com/flashtech">
                    </div>

                    <div class="form-group">
                        <label>
                            <svg class="social-icon twitter" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter / X
                        </label>
                        <input type="url" class="form-control" placeholder="https://twitter.com/flashtech">
                    </div>

                    <div class="form-group">
                        <label>
                            <svg class="social-icon youtube" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            YouTube
                        </label>
                        <input type="url" class="form-control" placeholder="https://youtube.com/@flashtech">
                    </div>

                    <div class="form-group">
                        <label>
                            <svg class="social-icon linkedin" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            LinkedIn
                        </label>
                        <input type="url" class="form-control" placeholder="https://linkedin.com/company/flashtech">
                    </div>
                </form>
            </div>

            <!-- SEO Settings -->
            <div id="seo" class="settings-section">
                <div class="section-header">
                    <h2>SEO & Analytics</h2>
                    <p>Cấu hình SEO và công cụ phân tích</p>
                </div>

                <form class="settings-form">
                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" placeholder="FlashTech - Công nghệ cho tương lai">
                        <small>Độ dài khuyến nghị: 50-60 ký tự</small>
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" rows="3" placeholder="Mô tả ngắn gọn về website..."></textarea>
                        <small>Độ dài khuyến nghị: 150-160 ký tự</small>
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="form-control" placeholder="công nghệ, tech, flashtech">
                        <small>Phân cách bằng dấu phẩy</small>
                    </div>

                    <div class="form-group">
                        <label>Google Analytics ID</label>
                        <input type="text" class="form-control" placeholder="G-XXXXXXXXXX">
                    </div>

                    <div class="form-group">
                        <label>Google Search Console Verification</label>
                        <input type="text" class="form-control" placeholder="Meta tag verification code">
                    </div>

                    <div class="form-group">
                        <label>Facebook Pixel ID</label>
                        <input type="text" class="form-control" placeholder="Facebook Pixel ID">
                    </div>

                    <div class="form-group">
                        <label>Google Tag Manager ID</label>
                        <input type="text" class="form-control" placeholder="GTM-XXXXXXX">
                    </div>
                </form>
            </div>

            <!-- Payment Settings -->
            <div id="payment" class="settings-section">
                <div class="section-header">
                    <h2>Cấu hình thanh toán</h2>
                    <p>Thiết lập các cổng thanh toán</p>
                </div>

                <form class="settings-form">
                    <div class="payment-gateway">
                        <div class="gateway-header">
                            <div class="gateway-info">
                                <img src="https://via.placeholder.com/120x40/0066cc/ffffff?text=VNPay" alt="VNPay">
                                <h3>VNPay</h3>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="gateway-content">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>TMN Code</label>
                                    <input type="text" class="form-control" placeholder="TMN Code">
                                </div>
                                <div class="form-group">
                                    <label>Hash Secret</label>
                                    <input type="text" class="form-control" placeholder="Hash Secret">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="url" class="form-control" placeholder="https://sandbox.vnpayment.vn">
                            </div>
                        </div>
                    </div>

                    <div class="payment-gateway">
                        <div class="gateway-header">
                            <div class="gateway-info">
                                <img src="https://via.placeholder.com/120x40/d82d8b/ffffff?text=MoMo" alt="MoMo">
                                <h3>MoMo</h3>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="gateway-content">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Partner Code</label>
                                    <input type="text" class="form-control" placeholder="Partner Code">
                                </div>
                                <div class="form-group">
                                    <label>Access Key</label>
                                    <input type="text" class="form-control" placeholder="Access Key">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Secret Key</label>
                                <input type="text" class="form-control" placeholder="Secret Key">
                            </div>
                        </div>
                    </div>

                    <div class="payment-gateway">
                        <div class="gateway-header">
                            <div class="gateway-info">
                                <img src="https://via.placeholder.com/120x40/003087/ffffff?text=PayPal" alt="PayPal">
                                <h3>PayPal</h3>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="gateway-content">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Client ID</label>
                                    <input type="text" class="form-control" placeholder="Client ID">
                                </div>
                                <div class="form-group">
                                    <label>Secret Key</label>
                                    <input type="text" class="form-control" placeholder="Secret Key">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mode</label>
                                <select class="form-control">
                                    <option value="sandbox">Sandbox (Test)</option>
                                    <option value="live">Live (Production)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="switch-group">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                            <div class="switch-info">
                                <h4>Thanh toán khi nhận hàng (COD)</h4>
                                <p>Cho phép khách hàng thanh toán bằng tiền mặt</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Security Settings -->
            <div id="security" class="settings-section">
                <div class="section-header">
                    <h2>Cài đặt bảo mật</h2>
                    <p>Tăng cường bảo mật cho hệ thống</p>
                </div>

                <form class="settings-form">
                    <div class="security-card">
                        <div class="security-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </div>
                        <div class="security-content">
                            <h3>Đổi mật khẩu</h3>
                            <p>Cập nhật mật khẩu của bạn thường xuyên</p>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary">Cập nhật mật khẩu</button>
                        </div>
                    </div>

                    <div class="security-card">
                        <div class="security-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="security-content">
                            <h3>Xác thực hai yếu tố (2FA)</h3>
                            <p>Tăng cường bảo mật với xác thực hai bước</p>
                            <div class="switch-group">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                                <div class="switch-info">
                                    <h4>Bật xác thực 2FA</h4>
                                    <p>Yêu cầu mã xác thực từ điện thoại khi đăng nhập</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="security-card">
                        <div class="security-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div class="security-content">
                            <h3>Phiên đăng nhập</h3>
                            <p>Quản lý thời gian phiên làm việc</p>
                            <div class="form-group">
                                <label>Thời gian hết phiên (phút)</label>
                                <input type="number" class="form-control" value="120" min="15" max="1440">
                                <small>Từ 15 phút đến 24 giờ</small>
                            </div>
                            <div class="switch-group">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                                <div class="switch-info">
                                    <h4>Ghi nhớ đăng nhập</h4>
                                    <p>Cho phép người dùng chọn "Ghi nhớ đăng nhập"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="security-card">
                        <div class="security-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="security-content">
                            <h3>IP Whitelist</h3>
                            <p>Chỉ cho phép truy cập từ các IP được phê duyệt</p>
                            <div class="form-group">
                                <label>Danh sách IP cho phép</label>
                                <textarea class="form-control" rows="4" placeholder="192.168.1.1&#10;10.0.0.1"></textarea>
                                <small>Mỗi IP trên một dòng</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .settings-management {
        max-width: 1800px;
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
        border: 2px solid #e2e8f0;
    }

    .btn-outline:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .settings-container {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 2rem;
    }

    .settings-sidebar {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        height: fit-content;
        position: sticky;
        top: 2rem;
    }

    .sidebar-menu {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1rem;
        border-radius: 10px;
        color: #64748b;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.925rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .menu-item svg {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .menu-item:hover {
        background: #f8fafc;
        color: #667eea;
    }

    .menu-item.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .settings-content {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        min-height: 600px;
    }

    .settings-section {
        display: none;
        padding: 2rem;
        animation: slideIn 0.4s ease;
    }

    .settings-section.active {
        display: block;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .section-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .section-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 0.5rem 0;
    }

    .section-header p {
        color: #64748b;
        margin: 0;
        font-size: 0.95rem;
    }

    .settings-form {
        max-width: 1000px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #334155;
        font-size: 0.925rem;
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .form-group small {
        display: block;
        margin-top: 0.5rem;
        color: #94a3b8;
        font-size: 0.825rem;
    }

    .upload-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        border: 2px dashed #e2e8f0;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .upload-area:hover {
        border-color: #667eea;
        background: #f8fafc;
    }

    .preview-image {
        max-width: 200px;
        height: auto;
        border-radius: 8px;
    }

    .preview-image.small {
        max-width: 60px;
    }

    .file-input {
        display: none;
    }

    .switch-group {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 28px;
        flex-shrink: 0;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #cbd5e1;
        transition: 0.4s;
        border-radius: 28px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    input:checked + .slider:before {
        transform: translateX(24px);
    }

    .switch-info h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 0.25rem 0;
    }

    .switch-info p {
        font-size: 0.875rem;
        color: #64748b;
        margin: 0;
    }

    .social-icon {
        width: 20px;
        height: 20px;
        margin-right: 0.5rem;
    }

    .social-icon.facebook { color: #1877f2; }
    .social-icon.instagram { color: #e4405f; }
    .social-icon.twitter { color: #1da1f2; }
    .social-icon.youtube { color: #ff0000; }
    .social-icon.linkedin { color: #0077b5; }

    /* Theme Selector Styles */
    .theme-selector {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .theme-option {
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid transparent;
    }

    .theme-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .theme-option.selected {
        border-color: #667eea;
    }

    .theme-preview {
        height: 150px;
        display: flex;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .preview-sidebar {
        width: 30%;
        background: rgba(0, 0, 0, 0.1);
    }

    .preview-content {
        flex: 1;
        padding: 0.75rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .preview-header {
        height: 15px;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.8);
    }

    .preview-card {
        flex: 1;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.9);
    }

    /* Theme Variants */
    .gradient-theme {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .blue-theme {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .green-theme {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .orange-theme {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .pink-theme {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .dark-theme {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    }

    .theme-info {
        padding: 1rem;
        text-align: center;
        background: #ffffff;
        border-top: 2px solid #e2e8f0;
    }

    .theme-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 0.5rem 0;
    }

    .theme-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        background: #e2e8f0;
        color: #64748b;
        transition: all 0.3s ease;
    }

    .theme-badge.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
    }

    .theme-option:hover .theme-badge:not(.active) {
        background: #cbd5e1;
        color: #334155;
    }

    /* Mode Selector Styles */
    .mode-selector {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-top: 1rem;
    }

    .mode-option {
        cursor: pointer;
        padding: 1.5rem;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        background: #ffffff;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
    }

    .mode-option:hover {
        border-color: #cbd5e1;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .mode-option.active {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .mode-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .mode-option.active .mode-icon {
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
        }
    }

    .mode-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .mode-info h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0 0 0.25rem 0;
    }

    .mode-info p {
        font-size: 0.85rem;
        color: #64748b;
        margin: 0;
    }

    .mode-option.active .mode-info h4 {
        color: #667eea;
    }

    .payment-gateway {
        margin-bottom: 2rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
    }

    .gateway-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        background: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
    }

    .gateway-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .gateway-info img {
        height: 30px;
    }

    .gateway-info h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .gateway-content {
        padding: 1.5rem;
    }

    .security-card {
        display: flex;
        gap: 1.5rem;
        padding: 2rem;
        background: #f8fafc;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        margin-bottom: 2rem;
    }

    .security-icon {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .security-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .security-content {
        flex: 1;
    }

    .security-content h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 0.5rem 0;
    }

    .security-content > p {
        color: #64748b;
        margin: 0 0 1.5rem 0;
        font-size: 0.925rem;
    }

    @media (max-width: 1024px) {
        .settings-container {
            grid-template-columns: 1fr;
        }

        .settings-sidebar {
            position: static;
        }

        .sidebar-menu {
            flex-direction: row;
            overflow-x: auto;
        }

        .menu-item span {
            display: none;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    function switchTab(event, tabId) {
        event.preventDefault();

        // Remove active class from all menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.classList.remove('active');
        });

        // Add active class to clicked menu item
        event.currentTarget.classList.add('active');

        // Hide all sections
        document.querySelectorAll('.settings-section').forEach(section => {
            section.classList.remove('active');
        });

        // Show selected section
        document.getElementById(tabId).classList.add('active');

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function saveAllSettings() {
        // Show loading state
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<svg class="spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Đang lưu...';
        btn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            alert('Đã lưu cài đặt thành công!');
        }, 1500);
    }

    // File upload preview
    document.querySelectorAll('.upload-area').forEach(area => {
        const input = area.querySelector('.file-input');
        const button = area.querySelector('.btn');
        const preview = area.querySelector('.preview-image');

        button.addEventListener('click', () => {
            input.click();
        });

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Change language instantly
    function changeLanguage(lang) {
        // Show loading indicator
        const selectElement = event.target;
        const originalValue = selectElement.value;

        // Create loading overlay
        const loadingOverlay = document.createElement('div');
        loadingOverlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        `;
        loadingOverlay.innerHTML = `
            <div style="background: white; padding: 2rem; border-radius: 12px; text-align: center;">
                <svg class="spin" width="50" height="50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p style="margin-top: 1rem; font-weight: 600;">Đang thay đổi ngôn ngữ...</p>
            </div>
        `;
        document.body.appendChild(loadingOverlay);

        // Save to localStorage
        localStorage.setItem('app_language', lang);

        // Simulate API call to save preference
        fetch('/api/settings/language', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ language: lang })
        })
        .then(response => response.json())
        .then(data => {
            // Reload page to apply language change
            setTimeout(() => {
                window.location.reload();
            }, 500);
        })
        .catch(error => {
            console.error('Error:', error);
            document.body.removeChild(loadingOverlay);
            alert('Có lỗi xảy ra khi thay đổi ngôn ngữ');
            selectElement.value = originalValue;
        });
    }

    // Update timezone instantly
    function updateTimezone(timezone) {
        const selectElement = event.target;

        // Save to localStorage
        localStorage.setItem('app_timezone', timezone);

        // Show notification
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span style="font-weight: 600;">Đã cập nhật múi giờ: ${timezone}</span>
            </div>
        `;
        document.body.appendChild(notification);

        // Save to backend
        fetch('/api/settings/timezone', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ timezone: timezone })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Timezone updated successfully');
        })
        .catch(error => {
            console.error('Error:', error);
        });

        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Change color theme
    function changeColorTheme(theme) {
        // Update all theme options
        document.querySelectorAll('.theme-option').forEach(option => {
            option.classList.remove('selected');
            const badge = option.querySelector('.theme-badge');
            badge.classList.remove('active');
            badge.textContent = 'Chọn';
        });

        // Mark selected theme
        const selectedOption = document.querySelector(`.theme-option[data-theme="${theme}"]`);
        if (selectedOption) {
            selectedOption.classList.add('selected');
            const badge = selectedOption.querySelector('.theme-badge');
            badge.classList.add('active');
            badge.textContent = 'Đang dùng';
        }

        // Save to localStorage
        localStorage.setItem('admin_color_theme', theme);

        // Apply theme colors
        applyColorTheme(theme);

        // Show notification
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span style="font-weight: 600;">Đã thay đổi giao diện thành công!</span>
            </div>
        `;
        document.body.appendChild(notification);

        // Save to backend
        fetch('/api/settings/theme', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ theme: theme })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Theme updated successfully');
        })
        .catch(error => {
            console.error('Error:', error);
        });

        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Change display mode (light/dark/system)
    function changeDisplayMode(mode) {
        // Update all mode options
        document.querySelectorAll('.mode-option').forEach(option => {
            option.classList.remove('active');
        });

        // Mark selected mode
        const selectedOption = document.querySelector(`.mode-option[data-mode="${mode}"]`);
        if (selectedOption) {
            selectedOption.classList.add('active');
        }

        // Save to localStorage
        localStorage.setItem('display_mode', mode);

        // Apply mode
        applyDisplayMode(mode);

        // Show notification
        const modeNames = {
            light: 'Light Mode',
            dark: 'Dark Mode',
            system: 'Use System'
        };

        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span style="font-weight: 600;">Đã chuyển sang ${modeNames[mode]}!</span>
            </div>
        `;
        document.body.appendChild(notification);

        // Save to backend
        fetch('/api/settings/display-mode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ mode: mode })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Display mode updated successfully');
        })
        .catch(error => {
            console.error('Error:', error);
        });

        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Apply display mode
    function applyDisplayMode(mode) {
        const html = document.documentElement;

        if (mode === 'system') {
            // Check system preference
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            html.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
        } else {
            html.setAttribute('data-theme', mode);
        }

        const isDark = html.getAttribute('data-theme') === 'dark';

        // Apply to body and main containers
        document.body.style.background = isDark ? '#0f1419' : '#f1f5f9';

        const mainContent = document.querySelector('.main-content');
        if (mainContent) {
            mainContent.style.background = isDark ? '#0f1419' : '#f1f5f9';
        }

        // Apply to settings elements
        document.querySelectorAll('.theme-element').forEach(el => {
            el.style.background = isDark ? '#1a1f2e' : '#ffffff';
            el.style.color = isDark ? '#e2e8f0' : '#1e293b';
        });

        // Headers and titles
        document.querySelectorAll('.page-header h1, .section-header h2, .theme-info h4, .mode-info h4, .security-content h3, .gateway-info h3').forEach(el => {
            el.style.color = isDark ? '#f1f5f9' : '#1e293b';
        });

        // Paragraphs and descriptions
        document.querySelectorAll('.page-header p, .section-header p, .mode-info p, .security-content > p, .switch-info p').forEach(el => {
            el.style.color = isDark ? '#94a3b8' : '#64748b';
        });

        // Form controls
        document.querySelectorAll('.form-control, .upload-area, .switch-group').forEach(el => {
            el.style.background = isDark ? '#0f1419' : '#ffffff';
            el.style.borderColor = isDark ? '#2d3748' : '#e2e8f0';
            el.style.color = isDark ? '#e2e8f0' : '#1e293b';
        });

        // Mode options
        document.querySelectorAll('.mode-option').forEach(el => {
            if (!el.classList.contains('active')) {
                el.style.background = isDark ? '#0f1419' : '#ffffff';
                el.style.borderColor = isDark ? '#2d3748' : '#e2e8f0';
            }
        });

        // Theme info sections
        document.querySelectorAll('.theme-info').forEach(el => {
            el.style.background = isDark ? '#0f1419' : '#ffffff';
            el.style.borderTopColor = isDark ? '#2d3748' : '#e2e8f0';
        });

        // Payment gateways
        document.querySelectorAll('.payment-gateway').forEach(el => {
            el.style.borderColor = isDark ? '#2d3748' : '#e2e8f0';
        });

        document.querySelectorAll('.gateway-header, .gateway-content').forEach(el => {
            el.style.background = isDark ? '#1a1f2e' : '#f8fafc';
            if (el.classList.contains('gateway-header')) {
                el.style.borderBottomColor = isDark ? '#2d3748' : '#e2e8f0';
            }
        });

        // Security cards
        document.querySelectorAll('.security-card').forEach(el => {
            el.style.background = isDark ? '#0f1419' : '#f8fafc';
            el.style.borderColor = isDark ? '#2d3748' : '#e2e8f0';
        });

        // Section headers
        document.querySelectorAll('.section-header').forEach(el => {
            el.style.borderBottomColor = isDark ? '#2d3748' : '#e2e8f0';
        });

        // Page header
        const pageHeader = document.querySelector('.page-header');
        if (pageHeader) {
            pageHeader.style.borderBottomColor = 'transparent';
        }

        // Labels
        document.querySelectorAll('.form-group label, .switch-info h4').forEach(el => {
            el.style.color = isDark ? '#e2e8f0' : '#334155';
        });

        // Small text
        document.querySelectorAll('.form-group small').forEach(el => {
            el.style.color = isDark ? '#94a3b8' : '#94a3b8';
        });

        // Menu items (not active)
        document.querySelectorAll('.menu-item:not(.active)').forEach(el => {
            el.style.color = isDark ? '#94a3b8' : '#64748b';
        });
    }    // Apply color theme
    function applyColorTheme(theme) {
        const root = document.documentElement;

        const themes = {
            gradient: {
                primary: '#667eea',
                secondary: '#764ba2',
                gradient: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)'
            },
            blue: {
                primary: '#4facfe',
                secondary: '#00f2fe',
                gradient: 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)'
            },
            green: {
                primary: '#43e97b',
                secondary: '#38f9d7',
                gradient: 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)'
            },
            orange: {
                primary: '#fa709a',
                secondary: '#fee140',
                gradient: 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)'
            },
            pink: {
                primary: '#f093fb',
                secondary: '#f5576c',
                gradient: 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)'
            },
            dark: {
                primary: '#2c3e50',
                secondary: '#34495e',
                gradient: 'linear-gradient(135deg, #2c3e50 0%, #34495e 100%)'
            }
        };

        const selectedTheme = themes[theme];

        // Update CSS custom properties
        root.style.setProperty('--primary-color', selectedTheme.primary);
        root.style.setProperty('--secondary-color', selectedTheme.secondary);
        root.style.setProperty('--gradient', selectedTheme.gradient);

        // Update gradients in the page
        document.querySelectorAll('.btn-primary, .menu-item.active, .header-left h1').forEach(el => {
            if (el.classList.contains('btn-primary') || el.classList.contains('active')) {
                el.style.background = selectedTheme.gradient;
            }
        });

        // Update text gradients
        document.querySelectorAll('.header-left h1').forEach(el => {
            el.style.background = selectedTheme.gradient;
            el.style.webkitBackgroundClip = 'text';
            el.style.webkitTextFillColor = 'transparent';
            el.style.backgroundClip = 'text';
        });
    }

    // Listen for system theme changes
    if (window.matchMedia) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            const mode = localStorage.getItem('display_mode');
            if (mode === 'system') {
                applyDisplayMode('system');
            }
        });
    }

    // Load saved preferences on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedLanguage = localStorage.getItem('app_language');
        const savedTimezone = localStorage.getItem('app_timezone');
        const savedColorTheme = localStorage.getItem('admin_color_theme') || 'gradient';
        const savedDisplayMode = localStorage.getItem('display_mode') || 'dark';

        if (savedLanguage) {
            const languageSelect = document.querySelector('select[onchange*="changeLanguage"]');
            if (languageSelect) languageSelect.value = savedLanguage;
        }

        if (savedTimezone) {
            const timezoneSelect = document.querySelector('select[onchange*="updateTimezone"]');
            if (timezoneSelect) timezoneSelect.value = savedTimezone;
        }

        // Apply saved color theme
        applyColorTheme(savedColorTheme);

        // Update color theme UI
        document.querySelectorAll('.theme-option').forEach(option => {
            const theme = option.getAttribute('data-theme');
            const badge = option.querySelector('.theme-badge');

            if (theme === savedColorTheme) {
                option.classList.add('selected');
                badge.classList.add('active');
                badge.textContent = 'Đang dùng';
            } else {
                option.classList.remove('selected');
                badge.classList.remove('active');
                badge.textContent = 'Chọn';
            }
        });

        // Apply saved display mode
        applyDisplayMode(savedDisplayMode);

        // Update display mode UI
        document.querySelectorAll('.mode-option').forEach(option => {
            const mode = option.getAttribute('data-mode');
            if (mode === savedDisplayMode) {
                option.classList.add('active');
            } else {
                option.classList.remove('active');
            }
        });
    });
</script><style>
    .spin {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }
</style>

@endsection
