# 💳 Hướng dẫn cấu hình thanh toán VNPay & MoMo

## 📋 Tổng quan

Dự án FlashTech đã tích hợp 2 cổng thanh toán phổ biến tại Việt Nam:
- **VNPay**: Cổng thanh toán trực tuyến
- **MoMo**: Ví điện tử

## 🔧 Cấu hình VNPay

### Bước 1: Đăng ký tài khoản VNPay

1. Truy cập: https://sandbox.vnpayment.vn/
2. Đăng ký tài khoản merchant (doanh nghiệp)
3. Sau khi được duyệt, bạn sẽ nhận được:
   - `TMN Code` (Mã định danh merchant)
   - `Hash Secret` (Khóa bí mật)

### Bước 2: Cấu hình trong file .env

```env
# VNPay Payment Gateway
VNPAY_TMN_CODE=your_tmn_code_here
VNPAY_HASH_SECRET=your_hash_secret_here
VNPAY_URL=https://sandbox.vnpayment.vn/paymentv2/vpcpay.html
VNPAY_RETURN_URL=http://localhost:8000/payment/vnpay/return
```

**Lưu ý:**
- Môi trường **Sandbox** (test): `https://sandbox.vnpayment.vn/paymentv2/vpcpay.html`
- Môi trường **Production**: `https://pay.vnpay.vn/vpcpay.html`

### Bước 3: Cấu hình Return URL trên VNPay Portal

Đăng nhập vào VNPay Portal và cấu hình:
- **Return URL**: `https://yourdomain.com/payment/vnpay/return`

### Thẻ test VNPay

Để test thanh toán, sử dụng thông tin sau:

**Thẻ nội địa:**
- Số thẻ: `9704198526191432198`
- Tên chủ thẻ: `NGUYEN VAN A`
- Ngày phát hành: `07/15`
- Mật khẩu OTP: `123456`

**Thẻ quốc tế:**
- Số thẻ: `4111111111111111`
- CVV: `123`
- Ngày hết hạn: `12/25`

---

## 🔧 Cấu hình MoMo

### Bước 1: Đăng ký tài khoản MoMo Business

1. Truy cập: https://business.momo.vn/
2. Đăng ký tài khoản doanh nghiệp
3. Liên hệ với MoMo để được cấp thông tin test:
   - `Partner Code`
   - `Access Key`
   - `Secret Key`

### Bước 2: Cấu hình trong file .env

```env
# MoMo Payment Gateway
MOMO_PARTNER_CODE=your_partner_code_here
MOMO_ACCESS_KEY=your_access_key_here
MOMO_SECRET_KEY=your_secret_key_here
MOMO_ENDPOINT=https://test-payment.momo.vn/v2/gateway/api/create
MOMO_RETURN_URL=http://localhost:8000/payment/momo/return
MOMO_NOTIFY_URL=http://localhost:8000/payment/momo/notify
```

**Lưu ý:**
- Môi trường **Test**: `https://test-payment.momo.vn/v2/gateway/api/create`
- Môi trường **Production**: `https://payment.momo.vn/v2/gateway/api/create`

### Bước 3: Cấu hình Webhook trên MoMo Portal

Đăng nhập vào MoMo Business Portal và cấu hình:
- **Return URL**: `https://yourdomain.com/payment/momo/return`
- **IPN URL** (Notify URL): `https://yourdomain.com/payment/momo/notify`

### Tài khoản test MoMo

Để test thanh toán, sử dụng:
- **Số điện thoại**: Số điện thoại đã đăng ký MoMo của bạn
- **Mật khẩu**: Mật khẩu MoMo của bạn
- Hoặc liên hệ MoMo để được cấp tài khoản test

---

## 📝 Hướng dẫn sử dụng

### 1. Xuất hóa đơn PDF

