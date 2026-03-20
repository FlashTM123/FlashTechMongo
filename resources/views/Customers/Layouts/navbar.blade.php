<header class="main-header sticky top-0 z-[1000] w-full transition-all duration-300 glass-effect border-b border-white/20">
    <!-- Top Bar (Very slim) -->
    <div class="bg-slate-900 border-b border-white/10 text-white text-xs py-1.5 hidden md:block">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center gap-4 opacity-90 font-medium">
                <a href="tel:1900-xxxx" class="hover:text-indigo-400 font-bold transition-colors flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Hotline: 1900-xxxx
                </a>
                <span class="opacity-20 text-[10px]">|</span>
                <a href="#" class="hover:text-indigo-400 transition-colors">Hệ thống cửa hàng</a>
                <span class="opacity-20 text-[10px]">|</span>
                <a href="#" class="hover:text-indigo-400 transition-colors">Tra cứu đơn hàng</a>
            </div>
            <div class="flex items-center gap-4 relative z-[1001]">
                @include('customers.components.language-switcher')
            </div>
        </div>
    </div>

    <!-- Main Nav -->
    <div class="container mx-auto px-4 py-3 md:py-4 relative z-[1000]">
        <div class="flex items-center justify-between gap-4 md:gap-8">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group shrink-0">
                <div class="w-10 h-10 md:w-11 md:h-11 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:shadow-indigo-500/40 transition-all duration-300 group-hover:-translate-y-0.5">
                    <svg class="w-6 h-6 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v8l9-11h-7z" /></svg>
                </div>
                <div class="hidden sm:flex flex-col">
                    <span class="text-xl font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 tracking-tight leading-none uppercase">FlashTech</span>
                    <span class="text-[0.6rem] font-bold text-slate-500 tracking-[0.15em] uppercase mt-0.5">Premium Store</span>
                </div>
            </a>

            <!-- Search Area -->
            <div class="flex-1 max-w-2xl relative hidden md:block search-container group z-[1002]">
                <form action="{{ route('home') }}" method="GET" class="relative flex items-center bg-slate-100/80 hover:bg-white border border-slate-200/60 focus-within:border-indigo-400 focus-within:bg-white focus-within:ring-4 focus-within:ring-indigo-100 rounded-2xl transition-all duration-300 focus-within:shadow-md" id="mainSearchForm">
                    <button type="submit" class="pl-4 pr-2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                    <input type="text" name="search" placeholder="Tìm kiếm iPhone 15, Laptop Gaming..." class="w-full bg-transparent border-none focus:ring-0 text-sm py-3 text-slate-800 placeholder-slate-400 search-input font-medium" autocomplete="off" value="{{ request('search') }}">
                    <div class="pr-2 pl-2 border-l border-slate-200">
                        <select name="category" class="bg-transparent border-none text-sm text-slate-600 font-semibold py-2 focus:ring-0 cursor-pointer outline-none hover:text-indigo-600 transition-colors">
                            <option value="">Tất cả</option>
                            <option value="Smartphone" {{ request('category') === 'Smartphone' ? 'selected' : '' }}>Smartphone</option>
                            <option value="Laptop" {{ request('category') === 'Laptop' ? 'selected' : '' }}>Laptop</option>
                            <option value="Tablet" {{ request('category') === 'Tablet' ? 'selected' : '' }}>Tablet</option>
                            <option value="Accessory" {{ request('category') === 'Accessory' ? 'selected' : '' }}>Phụ kiện</option>
                        </select>
                    </div>
                </form>
                <!-- Search Suggestions Dropdown -->
                <div class="absolute top-full left-0 right-0 mt-2 w-full bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl shadow-slate-200/50 border border-white hidden z-[1003] overflow-hidden search-suggestions" id="searchSuggestions">
                    <div class="p-2 suggestions-list max-h-[350px] overflow-y-auto" id="suggestionsList"></div>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                <button class="md:hidden p-2.5 text-slate-600 hover:text-indigo-600 hover:bg-slate-100 rounded-xl transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>

                @php $comparisonCount = count(session()->get('comparison', [])); @endphp
                <a href="{{ route('comparison.index') }}" class="relative p-2 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-xl transition-all hover-float group hidden lg:flex flex-col items-center justify-center h-12 w-12 comparison-action">
                    <svg class="w-5 h-5 mb-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    <span class="text-[0.6rem] font-bold tracking-tight">SO SÁNH</span>
                    <span class="absolute top-1 right-1 bg-rose-500 text-white text-[0.65rem] font-bold px-1.5 min-w-[1.25rem] rounded-full shadow-sm border border-white comparison-count text-center leading-tight" style="{{ $comparisonCount > 0 ? '' : 'display:none' }}">{{ $comparisonCount }}</span>
                </a>

                @php $wishlistCount = auth('customer')->check() ? count(auth('customer')->user()->wishlist ?? []) : 0; @endphp
                <a href="{{ route('wishlist.index') }}" class="relative p-2 text-slate-500 hover:text-pink-600 hover:bg-pink-50/50 rounded-xl transition-all hover-float group hidden sm:flex flex-col items-center justify-center h-12 w-12">
                    <svg class="w-5 h-5 mb-0.5 group-hover:-translate-y-0.5 transition-transform group-hover:fill-pink-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    <span class="text-[0.6rem] font-bold tracking-tight">YÊU THÍCH</span>
                    <span class="absolute top-1 right-1 bg-pink-500 text-white text-[0.65rem] font-bold px-1.5 min-w-[1.25rem] rounded-full shadow-sm border border-white wishlist-count text-center leading-tight" style="{{ $wishlistCount > 0 ? '' : 'display:none' }}">{{ $wishlistCount }}</span>
                </a>

                @php $cartCount = array_sum(array_column(session()->get('cart', []), 'quantity')); @endphp
                <a href="{{ route('cart.index') }}" class="relative p-2 text-slate-500 hover:text-amber-600 hover:bg-amber-50/50 rounded-xl transition-all hover-float group flex flex-col items-center justify-center h-12 w-12 cart-action">
                    <svg class="w-5 h-5 mb-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="text-[0.6rem] font-bold tracking-tight hidden sm:block">GIỎ HÀNG</span>
                    <span class="absolute top-1 right-0 sm:right-1 bg-amber-500 text-white text-[0.65rem] font-bold px-1.5 min-w-[1.25rem] rounded-full shadow-sm border border-white cart-count text-center leading-tight transition-transform" style="{{ $cartCount > 0 ? '' : 'display:none' }}">{{ $cartCount }}</span>
                </a>

                <div class="w-px h-6 bg-slate-200 mx-1 hidden sm:block"></div>

                <!-- Notifications Widget -->
                @include('customers.components.notifications-widget')

                <!-- User Dropdown -->
                @if (auth('customer')->check())
                    <div class="dropdown dropdown-end z-[1005]">
                        <button type="button" tabindex="0" class="flex items-center gap-2 p-1 bg-white hover:bg-slate-50 border border-slate-200 rounded-full transition-all shadow-sm user-link cursor-pointer hover:shadow-md outline-none" id="userDropdownBtn">
                            @php $avatar = auth('customer')->user()->profile_picture_url; @endphp
                            <img src="{{ $avatar ?: 'https://ui-avatars.com/api/?name='.urlencode(auth('customer')->user()->full_name).'&background=6366f1&color=fff' }}" alt="User" class="w-9 h-9 rounded-full border-2 border-white shadow-sm object-cover">
                            <span class="text-sm font-bold text-slate-700 hidden lg:block max-w-[100px] truncate pr-1">{{ auth('customer')->user()->full_name }}</span>
                            <svg class="w-3 h-3 text-slate-400 hidden lg:block mr-2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <div tabindex="0" class="dropdown-content mt-2 w-72 bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl shadow-slate-200/50 border border-white overflow-hidden" id="userDropdownMenu">
                            <div class="p-5 bg-gradient-to-br from-indigo-500 via-purple-500 to-fuchsia-500 text-white relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                                <div class="flex items-center gap-3 relative z-10">
                                    <img src="{{ $avatar ?: 'https://ui-avatars.com/api/?name='.urlencode(auth('customer')->user()->full_name).'&background=ffffff&color=4f46e5' }}" alt="User" class="w-14 h-14 rounded-full border-2 border-white/30 shadow-lg">
                                    <div>
                                        <div class="font-bold text-lg leading-tight tracking-tight">{{ auth('customer')->user()->full_name }}</div>
                                        <div class="text-xs text-indigo-50 opacity-90 truncate max-w-[160px] font-medium">{{ auth('customer')->user()->email }}</div>
                                        <div class="mt-2 inline-flex items-center gap-1 bg-black/20 backdrop-blur-md px-2.5 py-1 rounded-lg text-xs font-bold text-yellow-300 shadow-inner">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            {{ number_format(auth('customer')->user()->loyalty_points ?? 0) }} Điểm
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-2 z-[1006]">
                                <a href="{{ route('customers.profile.detail') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-slate-50 hover:text-indigo-600 transition-colors dropdown-item">
                                    <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg></div>
                                    Tài khoản của tôi
                                </a>
                                <a href="{{ route('customers.orders') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-slate-50 hover:text-indigo-600 transition-colors dropdown-item">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg></div>
                                    Đơn hàng của tôi
                                </a>
                                <a href="{{ route('wishlist.index') }}" class="sm:hidden flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-slate-50 hover:text-pink-600 transition-colors dropdown-item">
                                    <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center text-pink-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg></div>
                                    Sản phẩm yêu thích
                                </a>
                                <div class="border-t border-slate-100 my-1 mx-2"></div>
                                <form action="{{ route('customers.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-semibold text-rose-600 rounded-xl hover:bg-rose-50 transition-colors logout-link">
                                        <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg></div>
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="hidden sm:flex items-center gap-3 ml-2">
                        <a href="{{ route('customers.login') }}" class="text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors px-2">Đăng nhập</a>
                        <a href="{{ route('customers.register') }}" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-0.5 transition-all">Đăng ký</a>
                    </div>
                @endif

                <button class="md:hidden p-2.5 text-slate-800 bg-slate-100/80 rounded-xl hover:bg-slate-200 transition-colors" id="mobileMenuToggle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" id="menuIconPath"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Category Nav Bottom -->
    <div class="hidden md:block relative z-[999] bg-white/70 backdrop-blur-md border-t border-slate-200/50">
        <div class="container mx-auto px-4">
            <ul class="flex items-center gap-8 text-[0.9rem] font-bold text-slate-600">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 py-3.5 text-indigo-600 border-b-2 border-indigo-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg> Trang chủ
                    </a>
                </li>
                <li class="relative group">
                    <a href="#" class="flex items-center gap-1.5 py-3.5 hover:text-indigo-600 transition-colors border-b-2 border-transparent group-hover:border-indigo-600 h-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg> 
                        Sản phẩm <svg class="w-3.5 h-3.5 transition-transform group-hover:rotate-180 text-slate-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="absolute top-full left-0 pt-2 w-64 hidden group-hover:block z-[1000] opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl border border-white p-3 overflow-hidden">
                            <a href="{{ route('products.category', 'smartphone') }}" class="group/item flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition-colors mb-1">
                                <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-500 group-hover/item:scale-110 transition-transform">📱</div><span class="font-bold text-slate-700 group-hover/item:text-indigo-600">Điện thoại</span>
                            </a>
                            <a href="{{ route('products.category', 'laptop') }}" class="group/item flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition-colors mb-1">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500 group-hover/item:scale-110 transition-transform">💻</div><span class="font-bold text-slate-700 group-hover/item:text-indigo-600">Laptop</span>
                            </a>
                            <a href="{{ route('products.category', 'tablet') }}" class="group/item flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition-colors mb-1">
                                <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center text-purple-500 group-hover/item:scale-110 transition-transform">📲</div><span class="font-bold text-slate-700 group-hover/item:text-indigo-600">Máy tính bảng</span>
                            </a>
                            <a href="{{ route('products.category', 'accessory') }}" class="group/item flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center text-rose-500 group-hover/item:scale-110 transition-transform">🎧</div><span class="font-bold text-slate-700 group-hover/item:text-indigo-600">Phụ kiện</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 py-3.5 hover:text-indigo-600 transition-colors border-b-2 border-transparent">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Thông tin
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 py-3.5 text-rose-600 hover:text-rose-700 transition-colors border-b-2 border-transparent">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Khuyến mãi <span class="bg-gradient-to-r from-red-500 to-rose-500 text-white text-[0.55rem] tracking-wider px-1.5 py-0.5 rounded-md animate-pulse shadow-sm">HOT</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Rest of JS Scripts from original navbar -->
<style>
/* CSS required for suggestions styling that Tailwind can't easily inline completely */
.suggestion-product { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem; border-radius: 0.75rem; transition: all 0.2s; color: inherit; }
.suggestion-product:hover { background-color: #f8fafc; }
.suggestion-product-image { width: 48px; height: 48px; border-radius: 8px; overflow: hidden; background: #f1f5f9; flex-shrink: 0; }
.suggestion-product-image img { width: 100%; height: 100%; object-fit: cover; }
.suggestion-product-info { flex: 1; min-width: 0; }
.suggestion-product-name { font-size: 0.9rem; font-weight: 700; color: #1e293b; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 0.15rem; }
.suggestion-product-meta { font-size: 0.7rem; color: #64748b; font-weight: 600; display: flex; gap: 0.5rem; }
.suggestion-product-price { font-size: 0.85rem; font-weight: 800; color: #4f46e5; flex-shrink: 0; }
.out-of-stock { opacity: 0.5; }
.user-dropdown.active .user-dropdown-menu { display: block !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Search autocomplete
    const searchInput = document.querySelector('.search-input');
    const searchSuggestions = document.querySelector('#searchSuggestions');
    const suggestionsList = document.querySelector('#suggestionsList');
    let searchTimeout;

    if (searchInput && searchSuggestions && suggestionsList) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            clearTimeout(searchTimeout);

            if (query.length < 1) {
                searchSuggestions.style.display = 'none';
                suggestionsList.innerHTML = '';
                return;
            }

            // Show loading state
            searchSuggestions.style.display = 'block';
            suggestionsList.innerHTML = '<div class="p-6 text-center text-slate-400 font-semibold text-sm flex flex-col items-center justify-center gap-2"><svg class="w-6 h-6 animate-spin text-indigo-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Đang tìm kiếm...</div>';

            // Debounce search
            searchTimeout = setTimeout(async () => {
                try {
                    const response = await fetch(`{{ route('products.search') }}?search=${encodeURIComponent(query)}`);
                    const data = await response.json();

                    if (data.success && data.suggestions && data.suggestions.length > 0) {
                        suggestionsList.innerHTML = data.suggestions.map(product => `
                            <a href="/product/${product.slug}" class="suggestion-product ${!product.inStock ? 'out-of-stock' : ''}">
                                <div class="suggestion-product-image">
                                    ${product.image ? `<img src="${product.image}" alt="${product.name}" onerror="this.style.display='none'">` : ''}
                                </div>
                                <div class="suggestion-product-info">
                                    <div class="suggestion-product-name">${product.name}</div>
                                    <div class="suggestion-product-meta">
                                        <span>SKU: ${product.sku}</span>
                                        <span class="${product.inStock ? 'text-emerald-500' : 'text-rose-500'}">${product.stockText}</span>
                                    </div>
                                </div>
                                <div class="suggestion-product-price">${product.price}</div>
                            </a>
                        `).join('');
                    } else {
                        suggestionsList.innerHTML = '<div class="p-6 text-center text-slate-500 font-semibold text-sm">Không tìm thấy sản phẩm</div>';
                    }
                } catch (error) {
                    suggestionsList.innerHTML = '<div class="p-6 text-center text-rose-500 font-semibold text-sm">Có lỗi xảy ra kết nối mạng</div>';
                }
            }, 300);
        });

        // Hide when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-container')) {
                searchSuggestions.style.display = 'none';
            }
        });
        searchInput.addEventListener('focus', () => {
            if (searchInput.value.trim().length >= 1) {
                searchSuggestions.style.display = 'block';
            }
        });
    }

});
</script>

