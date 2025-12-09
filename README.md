<div align="center">

# ⚡ FlashTech

### 🛒 E-Commerce Technology Store

<img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/MongoDB-6.0-47A248?style=for-the-badge&logo=mongodb&logoColor=white" alt="MongoDB">
<img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/Node.js-18.x-339933?style=for-the-badge&logo=node.js&logoColor=white" alt="Node.js">
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
| PHP | >= 8.2 |
| Composer | >= 2.0 |
| Node.js | >= 18.x |
| NPM | >= 9.x |
| MongoDB | >= 6.0 |

</div>

---

## ⚡ Công nghệ sử dụng

<div align="center">

| Backend | Frontend | Database | Tools |
|:-------:|:--------:|:--------:|:-----:|
| ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white) | ![Blade](https://img.shields.io/badge/Blade-FF2D20?style=flat-square&logo=laravel&logoColor=white) | ![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=flat-square&logo=mongodb&logoColor=white) | ![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white) |
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white) | ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) | | ![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white) |
| | ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black) | | ![NPM](https://img.shields.io/badge/NPM-CB3837?style=flat-square&logo=npm&logoColor=white) |

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

### 🛍️ Quản lý sản phẩm
| Tính năng | Mô tả |
|:----------|:------|
| CRUD sản phẩm | Thêm, sửa, xóa, xem chi tiết |
| Upload hình ảnh | Multiple images upload |
| Specifications | Thông số kỹ thuật động |
| Danh mục | Smartphone, Laptop, Tablet, Computer, Accessory |
| Filters | Lọc theo brand, category, status |

### 👤 Quản lý khách hàng
| Tính năng | Mô tả |
|:----------|:------|
| Mã khách hàng | Tự động: KH + YYYYMMDD + 4 số |
| Avatar | Upload hoặc UI Avatars fallback |
| Loyalty Points | Điểm tích lũy |
| Thông tin | Họ tên, email, SĐT, địa chỉ, ngày sinh, giới tính |

### 🎨 Giao diện Frontend
| Tính năng | Mô tả |
|:----------|:------|
| Homepage | Hero banner, categories, flash sale |
| Product Cards | Badges, wishlist, quick view, ratings |
| Product Detail | Gallery ảnh, thông số kỹ thuật, đánh giá |
| Category Page | Lọc theo brand/giá, sắp xếp, phân trang |
| Navbar | Sticky header, user dropdown, search |
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

### 🌐 Bước 7: Chạy Server

```bash
php artisan serve
```

**🎉 Truy cập:** http://localhost:8000

---

## 👤 Tài khoản mặc định

### 🔑 Admin Panel
> Truy cập: http://localhost:8000/dashboard

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
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── CustomerAuthController.php
│   │   │   ├── CustomerController.php
│   │   │   ├── ProductController.php
│   │   │   └── ...
│   │   ├── 📂 Middleware/
│   │   └── 📂 Requests/
│   ├── 📂 Models/
│   │   ├── Brand.php
│   │   ├── Customer.php
│   │   ├── Product.php
│   │   └── User.php
│   └── 📂 Policies/
├── 📂 database/
│   ├── 📂 factories/
│   ├── 📂 migrations/
│   └── 📂 seeders/
├── 📂 resources/
│   └── 📂 views/
│       ├── 📂 Admins/
│       └── 📂 Customers/
│           ├── 📂 Account/
│           ├── 📂 Home/
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
| | User dropdown menu | ✅ |
| | Session management | ✅ |
| **Admin Panel** | Dashboard thống kê | ✅ |
| | Quản lý Users (CRUD) | ✅ |
| | Quản lý Brands | ✅ |
| | Quản lý Products | ✅ |
| | Quản lý Customers | ✅ |
| **Frontend** | Homepage | ✅ |
| | Navbar responsive | ✅ |
| | Product cards | ✅ |
| | Product detail page | ✅ |
| | Category page với filters | ✅ |
| | Pagination component | ✅ |
| | Flash sale timer | ✅ |
| | Footer | ✅ |

---

## 🔜 Tính năng sắp tới

| Ưu tiên | Tính năng | Trạng thái |
|:-------:|:----------|:----------:|
| 🔴 | Giỏ hàng (Cart) | ⏳ |
| 🔴 | Thanh toán (Checkout) | ⏳ |
| 🔴 | Quản lý đơn hàng | ⏳ |
| 🟡 | Đánh giá sản phẩm | ⏳ |
| 🟡 | Wishlist | ⏳ |
| 🟡 | Trang tài khoản khách hàng | ⏳ |
| 🟢 | Tìm kiếm sản phẩm | ⏳ |
| 🟢 | Email notifications | ⏳ |
| 🟢 | Tích hợp VNPay | ⏳ |

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

<sub>Made with ❤️ by FlashTech Team © 2025</sub>

</div>
