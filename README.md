# ⚡ FlashTech - E-Commerce Technology Store

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/MongoDB-6.0-green?style=for-the-badge&logo=mongodb" alt="MongoDB">
  <img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge" alt="License">
</p>

## 📖 Giới thiệu

**FlashTech** là hệ thống website bán lẻ công nghệ (E-Commerce) được xây dựng trên nền tảng **Laravel 12** và **MongoDB**. Dự án cung cấp đầy đủ tính năng quản lý sản phẩm, đơn hàng, khách hàng với giao diện hiện đại và trải nghiệm người dùng tối ưu.

### ✨ Tính năng chính

#### 🔐 Hệ thống xác thực & phân quyền
- Đăng nhập/Đăng xuất
- Phân quyền người dùng: Admin, Moderator, Employee
- Bảo vệ routes theo vai trò

#### 👥 Quản lý người dùng
- CRUD người dùng đầy đủ
- Gán vai trò và phân quyền
- Xóa hàng loạt (Bulk Delete)
- Tìm kiếm và lọc người dùng

#### 🏢 Quản lý thương hiệu (Brands)
- Thêm, sửa, xóa thương hiệu
- Kích hoạt/Vô hiệu hóa thương hiệu
- Tích hợp với sản phẩm

#### 📦 Quản lý sản phẩm (Products)
- CRUD sản phẩm với thông tin đầy đủ
- Upload hình ảnh sản phẩm
- Quản lý thông số kỹ thuật (Specifications)
- Phân loại theo danh mục: Smartphone, Laptop, Tablet, Computer, Accessory
- Màu sắc sản phẩm
- Giá gốc, giá khuyến mãi
- Quản lý tồn kho
- Sản phẩm nổi bật (Featured)
- Lọc theo thương hiệu, danh mục, trạng thái

#### 👤 Quản lý khách hàng (Customers)
- CRUD thông tin khách hàng
- Theo dõi lịch sử mua hàng
- Tìm kiếm và lọc khách hàng

#### 🎨 Giao diện người dùng (Customer Frontend)
- **Homepage**: 
  - Hero banner với gradient động
  - Danh mục sản phẩm với số lượng thống kê
  - Sản phẩm nổi bật
  - Phân loại sản phẩm theo từng danh mục
  - Flash sale countdown timer
  - Thương hiệu đối tác
- **Product Cards**:
  - Badges (Hot, Sale, New)
  - Wishlist & Quick view
  - Rating & Reviews
  - Discount calculator
  - Stock status
- **Header**: 
  - Top bar với hotline và liên kết
  - Logo với animation
  - Search bar với gradient effect
  - Cart & Wishlist badges
  - Mobile responsive menu
- **Footer**:
  - 4 columns layout
  - Social media links
  - Newsletter subscription
  - Payment methods
  - Back to top button

#### 📊 Dashboard
- Thống kê tổng quan
- Biểu đồ và báo cáo

### 🛠️ Công nghệ sử dụng

#### Backend
- **Framework**: Laravel 12.x
- **Database**: MongoDB 6.0+
- **ODM**: Laravel MongoDB (jenssegers/mongodb)
- **Authentication**: Laravel Breeze/Custom
- **Validation**: Form Request Validation
- **Storage**: Laravel File Storage

#### Frontend
- **Template Engine**: Blade
- **CSS**: Custom CSS với CSS Variables
- **JavaScript**: Vanilla JS
- **Icons**: SVG Icons
- **Fonts**: Google Fonts (Inter)
- **Animations**: CSS Animations (Keyframes)

#### UI/UX Features
- Gradient backgrounds
- Shimmer effects
- Smooth animations
- Responsive design
- Mobile-first approach
- Modern card layouts
- Hover effects
- Loading states

## 📋 Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- MongoDB >= 6.0
- MongoDB PHP Extension
- Node.js & NPM (cho asset compilation)
- Web Server (Apache/Nginx)

