@extends('Admins.app')
@section('title', 'Chỉnh sửa sản phẩm ' . $product->name)
@section('content')

<div class="create-product-page">
    <div class="page-header">
        <div class="header-left">
            <a href="{{ route('products.index') }}" class="back-button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Quay lại
            </a>
            <div class="header-badge" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                CHỈNH SỬA
            </div>
            <h1 style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Chỉnh sửa sản phẩm</h1>
            <p>Cập nhật thông tin sản phẩm: <strong>{{ $product->name }}</strong></p>
        </div>
    </div>

    <form action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <!-- Left Column: Basic Info -->
            <div class="form-section">
                <div class="section-header">
                    <h2>📋 Thông tin cơ bản</h2>
                </div>

                <div class="form-group">
                    <label for="name" class="form-label required">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-input" placeholder="VD: iPhone 15 Pro Max" required>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug" class="form-label">Slug (URL thân thiện)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" class="form-input" placeholder="Tự động tạo từ tên sản phẩm">
                    <small class="form-hint">Để trống để tự động tạo từ tên sản phẩm</small>
                    @error('slug')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sku" class="form-label required">Mã SKU</label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" class="form-input" placeholder="VD: IP15PM-256GB-BLK" required>
                    @error('sku')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color" class="form-label">Màu sắc</label>
                    <input type="text" id="color" name="color" value="{{ old('color', $product->color) }}" class="form-input" placeholder="VD: Titan Đen, Trắng ngà, Xanh thiên thanh">
                    @error('color')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand_id" class="form-label required">Thương hiệu</label>
                    <select id="brand_id" name="brand_id" class="form-select" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ (old('brand_id', $product->brand_id) == $brand->id) ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category" class="form-label required">Danh mục</label>
                    <select id="category" name="category" class="form-select" required>
                        <option value="">-- Chọn danh mục --</option>
                        <option value="Smartphone" {{ old('category', $product->category) == 'Smartphone' ? 'selected' : '' }}>📱 Smartphone</option>
                        <option value="Tablet" {{ old('category', $product->category) == 'Tablet' ? 'selected' : '' }}>📲 Tablet</option>
                        <option value="Laptop" {{ old('category', $product->category) == 'Laptop' ? 'selected' : '' }}>💻 Laptop</option>
                        <option value="Computer" {{ old('category', $product->category) == 'Computer' ? 'selected' : '' }}>🖥️ Computer</option>
                        <option value="Accessory" {{ old('category', $product->category) == 'Accessory' ? 'selected' : '' }}>🎧 Accessory</option>
                        <option value="Component" {{ old('category', $product->category) == 'Component' ? 'selected' : '' }}>🛠️ Component</option>
                        <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>📦 Other</option>
                    </select>
                    @error('category')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price" class="form-label required">Giá bán (VNĐ)</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="form-input" placeholder="29990000" step="1000" required>
                        @error('price')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sale_price" class="form-label">Giá khuyến mãi (VNĐ)</label>
                        <input type="number" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" class="form-input" placeholder="25990000" step="1000">
                        @error('sale_price')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock_quantity" class="form-label required">Số lượng tồn kho</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-input" min="0" required>
                    @error('stock_quantity')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Mô tả sản phẩm</label>
                    <textarea id="description" name="description" rows="6" class="form-textarea" placeholder="Nhập mô tả chi tiết về sản phẩm...">{{ old('description', $product->description) }}</textarea>
                    <div class="char-counter">
                        <span id="desc-count">{{ strlen($product->description ?? '') }}</span>/1000 ký tự
                    </div>
                    @error('description')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                        <span class="checkbox-text">⭐ Đánh dấu là sản phẩm nổi bật</span>
                    </label>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                        <span class="checkbox-text">✅ Kích hoạt sản phẩm</span>
                    </label>
                </div>
            </div>

            <!-- Right Column: Images & Specifications -->
            <div class="form-section">
                <!-- Main Image Upload -->
                <div class="section-header">
                    <h2>🖼️ Hình ảnh sản phẩm</h2>
                </div>

                <div class="form-group">
                    <label class="form-label">Hình ảnh chính</label>
                    @if($product->image)
                    <div class="current-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <p class="form-hint">Ảnh hiện tại - Tải ảnh mới để thay thế</p>
                    </div>
                    @endif
                    <div class="image-upload-area" id="mainImageArea">
                        <input type="file" id="mainImage" name="image" accept="image/*" hidden>
                        <div class="upload-placeholder">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <p>Kéo thả hoặc click để tải ảnh mới</p>
                            <span class="upload-hint">PNG, JPG tối đa 5MB</span>
                        </div>
                        <div class="image-preview" id="mainImagePreview" style="display: none;">
                            <img src="" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeMainImage()">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('image')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Thư viện ảnh (Tùy chọn)</label>
                    @if($product->images && count($product->images) > 0)
                    <div class="current-gallery">
                        <p class="form-hint">{{ count($product->images) }} ảnh hiện có trong thư viện</p>
                    </div>
                    @endif
                    <div class="gallery-upload">
                        <input type="file" id="galleryImages" name="images[]" accept="image/*" multiple hidden>
                        <button type="button" class="upload-gallery-btn" onclick="document.getElementById('galleryImages').click()">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Thêm ảnh mới vào thư viện
                        </button>
                        <div class="gallery-preview" id="galleryPreview"></div>
                    </div>
                </div>

                <!-- Specifications Section -->
                <div class="section-header">
                    <h2>⚙️ Thông số kỹ thuật</h2>
                </div>

                <div id="specificationsContainer">
                    @foreach($product->specifications as $spec)
                    <div class="spec-item">
                        <input type="hidden" name="existing_specs[{{ $spec->id }}][id]" value="{{ $spec->id }}">
                        <div class="form-group">
                            <label class="form-label">Tên thông số</label>
                            <input type="text" name="existing_specs[{{ $spec->id }}][label]" class="form-input" value="{{ $spec->label }}" placeholder="VD: RAM, CPU, Màn hình">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Giá trị</label>
                            <input type="text" name="existing_specs[{{ $spec->id }}][value]" class="form-input" value="{{ $spec->value }}" placeholder="VD: 8, Intel Core i7">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Đơn vị</label>
                            <input type="text" name="existing_specs[{{ $spec->id }}][unit]" class="form-input" value="{{ $spec->unit }}" placeholder="VD: GB, GHz">
                        </div>
                        <button type="button" class="spec-remove-btn" onclick="removeExistingSpecification(this, {{ $spec->id }})">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>

                <button type="button" class="add-spec-btn" onclick="addSpecification()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Thêm thông số mới
                </button>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                Hủy bỏ
            </a>
            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); box-shadow: 0 8px 25px rgba(245, 158, 11, 0.35);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Cập nhật sản phẩm
            </button>
        </div>

        <!-- Hidden input to track deleted specs -->
        <input type="hidden" name="deleted_specs" id="deletedSpecs" value="">
    </form>
