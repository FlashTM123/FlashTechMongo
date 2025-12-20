<header class="main-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-left">
                    <a href="tel:1900-xxxx" class="top-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                        <span>Hotline: <strong>1900-xxxx</strong></span>
                    </a>
                    <span class="divider">|</span>
                    <a href="#" class="top-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Hệ thống cửa hàng</span>
                    </a>
                    <span class="divider">|</span>
                    <a href="#" class="top-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        </svg>
                        <span>Tra cứu đơn hàng</span>
                    </a>
                </div>
                <div class="top-right">
                    @if (auth('customer')->check())
                        <div class="user-dropdown">
                            <button class="top-link user-link" id="userDropdownBtn">
                                <div class="user-avatar">
                                    @php
                                        $avatar = auth('customer')->user()->profile_picture;
                                    @endphp
                                    @if ($avatar)
                                        @if (Str::startsWith($avatar, 'http'))
                                            <img src="{{ $avatar }}" alt="{{ auth('customer')->user()->full_name }}">
                                        @else
                                            <img src="{{ asset('storage/' . $avatar) }}" alt="{{ auth('customer')->user()->full_name }}">
                                        @endif
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('customer')->user()->full_name) }}&background=667eea&color=fff&size=64" alt="{{ auth('customer')->user()->full_name }}">
                                    @endif
                                </div>
                                <span class="user-info">
                                    <span class="user-name">{{ auth('customer')->user()->full_name }}</span>
                                </span>
                                <svg class="dropdown-arrow" width="12" height="12" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="user-dropdown-menu" id="userDropdownMenu">
                                <div class="dropdown-header">
                                    <div class="dropdown-avatar">
                                        @if (auth('customer')->user()->profile_picture)
                                            @if (str_starts_with(auth('customer')->user()->profile_picture, 'http'))
                                                <img src="{{ auth('customer')->user()->profile_picture }}"
                                                    alt="{{ auth('customer')->user()->full_name }}">
                                            @else
                                                <img src="{{ asset('storage/' . auth('customer')->user()->profile_picture) }}"
                                                    alt="{{ auth('customer')->user()->full_name }}">
                                            @endif
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('customer')->user()->full_name) }}&background=667eea&color=fff&size=128"
                                                alt="{{ auth('customer')->user()->full_name }}">
                                        @endif
                                    </div>
                                    <div class="dropdown-user-info">
                                        <div class="dropdown-user-name">{{ auth('customer')->user()->full_name }}</div>
                                        <div class="dropdown-user-email">{{ auth('customer')->user()->email }}</div>
                                        <div class="dropdown-user-points">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            <span>{{ auth('customer')->user()->loyalty_points ?? 0 }} điểm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('customers.profile.detail') }}" class="dropdown-link">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Tài khoản của tôi</span>
                                </a>
                                <a href="#" class="dropdown-link">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                                        </rect>
                                    </svg>
                                    <span>Đơn hàng của tôi</span>
                                </a>
                                <a href="#" class="dropdown-link">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg>
                                    <span>Sản phẩm yêu thích</span>
                                </a>
                                <a href="#" class="dropdown-link">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M12 1v6m0 6v6m5.2-13.2l-4.2 4.2m-2.8 2.8l-4.2 4.2M23 12h-6m-6 0H5m13.2 5.2l-4.2-4.2m-2.8-2.8l-4.2-4.2">
                                        </path>
                                    </svg>
                                    <span>Cài đặt</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('customers.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-link logout-link">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span>Đăng xuất</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('customers.login') }}" class="top-link login-link">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                            <span>Đăng nhập</span>
                        </a>
                        <span class="divider">|</span>
                        <a href="{{ route('customers.register') }}" class="top-link register-link">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <polyline points="17 11 19 13 23 9"></polyline>
                            </svg>
                            <span>Đăng ký</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-nav">
        <div class="container">
            <div class="nav-content">
                <!-- Logo -->
                <a href="#" class="logo">
                    <div class="logo-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <span class="brand-name">FlashTech</span>
                        <span class="brand-tagline">Technology Store</span>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="search-container">
                    <form action="#" method="GET" class="search-form">
                        <button type="submit" class="search-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </button>
                        <input type="text" name="q" placeholder="Tìm kiếm sản phẩm, thương hiệu..."
                            class="search-input" value="{{ request('q') }}">
                        <div class="search-category">
                            <select name="category" class="category-select">
                                <option value="">Tất cả</option>
                                <option value="Smartphone">Smartphone</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Accessory">Phụ kiện</option>
                            </select>
                        </div>
                    </form>

                    <!-- Search Suggestions (Hidden by default) -->
                    <div class="search-suggestions" style="display: none;">
                        <div class="suggestion-header">Tìm kiếm phổ biến</div>
                        <a href="#" class="suggestion-item">iPhone 15 Pro Max</a>
                        <a href="#" class="suggestion-item">MacBook Air M2</a>
                        <a href="#" class="suggestion-item">Samsung Galaxy S24</a>
                        <a href="#" class="suggestion-item">AirPods Pro</a>
                    </div>
                </div>

                <!-- Nav Actions -->
                <div class="nav-actions">
                    <!-- Wishlist -->
                    <a href="#" class="nav-action" title="Yêu thích">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                        <span class="action-label">Yêu thích</span>
                        <span class="badge">3</span>
                    </a>

                    <!-- Cart -->
                    <a href="#" class="nav-action cart-action" title="Giỏ hàng">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="action-label">Giỏ hàng</span>
                        <span class="badge cart-count">5</span>
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="main-menu">
        <div class="container">
            <ul class="menu-list" id="mobileMenu">
                <li class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link active">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="menu-item has-dropdown">
                    <a href="#" class="menu-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <span>Danh mục</span>
                        <svg class="dropdown-icon" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('products.category', 'smartphone') }}" class="dropdown-item">📱
                            Smartphone</a>
                        <a href="{{ route('products.category', 'laptop') }}" class="dropdown-item">💻 Laptop</a>
                        <a href="{{ route('products.category', 'tablet') }}" class="dropdown-item">📲 Tablet</a>
                        <a href="{{ route('products.category', 'computer') }}" class="dropdown-item">🖥️ Computer</a>
                        <a href="{{ route('products.category', 'accessory') }}" class="dropdown-item">🎧 Phụ kiện</a>
                        <a href="{{ route('products.category', 'component') }}" class="dropdown-item">🛠️ Linh
                            kiện</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        <span>Sản phẩm</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link deals-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                            </path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                        <span>Khuyến mãi</span>
                        <span class="hot-badge">HOT</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <span>Về chúng tôi</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span>Liên hệ</span>
                    </a>
                </li>
                @if (auth('customer')->check())
                    <li class="menu-item only-mobile">
                        <a href="{{ route('customers.profile.detail') }}" class="menu-link">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
                            </svg>
                            <span>Tài khoản của tôi</span>
                        </a>
                    </li>
                    <li class="menu-item only-mobile">
                        <form action="{{ route('customers.logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="menu-link" style="background:none;border:none;padding:0;display:flex;align-items:center;width:100%;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12">
                                    </line>
                                </svg>
                                <span>Đăng xuất</span>
                            </button>
                        </form>
                    </li>
                @else
                    <li class="menu-item only-mobile">
                        <a href="{{ route('customers.login') }}" class="menu-link">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                            <span>Đăng nhập</span>
                        </a>
                    </li>
                    <li class="menu-item only-mobile">
                        <a href="{{ route('customers.register') }}" class="menu-link">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <polyline points="17 11 19 13 23 9"></polyline>
                            </svg>
                            <span>Đăng ký</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #667eea;
        --primary-dark: #5568d3;
        --secondary: #764ba2;
        --accent: #f093fb;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --dark: #1e293b;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --white: #ffffff;
        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: var(--dark);
        background: var(--gray-50);
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Main Header - Sticky */
    .main-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: var(--white);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .main-header.scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    /* Top Bar */
    .top-bar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        color: var(--white);
        padding: 0.75rem 0;
        font-size: 0.875rem;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        position: relative;
        overflow: visible;
        z-index: 1100;
    }

    /* Top Bar - Hidden when scrolled (optional) */
    .main-header.scrolled .top-bar {
        display: none;
    }

    .top-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    .top-bar-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 1;
        overflow: visible;
    }

    .top-left,
    .top-right {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
        position: relative;
    }

    .top-link {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        color: var(--white);
        text-decoration: none;
        transition: all 0.3s ease;
        padding: 0.375rem 0.75rem;
        border-radius: 0.5rem;
        font-weight: 500;
        position: relative;
    }

    .top-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: var(--white);
        transition: width 0.3s ease;
    }

    .top-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .top-link:hover::after {
        width: 80%;
    }

    .top-link strong {
        font-weight: 700;
    }

    .login-link,
    .register-link {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .login-link:hover,
    .register-link:hover {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .user-link {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .divider {
        color: rgba(255, 255, 255, 0.4);
        font-weight: 300;
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
        z-index: 1100;
    }

    .user-link {
        display: flex !important;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        background: rgba(255, 255, 255, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 0.5rem 0.875rem !important;
        border: none;
        outline: none;
    }

    .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        line-height: 1.2;
    }

    .user-greeting {
        font-size: 0.6875rem;
        opacity: 0.9;
        font-weight: 400;
    }

    .user-name {
        font-size: 0.875rem;
        font-weight: 700;
    }

    .dropdown-arrow {
        transition: transform 0.3s ease;
        margin-left: 0.25rem;
    }

    .user-dropdown.active .dropdown-arrow {
        transform: rotate(180deg);
    }

    .user-dropdown-menu {
        position: absolute;
        top: calc(100% + 0.75rem);
        right: 0;
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        min-width: 320px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1101;
        overflow: hidden;
        display: none;
    }

    .user-dropdown.active .user-dropdown-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-header {
        padding: 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        color: var(--white);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .dropdown-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        flex-shrink: 0;
    }

    .dropdown-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dropdown-user-info {
        flex: 1;
        min-width: 0;
    }

    .dropdown-user-name {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dropdown-user-email {
        font-size: 0.8125rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dropdown-user-points {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.8125rem;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        width: fit-content;
    }

    .dropdown-user-points svg {
        fill: #fbbf24;
        stroke: #fbbf24;
    }

    .dropdown-divider {
        height: 1px;
        background: var(--gray-200);
        margin: 0.5rem 0;
    }

    .dropdown-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1.5rem;
        color: var(--dark);
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 0.9375rem;
        font-weight: 500;
        cursor: pointer;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
    }

    .dropdown-link:hover {
        background: var(--gray-100);
        color: var(--primary);
    }

    .dropdown-link svg {
        color: var(--gray-500);
        transition: color 0.2s ease;
        flex-shrink: 0;
    }

    .dropdown-link:hover svg {
        color: var(--primary);
    }

    .logout-link {
        color: var(--danger) !important;
    }

    .logout-link:hover {
        background: rgba(239, 68, 68, 0.1) !important;
    }

    .logout-link svg {
        color: var(--danger) !important;
    }

    /* Main Navigation */
    .main-nav {
        background: var(--white);
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .nav-content {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        gap: 2rem;
    }

    /* Logo */
    .logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        transition: transform 0.3s;
    }

    .logo:hover {
        transform: scale(1.05);
    }

    .logo-icon {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }

    .logo-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
        animation: rotate 4s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .logo-icon svg {
        color: var(--white);
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    .logo-text {
        display: flex;
        flex-direction: column;
    }

    .brand-name {
        font-size: 1.625rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -1px;
        position: relative;
    }

    .brand-tagline {
        font-size: 0.6875rem;
        color: var(--gray-500);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    /* Search Container */
    .search-container {
        position: relative;
        max-width: 600px;
    }

    .search-form {
        display: flex;
        align-items: center;
        background: var(--gray-100);
        border-radius: 14px;
        overflow: hidden;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        position: relative;
    }

    .search-form::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 14px;
        padding: 2px;
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .search-form:focus-within {
        background: var(--white);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .search-form:focus-within::before {
        opacity: 1;
    }

    .search-btn {
        padding: 0.875rem 1rem;
        background: none;
        border: none;
        color: var(--gray-500);
        cursor: pointer;
        transition: color 0.3s;
    }

    .search-btn:hover {
        color: var(--primary);
    }

    .search-input {
        flex: 1;
        padding: 0.875rem 0;
        border: none;
        background: transparent;
        font-size: 0.9375rem;
        color: var(--dark);
        outline: none;
    }

    .search-input::placeholder {
        color: var(--gray-400);
    }

    .search-category {
        border-left: 1px solid var(--gray-300);
    }

    .category-select {
        padding: 0.875rem 1rem;
        border: none;
        background: transparent;
        font-size: 0.875rem;
        color: var(--gray-700);
        cursor: pointer;
        outline: none;
        font-weight: 600;
    }

    /* Search Suggestions */
    .search-suggestions {
        position: absolute;
        top: calc(100% + 0.5rem);
        left: 0;
        right: 0;
        background: var(--white);
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        padding: 0.75rem;
        z-index: 100;
    }

    .suggestion-header {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 0.5rem 0.75rem;
    }

    .suggestion-item {
        display: block;
        padding: 0.75rem;
        color: var(--dark);
        text-decoration: none;
        border-radius: 0.5rem;
        transition: all 0.2s;
    }

    .suggestion-item:hover {
        background: var(--gray-100);
        color: var(--primary);
        transform: translateX(4px);
    }

    /* Nav Actions */
    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .nav-action {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.25rem;
        padding: 0.5rem 0.75rem;
        color: var(--dark);
        text-decoration: none;
        border-radius: 0.75rem;
        transition: all 0.3s;
    }

    .nav-action:hover {
        background: var(--gray-100);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .action-label {
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge {
        position: absolute;
        top: 0;
        right: 0;
        background: var(--danger);
        color: var(--white);
        font-size: 0.625rem;
        font-weight: 700;
        padding: 0.125rem 0.375rem;
        border-radius: 10px;
        min-width: 18px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
    }

    .cart-action .badge {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    /* Mobile Menu Toggle */
    .mobile-menu-toggle {
        display: none;
        flex-direction: column;
        gap: 4px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
    }

    .mobile-menu-toggle span {
        width: 24px;
        height: 3px;
        background: var(--dark);
        border-radius: 2px;
        transition: all 0.3s;
    }

    /* Main Menu */
    .main-menu {
        background: var(--white);
        border-top: 1px solid var(--gray-200);
        box-shadow: var(--shadow-sm);
    }

    .menu-list {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        position: relative;
    }

    .menu-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1rem;
        color: var(--dark);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9375rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
        position: relative;
    }

    .menu-link:hover {
        background: var(--gray-100);
        color: var(--primary);
    }

    .menu-link.active {
        color: var(--primary);
        background: rgba(102, 126, 234, 0.1);
    }

    .menu-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 3px;
        background: var(--primary);
        border-radius: 2px;
    }

    .deals-link {
        color: var(--danger) !important;
    }

    .hot-badge {
        background: linear-gradient(135deg, #ff512f 0%, #f09819 100%);
        color: var(--white);
        font-size: 0.625rem;
        font-weight: 700;
        padding: 0.125rem 0.5rem;
        border-radius: 10px;
        animation: shake 2s infinite;
    }

    @keyframes shake {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-5deg);
        }

        75% {
            transform: rotate(5deg);
        }
    }

    /* Dropdown Menu */
    .has-dropdown .dropdown-icon {
        transition: transform 0.3s;
    }

    .has-dropdown:hover .dropdown-icon {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 0.5rem);
        left: 0;
        background: var(--white);
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        padding: 0.75rem;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s;
        z-index: 100;
    }

    .has-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: block;
        padding: 0.75rem 1rem;
        color: var(--dark);
        text-decoration: none;
        border-radius: 0.5rem;
        font-size: 0.9375rem;
        transition: all 0.2s;
    }

    .dropdown-item:hover {
        background: var(--gray-100);
        color: var(--primary);
        transform: translateX(4px);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .nav-content {
            grid-template-columns: auto 1fr auto;
            gap: 1rem;
        }

        .search-container {
            max-width: 400px;
        }

        .action-label {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .top-bar {
            display: none;
        }

        .nav-content {
            grid-template-columns: auto 1fr auto;
        }

        .logo-text {
            display: none;
        }

        .search-container {
            display: none;
        }

        .mobile-menu-toggle {
            display: flex;
        }

        .main-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 280px;
            height: 100vh;
            background: var(--white);
            box-shadow: var(--shadow-xl);
            transition: left 0.3s;
            z-index: 1001;
            overflow-y: auto;
        }

        .main-menu.active {
            left: 0;
        }

        .menu-list {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem;
        }

        .menu-link {
            justify-content: flex-start;
        }

        .dropdown-menu {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            margin-top: 0.5rem;
            display: none;
        }

        .has-dropdown.active .dropdown-menu {
            display: block;
        }
    }

    @media (min-width: 1025px) {
        .only-mobile {
            display: none !important;
        }
    }
</style>

<script>
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu')?.closest('.main-menu');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');

            // Animate hamburger icon
            const spans = mobileMenuToggle.querySelectorAll('span');
            if (mobileMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(6px, 6px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(6px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
    }

    // Mobile dropdown toggle
    const hasDropdown = document.querySelectorAll('.has-dropdown');
    hasDropdown.forEach(item => {
        // Toggle dropdown on click (mobile)
        item.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                // Nếu click vào chính menu-link thì toggle, nếu click vào dropdown-item thì cho phép chuyển trang
                if (e.target.classList.contains('menu-link') || e.target.closest('.menu-link')) {
                    e.preventDefault();
                    item.classList.toggle('active');
                }
            }
        });
        // Cho phép click vào dropdown-item để chuyển trang
        const dropdownItems = item.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(link => {
            link.addEventListener('click', function(e) {
                // Không ngăn chặn mặc định, cho phép chuyển trang
                e.stopPropagation();
            });
        });
    });

    // Sticky Header on Scroll
    const mainHeader = document.querySelector('.main-header');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            mainHeader.classList.add('scrolled');
        } else {
            mainHeader.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });

    // Search suggestions
    const searchInput = document.querySelector('.search-input');
    const searchSuggestions = document.querySelector('.search-suggestions');

    if (searchInput && searchSuggestions) {
        searchInput.addEventListener('focus', () => {
            searchSuggestions.style.display = 'block';
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-container')) {
                searchSuggestions.style.display = 'none';
            }
        });
    }

    // User dropdown toggle
    const userDropdownBtn = document.getElementById('userDropdownBtn');
    const userDropdown = document.querySelector('.user-dropdown');

    if (userDropdownBtn && userDropdown) {
        userDropdownBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.user-dropdown')) {
                userDropdown.classList.remove('active');
            }
        });

        // Prevent dropdown from closing when clicking inside
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        if (userDropdownMenu) {
            userDropdownMenu.addEventListener('click', (e) => {
                // Allow logout form to work
                if (!e.target.closest('.logout-link')) {
                    e.stopPropagation();
                }
            });
        }
    }
</script>
