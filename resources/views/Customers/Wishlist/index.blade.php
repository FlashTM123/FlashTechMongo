@extends('Customers.Layouts.master')

@section('title', 'Sản phẩm yêu thích - FlashTech Premium')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-400 mb-8 border border-white/20 bg-white/10 backdrop-blur-md w-fit px-4 py-2 rounded-full shadow-sm">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-800 font-bold">Danh sách yêu thích</span>
        </nav>

        <div class="flex items-center justify-between mb-10 flex-wrap gap-4">
            <div class="flex items-center gap-4 border-l-4 border-pink-500 pl-4 py-1">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">Sản Phẩm Yêu Thích</h1>
                    <p class="text-slate-500 font-medium">Lưu lại những thiết bị công nghệ bạn mong muốn sở hữu</p>
                </div>
            </div>
            
            @if($wishlistProducts->count() > 0)
                <div class="bg-white px-5 py-2.5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-pink-50 text-pink-500 flex items-center justify-center">
                        <svg class="w-5 h-5 fill-current" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Đã lưu</div>
                        <div class="font-black text-lg text-slate-800 leading-none">{{ $wishlistProducts->count() }} <span class="text-sm font-medium text-slate-500">sản phẩm</span></div>
                    </div>
                </div>
            @endif
        </div>

        @if($wishlistProducts->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
                @foreach($wishlistProducts as $product)
                    <div class="group bg-white rounded-3xl p-4 sm:p-5 shadow-sm hover:shadow-xl hover:shadow-indigo-500/10 border border-slate-100 transition-all duration-300 relative flex flex-col h-full" id="wishlist-item-{{ $product->_id }}">
                        
                        <!-- Remove Btn -->
                        <button class="absolute top-3 right-3 w-8 h-8 bg-white/80 backdrop-blur-sm border border-slate-100 rounded-full flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition-colors shadow-sm z-10" onclick="removeWishlist('{{ $product->_id }}')" title="Xóa khỏi yêu thích">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        @php
                            $basePrice = $product->price ?? 0;
                            $salePrice = $product->sale_price ?? 0;
                            $price = ($salePrice > 0 && $salePrice < $basePrice) ? $salePrice : $basePrice;
                            $discount = ($basePrice > 0 && $salePrice > 0 && $salePrice < $basePrice) ? round((($basePrice - $salePrice) / $basePrice) * 100) : 0;
                            
                            $img = !empty($product->image) ? $product->image : '';
                            $imgUrl = empty($img) ? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' : (Str::startsWith($img, 'http') ? $img : asset(Str::startsWith($img, '/storage/') ? $img : 'storage/' . $img));
                        @endphp

                        @if($discount > 0)
                            <div class="absolute top-3 left-3 bg-gradient-to-r from-rose-500 to-red-500 text-white text-[10px] sm:text-xs font-bold px-2 py-1 rounded-lg shadow-sm z-10">
                                -{{ $discount }}%
                            </div>
                        @endif

                        <!-- Image -->
                        <a href="{{ route('product.detail', $product->slug) }}" class="block relative aspect-square bg-slate-50 rounded-2xl mb-4 overflow-hidden">
                            <img src="{{ $imgUrl }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';" alt="{{ $product->name }}" class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500">
                        </a>

                        <!-- Info -->
                        <div class="flex-1 flex flex-col">
                            @if($product->brand)
                                <div class="text-[10px] sm:text-xs font-bold text-indigo-600 uppercase tracking-widest mb-1">{{ $product->brand->name }}</div>
                            @endif
                            <a href="{{ route('product.detail', $product->slug) }}" class="text-sm sm:text-base font-bold text-slate-800 line-clamp-2 leading-tight group-hover:text-indigo-600 transition-colors mb-2">{{ $product->name }}</a>
                            
                            <div class="flex flex-col mt-auto pb-4 border-b border-slate-100 mb-4">
                                @if($discount > 0)
                                    <span class="text-xs sm:text-sm text-slate-400 line-through font-medium">{{ number_format($basePrice, 0, ',', '.') }}₫</span>
                                    <span class="text-base sm:text-lg font-black text-rose-600 leading-none">{{ number_format($salePrice, 0, ',', '.') }}₫</span>
                                @else
                                    <span class="text-base sm:text-lg font-black text-slate-900 leading-none">{{ number_format($basePrice, 0, ',', '.') }}₫</span>
                                @endif
                            </div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="text-[10px] sm:text-xs font-bold {{ $product->stock_quantity > 0 ? 'text-emerald-500 bg-emerald-50' : 'text-rose-500 bg-rose-50' }} px-2 py-1 rounded-md">
                                    {{ $product->stock_quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                </span>
                                <button class="w-10 h-10 shrink-0 bg-slate-900 text-white rounded-xl flex items-center justify-center hover:bg-indigo-600 transition-colors shadow-md shadow-slate-900/10 disabled:opacity-50 disabled:hover:bg-slate-900" {{ $product->stock_quantity <= 0 ? 'disabled' : '' }} onclick="addToCartFromWishlist('{{ $product->_id }}')" title="Thêm vào giỏ">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 md:p-20 text-center flex flex-col items-center justify-center max-w-2xl mx-auto mt-10">
                <div class="w-32 h-32 bg-pink-50 rounded-full flex items-center justify-center mb-8 border-4 border-pink-100 shadow-inner relative">
                    <svg class="w-16 h-16 text-pink-300" fill="currentColor" stroke="none" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <!-- Floating hearts -->
                    <div class="absolute -top-4 right-0 w-6 h-6 text-pink-400 rotate-12 animate-pulse"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                    <div class="absolute bottom-4 -left-4 w-4 h-4 text-pink-300 -rotate-12 animate-pulse" style="animation-delay: 0.5s;"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                </div>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-4">Danh Sách Trống</h3>
                <p class="text-slate-500 font-medium mb-10">Bạn chưa thêm sản phẩm nào vào danh sách yêu thích. Hãy quay lại trang chủ để khám phá thêm nhiều thiết bị công nghệ đỉnh cao.</p>
                <a href="{{ route('home') }}" class="group bg-slate-900 text-white font-bold px-10 py-4 rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all flex items-center gap-3">
                    Bắt đầu khám phá <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Toast Container -->
<div id="toast" class="fixed top-5 right-5 z-[9999] transition-all transform translate-x-[120%] opacity-0 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl">
    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-sm"></span>
</div>
@endsection

@push('scripts')
<script>
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        toast.querySelector('span').textContent = message;
        if(type === 'success') {
            toast.className = 'fixed top-5 right-5 z-[9999] transition-all transform translate-x-0 opacity-100 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl shadow-emerald-500/30 bg-emerald-500';
            toast.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        } else {
            toast.className = 'fixed top-5 right-5 z-[9999] transition-all transform translate-x-0 opacity-100 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl shadow-rose-500/30 bg-rose-500';
            toast.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        }
        setTimeout(() => {
            toast.classList.remove('translate-x-0', 'opacity-100');
            toast.classList.add('translate-x-[120%]', 'opacity-0');
        }, 3000);
    }

    function removeWishlist(productId) {
        if (!confirm('Xóa sản phẩm này khỏi yêu thích?')) return;

        fetch('{{ route("wishlist.toggle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(r => r.json())
        .then(data => {
            if (data.status === 'removed') {
                const card = document.getElementById('wishlist-item-' + productId);
                card.classList.add('scale-90', 'opacity-0');
                showToast('Đã xóa khỏi danh sách yêu thích');
                
                setTimeout(() => {
                    card.remove();
                    const remaining = document.querySelectorAll('[id^=wishlist-item-]');
                    if (remaining.length === 0) location.reload();
                    document.querySelectorAll('.wishlist-count').forEach(el => {
                        el.textContent = remaining.length + ' sản phẩm'; // update all elements with this class 
                        // Update specific UI element in empty state etc
                    });
                }, 300);
            }
        });
    }

    function addToCartFromWishlist(productId) {
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                document.querySelectorAll('.cart-count').forEach(badge => {
                    badge.textContent = data.cartCount;
                    badge.style.display = 'flex';
                });
                showToast('Đã thêm vào giỏ hàng');
            } else {
                showToast(data.message || 'Lỗi thêm vào giỏ', 'error');
            }
        });
    }
</script>
@endpush
