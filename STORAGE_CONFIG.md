# ⚡ FlashTech - Storage Configuration

## 📋 Tóm tắt
Tất cả hình ảnh được lưu **LOCAL** trong `storage/app/public/` - **KHÔNG dùng Cloudinary**

## 🔧 Cấu hình

### .env
```env
FILESYSTEM_DISK=public
```

### Symlink (Already created)
```bash
php artisan storage:link
# Tạo: public/storage → storage/app/public
# URL: /storage/path-to-file
```

---

## 📁 Vị trí lưu trữ

| Loại | Thư mục | URL | Controller/Resource |
|------|--------|-----|------------------|
| **Sản phẩm** | `storage/app/public/products/` | `/storage/products/...` | ProductResource, ProductController |
| **Thương hiệu** | `storage/app/public/brands/` | `/storage/brands/...` | BrandResource, BrandController |
| **Avatar Nhân viên** | `storage/app/public/users/` | `/storage/users/...` | UserResource |
| **Avatar Khách hàng** | `storage/app/public/customers/` | `/storage/customers/...` | CustomerResource, CustomerAuthController |

---

## 🛠️ Các file đã sửa

### ✅ Controllers
- **ProductController.php** - `store()`, `update()` → Dùng `Storage::disk('public')`
- **BrandController.php** - Dùng `'public'` disk
- **CustomerAuthController.php** - `register()` lưu profile_picture

### ✅ Filament Resources
- **ProductResource.php** - FileUpload với `disk('public')`
- **BrandResource.php** - FileUpload + comment config
- **UserResource.php** - Avatar upload + comment config
- **CustomerResource.php** - Profile picture FileUpload + comment config

### ✅ Models
- **Users.php** - Thêm `avatar` vào fillable
- **Customer.php** - Hỗ trợ `profile_picture`
- **Product.php** - Comment về storage config
- **Brand.php** - Hỗ trợ logo storage

### ✅ Config
- **config/filesystems.php** - Comment về local/public disk
- **.env** - `FILESYSTEM_DISK=public`

---

## 💾 Cách hiển thị hình ảnh

### Frontend (Blade Template)
```blade
<!-- Products -->
<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
<img src="{{ asset('storage/' . $image) }}" alt="Product image">

<!-- Brands -->
<img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}">

<!-- Users -->
<img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">

<!-- Customers -->
<img src="{{ asset('storage/' . $customer->profile_picture) }}" alt="{{ $customer->full_name }}">
```

### API Response
```json
{
  "product": {
    "name": "iPhone 15",
    "image": "products/abc123.jpg",
    "image_url": "/storage/products/abc123.jpg"
  }
}
```

---

## ⚠️ Lưu ý quan trọng

1. **Không có Cloudinary** - Tất cả upload đều local
2. **Upload size limit** - Max 5-10 MB tùy file
3. **Format support** - jpeg, png, gif, webp, jpg
4. **Backup** - Nhớ backup `storage/app/public/` folder
5. **Permissions** - Folder phải writable (chmod 755+)

---

## 🚀 Testing

```bash
# 1. Kiểm tra symlink
ls -la public/storage  # Phải là link → ../storage/app/public

# 2. Upload qua admin panel
# ProductResource → Add Product → Upload Image

# 3. Kiểm tra URL
# /admin/products → Xem hình có hiển thị không
# /storage/products/... → Truy cập direct URL

# 4. Check file
ls storage/app/public/products/
```

---

## 📝 Changelog

**13/03/2026**
- ✅ Bỏ Fly.io config
- ✅ Sửa ProductController → local storage
- ✅ Thêm FileUpload vào Filament Resources
- ✅ Comment chi tiết về storage config
- ✅ FILESYSTEM_DISK=public
