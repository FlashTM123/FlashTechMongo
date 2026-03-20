# FlashTech - Tính Năng Mới (Phiên Bản v2.0)

## 📋 Tóm Tắt

Đã hoàn thành triển khai 4 tính năng chính cho hệ thống FlashTech:
1. **Đa ngôn ngữ (i18n)** - Hỗ trợ Tiếng Việt và Tiếng Anh
2. **So Sánh Sản Phẩm** - So sánh tối đa 5 sản phẩm cùng lúc
3. **Chat Hỗ Trợ Trực Tuyến** - Kết nối trực tiếp với nhân viên hỗ trợ
4. **Thông Báo Realtime** - Thông báo đơn hàng, thanh toán, và các sự kiện khác

---

## 🌍 1. Đa Ngôn Ngữ (i18n)

### Tập Tin Được Tạo
- `config/locale.php` - Cấu hình ngôn ngữ (VI/EN)
- `resources/lang/vi/messages.php` - Bản dịch Tiếng Việt
- `resources/lang/en/messages.php` - Bản dịch Tiếng Anh
- `app/Http/Middleware/SetLocale.php` - Middleware xử lý ngôn ngữ
- `app/Helpers/LocaleHelper.php` - Helper function cho ngôn ngữ
- `resources/views/customers/components/language-switcher.blade.php` - Công cụ chuyển ngôn ngữ

### Cách Sử Dụng
```php
// Dùng translation trong view
{{ __('messages.nav.home') }}

// Kiểm tra ngôn ngữ hiện tại
@if(is_locale('vi'))
    Tiếng Việt
@endif

// Lấy danh sách ngôn ngữ
@foreach(get_available_locales() as $code => $locale)
    {{ $locale['name'] }}
@endforeach
```

### Routes
- `GET /lang/{locale}` - Chuyển ngôn ngữ

---

## 🔄 2. So Sánh Sản Phẩm

### Tập Tin Được Tạo
- `app/Http/Controllers/ComparisonController.php` - Controller xử lý so sánh
- `resources/views/customers/comparison/index.blade.php` - Trang so sánh
- `resources/views/customers/components/comparison-button.blade.php` - Nút so sánh

### Routes
- `GET /so-sanh` - Trang so sánh
- `POST /so-sanh/them/{product}` - Thêm sản phẩm vào danh sách so sánh
- `DELETE /so-sanh/xoa/{productId}` - Xóa sản phẩm
- `DELETE /so-sanh/xoa-het` - Xóa toàn bộ
- `GET /so-sanh/api/count` - Lấy số lượng
- `GET /so-sanh/api/check/{productId}` - Kiểm tra sản phẩm

### Tính Năng
- ✅ So sánh tối đa 5 sản phẩm
- ✅ Lưu danh sách trong session
- ✅ Hiển thị: giá, thương hiệu, danh mục, tồn kho, lượt bán, đánh giá
- ✅ Hiển thị thông số kỹ thuật chi tiết
- ✅ Hỗ trợ biến thể màu (price, stock theo màu)
- ✅ AJAX thêm/xóa sản phẩm

### Cách Sử Dụng
```blade
<!-- Nút So Sánh trên Product Card -->
@include('customers.components.comparison-button', ['product' => $product])

<!-- Hiển thị trang so sánh -->
<a href="{{ route('comparison.index') }}">
    Xem danh sách so sánh
</a>
```

---

## 💬 3. Chat Hỗ Trợ Trực Tuyến

### Tập Tin Được Tạo
- `app/Http/Controllers/ChatController.php` - Controller chat
- `app/Models/ChatRoom.php` - Model phòng chat
- `app/Models/ChatMessage.php` - Model tin nhắn
- `app/Events/ChatMessageSent.php` - Event gửi tin nhắn
- `app/Events/ChatRoomClosed.php` - Event đóng phòng chat
- `database/migrations/2026_03_18_000001_create_chat_rooms_table.php`
- `database/migrations/2026_03_18_000002_create_chat_messages_table.php`
- `resources/views/customers/chat/widget.blade.php` - Giao diện chat
- `resources/views/customers/components/chat-widget.blade.php` - Widget nổi

### Routes
- `GET /tro-giup` - Trang chat chính
- `POST /tro-giup/tao-phong` - Tạo phòng chat
- `POST /tro-giup/phong/{chatRoom}/gui-tin` - Gửi tin nhắn
- `GET /tro-giup/phong/{chatRoom}/tin-nhan` - Lấy tin nhắn
- `POST /tro-giup/phong/{chatRoom}/dong` - Đóng phòng
- `GET /tro-giup/api/widget` - Thông tin widget

### Tính Năng
- ✅ Tạo phòng chat tự động
- ✅ Gửi/nhận tin nhắn realtime
- ✅ Lưu lịch sử chat trong DB
- ✅ Đánh dấu tin chưa đọc
- ✅ Widget nổi dưới góc phải
- ✅ Tự động poll tin nhắn mỗi 3 giây
- ✅ Hỗ trợ broadcast (Laravel Echo/Pusher)

### Cách Sử Dụng
```blade
<!-- Include widget trong layout -->
@include('customers.components.chat-widget')

<!-- Trang chat đầy đủ -->
<a href="{{ route('chat.index') }}">Trò chuyện hỗ trợ</a>
```

---

## 🔔 4. Thông Báo Realtime

