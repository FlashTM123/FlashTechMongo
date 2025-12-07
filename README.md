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
- CRUD thông tin khách hàng đầy đủ
- Mã khách hàng tự động (Format: KH + YYYYMMDD + 4 số ngẫu nhiên)
- Upload ảnh đại diện khách hàng
- Quản lý thông tin: Họ tên, email, số điện thoại, địa chỉ, ngày sinh, giới tính
- Hiển thị avatar (upload hoặc UI Avatars fallback)
- Điểm tích lũy (Loyalty Points)
- Theo dõi lịch sử mua hàng
- Tìm kiếm và lọc khách hàng
- Xóa hàng loạt

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
- **Header & Navigation**: 
  - Top bar với hotline và liên kết nhanh
  - Logo với animation xoay gradient
  - Search bar với gradient effect và suggestions
  - Cart & Wishlist badges với số lượng
  - User dropdown menu khi đã đăng nhập
  - Mobile responsive hamburger menu
  - Sticky header khi scroll
- **Authentication System**:
  - **Đăng ký khách hàng**:
    - Form đăng ký đầy đủ với 9 trường
    - Mã khách hàng tự động sinh (KH + date + random)
    - Upload ảnh đại diện (max 5MB)
    - Password strength indicator (weak/medium/strong)
    - Password toggle visibility
    - Validation real-time
    - Social login buttons (Google, Facebook)
  - **Đăng nhập khách hàng**:
    - Form đăng nhập compact
    - Remember me checkbox
    - Forgot password link
    - Session-based authentication
  - **User Dropdown Menu** (khi đã đăng nhập):
    - Avatar với ảnh đại diện
    - Tên và email khách hàng
    - Điểm tích lũy (loyalty points)
    - Menu: Tài khoản, Đơn hàng, Yêu thích, Cài đặt
    - Nút đăng xuất
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
- Composer >= 2.0
- MongoDB >= 6.0
- MongoDB PHP Extension (mongodb)
- Node.js >= 18.x & NPM
- Web Server (Apache/Nginx)
- Git

## 🚀 Cài đặt

### Bước 0: Cài đặt MongoDB và MongoDB PHP Extension

#### A. Cài đặt MongoDB Server

**Windows:**
1. Tải MongoDB Community Server: https://www.mongodb.com/try/download/community
2. Chạy installer và làm theo hướng dẫn
3. Chọn "Complete" installation
4. Chọn "Install MongoDB as a Service"
5. Sau khi cài xong, mở Command Prompt và kiểm tra:
```bash
mongod --version
```

**macOS (dùng Homebrew):**
```bash
brew tap mongodb/brew
brew install mongodb-community@6.0
brew services start mongodb-community@6.0
```

**Linux (Ubuntu/Debian):**
```bash
wget -qO - https://www.mongodb.org/static/pgp/server-6.0.asc | sudo apt-key add -
echo "deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/6.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-6.0.list
sudo apt-get update
sudo apt-get install -y mongodb-org
sudo systemctl start mongod
sudo systemctl enable mongod
```

#### B. Cài đặt MongoDB PHP Extension

**Windows:**
1. Xác định phiên bản PHP của bạn:
```bash
php -v
```

2. Tải MongoDB PHP Extension từ: https://pecl.php.net/package/mongodb
   - Chọn phiên bản phù hợp với PHP version, Thread Safety (TS/NTS), và kiến trúc (x64/x86)
   - Ví dụ: `php_mongodb-1.17.2-8.2-ts-x64.zip`

3. Giải nén và copy file `php_mongodb.dll` vào thư mục `ext` của PHP:
   - Thường là: `C:\php\ext\` hoặc `C:\xampp\php\ext\`

4. Mở file `php.ini` và thêm dòng:
```ini
extension=mongodb
```

5. Restart web server (Apache/Nginx) hoặc PHP-FPM

6. Kiểm tra cài đặt:
```bash
php -m | findstr mongodb
```

**macOS:**
```bash
pecl install mongodb
```
Sau đó thêm vào `php.ini`:
```ini
extension=mongodb.so
```

**Linux (Ubuntu/Debian):**
```bash
sudo apt-get install php-dev php-pear
sudo pecl install mongodb
```
Sau đó thêm vào `php.ini` (thường ở `/etc/php/8.2/cli/php.ini` và `/etc/php/8.2/fpm/php.ini`):
```ini
extension=mongodb.so
```
Restart PHP-FPM:
```bash
sudo systemctl restart php8.2-fpm
```

**Kiểm tra MongoDB Extension đã cài thành công:**
```bash
php -r "echo extension_loaded('mongodb') ? 'MongoDB extension installed!' : 'MongoDB extension NOT installed!';"
```

---

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

### 6. Tạo thư mục storage và symbolic link

```bash
# Tạo thư mục cho profile pictures
mkdir storage/app/public/profile_pictures

