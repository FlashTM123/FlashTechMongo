@extends('Customers.Layouts.master')

@section('title', 'Chi tiết đơn hàng ' . $order->order_code . ' - FlashTech Premium')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-purple-900/80 to-slate-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-30 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-5xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-300 mb-8 w-fit px-1">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Trang chủ</a>
            <span class="text-white/30">/</span>
            <a href="{{ route('customers.orders') }}" class="hover:text-white transition-colors">Đơn hàng</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-bold tracking-wide">{{ $order->order_code }}</span>
        </nav>

        <!-- Header Actions -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight mb-2 flex items-center gap-3">
                    Đơn Hàng <span class="text-indigo-600 bg-indigo-50 px-3 py-1 rounded-xl tracking-widest">{{ $order->order_code }}</span>
                </h1>
                <p class="text-slate-500 font-medium whitespace-nowrap">Ngày đặt: {{ $order->created_at->format('d/m/Y - H:i') }}</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('customers.orders') }}" class="px-5 py-2.5 bg-white text-slate-600 font-bold rounded-xl shadow-sm border border-slate-200 hover:text-indigo-600 hover:border-indigo-600 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Trở lại
                </a>
                <a href="{{ route('customers.orders.invoice', $order->_id) }}" class="px-5 py-2.5 bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 hover:bg-emerald-600 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Xuất PDF
                </a>
                @if (in_array($order->order_status, ['pending', 'processing']))
                    <form action="{{ route('customers.orders.cancel', $order->_id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 bg-rose-500 text-white font-bold rounded-xl shadow-lg shadow-rose-500/30 hover:bg-rose-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Hủy đơn
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @php
            $statusMap = [
                'pending' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'border' => 'border-amber-200', 'label' => 'Chờ xử lý', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>'],
                'processing' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'border' => 'border-blue-200', 'label' => 'Đang xử lý', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>'],
                'shipped' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'border-purple-200', 'label' => 'Đang giao hàng', 'icon' => '<path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>'],
                'delivered' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'border-emerald-200', 'label' => 'Đã giao thành công', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>'],
                'cancelled' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-600', 'border' => 'border-rose-200', 'label' => 'Đã hủy', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>'],
            ];
            $status = $statusMap[$order->order_status] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-600', 'border' => 'border-slate-200', 'label' => $order->order_status, 'icon' => ''];
            $paymentLabel = match($order->payment_method) {
                'cod' => 'Thanh toán khi nhận',
                'bank_transfer' => 'Chuyển khoản / QR',
                'momo' => 'Ví MoMo',
                'vnpay' => 'VNPay',
                default => $order->payment_method,
            };
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Left Column: Info Cards -->
            <div class="lg:col-span-1 flex flex-col gap-6">
                <!-- Order Overall -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8 relative overflow-hidden group">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-50 rounded-full blur-3xl group-hover:bg-indigo-100 transition-colors pointer-events-none"></div>
                    
                    <div class="flex items-center gap-4 mb-6 relative z-10">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-slate-800">Thông tin chung</h3>
                    </div>

                    <div class="flex flex-col gap-5 relative z-10">
                        <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                            <span class="text-sm font-medium text-slate-500">Trạng thái đơn</span>
                            <span class="flex items-center gap-1.5 px-3 py-1 {{ $status['bg'] }} {{ $status['text'] }} {{ $status['border'] }} border rounded-full font-bold text-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">{!! $status['icon'] !!}</svg>
                                {{ $status['label'] }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                            <span class="text-sm font-medium text-slate-500">Thanh toán</span>
                            <span class="font-bold text-slate-800 text-right">{{ $paymentLabel }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-slate-500">Tình trạng TT</span>
                            @if($order->payment_status === 'paid')
                                <span class="font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg text-xs border border-emerald-100">Đã thanh toán</span>
                            @else
                                <span class="font-bold text-rose-600 bg-rose-50 px-3 py-1 rounded-lg text-xs border border-rose-100">Chưa thanh toán</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-6 sm:p-8 relative overflow-hidden group">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-teal-50 rounded-full blur-3xl group-hover:bg-teal-100 transition-colors pointer-events-none"></div>
                    
                    <div class="flex items-center gap-4 mb-6 relative z-10">
                        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-slate-800">Giao hàng đến</h3>
                    </div>

                    <div class="flex flex-col gap-4 relative z-10">
                        <div class="flex gap-3 items-start p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center shrink-0 text-slate-500 text-lg font-black">{{ substr($order->full_name, 0, 1) }}</div>
                            <div>
                                <div class="font-bold text-slate-800">{{ $order->full_name }}</div>
                                <div class="text-sm font-medium text-slate-500 mt-1 flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>{{ $order->phone_number }}</div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-slate-600 leading-relaxed">
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Địa chỉ</span>
                            {{ $order->shipping_address }}
                        </div>
                        @if ($order->notes)
                        <div class="text-sm font-medium text-amber-700 bg-amber-50 p-3 rounded-xl border border-amber-100 leading-relaxed mt-2">
                            <span class="block text-xs font-bold text-amber-500/80 uppercase tracking-widest mb-1">Ghi chú của bạn</span>
                            {{ $order->notes }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Products & Total -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden h-full flex flex-col">
                    <div class="flex items-center gap-4 p-6 sm:p-8 border-b border-slate-100 bg-slate-50/30">
                        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-slate-800">Sản phẩm ({{ $order->orderDetails->count() }})</h3>
                    </div>

                    <!-- Products List -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col gap-6 max-h-[500px] overflow-y-auto custom-scrollbar">
                        @foreach ($order->orderDetails as $detail)
                            <div class="flex items-center gap-4 sm:gap-6 pb-6 border-b border-slate-50 last:border-0 last:pb-0 relative group">
                                @php 
                                    $img = !empty($detail->product_image) ? $detail->product_image : (!empty($detail->image) ? $detail->image : (optional($detail->product)->image ?: ''));
                                    $imgUrl = empty($img) ? 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop' : (Str::startsWith($img, 'http') ? $img : asset(Str::startsWith($img, '/storage/') ? $img : 'storage/' . $img));
                                @endphp
                                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-white border border-slate-100 shadow-sm shrink-0 flex items-center justify-center p-2 sm:p-3">
                                    <img src="{{ $imgUrl }}" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop';" alt="{{ $detail->product_name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300">
                                </div>
                                
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-slate-800 text-base sm:text-lg mb-1 leading-tight">{{ $detail->product_name }}</h4>
                                    @if(!empty($detail->color))
                                        <div class="text-sm font-medium text-slate-500 flex items-center gap-1.5 mb-2">
                                            Phân loại: <span class="bg-slate-100 px-2.5 py-0.5 rounded-lg text-slate-700 font-bold border border-slate-200">{{ $detail->color }}</span>
                                        </div>
                                    @endif
                                    
                                    <div class="flex flex-wrap items-center justify-between gap-2 mt-auto">
                                        <div class="flex items-center gap-3">
                                            @if ($detail->sale_price > 0 && $detail->sale_price < $detail->price)
                                                <div class="flex flex-col">
                                                    <span class="font-black text-rose-600">{{ number_format($detail->sale_price, 0, ',', '.') }}₫</span>
                                                    <span class="text-xs font-semibold text-slate-400 line-through">{{ number_format($detail->price, 0, ',', '.') }}₫</span>
                                                </div>
                                            @else
                                                <span class="font-black text-rose-600">{{ number_format($detail->price, 0, ',', '.') }}₫</span>
                                            @endif
                                        </div>
                                        <div class="text-sm font-bold text-slate-500 bg-slate-50 px-3 py-1 rounded-xl">x {{ $detail->quantity }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary -->
                    <div class="bg-slate-50 p-6 sm:p-8 border-t border-slate-100">
                        <div class="max-w-xs ml-auto flex flex-col gap-4">
                            <div class="flex justify-between items-center text-sm font-semibold text-slate-600">
                                <span>Tạm tính</span>
                                <span>{{ number_format($order->subtotal, 0, ',', '.') }}₫</span>
                            </div>
                            @if ($order->discount > 0)
                                <div class="flex justify-between items-center text-sm font-semibold text-emerald-600">
                                    <span>Khuyến mãi</span>
                                    <span>-{{ number_format($order->discount, 0, ',', '.') }}₫</span>
                                </div>
                            @endif
                            <div class="flex justify-between items-center text-sm font-semibold text-slate-600 pb-4 border-b border-slate-200">
                                <span>Phí vận chuyển</span>
                                <span class="text-emerald-500 font-bold bg-emerald-50 px-2 py-0.5 rounded-md">Miễn phí</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold text-slate-800">Tổng cộng</span>
                                <span class="text-2xl font-black text-indigo-600">{{ number_format($order->total, 0, ',', '.') }}₫</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