## 🚀 Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/FlashTM123/FlashTechMongo.git
cd FlashTechMongo
```

### 2. Cài đặt dependencies

```bash
composer install
npm install
```

### 3. Cấu hình môi trường

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Cấu hình MongoDB trong `.env`

```env
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=flashtech
DB_USERNAME=
DB_PASSWORD=
```

### 5. Chạy migrations & seeders

```bash
php artisan migrate
php artisan db:seed
```

### 6. Tạo symbolic link cho storage

```bash
php artisan storage:link
```

### 7. Build assets

```bash
npm run dev
# hoặc cho production
npm run build
```

### 8. Chạy server

```bash
php artisan serve
```

Truy cập: `http://localhost:8000`

## 👤 Tài khoản mặc định

Sau khi seed database, bạn có thể đăng nhập với:

**Admin Account:**
- Email: `admin@flashtech.vn`
- Password: `password`

**Employee Account:**
- Email: `employee@flashtech.vn`
- Password: `password`

**Moderator Account:**
- Email: `moderator@flashtech.vn`
- Password: `password`

## 📁 Cấu trúc thư mục

```
FlashTechMongo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── BrandController.php
│   │   │   ├── CustomerController.php
│   │   │   ├── CustomerHomeController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ProductController.php
│   │   │   └── UserController.php
│   │   ├── Middleware/
│   │   └── Requests/
│   │       ├── StoreProductRequest.php
│   │       └── UpdateProductRequest.php
│   ├── Models/
│   │   ├── Brand.php
│   │   ├── Customer.php
│   │   ├── Product.php
│   │   ├── Specification.php
│   │   └── User.php
│   └── Policies/
│       ├── CustomerPolicy.php
│       └── UserPolicy.php
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── Admins/
│   │   │   ├── Brands/
│   │   │   ├── Customers/
│   │   │   ├── Products/
│   │   │   └── Users/
│   │   └── Customers/
│   │       ├── Components/
│   │       │   └── product-card.blade.php
│   │       ├── Home/
│   │       │   └── home.blade.php
│   │       └── Layouts/
│   │           ├── master.blade.php
│   │           ├── navbar.blade.php
│   │           └── footer.blade.php
│   ├── css/
│   └── js/
└── routes/
    └── web.php
```

## 🎯 Tính năng đã triển khai

### Admin Panel
- ✅ Dashboard với thống kê
- ✅ Quản lý người dùng (CRUD + Bulk actions)
- ✅ Quản lý thương hiệu (CRUD)
- ✅ Quản lý sản phẩm (CRUD + Specifications)
- ✅ Quản lý khách hàng (CRUD)
- ✅ Upload & quản lý hình ảnh
- ✅ Validation form requests
- ✅ Phân quyền theo vai trò

### Customer Frontend
- ✅ Homepage với sản phẩm động
- ✅ Header responsive
- ✅ Footer đầy đủ
- ✅ Product cards component
- ✅ Phân loại sản phẩm theo danh mục
- ✅ Flash sale countdown
- ✅ Animations & Effects

### Database
- ✅ MongoDB integration
- ✅ Migrations
- ✅ Seeders với dữ liệu mẫu
- ✅ Relationships (embedsMany, belongsTo)

## 🔜 Tính năng sắp triển khai

- [ ] Chi tiết sản phẩm
- [ ] Giỏ hàng (Cart)
- [ ] Danh sách yêu thích (Wishlist)
- [ ] Thanh toán (Checkout)
- [ ] Quản lý đơn hàng
- [ ] Tìm kiếm sản phẩm nâng cao
- [ ] Lọc & Sắp xếp sản phẩm
- [ ] Đánh giá & Nhận xét
- [ ] Tài khoản khách hàng
- [ ] Theo dõi đơn hàng
- [ ] Email notifications
- [ ] Export/Import dữ liệu

## 🤝 Đóng góp

Mọi đóng góp đều được chào đón! Vui lòng:

1. Fork repository
2. Tạo branch mới (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Tạo Pull Request

## 📝 License

Dự án được phát hành dưới giấy phép [MIT License](LICENSE).

## 📧 Liên hệ

- **Author**: FlashTM123 (Trương Minh)
- **Email**: nhatduong019@gmail.com
- **GitHub**: [https://github.com/FlashTM123/FlashTechMongo](https://github.com/FlashTM123/FlashTechMongo)

---

<p align="center">Made with ❤️ by FlashTM123</p>
