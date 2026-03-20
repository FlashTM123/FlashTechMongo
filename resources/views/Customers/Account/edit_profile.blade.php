@extends('Customers.Layouts.master')

@section('title', 'Chỉnh sửa hồ sơ - FlashTech Premium')

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
            <span class="text-white font-bold tracking-wide">Chỉnh sửa</span>
        </nav>

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">Chỉnh Sửa Hồ Sơ</h1>
            <a href="{{ route('customers.profile.detail') }}" class="flex items-center gap-2 px-5 py-2.5 bg-white text-slate-600 font-bold rounded-xl shadow-sm border border-slate-200 hover:text-indigo-600 hover:border-indigo-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Trở lại
            </a>
        </div>

        @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-600 rounded-2xl p-4 mb-8">
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

        <form action="{{ route('customers.profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-8">
            @csrf
            @method('PUT')

            <!-- Avatar Section -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-slate-800">Ảnh đại diện</h3>
                        <p class="text-sm font-medium text-slate-500">Cập nhật ảnh hồ sơ cá nhân của bạn</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-8">
                    <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-slate-100 bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center overflow-hidden shrink-0 shadow-inner relative group" id="avatar-preview">
                        @if($customer->profile_picture_url)
                            <img src="{{ $customer->profile_picture_url }}" alt="{{ $customer->full_name }}" class="w-full h-full object-cover" id="preview-img">
                        @else
                            <div class="text-4xl font-black text-white" id="preview-placeholder">{{ substr($customer->full_name, 0, 1) }}</div>
                        @endif
                        <div class="absolute inset-0 bg-slate-900/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center sm:items-start gap-2">
                        <label for="avatar-input" class="cursor-pointer bg-white text-indigo-600 font-bold px-6 py-2.5 rounded-xl border-2 border-indigo-100 hover:border-indigo-600 hover:bg-indigo-50 transition-colors shadow-sm inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Tải ảnh mới
                        </label>
                        <input type="file" id="avatar-input" name="profile_picture" accept="image/jpeg,image/png,image/gif" class="hidden">
                        <span class="text-xs font-medium text-slate-400">Định dạng JPG, PNG hoặc GIF. Tối đa 2MB</span>
                    </div>
                </div>
            </div>

            <!-- Personal Info Section -->
            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-slate-800">Thông tin cá nhân</h3>
                        <p class="text-sm font-medium text-slate-500">Thông tin cơ bản để chúng tôi liên hệ và giao hàng</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Mã khách hàng</label>
                        <input type="text" value="{{ $customer->customer_code }}" class="w-full bg-slate-100 border border-slate-200 rounded-xl px-4 py-3 outline-none font-bold text-slate-500 cursor-not-allowed" disabled>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <input type="email" value="{{ $customer->email }}" class="w-full bg-slate-100 border border-slate-200 rounded-xl px-4 py-3 outline-none font-bold text-slate-500 cursor-not-allowed" disabled>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Họ và tên <span class="text-rose-500">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name', $customer->full_name) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Số điện thoại</label>
                        <input type="tel" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Ngày sinh</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Giới tính</label>
                        <select name="gender" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 text-sm cursor-pointer appearance-none">
                            <option value="" class="font-medium">-- Chọn giới tính --</option>
                            <option value="male" class="font-bold text-slate-800 py-2" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" class="font-bold text-slate-800 py-2" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" class="font-bold text-slate-800 py-2" {{ old('gender', $customer->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Địa chỉ</label>
                        <input type="text" name="address" value="{{ old('address', $customer->address) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-medium" placeholder="Số nhà, đường, phường/xã, quận/huyện...">
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-4 mt-2">
                <a href="{{ route('customers.profile.detail') }}" class="px-8 py-4 bg-white text-slate-600 font-bold rounded-xl border border-slate-200 shadow-sm hover:border-slate-300 hover:text-slate-900 transition-colors">
                    Hủy bỏ
                </a>
                <button type="submit" class="group flex items-center gap-2 px-8 py-4 bg-slate-900 text-white font-bold rounded-xl shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all">
                    Lưu các thay đổi
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('avatar-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        if (file.size > 2 * 1024 * 1024) {
            alert('File ảnh quá lớn. Vui lòng chọn file dưới 2MB!');
            e.target.value = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = function(ev) {
            const preview = document.getElementById('avatar-preview');
            preview.innerHTML = `<img src="${ev.target.result}" alt="Preview" id="preview-img" class="w-full h-full object-cover">
                                 <div class="absolute inset-0 bg-slate-900/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                     <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                 </div>`;
        };
        reader.readAsDataURL(file);
    });
</script>
@endpush