Sau khi đặt hàng thành công, khách hàng có thể:
1. Vào trang **Lịch sử đơn hàng**
2. Click vào đơn hàng cần xem
3. Click nút **"Xuất hóa đơn PDF"**
4. File PDF sẽ được tải xuống tự động

### 2. Thanh toán VNPay

1. Khách hàng chọn sản phẩm và thêm vào giỏ hàng
2. Tại trang thanh toán, chọn **"VNPay"**
3. Click **"Đặt hàng"**
4. Hệ thống chuyển hướng đến trang VNPay
5. Nhập thông tin thẻ và xác nhận thanh toán
6. Sau khi thanh toán thành công, tự động quay về trang xác nhận đơn hàng

### 3. Thanh toán MoMo

1. Khách hàng chọn sản phẩm và thêm vào giỏ hàng
2. Tại trang thanh toán, chọn **"MoMo"**
3. Click **"Đặt hàng"**
4. Hệ thống chuyển hướng đến trang MoMo
5. Quét mã QR hoặc đăng nhập MoMo để thanh toán
6. Sau khi thanh toán thành công, tự động quay về trang xác nhận đơn hàng

### 4. Dashboard thống kê doanh thu

Admin có thể xem thống kê doanh thu tại `/admin`:
- **Tổng doanh thu**: Tổng doanh thu từ tất cả đơn hàng
- **Doanh thu tháng này**: Doanh thu tháng hiện tại với % tăng trưởng
- **Biểu đồ doanh thu**: Biểu đồ line chart với các filter:
  - Tuần này (7 ngày)
  - Tháng này (30 ngày)
  - Quý này (12 tuần)
  - Năm này (12 tháng)

---

## 🔒 Bảo mật

### Quan trọng:

1. **Không commit** file `.env` lên Git
2. **Không chia sẻ** `Hash Secret`, `Secret Key` với bất kỳ ai
3. **Sử dụng HTTPS** khi deploy production
4. **Xác thực chữ ký** từ payment gateway để tránh giả mạo
5. **Log tất cả** giao dịch để tra cứu khi cần

### Checklist Production:

- [ ] Đổi sang môi trường production của VNPay/MoMo
- [ ] Cập nhật Return URL và Notify URL với domain thật
- [ ] Bật HTTPS
- [ ] Cấu hình SESSION_SECURE_COOKIE=true
- [ ] Test kỹ luồng thanh toán
- [ ] Chuẩn bị quy trình xử lý lỗi và hoàn tiền

---

## 🐛 Xử lý lỗi thường gặp

### Lỗi: "Chữ ký không hợp lệ"

**Nguyên nhân:**
- Hash Secret/Secret Key không đúng
- Thứ tự tham số không đúng khi tạo chữ ký

**Giải pháp:**
- Kiểm tra lại Hash Secret/Secret Key trong file `.env`
- Xem log để debug chuỗi hash

### Lỗi: "Không thể kết nối đến payment gateway"

**Nguyên nhân:**
- URL endpoint không đúng
- Firewall chặn kết nối

**Giải pháp:**
- Kiểm tra lại URL trong file `.env`
- Kiểm tra firewall/proxy

### Lỗi: "Return URL không hợp lệ"

**Nguyên nhân:**
- Return URL chưa được đăng ký trên portal
- Return URL không khớp với cấu hình

**Giải pháp:**
- Đăng nhập portal và cập nhật Return URL
- Đảm bảo URL trong `.env` khớp với portal

---

## 📞 Hỗ trợ

### VNPay
- Website: https://vnpay.vn
- Hotline: 1900 55 55 77
- Email: support@vnpay.vn

### MoMo
- Website: https://business.momo.vn
- Hotline: 1900 54 54 41
- Email: business@momo.vn

---

## 📚 Tài liệu tham khảo

- [VNPay API Documentation](https://sandbox.vnpayment.vn/apis/docs/huong-dan-tich-hop/)
- [MoMo API Documentation](https://developers.momo.vn/)
