<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-section">
            <div class="logo-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div class="logo-text">
                <h2>FlashTech</h2>
                <span>Admin Panel</span>
            </div>
        </div>
        <button class="sidebar-close" id="sidebarClose">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="sidebar-content">
        <nav class="sidebar-nav">
            <!-- Thống kê -->
            <div class="nav-section">
                <p class="nav-section-title">TỔNG QUAN</p>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link active">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <span class="nav-text">Thống kê</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Quản lý -->
            <div class="nav-section">
                <p class="nav-section-title">QUẢN LÝ</p>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <span class="nav-text">Quản lý người dùng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/customers') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <span class="nav-text">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/brands') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <span class="nav-text">Quản lý thương hiệu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/products') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="nav-text">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/orders') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                            </div>
                            <span class="nav-text">Quản lý đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Cài đặt -->
            <div class="nav-section">
                <p class="nav-section-title">HỆ THỐNG</p>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ url('/settings') }}" class="nav-link">
                            <div class="nav-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="nav-text">Cài đặt</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="user-profile">
                <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff" alt="Admin" class="profile-avatar">
                <div class="profile-info">
                    <h4>Admin User</h4>
                    <p>admin@flashtech.com</p>
                </div>
                <a href="{{ url('/logout') }}" class="logout-btn" title="Đăng xuất">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        width: 280px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        z-index: 1001;
        transition: all 0.3s ease;
    }

    /* Light mode sidebar */
    [data-theme="light"] .sidebar {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.05);
        border-right: 1px solid #e2e8f0;
    }

    .sidebar-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    [data-theme="light"] .sidebar-header {
        border-bottom: 1px solid #e2e8f0;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .logo-icon svg {
        width: 28px;
        height: 28px;
        color: #ffffff;
    }

    .logo-text h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
        line-height: 1.2;
    }

    [data-theme="light"] .logo-text h2 {
        color: #1e293b;
    }

    .logo-text span {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 500;
    }

    [data-theme="light"] .logo-text span {
        color: #64748b;
    }

    .sidebar-close {
        display: none;
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        border-radius: 8px;
        color: #ffffff;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .sidebar-close:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-close svg {
        width: 20px;
        height: 20px;
    }

    .sidebar-content {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 1.5rem 0;
    }

    .sidebar-content::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-content::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
    }

    .sidebar-content::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }

    .sidebar-content::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .nav-section {
        margin-bottom: 2rem;
    }

    .nav-section-title {
        font-size: 0.75rem;
        font-weight: 700;
        color: #64748b;
        letter-spacing: 0.05em;
        padding: 0 1.5rem;
        margin-bottom: 0.75rem;
    }

    [data-theme="light"] .nav-section-title {
        color: #94a3b8;
    }

    .nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-item {
        margin-bottom: 0.25rem;
        padding: 0 1rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 0.875rem 1rem;
        color: #cbd5e1;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        position: relative;
        font-weight: 500;
        font-size: 0.95rem;
    }

    [data-theme="light"] .nav-link {
        color: #64748b;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        transform: translateX(4px);
    }

    [data-theme="light"] .nav-link:hover {
        background: #f1f5f9;
        color: #1e293b;
    }

    .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .nav-icon {
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .nav-icon svg {
        width: 100%;
        height: 100%;
    }

    .nav-text {
        flex: 1;
    }

    .sidebar-footer {
        padding: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    [data-theme="light"] .sidebar-footer {
        border-top: 1px solid #e2e8f0;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.05);
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .user-profile {
        background: #f8fafc;
    }

    .user-profile:hover {
        background: rgba(255, 255, 255, 0.08);
    }

    [data-theme="light"] .user-profile:hover {
        background: #f1f5f9;
    }

    .profile-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid rgba(102, 126, 234, 0.5);
        flex-shrink: 0;
    }

    .profile-info {
        flex: 1;
        min-width: 0;
    }

    .profile-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: #ffffff;
        margin: 0 0 0.25rem 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    [data-theme="light"] .profile-info h4 {
        color: #1e293b;
    }

    .profile-info p {
        font-size: 0.75rem;
        color: #94a3b8;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    [data-theme="light"] .profile-info p {
        color: #64748b;
    }

    .logout-btn {
        width: 36px;
        height: 36px;
        background: rgba(239, 68, 68, 0.1);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ef4444;
        text-decoration: none;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.2);
        transform: translateY(-2px);
    }

    .logout-btn svg {
        width: 20px;
        height: 20px;
    }

    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        backdrop-filter: blur(4px);
    }

    @media (max-width: 1024px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-overlay.active {
            display: block;
        }

        .sidebar-close {
            display: flex;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            max-width: 280px;
        }
    }
</style>

<script>
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarClose = document.getElementById('sidebarClose');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');

    // Open sidebar on mobile
    mobileMenuBtn?.addEventListener('click', () => {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
    });

    // Close sidebar
    const closeSidebar = () => {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    };

    sidebarClose?.addEventListener('click', closeSidebar);
    sidebarOverlay?.addEventListener('click', closeSidebar);

    // Highlight active nav item based on current URL
    const currentPath = window.location.pathname;
    document.querySelectorAll('.sidebar .nav-link').forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href && currentPath === href) {
            link.classList.add('active');
        }
    });

    // Add click handler for nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', (e) => {
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
</script>
