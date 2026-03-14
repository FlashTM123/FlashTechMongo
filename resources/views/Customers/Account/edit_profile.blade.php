@extends('Customers.Layouts.master')
@section('title', 'Chỉnh sửa hồ sơ - FlashTech')

@push('styles')
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
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
            --white: #ffffff;
        }

        .edit-profile-page {
            background: var(--gray-50);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .breadcrumb a { color: var(--gray-600); text-decoration: none; }
        .breadcrumb a:hover { color: var(--primary); }
        .breadcrumb .current { color: var(--dark); font-weight: 500; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title svg { width: 26px; height: 26px; color: var(--primary); }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
            transition: all 0.2s;
        }

        .btn-back:hover { border-color: var(--primary); color: var(--primary); }
        .btn-back svg { width: 16px; height: 16px; }

        .form-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .form-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-card-header h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-card-header h3 svg { width: 20px; height: 20px; color: var(--primary); }

        .form-card-body { padding: 1.5rem; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }
        .form-group.full-width { grid-column: 1 / -1; }

        .form-label {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--gray-700);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.875rem;
            color: var(--dark);
            background: var(--white);
            transition: border-color 0.2s;
            outline: none;
            box-sizing: border-box;
        }

        .form-control:focus { border-color: var(--primary); }
        .form-control:disabled { background: var(--gray-50); color: var(--gray-400); cursor: not-allowed; }

        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.875rem;
            color: var(--dark);
            background: var(--white);
            transition: border-color 0.2s;
            outline: none;
            cursor: pointer;
            box-sizing: border-box;
        }

        .form-select:focus { border-color: var(--primary); }

        .form-error {
            font-size: 0.75rem;
            color: var(--danger);
            margin-top: 0.25rem;
        }

        /* Avatar upload */
        .avatar-upload {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--gray-200);
            flex-shrink: 0;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--white);
        }

        .avatar-actions { display: flex; flex-direction: column; gap: 0.5rem; }

        .btn-upload {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary);
            border-radius: 8px;
            color: var(--primary);
            font-size: 0.8125rem;
            font-weight: 600;
            cursor: pointer;
            background: var(--white);
            transition: all 0.2s;
        }

        .btn-upload:hover { background: var(--primary); color: var(--white); }
        .btn-upload svg { width: 16px; height: 16px; }

        .avatar-hint {
            font-size: 0.75rem;
            color: var(--gray-400);
        }

        #avatar-input { display: none; }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-100);
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
        }

        .btn-submit:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(102,126,234,0.4); }
        .btn-submit svg { width: 18px; height: 18px; }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
            background: var(--white);
            transition: all 0.2s;
        }

        .btn-cancel:hover { border-color: var(--gray-300); color: var(--dark); }

        .alert-success {
            padding: 1rem 1.25rem;
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.2);
            border-radius: 10px;
            color: #065f46;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-error {
            padding: 1rem 1.25rem;
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.2);
            border-radius: 10px;
            color: #991b1b;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 640px) {
            .form-grid { grid-template-columns: 1fr; }
            .avatar-upload { flex-direction: column; text-align: center; }
        }
    </style>
@endpush

@section('content')
    <div class="edit-profile-page">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span>›</span>
                <a href="{{ route('customers.profile.detail') }}">Hồ sơ</a>
                <span>›</span>
                <span class="current">Chỉnh sửa</span>
            </div>

            <div class="page-header">
                <h1 class="page-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Chỉnh sửa hồ sơ
                </h1>
                <a href="{{ route('customers.profile.detail') }}" class="btn-back">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5m7-7l-7 7 7 7"/>
                    </svg>
                    Quay lại
                </a>
            </div>



            @if($errors->any())
                <!-- Error alerts removed -->
                <div style="display:none;">
                    <ul style="margin:0;padding-left:1.25rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customers.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Avatar -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h3>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            Ảnh đại diện
                        </h3>
                    </div>
                    <div class="form-card-body">
                        <div class="avatar-upload">
                            <div class="avatar-preview" id="avatar-preview">
                                @if($customer->profile_picture_url)
                                    <img src="{{ $customer->profile_picture_url }}" alt="{{ $customer->full_name }}" id="preview-img">
                                @else
                                    <div class="avatar-placeholder" id="preview-placeholder">{{ substr($customer->full_name, 0, 1) }}</div>
                                @endif
                            </div>
                            <div class="avatar-actions">
                                <label for="avatar-input" class="btn-upload">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                                    </svg>
                                    Chọn ảnh
                                </label>
                                <input type="file" id="avatar-input" name="profile_picture" accept="image/*">
                                <span class="avatar-hint">JPG, PNG. Tối đa 2MB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal Info -->
                <div class="form-card">
                    <div class="form-card-header">
                        <h3>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Thông tin cá nhân
                        </h3>
                    </div>
                    <div class="form-card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Mã khách hàng</label>
                                <input type="text" class="form-control" value="{{ $customer->customer_code }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $customer->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="full_name">Họ và tên *</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                                @error('full_name') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone_number">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}">
                                @error('phone_number') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="date_of_birth">Ngày sinh</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}">
                                @error('date_of_birth') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="gender">Giới tính</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">-- Chọn --</option>
                                    <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                                    <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                                    <option value="other" {{ old('gender', $customer->gender) == 'other' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('gender') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label" for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $customer->address) }}">
                                @error('address') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('customers.profile.detail') }}" class="btn-cancel">Hủy</a>
                            <button type="submit" class="btn-submit">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                                    <polyline points="17 21 17 13 7 13 7 21"/>
                                    <polyline points="7 3 7 8 15 8"/>
                                </svg>
                                Lưu thay đổi
                            </button>
                        </div>
                    </div>
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
                e.target.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(ev) {
                const preview = document.getElementById('avatar-preview');
                preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview" id="preview-img">';
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush
