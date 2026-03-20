<?php

namespace App\Services;

use App\Models\Notification;
use App\Events\NotificationCreated;

class NotificationService
{
    /**
     * Create notification for order placed
     */
    public static function orderPlaced($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'order_placed',
            'title' => 'Đơn hàng #' . $order->order_code . ' đã được tạo',
            'message' => 'Đơn hàng của bạn đã được tạo thành công với tổng cộng: ' . number_format($order->total_price, 0) . '₫',
            'icon' => '📦',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }

    /**
     * Create notification for order confirmed
     */
    public static function orderConfirmed($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'order_confirmed',
            'title' => 'Đơn hàng #' . $order->order_code . ' đã được xác nhận',
            'message' => 'Đơn hàng của bạn đã được xác nhận. Vui lòng chờ để giao hàng.',
            'icon' => '✅',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }

    /**
     * Create notification for order shipped
     */
    public static function orderShipped($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'order_shipped',
            'title' => 'Đơn hàng #' . $order->order_code . ' đang được giao',
            'message' => 'Đơn hàng của bạn đang trên đường đến địa chỉ nhận hàng của bạn.',
            'icon' => '🚚',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }

    /**
     * Create notification for order delivered
     */
    public static function orderDelivered($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'order_delivered',
            'title' => 'Đơn hàng #' . $order->order_code . ' đã được giao thành công',
            'message' => 'Đơn hàng của bạn đã được giao. Cảm ơn bạn đã mua hàng tại FlashTech!',
            'icon' => '📪',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }

    /**
     * Create notification for order cancelled
     */
    public static function orderCancelled($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'order_cancelled',
            'title' => 'Đơn hàng #' . $order->order_code . ' đã bị hủy',
            'message' => 'Đơn hàng của bạn đã bị hủy và các sản phẩm đã được hoàn kho.',
            'icon' => '❌',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }

    /**
     * Create notification for payment confirmed
     */
    public static function paymentConfirmed($customer, $order)
    {
        $notification = Notification::create([
            'customer_id' => $customer->_id,
            'order_id' => $order->_id,
            'type' => 'payment_confirmed',
            'title' => 'Thanh toán cho đơn hàng #' . $order->order_code . ' đã được xác nhận',
            'message' => 'Thanh toán của bạn đã được xác nhận. Đơn hàng sẽ được xử lý sớm.',
            'icon' => '💳',
            'action_url' => route('customers.orders.detail', $order->_id),
        ]);

        broadcast(new NotificationCreated($notification))->toOthers();

        return $notification;
    }
}