### Tập Tin Được Tạo
- `app/Http/Controllers/NotificationController.php` - Controller thông báo
- `app/Models/Notification.php` - Model thông báo
- `app/Services/NotificationService.php` - Service tạo thông báo
- `app/Events/NotificationCreated.php` - Event thông báo mới
- `database/migrations/2026_03_18_000003_create_notifications_table.php`
- `resources/views/customers/notifications/index.blade.php` - Trang thông báo
- `resources/views/customers/components/notifications-widget.blade.php` - Widget nổi

### Routes
- `GET /thong-bao` - Danh sách thông báo
- `GET /thong-bao/api/chua-doc` - Lấy thông báo chưa đọc
- `POST /thong-bao/{notification}/da-doc` - Đánh dấu đã đọc
- `POST /thong-bao/api/tat-ca-da-doc` - Đánh dấu tất cả
- `DELETE /thong-bao/{notification}` - Xóa thông báo
- `DELETE /thong-bao/xoa-het` - Xóa tất cả
- `GET /thong-bao/api/dem` - Đếm chưa đọc

### Tính Năng
- ✅ Tạo thông báo tự động cho đơn hàng
- ✅ Các loại: order_placed, order_confirmed, order_shipped, order_delivered, order_cancelled, payment_confirmed
- ✅ Widget nổi hiển thị 10 thông báo gần nhất
- ✅ Đánh dấu đã đọc
- ✅ Xóa thông báo
- ✅ Badge hiển thị số chưa đọc
- ✅ Tự động cập nhật mỗi 5 giây
- ✅ Hỗ trợ broadcast (Laravel Echo/Pusher)

### Service: Tạo Thông Báo
```php
use App\Services\NotificationService;

// Khi đặt hàng thành công
NotificationService::orderPlaced($customer, $order);

// Khi xác nhận đơn
NotificationService::orderConfirmed($customer, $order);

// Khi giao hàng
NotificationService::orderShipped($customer, $order);
NotificationService::orderDelivered($customer, $order);

// Khi hủy đơn
NotificationService::orderCancelled($customer, $order);

// Khi xác nhận thanh toán
NotificationService::paymentConfirmed($customer, $order);
```

### Cách Sử Dụng
```blade
<!-- Include widget trong layout -->
@include('customers.components.notifications-widget')

<!-- Trang thông báo đầy đủ -->
<a href="{{ route('notifications.index') }}">Thông báo</a>
```

---

## 📦 Cài Đặt

### 1. Cập Nhật Middleware
File `bootstrap/app.php` đã được cập nhật để sử dụng `SetLocale` middleware.

### 2. Composer Autoload
File `composer.json` đã được cập nhật để autoload helper:
```json
"autoload": {
    "files": [
        "app/Helpers/LocaleHelper.php"
    ]
}
```

Chạy lệnh:
```bash
composer dump-autoload
```

### 3. Migration
Chạy migration để tạo bảng:
```bash
php artisan migrate
```

### 4. Config
Cấu hình ngôn ngữ trong `config/locale.php`.

---

## 🔌 Integration với Filament Admin

Để quản lý chat và thông báo trong admin Filament:

```php
// Ở AdminPanelProvider.php
->navigationGroups([
    // ...existing groups...
    'Chat & Notifications',
])
```

---

## 🚀 Cấu Hình Broadcasting (Tùy chọn)

Để nhận thông báo realtime, cấu hình broadcasting:

### Sử dụng Laravel WebSockets
```bash
composer require beyondcode/laravel-websockets
php artisan websockets:serve
```

### Sử dụng Pusher
```env
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=mt1
```

Cài đặt Laravel Echo:
```bash
npm install laravel-echo pusher-js
```

---

## ✅ Danh Sách Kiểm Tra

- [x] Đa ngôn ngữ (VI/EN)
- [x] So sánh sản phẩm (max 5)
- [x] Chat hỗ trợ trực tuyến
- [x] Thông báo realtime
- [x] Tích hợp với MongoDB
- [x] Widget nổi cho chat & notifications
- [x] Routes API
- [x] Models & Migrations
- [x] Controllers
- [x] Views
- [x] Events cho Broadcasting
- [x] Service cho tạo thông báo
- [x] Middleware cho ngôn ngữ

---

## 📝 Ghi Chú

### Lưu Trữ Session
- Danh sách so sánh được lưu trong session
- Tự động xóa khi hết hạn session (default 2 giờ)

### Database
- Chat rooms và messages được lưu trong MongoDB
- Notifications cũng được lưu trong MongoDB
- Tối ưu các index cho truy vấn nhanh

### Broadcasting
- Hiện tại sử dụng polling (AJAX) mỗi 3-5 giây
- Để realtime thực sự, hãy cấu hình Laravel Echo + WebSockets/Pusher

### Bảo Mật
- Tất cả routes chat & notifications yêu cầu `auth:customer`
- Kiểm tra ownership trước khi hiển thị/xóa

---

## 🔧 Troubleshooting

### Chat không hoạt động
- Kiểm tra migration chạy: `php artisan migrate:status`
- Kiểm tra MongoDB connection

### Thông báo không hiển thị
- Kiểm tra NotificationService được gọi khi order thay đổi
- Kiểm tra broadcast config

### Ngôn ngữ không chuyển
- Refresh page sau khi chọn ngôn ngữ
- Kiểm tra session driver trong `.env` là `file` hoặc `database`

---

## 📚 Tài Liệu Thêm

- [Laravel Localization](https://laravel.com/docs/localization)
- [Laravel Broadcasting](https://laravel.com/docs/broadcasting)
- [MongoDB Laravel](https://www.mongodb.com/docs/drivers/php-library/current/tutorial/laravel/)

---

**Phiên bản**: 2.0  
**Ngày cập nhật**: 18/03/2026  
**Tác giả**: FlashTM123
