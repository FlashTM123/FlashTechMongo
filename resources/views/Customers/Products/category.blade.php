@extends('Customers.Layouts.master')

@section('title', $categoryInfo['name'] . ' - FlashTech Premium')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900 opacity-90"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-7xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-indigo-100 mb-8 bg-white/10 backdrop-blur-md w-fit px-4 py-2 rounded-full border border-white/20 shadow-sm">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Trang chủ
            </a>
            <span class="text-indigo-300">/</span>
            <span class="text-white font-bold">{{ $categoryInfo['name'] }}</span>
        </nav>

        <!-- Category Header -->
        <div class="flex items-center justify-between mb-10 border-l-4 border-indigo-400 pl-4 py-2">
            <div>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight mb-2 drop-shadow-md flex items-center gap-3">
                    <span class="w-14 h-14 bg-white/10 backdrop-blur border border-white/20 rounded-2xl flex items-center justify-center text-3xl shadow-lg">
                    @switch($categoryInfo['slug'])
                        @case('smartphone') 📱 @break
                        @case('laptop') 💻 @break
                        @case('tablet') 📲 @break
                        @case('computer') 🖥️ @break
                        @case('accessory') 🎧 @break
                        @default 📦
                    @endswitch
                    </span>
                    {{ $categoryInfo['name'] }}
                </h1>
                <p class="text-indigo-100 font-medium tracking-wide">Khám phá {{ $categoryInfo['count'] }} sản phẩm công nghệ đỉnh cao</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:col-span-1">
                <form action="{{ route('products.category', $categoryInfo['slug']) }}" method="GET" id="filterForm" class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8 sticky top-24">
                    
                    <!-- Search -->
                    <div class="mb-8">
                        <h3 class="flex items-center gap-2 text-sm font-bold text-slate-800 uppercase tracking-widest mb-4">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Tìm kiếm
                        </h3>
                        <div class="relative">
                            <input type="text" name="search" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all text-sm font-medium text-slate-700 placeholder:text-slate-400" placeholder="Nhập tên sản phẩm..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Brand Filter -->
                    <div class="mb-8 border-t border-slate-100 pt-6">
                        <h3 class="flex items-center gap-2 text-sm font-bold text-slate-800 uppercase tracking-widest mb-4">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Thương hiệu
                        </h3>
                        <div class="flex flex-col gap-3 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="radio" name="brand" value="" class="w-5 h-5 text-indigo-600 border-slate-300 focus:ring-indigo-600 rounded-full cursor-pointer" {{ !request('brand') ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-slate-600 group-hover:text-indigo-600 transition-colors">Tất cả thương hiệu</span>
                            </label>
                            @foreach($brands as $brand)
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="radio" name="brand" value="{{ $brand->id }}" class="w-5 h-5 text-indigo-600 border-slate-300 focus:ring-indigo-600 rounded-full cursor-pointer" {{ request('brand') == $brand->id ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-slate-600 group-hover:text-indigo-600 transition-colors">{{ $brand->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="mb-8 border-t border-slate-100 pt-6">
                        <h3 class="flex items-center gap-2 text-sm font-bold text-slate-800 uppercase tracking-widest mb-4">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Khoảng giá
                        </h3>
                        <div class="flex flex-col gap-4">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="relative">
                                    <span class="absolute top-1/2 left-3 -translate-y-1/2 text-xs font-bold text-slate-400">Từ</span>
                                    <input type="number" name="min_price" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-3 py-2.5 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-bold text-slate-700" placeholder="0" value="{{ request('min_price') }}">
                                </div>
                                <div class="relative">
                                    <span class="absolute top-1/2 left-3 -translate-y-1/2 text-xs font-bold text-slate-400">Đến</span>
                                    <input type="number" name="max_price" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-3 py-2.5 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-bold text-slate-700" placeholder="Max" value="{{ request('max_price') }}">
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap gap-2 mt-2">
                                <button type="button" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-100 hover:text-indigo-700 text-slate-600 text-xs font-bold rounded-lg transition-colors border border-transparent hover:border-indigo-200" onclick="setPrice(0, 5000000)">Dưới 5tr</button>
                                <button type="button" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-100 hover:text-indigo-700 text-slate-600 text-xs font-bold rounded-lg transition-colors border border-transparent hover:border-indigo-200" onclick="setPrice(5000000, 15000000)">5 - 15tr</button>
                                <button type="button" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-100 hover:text-indigo-700 text-slate-600 text-xs font-bold rounded-lg transition-colors border border-transparent hover:border-indigo-200" onclick="setPrice(15000000, 30000000)">15 - 30tr</button>
                                <button type="button" class="px-3 py-1.5 bg-slate-100 hover:bg-indigo-100 hover:text-indigo-700 text-slate-600 text-xs font-bold rounded-lg transition-colors border border-transparent hover:border-indigo-200" onclick="setPrice(30000000, '')">Trên 30tr</button>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Actions -->
                    <div class="flex flex-col gap-3">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-slate-900 text-white font-bold px-6 py-3.5 rounded-xl hover:bg-indigo-600 transition-colors shadow-lg shadow-slate-900/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            Áp dụng bộ lọc
                        </button>
                        <a href="{{ route('products.category', $categoryInfo['slug']) }}" class="w-full flex items-center justify-center gap-2 bg-slate-50 text-slate-600 font-bold px-6 py-3.5 rounded-xl hover:bg-slate-100 hover:text-rose-500 transition-colors">
                            Xóa bộ lọc
                        </a>
                    </div>
                </form>
            </aside>

            <!-- Products Main -->
            <main class="lg:col-span-3 flex flex-col gap-6">
                <!-- Toolbar -->
                <div class="bg-white rounded-[2rem] shadow-sm shadow-slate-200/50 border border-slate-100 p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm font-medium text-slate-500">
                        Hiển thị <strong class="text-slate-800">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong>
                        trong <strong class="text-slate-800">{{ $products->total() }}</strong> sản phẩm
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 relative">
                            <label for="sortSelect" class="text-sm font-bold text-slate-600 hidden sm:block">Sắp xếp:</label>
                            <svg class="w-4 h-4 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            <select name="sort" id="sortSelect" class="appearance-none bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-10 py-2.5 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm font-bold text-slate-700 cursor-pointer" onchange="updateSort(this.value)">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Phổ biến nhất</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp → Cao</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao → Thấp</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên: A → Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z → A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        @include('Customers.Components.product-card', ['product' => $product])
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $products->links('Customers.Components.pagination') }}
                </div>
                @else
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-12 text-center flex flex-col items-center justify-center mt-4">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6 border-4 border-slate-100/50">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-800 mb-2">Không tìm thấy sản phẩm</h3>
                    <p class="text-slate-500 font-medium mb-8">Thử thay đổi bộ lọc hoặc từ khóa tìm kiếm của bạn.</p>
                    <a href="{{ route('products.category', $categoryInfo['slug']) }}" class="bg-slate-900 text-white font-bold px-8 py-3.5 rounded-xl hover:bg-indigo-600 transition-colors shadow-lg shadow-slate-900/20">
                        Xóa tất cả bộ lọc
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function updateSort(value) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sort', value);
        window.location.search = urlParams.toString();
    }

    function setPrice(min, max) {
        document.querySelector('input[name="min_price"]').value = min;
        document.querySelector('input[name="max_price"]').value = max;
    }
</script>
@endpush