</div>

<style>
    :root {
        --primary: #667eea;
        --primary-dark: #764ba2;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --gray-100: #f8fafc;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-600: #475569;
        --gray-700: #334155;
        --gray-900: #1e293b;
    }

    .create-product-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        animation: pageLoad 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Page Header */
    .page-header {
        margin-bottom: 3rem;
    }

    .header-left {
        max-width: 600px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-600);
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 1rem;
        transition: all 0.3s;
    }

    .back-button:hover {
        color: var(--warning);
        transform: translateX(-4px);
    }

    .header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        color: white;
        border-radius: 0.75rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 1rem;
        animation: badgePop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes badgePop {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .header-left h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
        letter-spacing: -1px;
    }

    .header-left p {
        color: var(--gray-600);
        font-size: 1.125rem;
        font-weight: 500;
    }

    /* Form Layout */
    .product-form {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .form-section {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .section-header {
        margin-bottom: 0.5rem;
    }

    .section-header h2 {
        font-size: 1.375rem;
        font-weight: 800;
        color: var(--gray-900);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Form Controls */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--gray-700);
        font-size: 0.9375rem;
    }

    .form-label.required::after {
        content: ' *';
        color: var(--danger);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.875rem 1.125rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.75rem;
        font-size: 1rem;
        color: var(--gray-900);
        background: white;
        transition: all 0.3s;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--warning);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
    }

    .form-textarea {
        resize: vertical;
        font-family: inherit;
    }

    .form-hint {
        font-size: 0.8125rem;
        color: var(--gray-600);
    }

    .error-message {
        color: var(--danger);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .char-counter {
        text-align: right;
        font-size: 0.8125rem;
        color: var(--gray-600);
        margin-top: 0.25rem;
    }

    /* Checkbox */
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        cursor: pointer;
        padding: 1rem;
        border: 2px solid var(--gray-200);
        border-radius: 0.75rem;
        transition: all 0.3s;
    }

    .checkbox-label:hover {
        border-color: var(--warning);
        background: rgba(245, 158, 11, 0.05);
    }

    .checkbox-label input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: var(--warning);
    }

    .checkbox-text {
        font-weight: 600;
        color: var(--gray-700);
        font-size: 0.9375rem;
    }

    /* Current Image */
    .current-image {
        margin-bottom: 1rem;
        border-radius: 1rem;
        overflow: hidden;
        border: 2px solid var(--gray-200);
    }

    .current-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .current-gallery {
        margin-bottom: 0.5rem;
    }

    /* Image Upload */
    .image-upload-area {
        position: relative;
        border: 3px dashed var(--gray-300);
        border-radius: 1rem;
        padding: 3rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: var(--gray-100);
    }

    .image-upload-area:hover {
        border-color: var(--warning);
        background: rgba(245, 158, 11, 0.05);
    }

    .upload-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        color: var(--gray-600);
    }

    .upload-placeholder svg {
        color: var(--gray-400);
    }

    .upload-placeholder p {
        font-weight: 600;
        font-size: 1.0625rem;
    }

    .upload-hint {
        font-size: 0.875rem;
        color: var(--gray-600);
    }

    .image-preview {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
    }

    .image-preview img {
        width: 100%;
        height: auto;
        display: block;
    }

    .remove-image {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .remove-image:hover {
        background: var(--danger);
        transform: scale(1.1);
    }

    /* Gallery Upload */
    .gallery-upload {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .upload-gallery-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.5rem;
        background: linear-gradient(135deg, var(--gray-100) 0%, var(--gray-200) 100%);
        border: 2px solid var(--gray-300);
        border-radius: 0.75rem;
        font-weight: 600;
        color: var(--gray-700);
        cursor: pointer;
        transition: all 0.3s;
    }

    .upload-gallery-btn:hover {
        border-color: var(--warning);
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning);
    }

    .gallery-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 1rem;
    }

    .gallery-item {
        position: relative;
        aspect-ratio: 1;
        border-radius: 0.75rem;
        overflow: hidden;
        border: 2px solid var(--gray-200);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-item .remove-image {
        width: 32px;
        height: 32px;
        top: 0.5rem;
        right: 0.5rem;
    }

    /* Specifications */
    .spec-item {
        display: grid;
        grid-template-columns: 1fr 1fr 0.8fr auto;
        gap: 0.75rem;
        align-items: end;
        padding: 1.25rem;
        background: var(--gray-100);
        border-radius: 0.75rem;
        border: 2px solid var(--gray-200);
        transition: all 0.3s;
    }

    .spec-item:hover {
        border-color: var(--warning);
        background: rgba(245, 158, 11, 0.05);
    }

    .spec-remove-btn {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: var(--danger);
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .spec-remove-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .add-spec-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 1.75rem;
        background: linear-gradient(135deg, var(--gray-100) 0%, var(--gray-200) 100%);
        border: 2px dashed var(--gray-300);
        border-radius: 0.75rem;
        font-weight: 600;
        color: var(--gray-700);
        cursor: pointer;
        transition: all 0.3s;
        font-size: 1rem;
    }

    .add-spec-btn:hover {
        border-color: var(--warning);
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning);
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 2px solid var(--gray-200);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        padding: 1rem 2rem;
        border: none;
        border-radius: 0.875rem;
        font-weight: 600;
        font-size: 1.0625rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-primary {
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(245, 158, 11, 0.45);
    }

    .btn-secondary {
        background: var(--gray-200);
        color: var(--gray-700);
    }

    .btn-secondary:hover {
        background: var(--gray-300);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .create-product-page {
            padding: 1rem;
        }

        .product-form {
            padding: 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .spec-item {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }
    }
</style>

<script>
    let specCount = {{ count($product->specifications) }};
    let deletedSpecs = [];

    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('slug').value = slug;
    });

    // Character counter for description
    const descTextarea = document.getElementById('description');
    const descCount = document.getElementById('desc-count');

    descTextarea.addEventListener('input', function() {
        const count = this.value.length;
        descCount.textContent = count;
        if (count > 1000) {
            descCount.style.color = 'var(--danger)';
        } else {
            descCount.style.color = 'var(--gray-600)';
        }
    });

    // Main image upload
    const mainImageArea = document.getElementById('mainImageArea');
    const mainImageInput = document.getElementById('mainImage');
    const mainImagePreview = document.getElementById('mainImagePreview');

    mainImageArea.addEventListener('click', () => mainImageInput.click());

    mainImageArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        mainImageArea.style.borderColor = 'var(--warning)';
        mainImageArea.style.background = 'rgba(245, 158, 11, 0.1)';
    });

    mainImageArea.addEventListener('dragleave', () => {
        mainImageArea.style.borderColor = 'var(--gray-300)';
        mainImageArea.style.background = 'var(--gray-100)';
    });

    mainImageArea.addEventListener('drop', (e) => {
        e.preventDefault();
        mainImageArea.style.borderColor = 'var(--gray-300)';
        mainImageArea.style.background = 'var(--gray-100)';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            mainImageInput.files = files;
            previewMainImage(files[0]);
        }
    });

    mainImageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            previewMainImage(this.files[0]);
        }
    });

    function previewMainImage(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            mainImagePreview.querySelector('img').src = e.target.result;
            mainImageArea.querySelector('.upload-placeholder').style.display = 'none';
            mainImagePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }

    function removeMainImage() {
        mainImageInput.value = '';
        mainImagePreview.style.display = 'none';
        mainImageArea.querySelector('.upload-placeholder').style.display = 'flex';
    }

    // Gallery images upload
    const galleryInput = document.getElementById('galleryImages');
    const galleryPreview = document.getElementById('galleryPreview');

    galleryInput.addEventListener('change', function() {
        galleryPreview.innerHTML = '';
        Array.from(this.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'gallery-item';
                div.innerHTML = `
                    <img src="${e.target.result}" alt="Gallery ${index + 1}">
                    <button type="button" class="remove-image" onclick="removeGalleryImage(${index})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                `;
                galleryPreview.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    });

    function removeGalleryImage(index) {
        const dt = new DataTransfer();
        const files = Array.from(galleryInput.files);
        files.splice(index, 1);
        files.forEach(file => dt.items.add(file));
        galleryInput.files = dt.files;
        galleryInput.dispatchEvent(new Event('change'));
    }

    // Add specification
    function addSpecification() {
        specCount++;
        const container = document.getElementById('specificationsContainer');
        const specItem = document.createElement('div');
        specItem.className = 'spec-item';
        specItem.innerHTML = `
            <div class="form-group">
                <label class="form-label">Tên thông số</label>
                <input type="text" name="specifications[${specCount}][label]" class="form-input" placeholder="VD: RAM, CPU, Màn hình">
            </div>
            <div class="form-group">
                <label class="form-label">Giá trị</label>
                <input type="text" name="specifications[${specCount}][value]" class="form-input" placeholder="VD: 8, Intel Core i7">
            </div>
            <div class="form-group">
                <label class="form-label">Đơn vị</label>
                <input type="text" name="specifications[${specCount}][unit]" class="form-input" placeholder="VD: GB, GHz">
            </div>
            <button type="button" class="spec-remove-btn" onclick="removeSpecification(this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        `;
        container.appendChild(specItem);
    }

    function removeSpecification(btn) {
        btn.closest('.spec-item').remove();
    }

    function removeExistingSpecification(btn, specId) {
        deletedSpecs.push(specId);
        document.getElementById('deletedSpecs').value = deletedSpecs.join(',');
        btn.closest('.spec-item').remove();
    }
</script>

@endsection
