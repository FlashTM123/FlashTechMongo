@component('mail::message')
# Xác nhận đơn hàng

Xin chào {{ $order->full_name }},

Cảm ơn bạn đã đặt hàng tại **FlashTech**! Chúng tôi đã nhận được đơn hàng của bạn.

---

## Chi tiết đơn hàng

| Thông tin | Chi tiết |
| --- | --- |
| **Mã đơn hàng** | {{ $order->order_code }} |
| **Ngày đặt hàng** | {{ $order->created_at->format('d/m/Y H:i') }} |
| **Trạng thái** | Chờ xác nhận |
| **Phương thức thanh toán** | {{ strtoupper($order->payment_method) }} |

---

## Sản phẩm

@foreach ($orderItems as $item)
**{{ $item->product_name }}** (SKU: {{ $item->product_code ?? 'N/A' }})
- Số lượng: {{ $item->quantity }}
- Đơn giá: {{ number_format($item->price, 0, ',', '.') }} ₫
@if ($item->color)
- Màu: {{ $item->color }}
@endif
- Thành tiền: {{ number_format($item->total, 0, ',', '.') }} ₫

---

@endforeach

## Tóm tắt đơn hàng

| Mục | Giá trị |
| --- | --- |
| Tạm tính | {{ number_format($subtotal, 0, ',', '.') }} ₫ |
@if ($discount > 0)
| Giảm giá | -{{ number_format($discount, 0, ',', '.') }} ₫ |
@endif
| **Tổng cộng** | **{{ number_format($total, 0, ',', '.') }} ₫** |

---

## Địa chỉ giao hàng

{{ $order->full_name }}
{{ $order->shipping_address }}
Điện thoại: {{ $order->phone_number }}

---

## Tiếp theo

Chúng tôi sẽ xác nhận đơn hàng của bạn trong vòng 24 giờ. Bạn sẽ nhận được email thông báo khi hàng được chuẩn bị gửi.

Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi:
- **Email**: support@flashtech.vn
- **Hotline**: 1900 xxxx

---

Cảm ơn bạn đã mua sắm tại **FlashTech**!

@component('mail::button', ['url' => route('customers.orders')])
Xem đơn hàng của tôi
@endcomponent

---

*Đây là email tự động, vui lòng không trả lời email này.*
@endcomponent
