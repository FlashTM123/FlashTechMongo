@extends('Customers.Layouts.master')

@section('title', 'So sánh sản phẩm - FlashTech Premium')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-7xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-400 mb-8 border border-white/20 bg-white/10 backdrop-blur-md w-fit px-4 py-2 rounded-full shadow-sm">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-800 font-bold">So sánh sản phẩm</span>
        </nav>

        <div class="flex items-center justify-between mb-10 flex-wrap gap-4">
            <div class="flex items-center gap-4 border-l-4 border-indigo-500 pl-4 py-1">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">So Sánh Sản Phẩm</h1>
                    <p class="text-slate-500 font-medium">Đối chiếu cấu hình, thiết kế để chọn ra thiết bị phù hợp nhất</p>
                </div>
            </div>
            
            @if($count > 0)
                <div class="flex items-center gap-3">
                    <div class="bg-white px-5 py-2.5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-500 flex items-center justify-center">
                            <svg class="w-5 h-5 fill-current" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Đang mổ xẻ</div>
                            <div class="font-black text-lg text-slate-800 leading-none">{{ $count }} / 5 <span class="text-sm font-medium text-slate-500">sản phẩm</span></div>
                        </div>
                    </div>
                    <button onclick="clearComparison()" class="w-12 h-12 bg-white rounded-2xl border border-rose-200 text-rose-500 hover:bg-rose-50 hover:border-rose-300 transition-colors shadow-sm flex items-center justify-center" title="Xóa tất cả">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            @endif
        </div>

        @if($products->isEmpty())
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 md:p-20 text-center flex flex-col items-center justify-center max-w-2xl mx-auto mt-10">
                <div class="w-32 h-32 bg-indigo-50 rounded-full flex items-center justify-center mb-8 border-4 border-indigo-100 shadow-inner relative">
                    <svg class="w-16 h-16 text-indigo-300" fill="currentColor" stroke="none" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <!-- Floating bars -->
                    <div class="absolute -top-4 right-0 w-8 h-8 text-indigo-400 rotate-12 animate-pulse"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg></div>
                </div>
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-4">Chưa có sản phẩm nào!</h3>
                <p class="text-slate-500 font-medium mb-10">Hãy chọn từ 2 đến 5 sản phẩm để đưa lên bàn cân, chúng tôi sẽ cho bạn thấy sự khác biệt.</p>
                <a href="{{ route('home') }}" class="group bg-slate-900 text-white font-bold px-10 py-4 rounded-2xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all flex items-center gap-3">
                    Chọn sản phẩm ngay <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        @else
            <!-- Desktop/Tablet Comparison Table -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden hidden md:block">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr>
                                <th class="p-6 bg-slate-50 border-b border-r border-slate-100 w-[20%] text-slate-400 font-bold uppercase tracking-wider text-xs align-bottom">
                                    Tiêu chí
                                </th>
                                @foreach($products as $product)
                                    <th class="p-6 bg-white border-b border-r border-slate-100 min-w-[250px] w-[{{ 80/count($products) }}%] align-top relative group">
                                        <button onclick="removeFromComparison('{{ $product->_id }}')" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-rose-50 hover:text-rose-500" title="Xóa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                        
                                        <div class="flex flex-col items-center text-center pt-2">
                                            <div class="w-32 h-32 bg-slate-50 rounded-2xl p-2 mb-4">
                                                <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e';" alt="{{ $product->name }}" class="w-full h-full object-contain">
                                            </div>
                                            @if($product->brand)
                                                <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest mb-1">{{ $product->brand->name }}</span>
                                            @endif
                                            <a href="{{ route('product.detail', $product->slug) }}" class="text-base font-bold text-slate-800 line-clamp-2 hover:text-indigo-600 transition-colors mb-2">{{ $product->name }}</a>
                                            
                                            @php
                                                $price = $product->sale_price ? $product->sale_price : $product->price;
                                            @endphp
                                            <span class="text-xl font-black text-rose-600">{{ number_format((float)$price, 0, ',', '.') }}₫</span>
                                            
                                            <a href="{{ route('product.detail', $product->slug) }}" class="mt-4 px-6 py-2.5 bg-slate-900 text-white text-xs font-bold rounded-xl hover:bg-indigo-600 transition-colors inline-block">Xem ngay</a>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-600">
                            <!-- Ratings -->
                            <tr>
                                <td class="p-5 bg-slate-50 border-b border-r border-slate-100 font-bold text-slate-800">Đánh giá</td>
                                @foreach($products as $product)
                                    <td class="p-5 border-b border-r border-slate-100 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <div class="flex text-amber-400">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4" fill="{{ $i <= round($product->average_rating ?? 0) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                                @endfor
                                            </div>
                                            <span class="text-xs font-bold text-slate-900 ml-1">{{ number_format($product->average_rating ?? 0, 1) }}</span>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Danh mục -->
                            <tr>
                                <td class="p-5 bg-slate-50 border-b border-r border-slate-100 font-bold text-slate-800">Loại sản phẩm</td>
                                @foreach($products as $product)
                                    <td class="p-5 border-b border-r border-slate-100 text-center">
                                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">{{ $product->category->name ?? $product->category }}</span>
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Lượt bán -->
                            <tr>
                                <td class="p-5 bg-slate-50 border-b border-r border-slate-100 font-bold text-slate-800">Lượt bán</td>
                                @foreach($products as $product)
                                    <td class="p-5 border-b border-r border-slate-100 text-center">
                                        {{ number_format($product->sales_count ?? 0) }}
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Specs -->
                            @if($products->first()?->specifications && is_array($products->first()?->specifications))
                                <tr>
                                    <td class="p-5 bg-slate-50 border-b border-r border-slate-100 font-bold text-slate-800 !align-top pt-6">Thông số kỹ thuật</td>
                                    @foreach($products as $product)
                                        <td class="p-5 border-b border-r border-slate-100 !align-top">
                                            @if($product->specifications && is_array($product->specifications))
                                                <div class="flex flex-col gap-3">
                                                    @foreach(array_slice($product->specifications, 0, 5) as $spec)
                                                        <div class="flex justify-between items-center text-xs pb-2 border-b border-slate-50 last:border-0 last:pb-0">
                                                            <span class="text-slate-400 font-bold uppercase">{{ $spec['label'] ?? '' }}</span>
                                                            <span class="text-slate-800 font-semibold text-right max-w-[60%]">
                                                                {{ $spec['value'] ?? '' }} {{ $spec['unit'] ?? '' }}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-center text-slate-400 italic">Không có thông tin</div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Comparison Cards -->
            <div class="md:hidden flex overflow-x-auto gap-4 pb-6 snap-x custom-scrollbar">
                @foreach($products as $product)
                    <div class="snap-center shrink-0 w-[85%] bg-white rounded-3xl p-5 shadow-sm border border-slate-100 flex flex-col relative" id="mobile-compare-item-{{ $product->_id }}">
                        <!-- Remove Btn -->
                        <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-rose-50 hover:text-rose-500 z-10" onclick="removeFromComparison('{{ $product->_id }}')" title="Xóa">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                        
                        <div class="aspect-square bg-slate-50 rounded-2xl p-4 mb-4">
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e';" class="w-full h-full object-contain">
                        </div>
                        
                        <a href="{{ route('product.detail', $product->slug) }}" class="text-base font-bold text-slate-800 line-clamp-2 leading-tight mb-2">{{ $product->name }}</a>
                        @php $price = $product->sale_price ? $product->sale_price : $product->price; @endphp
                        <div class="text-xl font-black text-rose-600 mb-6">{{ number_format((float)$price, 0, ',', '.') }}₫</div>
                        
                        <div class="flex flex-col gap-3 text-sm mb-6 flex-1">
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400">Đánh giá</span>
                                <span class="font-bold text-amber-500 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                    {{ number_format($product->average_rating ?? 0, 1) }}
                                </span>
                            </div>
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400">Đã bán</span>
                                <span class="font-bold text-slate-800">{{ number_format($product->sales_count ?? 0) }}</span>
                            </div>
                            @if($product->specifications && is_array($product->specifications))
                                @foreach(array_slice($product->specifications, 0, 3) as $spec)
                                    <div class="flex justify-between border-b border-slate-50 pb-2 last:border-0 last:pb-0">
                                        <span class="text-slate-400">{{ $spec['label'] ?? '' }}</span>
                                        <span class="font-bold text-slate-800 text-right max-w-[60%]">{{ $spec['value'] ?? '' }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <a href="{{ route('product.detail', $product->slug) }}" class="w-full py-3.5 bg-slate-900 text-white text-center font-bold rounded-xl mt-auto">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Toast -->
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
        toast.className = `fixed top-5 right-5 z-[9999] transition-all transform translate-x-0 opacity-100 flex items-center gap-3 px-5 py-4 rounded-2xl text-white font-bold shadow-2xl ${type === 'success' ? 'bg-emerald-500 shadow-emerald-500/30' : 'bg-rose-500 shadow-rose-500/30'}`;
        toast.querySelector('svg').innerHTML = type === 'success' 
            ? '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>' 
            : '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        
        setTimeout(() => {
            toast.classList.remove('translate-x-0', 'opacity-100');
            toast.classList.add('translate-x-[120%]', 'opacity-0');
        }, 3000);
    }

    function removeFromComparison(productId) {
        let url = `{{ url('so-sanh/xoa') }}/${productId}`;
        // Adjust if method requires DELETE
        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                'Accept': 'application/json',
            }
        })
        .then(response => {
            if(!response.ok && response.status === 405) {
                // If the route definition is different, fallback to GET (some old code might use GET)
                return fetch(`{{ url('so-sanh/xoa') }}/${productId}`, { headers: { 'Accept': 'application/json' } });
            }
            return response.json();
        })
        .then(data => {
            // For both JSON and fallback
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            // hard refresh as fallback
            location.reload();
        });
    }

    function clearComparison() {
        if (!confirm('Bạn chắc chắn muốn xóa tất cả sản phẩm khỏi danh sách?')) return;
        
        fetch('{{ route("comparison.clear") }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                'Accept': 'application/json',
            }
        })
        .then(response => {
            if(!response.ok && response.status === 405) {
                return fetch('{{ route("comparison.clear") }}', { headers: { 'Accept': 'application/json' } });
            }
            return response.json();
        })
        .then(data => {
            location.reload();
        })
        .catch(error => {
            location.reload();
        });
    }
</script>
@endpush