# Tạo symbolic link
php artisan storage:link
```

**Lưu ý Windows**: Nếu gặp lỗi khi tạo symbolic link, chạy Command Prompt/PowerShell với quyền Administrator

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

### Admin Panel (http://localhost:8000/login)
**Admin Account:**
- Email: `admin@flashtech.vn`
- Password: `password`

**Employee Account:**
- Email: `employee@flashtech.vn`
- Password: `password`

**Moderator Account:**
- Email: `moderator@flashtech.vn`
- Password: `password`

### Customer Frontend (http://localhost:8000)
Khách hàng có thể đăng ký tài khoản mới tại: http://localhost:8000/register

**Hoặc sử dụng tài khoản mẫu** (nếu có trong seeder):
- Email: `customer@example.com`
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
│   │   │   ├── CustomerAuthController.php
│   │   │   ├── CustomerHomeController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ProductController.php
│   │   │   └── UserController.php
│   │   ├── Middleware/
│   │   │   ├── CheckRole.php
│   │   │   └── CustomerLoginMiddleware.php
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
│   │       ├── Account/
│   │       │   ├── login.blade.php
│   │       │   └── register.blade.php
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
- ✅ Quản lý thương hiệu (CRUD + Active/Inactive)
- ✅ Quản lý sản phẩm (CRUD + Specifications + Multiple images)
- ✅ Quản lý khách hàng (CRUD + Avatar upload + Bulk delete)
- ✅ Upload & quản lý hình ảnh (Storage system)
- ✅ Validation form requests (Frontend + Backend)
- ✅ Phân quyền theo vai trò (Admin, Moderator, Employee)
- ✅ Authentication system với session

### Customer Frontend
- ✅ Homepage với sản phẩm động
- ✅ Header responsive với sticky navigation
- ✅ Navbar với user dropdown menu
- ✅ Footer đầy đủ (4 columns + Social + Newsletter)
- ✅ Product cards component với badges và effects
- ✅ Phân loại sản phẩm theo danh mục
- ✅ Flash sale countdown timer
- ✅ Animations & Gradient effects
- ✅ Mobile hamburger menu
- ✅ Search bar với suggestions

### Customer Authentication
- ✅ **Đăng ký khách hàng**:
  - Form đầy đủ (Full name, Email, Phone, Address, DOB, Gender, Password, Avatar)
  - Mã khách hàng tự động (KH + YYYYMMDD + 4 digits)
  - Upload ảnh đại diện (max 5MB)
  - Password strength indicator
  - Password visibility toggle
  - Email uniqueness validation
  - Custom Vietnamese error messages
- ✅ **Đăng nhập khách hàng**:
  - Email & Password authentication
  - Remember me functionality
  - Session-based authentication
  - Redirect after login
- ✅ **User Profile Dropdown**:
  - Avatar display (uploaded or UI Avatars fallback)
  - User name and email
  - Loyalty points display
  - Quick links (Account, Orders, Wishlist, Settings)
  - Logout functionality
- ✅ **Session Management**:
  - Customer session storage
  - Auto-redirect khi chưa đăng nhập
  - Persistent login state

### Database
- ✅ MongoDB integration với jenssegers/mongodb
- ✅ Migrations cho tất cả collections
- ✅ Seeders với dữ liệu mẫu (Users, Brands, Products, Customers)
- ✅ Relationships (embedsMany, belongsTo)
- ✅ Indexes cho performance
- ✅ Unique constraints (email, customer_code)

## 🔜 Tính năng sắp triển khai

### Frontend Features
- [ ] Chi tiết sản phẩm (Product Detail Page)
- [ ] Giỏ hàng (Shopping Cart)
- [ ] Danh sách yêu thích (Wishlist)
- [ ] So sánh sản phẩm (Product Compare)
- [ ] Tìm kiếm sản phẩm nâng cao với filters
- [ ] Lọc & Sắp xếp sản phẩm (Price, Name, Rating)
- [ ] Phân trang sản phẩm

### Customer Account
- [ ] Trang tài khoản khách hàng (Profile Page)
- [ ] Chỉnh sửa thông tin cá nhân
- [ ] Đổi mật khẩu
- [ ] Quản lý địa chỉ giao hàng
- [ ] Lịch sử đơn hàng
- [ ] Theo dõi đơn hàng (Order Tracking)
- [ ] Quên mật khẩu & Reset password
- [ ] Email verification

### Order Management
- [ ] Thanh toán (Checkout Process)
- [ ] Quản lý đơn hàng (Admin)
- [ ] Cập nhật trạng thái đơn hàng
- [ ] In hóa đơn (Invoice)
- [ ] Xử lý hoàn trả (Returns)

### Product Features
- [ ] Đánh giá & Nhận xét sản phẩm (Reviews & Ratings)
- [ ] Hình ảnh sản phẩm zoom & gallery
- [ ] Sản phẩm liên quan (Related Products)
- [ ] Sản phẩm đã xem (Recently Viewed)
- [ ] Thông báo hết hàng (Out of Stock Notification)

### Advanced Features
- [ ] Email notifications (Order confirmation, Shipping, etc.)
- [ ] SMS notifications
- [ ] Tích hợp thanh toán online (VNPay, Momo, ZaloPay)
- [ ] Export/Import dữ liệu (Excel, CSV)
- [ ] Báo cáo thống kê nâng cao (Charts & Analytics)
- [ ] Mã giảm giá & Vouchers
- [ ] Flash sale tự động
- [ ] SEO optimization (Meta tags, Sitemap)
- [ ] Multi-language support

### Admin Features
- [ ] Quản lý banner & sliders
- [ ] Quản lý nội dung CMS
- [ ] Quản lý đánh giá (Review moderation)
- [ ] Activity logs
- [ ] Backup & Restore database

## 🤝 Đóng góp

Mọi đóng góp đều được chào đón! Vui lòng:

1. Fork repository
2. Tạo branch mới (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Tạo Pull Request

## 🐛 Xử lý sự cố thường gặp

### MongoDB Connection Error
```
SQLSTATE[HY000]: SCRAM failure: bad auth
```
**Giải pháp**: Kiểm tra username/password trong `.env`, hoặc để trống nếu MongoDB không có authentication:
```env
DB_USERNAME=
DB_PASSWORD=
```

### Storage Link Error (Windows)
```
symlink(): Cannot create symlink, error code(1314)
```
**Giải pháp**: Chạy Command Prompt/PowerShell với quyền Administrator rồi chạy lại:
```bash
php artisan storage:link
```

### MongoDB Extension Not Loaded
```
Class 'MongoDB\Driver\Manager' not found
```
**Giải pháp**: 
1. Kiểm tra MongoDB extension đã cài: `php -m | findstr mongodb`
2. Đảm bảo đã thêm `extension=mongodb` vào `php.ini`
3. Restart web server

### Composer MongoDB Package Error
```
Your requirements could not be resolved to an installable set of packages
```
**Giải pháp**: Cài đặt MongoDB extension trước, sau đó:
```bash
composer install --ignore-platform-reqs
```

### Image Upload Error
```
The profile picture failed to upload
```
**Giải pháp**: 
1. Kiểm tra quyền thư mục `storage/app/public/`
2. Tạo thư mục nếu chưa có: `mkdir storage/app/public/profile_pictures`
3. Tạo lại symbolic link: `php artisan storage:link`

## 📝 License

Dự án được phát hành dưới giấy phép [MIT License](LICENSE).

## 📧 Liên hệ

- **Author**: FlashTM123 (Trương Minh)
- **Email**: nhatduong019@gmail.com
- **GitHub**: [https://github.com/FlashTM123/FlashTechMongo](https://github.com/FlashTM123/FlashTechMongo)

## 🙏 Đóng góp & Hỗ trợ

Nếu bạn thấy dự án này hữu ích, hãy cho một ⭐ trên GitHub!

Báo cáo lỗi hoặc đề xuất tính năng mới tại: [Issues](https://github.com/FlashTM123/FlashTechMongo/issues)

---

<p align="center">Made with ❤️ by FlashTM123</p>
