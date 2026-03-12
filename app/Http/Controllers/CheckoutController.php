<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $cartKey => $item) {
            $productId = $item['product_id'] ?? $cartKey;
            $product = Product::find($productId);
            if ($product) {
                $price = $item['price'] ?? ($product->sale_price > 0 ? $product->sale_price : $product->price);
                $itemTotal = $price * $item['quantity'];
                $cartItems[] = [
                    'id' => $cartKey,
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'total' => $itemTotal,
                    'color' => $item['color'] ?? null,
                ];
                $subtotal += $itemTotal;
            }
        }

        $customer = auth('customer')->user();

        return view('Customers.Checkout.index', compact('cartItems', 'subtotal', 'customer'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'payment_method' => 'required|in:cod,bank_transfer,momo,vnpay',
            'notes' => 'nullable|string|max:1000',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        // Kiểm tra stock trước khi đặt hàng
        foreach ($cart as $cartKey => $item) {
            $productId = $item['product_id'] ?? $cartKey;
            $product = Product::find($productId);
            $color = $item['color'] ?? null;

            if (!$product) {
                return back()->with('error', 'Sản phẩm không tồn tại!');
            }

            // Kiểm tra stock theo màu
            $stock = $product->stock_quantity ?? 0;
            if ($color && $product->colors) {
                foreach ($product->colors as $c) {
                    if (($c['color'] ?? '') === $color) {
                        $stock = (int) ($c['stock'] ?? 0);
                        break;
                    }
                }
            }

            if ($stock < $item['quantity']) {
                return back()->with('error', "Sản phẩm \"{$product->name}\" không đủ số lượng trong kho!");
            }
        }

        // Tính subtotal
        $subtotal = 0;
        $orderItems = [];

        foreach ($cart as $cartKey => $item) {
            $productId = $item['product_id'] ?? $cartKey;
            $product = Product::find($productId);
            $price = $item['price'] ?? ($product->sale_price > 0 ? $product->sale_price : $product->price);
            $itemTotal = $price * $item['quantity'];
            $subtotal += $itemTotal;

            $orderItems[] = [
                'product' => $product,
                'quantity' => $item['quantity'],
                'price' => $item['original_price'] ?? $product->price,
                'sale_price' => $item['sale_price'] ?? $product->sale_price,
                'total' => $itemTotal,
                'color' => $item['color'] ?? null,
            ];
        }

        // Tạo order
        $order = Orders::create([
            'order_code' => 'FT-' . strtoupper(Str::random(8)),
            'customer_id' => auth('customer')->id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
            'order_status' => 'pending',
            'subtotal' => $subtotal,
            'discount' => 0,
            'total' => $subtotal,
            'notes' => $request->notes,
        ]);

        // Tạo order details & giảm stock
        foreach ($orderItems as $item) {
            OrderDetails::create([
                'order_id' => (string) $order->_id,
                'product_id' => (string) $item['product']->_id,
                'product_name' => $item['product']->name,
                'product_image' => $item['product']->image,
                'color' => $item['color'],
                'price' => $item['price'],
                'sale_price' => $item['sale_price'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
            ]);

            // Giảm stock theo màu hoặc stock chung
            // Re-fetch product để tránh ghi đè khi cùng sản phẩm nhiều màu
            $product = Product::find($item['product']->_id);
            $color = $item['color'];
            if ($color && $product->colors) {
                $colors = $product->colors;
                foreach ($colors as $idx => $c) {
                    if (($c['color'] ?? '') === $color) {
                        $colors[$idx]['stock'] = max(0, (int) ($c['stock'] ?? 0) - $item['quantity']);
                        break;
                    }
                }
                $product->colors = $colors;
                $product->save();
            } else {
                $product->decrement('stock_quantity', $item['quantity']);
            }
            $product->increment('sales_count', $item['quantity']);
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->_id)
            ->with('success', 'Đặt hàng thành công!');
    }

    public function success($id)
    {
        $order = Orders::with('orderDetails')->findOrFail($id);

        // Chỉ cho xem đơn hàng của chính mình
        if ((string) $order->customer_id !== (string) auth('customer')->id()) {
            abort(403);
        }

        return view('Customers.Checkout.success', compact('order'));
    }
}