<!-- Mobile Menu Drawer (Hidden by default) -->
<div class="fixed inset-0 z-[2000] lg:hidden bg-slate-900/50 backdrop-blur-sm opacity-0 invisible transition-all duration-300" id="mobileMenuOverlay">
    <div class="absolute inset-y-0 left-0 w-[280px] bg-white shadow-2xl -translate-x-full transition-transform duration-300 flex flex-col h-full" id="mobileMenuPanel">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v8l9-11h-7z" /></svg>
                </div>
                <span class="font-black text-slate-800 tracking-tight text-lg">FLASHTECH</span>
            </div>
            <button class="p-2 text-slate-400 hover:text-rose-500 transition-colors bg-white rounded-lg shadow-sm" id="closeMobileMenuBtn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <div class="flex-1 overflow-y-auto py-4">
            <!-- Search Mobile -->
            <div class="px-4 mb-6">
                <form action="{{ route('home') }}" method="GET" class="relative flex items-center bg-slate-100 border border-slate-200 rounded-xl focus-within:border-indigo-400 focus-within:ring-2 focus-within:ring-indigo-100 transition-all">
                    <button type="submit" class="pl-3 pr-2 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                    <input type="text" name="search" placeholder="Tìm kiếm..." class="w-full bg-transparent border-none focus:ring-0 text-sm py-2.5 text-slate-800 placeholder-slate-400" value="{{ request('search') }}">
                </form>
            </div>

            <!-- Categories -->
            <div class="px-4 space-y-1">
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 pl-2">Danh mục</div>
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-700 font-bold hover:bg-indigo-50 hover:text-indigo-600 rounded-xl transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-500 flex items-center justify-center"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
                    Trang chủ
                </a>
                <a href="{{ route('products.category', 'smartphone') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-700 font-bold hover:bg-slate-50 transition-colors rounded-xl">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center">📱</div> Điện thoại
                </a>
                <a href="{{ route('products.category', 'laptop') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-700 font-bold hover:bg-slate-50 transition-colors rounded-xl">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center">💻</div> Laptop
                </a>
                <a href="{{ route('products.category', 'tablet') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-700 font-bold hover:bg-slate-50 transition-colors rounded-xl">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center">📲</div> Máy tính bảng
                </a>
                <a href="{{ route('products.category', 'accessory') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-700 font-bold hover:bg-slate-50 transition-colors rounded-xl">
                    <div class="w-8 h-8 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center">🎧</div> Phụ kiện
                </a>
            </div>

            <!-- Language Switcher Mobile -->
            <div class="px-4 mt-8">
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 pl-2">Ngôn ngữ</div>
                <div class="grid grid-cols-2 gap-2">
                    @foreach(get_available_locales() as $code => $locale)
                    <button type="button" onclick="switchLanguage(event, '{{ $code }}')" class="flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl border border-slate-200 text-sm font-bold transition-all w-full {{ is_locale($code) ? 'bg-indigo-50 border-indigo-200 text-indigo-600 shadow-sm' : 'hover:bg-slate-50 text-slate-600' }}">
                        <span>{{ $locale['flag'] }}</span> {{ strtoupper($code) }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        @if (!auth('customer')->check())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('customers.login') }}" class="px-4 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold text-sm text-center rounded-xl shadow-sm hover:text-indigo-600 hover:border-indigo-200 transition-colors">Đăng nhập</a>
                <a href="{{ route('customers.register') }}" class="px-4 py-2.5 bg-indigo-600 text-white font-bold text-sm text-center rounded-xl shadow-md shadow-indigo-500/30 hover:bg-indigo-700 transition-colors">Đăng ký</a>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu
    const toggleBtn = document.getElementById('mobileMenuToggle');
    const closeBtn = document.getElementById('closeMobileMenuBtn');
    const overlay = document.getElementById('mobileMenuOverlay');
    const panel = document.getElementById('mobileMenuPanel');

    function openMobileMenu() {
        overlay.classList.remove('invisible', 'opacity-0');
        panel.classList.remove('-translate-x-full');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        overlay.classList.add('invisible', 'opacity-0');
        panel.classList.add('-translate-x-full');
        document.body.style.overflow = '';
    }

    if (toggleBtn && closeBtn && overlay) {
        toggleBtn.addEventListener('click', openMobileMenu);
        closeBtn.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeMobileMenu();
        });
    }
});
</script>
