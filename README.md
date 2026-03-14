<div align="center">

# ⚡ FlashTech

### 🛒 E-Commerce Technology Store

<img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/MongoDB-Atlas-47A248?style=for-the-badge&logo=mongodb&logoColor=white" alt="MongoDB">
<img src="https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/Node.js-24.x-339933?style=for-the-badge&logo=node.js&logoColor=white" alt="Node.js">
<img src="https://img.shields.io/badge/Filament-3.3-FDAE4B?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPjwvc3ZnPg==&logoColor=white" alt="Filament">
<img src="https://img.shields.io/badge/Cloudinary-3.x-3448C5?style=for-the-badge&logo=cloudinary&logoColor=white" alt="Cloudinary">
<img src="https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge" alt="License">

<br><br>

**Website bán lẻ công nghệ hiện đại được xây dựng với Laravel & MongoDB**

[Demo](#demo) • [Tính năng](#-tính-năng-chính) • [Cài đặt](#-cài-đặt) • [Tài liệu](#-tài-liệu) • [Đóng góp](#-đóng-góp)

</div>

---

## 👥 Thành viên phát triển

<div align="center">

| STT | Họ và tên | MSSV | Vai trò | GitHub |
|:---:|:----------|:----:|:--------|:------:|
| 1 | Trương Minh | BKC15067 | 👨‍💻 Team Leader / Full-stack Developer | [@FlashTM123](https://github.com/FlashTM123) |


</div>

---

## 📖 Giới thiệu

**FlashTech** là hệ thống website bán lẻ công nghệ (E-Commerce) được xây dựng trên nền tảng **Laravel 12** và **MongoDB**. Dự án cung cấp đầy đủ tính năng quản lý sản phẩm, đơn hàng, khách hàng với giao diện hiện đại và trải nghiệm người dùng tối ưu.

### 🎯 Mục tiêu dự án
- Xây dựng website thương mại điện tử hoàn chỉnh
- Áp dụng kiến trúc MVC với Laravel Framework
- Sử dụng MongoDB làm cơ sở dữ liệu NoSQL
- Thiết kế giao diện responsive, thân thiện người dùng

---

## 🛠️ Yêu cầu hệ thống

<div align="center">

| Công cụ | Phiên bản |
|:--------|:---------:|
| PHP | >= 8.4 |
| Composer | >= 2.9 |
| Node.js | >= 24.x |
| NPM | >= 11.x |
| MongoDB | Atlas hoặc >= 6.0 |

</div>

---

## ⚡ Công nghệ sử dụng

<div align="center">

| Backend | Frontend | Database | Cloud | Tools |
|:-------:|:--------:|:--------:|:-----:|:-----:|
| ![Laravel](https://img.shields.io/badge/Laravel_12-FF2D20?style=flat-square&logo=laravel&logoColor=white) | ![Blade](https://img.shields.io/badge/Blade-FF2D20?style=flat-square&logo=laravel&logoColor=white) | ![MongoDB](https://img.shields.io/badge/MongoDB_Atlas-47A248?style=flat-square&logo=mongodb&logoColor=white) | ![Cloudinary](https://img.shields.io/badge/Cloudinary-3448C5?style=flat-square&logo=cloudinary&logoColor=white) | ![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white) |
| ![PHP](https://img.shields.io/badge/PHP_8.5-777BB4?style=flat-square&logo=php&logoColor=white) | ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) | | ![Google OAuth](https://img.shields.io/badge/Google_OAuth-4285F4?style=flat-square&logo=google&logoColor=white) | ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) |
| ![Filament](https://img.shields.io/badge/Filament_v3.3-FDAE4B?style=flat-square&logoColor=white) | ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black) | | | ![NPM](https://img.shields.io/badge/NPM-CB3837?style=flat-square&logo=npm&logoColor=white) |

</div>

---

## ✨ Tính năng chính

### 🔐 Hệ thống xác thực
| Tính năng | Mô tả |
|:----------|:------|
| Đăng nhập/Đăng xuất | Session-based authentication |
| Phân quyền | Admin, Moderator, Employee |
| Đăng ký khách hàng | Mã tự động, upload avatar, validation |
| Password | Strength indicator, toggle visibility |
| 🆕 Đăng nhập Google | OAuth 2.0 với Laravel Socialite |

### 🛍️ Quản lý sản phẩm
| Tính năng | Mô tả |
|:----------|:------|
| CRUD sản phẩm | Thêm, sửa, xóa, xem chi tiết |
| Upload hình ảnh | Multiple images upload từ file (FileUpload) |
| 🆕 Biến thể màu sắc | Nhiều màu/sản phẩm, mỗi màu có giá, giá khuyến mãi, tồn kho, nhiều ảnh riêng |
| 🆕 Thông số kỹ thuật | Repeater động trong form tạo/sửa sản phẩm (label, value, unit) |
| Danh mục | Smartphone, Laptop, Tablet, Computer, Accessory |
| Filters | Lọc theo brand, category, status |

### 👤 Quản lý khách hàng
| Tính năng | Mô tả |
|:----------|:------|
| Mã khách hàng | Tự động: KH + YYYYMMDD + 4 số |
| Avatar | Upload hoặc UI Avatars fallback |
| Loyalty Points | Điểm tích lũy |
| Thông tin | Họ tên, email, SĐT, địa chỉ, ngày sinh, giới tính |
| 🆕 Chỉnh sửa hồ sơ | Cập nhật thông tin cá nhân, upload avatar |
| 🆕 Đổi mật khẩu | Hỗ trợ cả tài khoản thường và Google OAuth |

### 🛒 Giỏ hàng & Thanh toán
| Tính năng | Mô tả |
|:----------|:------|
| 🆕 Giỏ hàng (Cart) | Session-based, AJAX thêm/cập nhật/xóa sản phẩm |
| 🆕 Thêm vào giỏ | Nút thêm giỏ hàng trên trang chi tiết & product card (AJAX) |
| 🆕 Giữ giá giỏ hàng | Lưu giá tại thời điểm thêm, không đổi khi admin cập nhật giá |
| 🆕 Giỏ hàng theo màu | Cùng sản phẩm khác màu = 2 dòng riêng, giá/stock theo màu |
| 🆕 Badge giỏ hàng | Hiển thị số lượng sản phẩm trên navbar |
| 🆕 Trang thanh toán | Form nhập thông tin giao hàng, chọn phương thức thanh toán |
| 🆕 Phương thức TT | COD, Chuyển khoản ngân hàng, MoMo, VNPay |
| 🆕 Đặt hàng | Tạo đơn hàng, trừ tồn kho theo màu, tăng số lượng bán |
| 🆕 Trang thành công | Trang xác nhận đơn hàng sau khi đặt thành công |
| 🆕 Bảo vệ route | Giỏ hàng & thanh toán yêu cầu đăng nhập customer |

### �️ Admin Panel (Filament v3)
| Tính năng | Mô tả |
|:----------|:------|
| 🆕 Filament Admin | Thay thế admin panel cũ bằng Filament v3.3 tại `/admin` |
| 🆕 Dashboard | Widget thống kê: tổng đơn, chờ xử lý, đang giao, đã giao, sản phẩm, khách hàng |
| 🆕 Quản lý sản phẩm | CRUD sản phẩm với form sections, badge danh mục, hiển thị giá |
| 🆕 Quản lý thương hiệu | CRUD thương hiệu, cascade delete sản phẩm khi xóa brand |
| 🆕 Quản lý đơn hàng | Danh sách đơn hàng, chi tiết, cập nhật trạng thái, lọc đa tiêu chí |
| 🆕 Quản lý nhân viên | CRUD users với phân quyền (Admin/Moderator/Employee), khóa tài khoản |
| 🆕 Quản lý khách hàng | Xem/sửa thông tin khách hàng, Google ID indicator |
| 🆕 Quản lý đánh giá | Duyệt/sửa đánh giá, hiển thị sao, toggle approval |
| 🆕 Giao diện tiếng Việt | Tất cả labels, navigation, filters hiển thị tiếng Việt |

### 📋 Lịch sử đơn hàng (Customer)
| Tính năng | Mô tả |
|:----------|:------|
| 🆕 Danh sách đơn hàng | Trang lịch sử đơn hàng của khách hàng |
| 🆕 Lọc trạng thái | Tab lọc: Tất cả, Chờ xử lý, Đang xử lý, Đang giao, Đã giao, Đã hủy |
| 🆕 Chi tiết đơn hàng | Xem chi tiết đơn hàng, thông tin giao hàng, sản phẩm |
| 🆕 Hủy đơn hàng | Hủy đơn chờ xử lý/đang xử lý, tự động hoàn kho |
| 🆕 Phân trang | Phân trang 10 đơn hàng/trang |

### ❤️ Wishlist (Sản phẩm yêu thích)
| Tính năng | Mô tả |
|:----------|:------|
| 🆕 Toggle yêu thích | Thêm/xóa sản phẩm yêu thích trên trang chi tiết (AJAX) |
| 🆕 Trang wishlist | Xem danh sách sản phẩm yêu thích |
| 🆕 Thêm vào giỏ | Thêm sản phẩm từ wishlist vào giỏ hàng |
| 🆕 Badge wishlist | Hiển thị số lượng yêu thích trên navbar |

### 🎨 Giao diện Frontend
| Tính năng | Mô tả |
|:----------|:------|
| Homepage | Hero banner, categories, flash sale |
| Product Cards | Badges, wishlist, quick view, ratings |
| Product Detail | Gallery ảnh, thông số kỹ thuật, đánh giá |
| Category Page | Lọc theo brand/giá, sắp xếp, phân trang |
| Navbar | Sticky header, user dropdown, search, cart badge |
| Responsive | Mobile hamburger menu, adaptive layout |

---

## 🚀 Cài đặt

### 📦 Bước 0: Cài đặt MongoDB

<details>
<summary><b>🪟 Windows</b></summary>

1. Tải MongoDB Community Server: https://www.mongodb.com/try/download/community
2. Chạy installer → Chọn "Complete" → "Install MongoDB as a Service"
3. Kiểm tra:
```bash
mongod --version
```
</details>

<details>
<summary><b>🍎 macOS</b></summary>

```bash
brew tap mongodb/brew
brew install mongodb-community@6.0
brew services start mongodb-community@6.0
```
</details>

<details>
<summary><b>🐧 Linux (Ubuntu/Debian)</b></summary>

```bash
wget -qO - https://www.mongodb.org/static/pgp/server-6.0.asc | sudo apt-key add -
echo "deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/6.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-6.0.list
sudo apt-get update
sudo apt-get install -y mongodb-org
sudo systemctl start mongod
sudo systemctl enable mongod
```
</details>

---

### 🔌 Bước 1: Cài MongoDB PHP Extension

<details>
<summary><b>🪟 Windows</b></summary>

1. Kiểm tra PHP version:
```bash
php -v
```

2. Tải extension từ: https://pecl.php.net/package/mongodb
   - Chọn phiên bản phù hợp (ví dụ: `php_mongodb-1.17.2-8.2-ts-x64.zip`)

3. Copy `php_mongodb.dll` vào thư mục `ext` của PHP:
   - `C:\php\ext\` hoặc `C:\xampp\php\ext\`

4. Thêm vào `php.ini`:
```ini
extension=mongodb
```

5. Restart Apache/Nginx

6. Kiểm tra:
```bash
php -m | findstr mongodb
```
</details>

<details>
<summary><b>🍎 macOS</b></summary>

```bash
pecl install mongodb
```
Thêm vào `php.ini`:
```ini
extension=mongodb.so
```
</details>

<details>
<summary><b>🐧 Linux</b></summary>

```bash
sudo apt-get install php-dev php-pear
sudo pecl install mongodb
```
Thêm vào `/etc/php/8.2/cli/php.ini` và `/etc/php/8.2/fpm/php.ini`:
```ini
extension=mongodb.so
```
```bash
sudo systemctl restart php8.2-fpm
```
</details>

**✅ Kiểm tra cài đặt thành công:**
```bash
php -r "echo extension_loaded('mongodb') ? '✅ MongoDB extension installed!' : '❌ MongoDB extension NOT installed!';"
```

---

### 📥 Bước 2: Clone & Setup Project

```bash
# Clone repository
git clone https://github.com/FlashTM123/FlashTechMongo.git
cd FlashTechMongo

# Cài đặt dependencies
composer install
npm install

# Cấu hình môi trường
cp .env.example .env
php artisan key:generate
```

### ⚙️ Bước 3: Cấu hình Database

Mở file `.env` và cập nhật:
```env
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=flashtech
DB_USERNAME=
DB_PASSWORD=
```

### 🗄️ Bước 4: Migration & Seeding

```bash
php artisan migrate
php artisan db:seed
```

### 📁 Bước 5: Storage Setup

```bash
# Tạo thư mục
mkdir storage/app/public/profile_pictures

# Tạo symbolic link (Windows: chạy với quyền Administrator)
php artisan storage:link
```

### 🎨 Bước 6: Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 🔐 Bước 7: Cấu hình Google OAuth (Tùy chọn)

1. Truy cập [Google Cloud Console](https://console.cloud.google.com/)
2. Tạo Project mới hoặc chọn project có sẵn
3. Vào **APIs & Services** → **Credentials** → **Create Credentials** → **OAuth 2.0 Client IDs**
4. Chọn **Web application**, thêm redirect URI: `http://localhost:8000/auth/google/callback`
5. Thêm vào file `.env`:
```env
GOOGLE_CLIENT_ID=your-client-id.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### 🌐 Bước 8: Chạy Server

```bash
php artisan serve
```

**🎉 Truy cập:** http://localhost:8000

---

## 👤 Tài khoản mặc định

### 🔑 Admin Panel (Filament)
> Truy cập: http://localhost:8000/admin

| Vai trò | Email | Password |
|:--------|:------|:---------|
| Admin | `admin@flashtech.vn` | `password` |
| Moderator | `moderator@flashtech.vn` | `password` |
| Employee | `employee@flashtech.vn` | `password` |

### 🛒 Customer Frontend
> Truy cập: http://localhost:8000

Đăng ký tài khoản mới tại: http://localhost:8000/register

---

## 📁 Cấu trúc dự án

```
FlashTechMongo/
├── 📂 app/
│   ├── 📂 Filament/                          # 🆕 Filament Admin Panel
│   │   ├── 📂 Resources/
│   │   │   ├── ProductResource.php           # CRUD sản phẩm
│   │   │   ├── BrandResource.php             # CRUD thương hiệu
│   │   │   ├── OrderResource.php             # Quản lý đơn hàng
│   │   │   ├── UserResource.php              # Quản lý nhân viên
│   │   │   ├── CustomerResource.php          # Quản lý khách hàng
│   │   │   └── ReviewResource.php            # Quản lý đánh giá
│   │   └── 📂 Widgets/
│   │       └── StatsOverview.php             # Dashboard thống kê
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   │   ├── CartController.php             # Giỏ hàng (session-based)
│   │   │   ├── CheckoutController.php         # Thanh toán & đặt hàng
│   │   │   ├── CustomerAuthController.php     # Đăng ký/nhập Customer
│   │   │   ├── CustomerHomeController.php     # Trang chủ, sản phẩm, đơn hàng, hồ sơ, wishlist
│   │   │   ├── ReviewController.php           # Đánh giá sản phẩm
│   │   │   └── ...
│   │   ├── 📂 Middleware/
│   │   └── 📂 Requests/
│   ├── 📂 Models/
│   │   ├── Brand.php
│   │   ├── Customer.php
│   │   ├── Orders.php                       # 🆕 Model đơn hàng
│   │   ├── OrderDetails.php                 # 🆕 Model chi tiết đơn hàng
│   │   ├── Product.php
│   │   ├── Review.php
│   │   ├── Specifications.php
│   │   └── User.php
│   ├── 📂 Policies/
│   └── 📂 Providers/
│       └── 📂 Filament/
│           └── AdminPanelProvider.php      # 🆕 Cấu hình Filament panel
├── 📂 database/
│   ├── 📂 factories/
│   ├── 📂 migrations/
│   │   ├── ..._create_users_table.php
│   │   ├── ..._create_customers_table.php
│   │   ├── ..._create_brands_table.php
│   │   ├── ..._create_products_table.php
│   │   ├── ..._create_spcifications_table.php
│   │   ├── ..._create_reviews_table.php
│   │   ├── ..._create_orders_table.php      # 🆕
│   │   └── ..._create_order_details_table.php # 🆕
│   └── 📂 seeders/
├── 📂 resources/
│   └── 📂 views/
│       └── 📂 Customers/                   # Giao diện Frontend
│           ├── 📂 Account/                  # Đăng ký, đăng nhập, chỉnh sửa hồ sơ, đổi mật khẩu
│           ├── 📂 Cart/                     # 🆕 Giỏ hàng
│           │   └── index.blade.php
│           ├── 📂 Checkout/                 # 🆕 Thanh toán
│           │   ├── index.blade.php
│           │   └── success.blade.php
│           ├── 📂 Orders/                   # 🆕 Lịch sử đơn hàng
│           │   ├── index.blade.php
│           │   └── detail.blade.php
│           ├── 📂 Wishlist/                 # 🆕 Sản phẩm yêu thích
│           │   └── index.blade.php
│           ├── 📂 Home/
│           ├── 📂 Products/
│           ├── 📂 Components/
│           └── 📂 Layouts/
├── 📂 routes/
│   └── web.php
└── 📂 storage/
```

---

## ✅ Tính năng đã hoàn thành

| Module | Tính năng | Trạng thái |
|:-------|:----------|:----------:|
| **Authentication** | Đăng nhập Admin | ✅ |
| | Đăng ký/Đăng nhập Customer | ✅ |
| | Đăng nhập Google OAuth 2.0 | ✅ |
| | User dropdown menu | ✅ |
| | Session management | ✅ |
| | Auth Guard cho Customer | ✅ |
| **Admin Panel** | 🆕 Filament v3.3 Admin Panel (`/admin`) | ✅ |
| | Dashboard thống kê (widget) | ✅ |
| | Quản lý Users (CRUD) | ✅ |
| | Quản lý Brands (cascade delete products) | ✅ |
| | Quản lý Products | ✅ |
| | Quản lý Customers | ✅ |
| | Quản lý Đơn hàng (danh sách, chi tiết, cập nhật trạng thái) | ✅ |
| | Quản lý Đánh giá (duyệt, sửa, xóa) | ✅ |
| **Frontend** | Homepage | ✅ |
| | Navbar responsive + cart badge | ✅ |
| | Product cards (hiển thị giá cao nhất từ biến thể màu) | ✅ |
| | Product detail page (chọn màu, gallery động, giá/stock theo màu) | ✅ |
| | Category page với filters | ✅ |
| | Pagination component | ✅ |
| | Flash sale timer | ✅ |
| | Footer | ✅ |
| | Trang hồ sơ khách hàng | ✅ |
| | 🆕 Chỉnh sửa hồ sơ (avatar, thông tin cá nhân) | ✅ |
| | 🆕 Đổi mật khẩu (thường + Google OAuth) | ✅ |
| | 🆕 Wishlist (toggle, trang yêu thích, thêm vào giỏ) | ✅ |
| **Đánh giá sản phẩm** | Form đánh giá với star rating | ✅ |
| | Upload nhiều ảnh đánh giá | ✅ |
| | Sửa/Xóa đánh giá | ✅ |
| | Nút "Hữu ích" (AJAX) | ✅ |
| | Thống kê rating | ✅ |
| **🆕 Giỏ hàng** | Thêm sản phẩm vào giỏ (AJAX) | ✅ |
| | 🆕 Giỏ hàng hỗ trợ biến thể màu (cart key theo màu) | ✅ |
| | Cập nhật số lượng (AJAX, giới hạn stock theo màu) | ✅ |
| | Xóa sản phẩm / Xóa toàn bộ giỏ | ✅ |
| | Badge số lượng trên navbar | ✅ |
| | Yêu cầu đăng nhập customer | ✅ |
| **🆕 Thanh toán** | Form thông tin giao hàng | ✅ |
| | Chọn phương thức thanh toán (COD, CK, MoMo, VNPay) | ✅ |
| | 🆕 Đặt hàng + trừ tồn kho theo biến thể màu | ✅ |
| | 🆕 Lưu thông tin màu vào chi tiết đơn hàng | ✅ |
| | Trang xác nhận đơn hàng thành công | ✅ |
| **🆕 Lịch sử đơn hàng** | Danh sách đơn hàng của khách hàng | ✅ |
| | Lọc theo trạng thái (tabs) | ✅ |
| | Chi tiết đơn hàng (hiển thị màu sắc) | ✅ |
| | Phân trang | ✅ |
| | 🆕 Hủy đơn hàng (hoàn kho theo biến thể màu) | ✅ |

---

## 📝 Cập nhật gần đây (15/03/2026)

### 🔧 Sửa lỗi
| Lỗi | Mô tả | Chi tiết | Trạng thái |
|:----|:------|:--------|:----------:|
| **Thông báo không cần thiết** | Loại bỏ popup/alert từ tất cả trang khách | Xóa `alert()` JavaScript, session alerts (success/error), và `showGlobalToast()` function từ các trang: Wishlist, Cart, Orders, Product Detail, Account (Register, Login, Profile, Change Password) | ✅ |
| **Giá wishlist hiển thị lỗi** | Wishlist card hiển thị "Ơ" thay vì giá | Fix: Cast price/sale_price sang int với fallback 0 nếu null, improve discount calculation logic | ✅ |
| **Số liệu profile sai** | Profile hiển thị cứng 0 cho đơn hàng & đánh giá | Import Reviews model, query Orders & Reviews tables, count theo customer_id, pass các tính toán vào view | ✅ |

### 📝 Cập nhật gần đây (13/03/2026)



### 🔧 Sửa lỗi
| Lỗi | Mô tả | Chi tiết | Trạng thái |
|:----|:------|:--------|:----------:|
| **MongoDB JSON String Casting** | **500 Server Error** khi truy cập `$product->colors` - `count()` gọi trên string thay vì array | **Root cause:** MongoDB driver lưu colors/images dưới dạng JSON string. Eloquent casts áp dụng AFTER `__get` accessor, nên Blade template gọi `count()` trước khi casting xảy ra. **Giải pháp:** Override `getAttribute($key)` trong Product model để parse JSON string → array ngay khi truy cập, đảm bảo template luôn nhận được array | ✅ |
| Ảnh không hiển thị Wishlist | Sản phẩm yêu thích không hiển thị ảnh | Simplified URL handling - remove unnecessary `asset()` wrapping vì Product model accessor đã format URL | ✅ |
| Ảnh không hiển thị Cart | Giỏ hàng không hiển thị ảnh sản phẩm | Removed complex URL logic - dùng `$item['product']->image` trực tiếp từ Product model accessor | ✅ |
| Ảnh không hiển thị Orders | Đơn hàng không hiển thị ảnh sản phẩm | Thêm `getProductImageAttribute()` accessor vào OrderDetails model để format `product_image` URL | ✅ |

### 📝 Cập nhật trước đó (12/03/2026)

### 🆕 Tính năng mới
| Tính năng | Mô tả | Trạng thái |
|:----------|:------|:----------:|
| Biến thể màu sắc | Mỗi sản phẩm hỗ trợ nhiều màu, mỗi màu có giá, giá khuyến mãi, tồn kho, nhiều ảnh riêng | ✅ |
| Upload ảnh từ file | Thay thế nhập URL bằng FileUpload, hỗ trợ nhiều ảnh sản phẩm & nhiều ảnh theo màu | ✅ |
| Gallery động theo màu | Trang chi tiết: chọn màu → gallery, giá, tồn kho cập nhật realtime (kiểu CellphoneS) | ✅ |
| Thông số kỹ thuật | Repeater động trong form tạo/sửa sản phẩm (label, value, unit), lưu vào collection riêng | ✅ |
| Giỏ hàng theo màu | Cùng sản phẩm khác màu = 2 dòng riêng, cart key format `productId_colorName` | ✅ |
| Đặt hàng theo màu | Trừ tồn kho chính xác theo từng biến thể màu, lưu màu vào chi tiết đơn hàng | ✅ |
| Hủy đơn hoàn kho theo màu | Hủy đơn (khách/admin) hoàn stock đúng biến thể màu đã mua | ✅ |
| Filament Admin Panel | Thay thế admin panel cũ bằng Filament v3.3 tại `/admin` | ✅ |
| Admin Resources | 6 Resources: Product, Brand, Order, User, Customer, Review | ✅ |
| Dashboard Widget | Thống kê: tổng đơn, chờ xử lý, đang giao, đã giao, sản phẩm, khách hàng | ✅ |
| Order RelationManager | Xem chi tiết sản phẩm trong đơn hàng (ảnh, tên, giá, số lượng) | ✅ |
| Cascade Delete | Xóa thương hiệu → tự động xóa tất cả sản phẩm thuộc thương hiệu | ✅ |
| Auto Slug | Tự tạo slug từ tên sản phẩm khi không nhập | ✅ |

### 🔧 Sửa lỗi & Cải thiện
| Tính năng | Mô tả | Trạng thái |
|:----------|:------|:----------:|
| Checkout 0 sản phẩm/0₫ | Sửa cart key lookup — dùng `product_id` từ session thay vì cart key trực tiếp | ✅ |
| Race condition stock | Re-fetch product trước mỗi lần cập nhật stock, tránh ghi đè khi cùng SP nhiều màu | ✅ |
| Ảnh không hiển thị | Xử lý URL ảnh đúng cho cả Cloudinary (http) và local storage (`asset('storage/...')`) | ✅ |
| Upload ảnh bị treo | Tăng `upload_max_filesize=20M`, `post_max_size=50M` trong php.ini | ✅ |
| Danh mục 0 sản phẩm | Sửa Filament category select dùng đúng chữ hoa (Smartphone thay vì smartphone) | ✅ |
| Giỏ hàng giá 0₫ | Sửa cart đọc giá từ biến thể màu thay vì `product.price` (đã chuyển sang colors array) | ✅ |
| Admin hủy đơn | Admin đổi trạng thái sang cancelled → tự động hoàn kho theo biến thể màu | ✅ |
| Max số lượng giỏ hàng | Giới hạn max quantity theo stock của biến thể màu, không dùng stock chung | ✅ |
| Hiển thị màu đơn hàng | Thêm thông tin màu sắc ở trang thanh toán, đơn thành công, lịch sử đơn, chi tiết đơn | ✅ |
| Filament + PHP 8.5 | Sửa type compatibility (`$navigationIcon`, `$navigationGroup`, `form()` signature) | ✅ |
| Filament + MongoDB | Sửa `CACHE_STORE=database` → `file` (MongoDB không hỗ trợ `insertOrIgnore`) | ✅ |
| Policy 403 errors | Sửa 7 Policy files trả về `true` thay vì `false`, fix wrong model types | ✅ |
| Route conflicts | Xóa route admin cũ, Filament tự quản lý auth tại `/admin/login` | ✅ |
| Namespace v3.3 | Sửa `Tables\Actions\*` → `Filament\Actions\*`, `Forms\Components\Section` → `Schemas\Components\Section` | ✅ |
| MongoDB unique index | Xóa unique index trên `slug` và `sku` (gây lỗi duplicate key khi null) | ✅ |
| Route key Product | Sửa `getRouteKeyName()` dùng `id` mặc định, `slug` chỉ cho frontend | ✅ |
| Brand select | Sửa `Brand::pluck('name', '_id')` → `Brand::all()->pluck('name', 'id')` cho MongoDB | ✅ |
| Navbar Wishlist | Sửa link `href="#"` → `route('wishlist.index')`, hiển thị số lượng thực tế | ✅ |

---

## 📝 Cập nhật trước đó (11/03/2026)

<details>
<summary><b>Xem chi tiết</b></summary>

### 🆕 Tính năng mới
| Tính năng | Mô tả | Trạng thái |
|:----------|:------|:----------:|
| Chỉnh sửa hồ sơ | Form cập nhật thông tin cá nhân, upload avatar (Cloudinary/local) | ✅ |
| Đổi mật khẩu | Hỗ trợ tài khoản thường (yêu cầu mật khẩu cũ) và Google OAuth (đặt mật khẩu mới) | ✅ |
| Wishlist | Toggle yêu thích trên trang chi tiết (AJAX), trang danh sách yêu thích, thêm vào giỏ | ✅ |
| Hủy đơn hàng | Khách hàng hủy đơn chờ xử lý/đang xử lý, tự động hoàn stock_quantity & sales_count | ✅ |
| Nút thêm giỏ hàng (Product Card) | Nút "Thêm" trên product card gọi AJAX thêm vào giỏ, cập nhật badge | ✅ |
| Giữ giá giỏ hàng | Lưu giá vào session khi thêm, không thay đổi khi admin cập nhật giá | ✅ |

### 🔧 Sửa lỗi
| Lỗi | Mô tả | Trạng thái |
|:----|:------|:----------:|
| Ảnh sản phẩm Admin | Sửa `asset('storage/')` → URL trực tiếp cho ảnh Cloudinary trên trang đơn hàng | ✅ |
| Avatar không hiển thị | Thêm accessor `profile_picture_url` xử lý cả URL Cloudinary/Google và đường dẫn local | ✅ |
| MongoDB Decimal128 | Sửa lỗi "Unable to cast value to decimal" — thêm custom accessor thay cast `decimal:2` | ✅ |
| Checkout sai giá | Checkout dùng giá từ session thay vì lấy lại từ DB (tránh sai khi giá thay đổi) | ✅ |
| Storage symlink | Tạo `public/storage` symlink cho phép truy cập ảnh upload local | ✅ |

</details>

---

## 📝 Cập nhật trước đó (10/03/2026)

<details>
<summary><b>Xem chi tiết</b></summary>

| Tính năng | Mô tả | Trạng thái |
|:----------|:------|:----------:|
| Giỏ hàng | Session-based cart, AJAX thêm/sửa/xóa, badge trên navbar | ✅ |
| Thanh toán | Form giao hàng, đa phương thức TT (COD/CK/MoMo/VNPay) | ✅ |
| Đặt hàng | Tạo đơn hàng, tự sinh mã `FT-xxxxx`, trừ tồn kho tự động | ✅ |
| Quản lý đơn hàng (Admin) | Danh sách, chi tiết, cập nhật trạng thái đơn hàng & thanh toán | ✅ |
| Lịch sử đơn hàng (Customer) | Xem danh sách & chi tiết đơn hàng, lọc theo trạng thái | ✅ |
| Bảo vệ route Customer | Giỏ hàng, thanh toán, đơn hàng yêu cầu đăng nhập | ✅ |
| Giao diện tiếng Việt | Tất cả trạng thái đơn hàng/thanh toán hiển thị tiếng Việt | ✅ |

### 🔧 Sửa lỗi
| Lỗi | Mô tả | Trạng thái |
|:----|:------|:----------:|
| AJAX Cart | Sửa `$request->ajax()` → `$request->wantsJson()` cho fetch API | ✅ |
| Auth Redirect | Sửa redirect guest về trang login customer thay vì admin | ✅ |
| Validation trạng thái | Đồng bộ giá trị trạng thái thanh toán giữa form và controller | ✅ |

</details>

---

### 📝 Cập nhật trước đó (14/12/2025)

<details>
<summary><b>Xem chi tiết</b></summary>

#### 🔧 Sửa lỗi
| Lỗi | Mô tả | Trạng thái |
|:----|:------|:----------:|
| Auth Guard | Thêm `customer` guard vào `config/auth.php` | ✅ |
| Authenticatable | Customer model implement `Authenticatable` interface | ✅ |
| Navbar | Sửa lỗi `undefined $customer` - dùng `auth('customer')->user()` | ✅ |
| Google Login | Sửa lỗi đăng nhập Google không lưu session | ✅ |

#### ✨ Tính năng mới
| Tính năng | Mô tả | Trạng thái |
|:----------|:------|:----------:|
| Trang hồ sơ | Trang `/ho-so-ca-nhan` với thiết kế đẹp | ✅ |
| Profile Avatar | Hiển thị ảnh Google hoặc avatar placeholder | ✅ |
| Auth Integration | Navbar hiển thị đúng user sau đăng nhập | ✅ |

</details>

---

## 🔜 Tính năng sắp tới

| Ưu tiên | Tính năng | Trạng thái |
|:-------:|:----------|:----------:|
| 🔴 | Tìm kiếm sản phẩm (search bar + gợi ý) | ⏳ |
| 🔴 | Mã giảm giá / Coupon | ⏳ |
| 🟡 | Email thông báo đơn hàng (xác nhận, cập nhật trạng thái) | ⏳ |
| 🟡 | Tích hợp thanh toán VNPay/MoMo thực tế | ⏳ |
| 🟡 | Xuất hóa đơn PDF | ⏳ |
| 🟡 | Dashboard thống kê doanh thu (biểu đồ) | ⏳ |
| 🟢 | So sánh sản phẩm | ⏳ |
| 🟢 | Chat hỗ trợ trực tuyến | ⏳ |
| 🟢 | Thông báo realtime (đơn hàng mới, trạng thái) | ⏳ |
| 🟢 | Đa ngôn ngữ (Việt/Anh) | ⏳ |

---

## 🐛 Xử lý sự cố

<details>
<summary><b>❌ MongoDB Connection Error</b></summary>

```
SQLSTATE[HY000]: SCRAM failure: bad auth
```
**Giải pháp:** Để trống username/password trong `.env`:
```env
DB_USERNAME=
DB_PASSWORD=
```
</details>

<details>
<summary><b>❌ Storage Link Error (Windows)</b></summary>

```
symlink(): Cannot create symlink, error code(1314)
```
**Giải pháp:** Chạy PowerShell với quyền **Administrator**:
```bash
php artisan storage:link
```
</details>

<details>
<summary><b>❌ MongoDB Extension Not Loaded</b></summary>

```
Class 'MongoDB\Driver\Manager' not found
```
**Giải pháp:**
1. Kiểm tra: `php -m | findstr mongodb`
2. Thêm `extension=mongodb` vào `php.ini`
3. Restart web server
</details>

<details>
<summary><b>❌ Google OAuth SSL Certificate Error (Windows)</b></summary>

```
cURL error 60: SSL certificate problem: unable to get local issuer certificate
```
**Giải pháp:** Thêm vào `AppServiceProvider.php`:
```php
public function boot(): void
{
    if ($this->app->environment('local')) {
        $this->app->bind(\GuzzleHttp\Client::class, function () {
            return new \GuzzleHttp\Client(['verify' => false]);
        });
    }
}
```
Và trong `CustomerAuthController.php`:
```php
$googleUser = Socialite::driver('google')
    ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
    ->user();
```
</details>

---

## 🤝 Đóng góp

1. **Fork** repository
2. **Tạo branch** mới: `git checkout -b feature/TinhNangMoi`
3. **Commit** changes: `git commit -m 'Thêm tính năng mới'`
4. **Push** to branch: `git push origin feature/TinhNangMoi`
5. Tạo **Pull Request**

---

## 📄 License

Dự án được phát hành dưới giấy phép **MIT License**.

---

## 📞 Liên hệ

<div align="center">

| | |
|:---:|:---|
| 👤 | **FlashTM123** (Trương Minh) |
| 📧 | nhatduong019@gmail.com |
| 🐙 | [github.com/FlashTM123](https://github.com/FlashTM123) |

<br>

⭐ **Nếu thấy hữu ích, hãy cho dự án một star!** ⭐

<br>

---

<sub>Made with ❤️ by FlashTech Team © 2025-2026</sub>

</div>
