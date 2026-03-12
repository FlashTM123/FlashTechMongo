<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Orders::with('customer');

        // Filter by order status
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Search by order code, customer name, email, phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                  ->orWhere('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        $orders = $query->orderBy('created_at', 'desc')->get();

        return view('Admins.Orders.list', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Orders::with(['customer', 'orderDetails'])->findOrFail($id);
        return view('Admins.Orders.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $oldStatus = $order->order_status;

        $validated = $request->validate([
            'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'required|in:unpaid,paid,failed,refunded',
        ]);

        $order->order_status = $validated['order_status'];
        $order->payment_status = $validated['payment_status'];
        $order->save();

        // Hoàn lại tồn kho khi hủy đơn
        if ($validated['order_status'] === 'cancelled' && $oldStatus !== 'cancelled') {
            foreach ($order->orderDetails as $detail) {
                // Re-fetch product mỗi lần để tránh ghi đè khi cùng sản phẩm nhiều màu
                $product = Product::find($detail->product_id);
                if ($product) {
                    $color = $detail->color ?? null;
                    if ($color && $product->colors) {
                        $colors = $product->colors;
                        foreach ($colors as $idx => $c) {
                            if (($c['color'] ?? '') === $color) {
                                $colors[$idx]['stock'] = (int) ($c['stock'] ?? 0) + $detail->quantity;
                                break;
                            }
                        }
                        $product->colors = $colors;
                        $product->save();
                    } else {
                        $product->increment('stock_quantity', $detail->quantity);
                    }
                    $product = Product::find($detail->product_id);
                    $product->decrement('sales_count', $detail->quantity);
                }
            }
        }

        return redirect()->route('orders.show', $order->id)
            ->with('success', "Đơn hàng #{$order->order_code} đã được cập nhật!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', "Đơn hàng #{$order->order_code} đã được xóa!");
    }
}
