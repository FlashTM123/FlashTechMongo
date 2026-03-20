@extends('Customers.Layouts.master')
@section('title', 'Đổi mật khẩu - FlashTech Premium')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20 relative overflow-hidden">
    <!-- Header Decor -->
    <div class="h-64 bg-slate-900 absolute top-0 inset-x-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-purple-900/80 to-slate-900"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-30 mix-blend-overlay"></div>
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-4 sm:pt-8 md:pt-12 relative z-10 max-w-4xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-300 mb-8 w-fit px-1">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Trang chủ</a>
            <span class="text-white/30">/</span>
            <a href="{{ route('customers.profile.detail') }}" class="hover:text-white transition-colors">Hồ sơ</a>
            <span class="text-white/30">/</span>
            <span class="text-white font-bold tracking-wide">Đổi mật khẩu</span>
        </nav>

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">Mật Khẩu & Bảo Mật</h1>
            <a href="{{ route('customers.profile.detail') }}" class="flex items-center gap-2 px-5 py-2.5 bg-white text-slate-600 font-bold rounded-xl shadow-sm border border-slate-200 hover:text-indigo-600 hover:border-indigo-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Trở lại
            </a>
        </div>

        @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-600 rounded-2xl p-4 mb-8 max-w-2xl">
                <div class="flex items-center gap-2 font-bold mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Vui lòng kiểm tra lại thông tin:
                </div>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 max-w-2xl">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 11V7a5 5 0 0110 0v4"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-black text-slate-800">Đổi mật khẩu</h3>
                    <p class="text-sm font-medium text-slate-500">Thiết lập mật khẩu an toàn để bảo vệ tài khoản</p>
                </div>
            </div>

            @if($customer->google_id && !$customer->password)
                <div class="flex items-start gap-4 p-4 rounded-2xl bg-blue-50/50 border border-blue-100 text-blue-800 mb-8">
                    <div class="shrink-0 pt-0.5">
                        <svg class="w-6 h-6 text-blue-500" viewBox="0 0 24 24" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <div>
                        <div class="font-bold mb-1">Tài khoản liên kết Google</div>
                        <div class="text-sm font-medium opacity-80">Bạn đang đăng nhập bằng Google. Hãy đặt mật khẩu mới để có thể đăng nhập bằng email trong tương lai.</div>
                    </div>
                </div>

                <form action="{{ route('customers.password.update') }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Mật khẩu mới <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="password" id="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium pr-10" required minlength="8" placeholder="Ít nhất 8 ký tự">
                            <button type="button" onclick="togglePassword('password')" class="absolute top-1/2 right-3 -translate-y-1/2 p-1 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Xác nhận mật khẩu mới <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium pr-10" required placeholder="Nhập lại mật khẩu mới">
                            <button type="button" onclick="togglePassword('password_confirmation')" class="absolute top-1/2 right-3 -translate-y-1/2 p-1 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-4 pt-6 border-t border-slate-100">
                        <a href="{{ route('customers.profile.detail') }}" class="px-6 py-3 bg-white text-slate-600 font-bold rounded-xl border border-slate-200 shadow-sm hover:border-slate-300 hover:text-slate-900 transition-colors">
                            Hủy bỏ
                        </a>
                        <button type="submit" class="group flex items-center gap-2 px-8 py-3 bg-slate-900 text-white font-bold rounded-xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all">
                            Tạo mật khẩu
                        </button>
                    </div>
                </form>

            @else
                <form action="{{ route('customers.password.update') }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Mật khẩu hiện tại <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="current_password" id="current_password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium pr-10" required>
                            <button type="button" onclick="togglePassword('current_password')" class="absolute top-1/2 right-3 -translate-y-1/2 p-1 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Mật khẩu mới <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="password" id="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium pr-10" required minlength="8" placeholder="Ít nhất 8 ký tự">
                            <button type="button" onclick="togglePassword('password')" class="absolute top-1/2 right-3 -translate-y-1/2 p-1 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Xác nhận mật khẩu mới <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium pr-10" required placeholder="Nhập lại mật khẩu mới">
                            <button type="button" onclick="togglePassword('password_confirmation')" class="absolute top-1/2 right-3 -translate-y-1/2 p-1 text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-4 pt-6 border-t border-slate-100">
                        <a href="{{ route('customers.profile.detail') }}" class="px-6 py-3 bg-white text-slate-600 font-bold rounded-xl border border-slate-200 shadow-sm hover:border-slate-300 hover:text-slate-900 transition-colors">
                            Hủy bỏ
                        </a>
                        <button type="submit" class="group flex items-center gap-2 px-8 py-3 bg-slate-900 text-white font-bold rounded-xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all">
                            Đổi mật khẩu
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        if (field.type === 'password') {
            field.type = 'text';
            /* optionally change the svg icon here to eye-off */
        } else {
            field.type = 'password';
        }
    }
</script>
@endpush
