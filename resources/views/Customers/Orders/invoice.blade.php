<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn #{{ $order->order_code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 5px;
        }

        .company-info {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }

        .invoice-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
            color: #1e40af;
        }

        .invoice-info {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }

        .invoice-info-left,
        .invoice-info-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }

        .info-section {
            margin-bottom: 20px;
        }

        .info-title {
            font-weight: bold;
            font-size: 13px;
            color: #1e40af;
            margin-bottom: 8px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 5px;
        }

        .info-row {
            margin-bottom: 5px;
            font-size: 11px;
        }

        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .products-table thead {
            background-color: #2563eb;
            color: white;
        }

        .products-table th {
            padding: 10px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
        }

        .products-table td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
        }

        .products-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .summary-table {
            width: 300px;
            margin-left: auto;
            margin-top: 20px;
        }

        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 8px;
        }

        .summary-label {
            display: table-cell;
            text-align: right;
            padding-right: 15px;
            font-size: 11px;
        }

        .summary-value {
            display: table-cell;
            text-align: right;
            font-weight: bold;
            font-size: 11px;
        }

        .total-row {
            border-top: 2px solid #2563eb;
            padding-top: 10px;
            margin-top: 10px;
        }

        .total-row .summary-label,
        .total-row .summary-value {
            font-size: 14px;
            color: #2563eb;
            font-weight: bold;
        }

        .payment-info {
            margin-top: 30px;
            padding: 15px;
            background-color: #f3f4f6;
            border-left: 4px solid #2563eb;
        }

        .payment-info-title {
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 8px;
            color: #1e40af;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-processing {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-shipping {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .status-completed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .product-color {
            display: inline-block;
            padding: 2px 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            font-size: 10px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <div class="company-name">⚡ FLASHTECH</div>
        <div class="company-info">
            Địa chỉ: 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh<br>
            Điện thoại: (028) 1234 5678 | Email: support@flashtech.vn<br>
            Website: www.flashtech.vn
        </div>
        <div class="invoice-title">HÓA ĐƠN BÁN HÀNG</div>
    </div>

    <div class="invoice-info">
        <div class="invoice-info-left">
            <div class="info-section">
                <div class="info-title">Thông tin đơn hàng</div>
                <div class="info-row">
                    <span class="info-label">Mã đơn hàng:</span>
                    <strong>{{ $order->order_code }}</strong>
                </div>
                <div class="info-row">
                    <span class="info-label">Ngày đặt:</span>
                    {{ $order->created_at->format('d/m/Y H:i') }}
                </div>
                <div class="info-row">
                    <span class="info-label">Trạng thái:</span>
                    @php
                        $statusClass = match($order->order_status) {
                            'pending' => 'status-pending',
                            'processing' => 'status-processing',
                            'shipping' => 'status-shipping',
                            'completed' => 'status-completed',
                            'cancelled' => 'status-cancelled',
                            default => 'status-pending'
                        };
                        $statusText = match($order->order_status) {
                            'pending' => 'Chờ xử lý',
                            'processing' => 'Đang xử lý',
                            'shipping' => 'Đang giao',
                            'completed' => 'Đã giao',
                            'cancelled' => 'Đã hủy',
                            default => 'Chờ xử lý'
                        };
                    @endphp
                    <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                </div>
            </div>
        </div>

        <div class="invoice-info-right">
            <div class="info-section">
                <div class="info-title">Thông tin khách hàng</div>
                <div class="info-row">
                    <span class="info-label">Họ tên:</span>
                    {{ $order->full_name }}
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    {{ $order->email }}
                </div>
                <div class="info-row">
                    <span class="info-label">Số điện thoại:</span>
                    {{ $order->phone_number }}
                </div>
                <div class="info-row">
                    <span class="info-label">Địa chỉ giao hàng:</span>
                    {{ $order->shipping_address }}
                </div>
            </div>
        </div>
    </div>

    <table class="products-table">
        <thead>
            <tr>
                <th style="width: 5%;">STT</th>
                <th style="width: 45%;">Sản phẩm</th>
                <th style="width: 15%;" class="text-center">Số lượng</th>
                <th style="width: 17%;" class="text-right">Đơn giá</th>
                <th style="width: 18%;" class="text-right">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->details as $index => $detail)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>
                    {{ $detail->product_name }}
                    @if($detail->color)
                        <span class="product-color">{{ $detail->color }}</span>
                    @endif
                </td>
                <td class="text-center">{{ $detail->quantity }}</td>
                <td class="text-right">
                    {{ number_format($detail->sale_price > 0 ? $detail->sale_price : $detail->price, 0, ',', '.') }} ₫
                </td>
                <td class="text-right">
                    {{ number_format($detail->total, 0, ',', '.') }} ₫
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary-table">
        <div class="summary-row">
            <div class="summary-label">Tạm tính:</div>
            <div class="summary-value">{{ number_format($order->subtotal, 0, ',', '.') }} ₫</div>
        </div>

        @if($order->discount > 0)
        <div class="summary-row">
            <div class="summary-label">
                Giảm giá
                @if($order->coupon_code)
                    ({{ $order->coupon_code }}):
                @else
                    :
                @endif
            </div>
            <div class="summary-value" style="color: #dc2626;">
                -{{ number_format($order->discount, 0, ',', '.') }} ₫
            </div>
        </div>
        @endif

        <div class="summary-row total-row">
            <div class="summary-label">TỔNG CỘNG:</div>
            <div class="summary-value">{{ number_format($order->total, 0, ',', '.') }} ₫</div>
        </div>
    </div>

    <div class="payment-info">
        <div class="payment-info-title">Thông tin thanh toán</div>
        <div class="info-row">
            <span class="info-label">Phương thức:</span>
            @php
                $paymentMethod = match($order->payment_method) {
                    'cod' => 'Thanh toán khi nhận hàng (COD)',
                    'bank_transfer' => 'Chuyển khoản ngân hàng',
                    'momo' => 'Ví điện tử MoMo',
                    'vnpay' => 'Cổng thanh toán VNPay',
                    default => 'Chưa xác định'
                };
            @endphp
            {{ $paymentMethod }}
        </div>
        <div class="info-row">
            <span class="info-label">Trạng thái thanh toán:</span>
            @if($order->payment_status === 'paid')
                <strong style="color: #059669;">Đã thanh toán</strong>
            @else
                <strong style="color: #dc2626;">Chưa thanh toán</strong>
            @endif
        </div>

        @if($order->notes)
        <div class="info-row" style="margin-top: 10px;">
            <span class="info-label">Ghi chú:</span>
            {{ $order->notes }}
        </div>
        @endif
    </div>

    <div class="footer">
        <p><strong>Cảm ơn quý khách đã mua hàng tại FlashTech!</strong></p>
        <p>Mọi thắc mắc xin vui lòng liên hệ: support@flashtech.vn hoặc hotline: (028) 1234 5678</p>
        <p style="margin-top: 10px; font-style: italic;">
            Hóa đơn được tạo tự động bởi hệ thống - In lúc {{ now()->format('d/m/Y H:i:s') }}
        </p>
    </div>
</body>
</html>
