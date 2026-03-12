<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
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

        return view('Customers.Cart.index', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);
        $id = (string) $product->_id;

        // Xác định giá theo màu được chọn hoặc giá chung
        $selectedColor = $request->color;
        $price = 0;
        $originalPrice = 0;
        $salePrice = 0;
        $stockLimit = $product->stock_quantity ?? 0;

        if ($selectedColor && $product->colors && count($product->colors) > 0) {
            foreach ($product->colors as $colorItem) {
                if (($colorItem['color'] ?? '') === $selectedColor) {
                    $originalPrice = (float) ($colorItem['price'] ?? 0);
                    $salePrice = (float) ($colorItem['sale_price'] ?? 0);
                    $price = ($salePrice > 0 && $salePrice < $originalPrice) ? $salePrice : $originalPrice;
                    $stockLimit = (int) ($colorItem['stock'] ?? 0);
                    break;
                }
            }
        } elseif ($product->colors && count($product->colors) > 0) {
            // Không chọn màu, lấy màu đầu tiên
            $firstColor = $product->colors[0];
            $originalPrice = (float) ($firstColor['price'] ?? 0);
            $salePrice = (float) ($firstColor['sale_price'] ?? 0);
            $price = ($salePrice > 0 && $salePrice < $originalPrice) ? $salePrice : $originalPrice;
            $stockLimit = (int) ($firstColor['stock'] ?? 0);
            $selectedColor = $firstColor['color'] ?? null;
        } else {
            $originalPrice = (float) $product->price;
            $salePrice = (float) $product->sale_price;
            $price = ($salePrice > 0 && $salePrice < $originalPrice) ? $salePrice : $originalPrice;
            $stockLimit = $product->stock_quantity ?? 0;
        }

        // Tạo cart key theo product + màu
        $cartKey = $selectedColor ? $id . '_' . $selectedColor : $id;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => $id,
                'quantity' => $request->quantity,
                'price' => $price,
                'original_price' => $originalPrice,
                'sale_price' => $salePrice,
                'color' => $selectedColor,
            ];
        }

        // Không cho vượt quá stock
        if ($cart[$cartKey]['quantity'] > $stockLimit) {
            $cart[$cartKey]['quantity'] = $stockLimit;
        }

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
                'cartCount' => array_sum(array_column($cart, 'quantity')),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $cartKey = $request->product_id;

        if (isset($cart[$cartKey])) {
            $productId = $cart[$cartKey]['product_id'] ?? $cartKey;
            $product = Product::find($productId);

            // Xác định stock limit theo màu
            $stockLimit = $product ? ($product->stock_quantity ?? 0) : $request->quantity;
            $color = $cart[$cartKey]['color'] ?? null;
            if ($color && $product && $product->colors) {
                foreach ($product->colors as $c) {
                    if (($c['color'] ?? '') === $color) {
                        $stockLimit = (int) ($c['stock'] ?? 0);
                        break;
                    }
                }
            }

            $cart[$cartKey]['quantity'] = min($request->quantity, $stockLimit);
            session()->put('cart', $cart);

            $price = $cart[$cartKey]['price'];
            $itemTotal = $price * $cart[$cartKey]['quantity'];

            // Tính lại subtotal
            $subtotal = 0;
            foreach ($cart as $cid => $cItem) {
                $subtotal += ($cItem['price'] ?? 0) * $cItem['quantity'];
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'itemTotal' => number_format($itemTotal, 0, ',', '.'),
                    'subtotal' => number_format($subtotal, 0, ',', '.'),
                    'cartCount' => array_sum(array_column($cart, 'quantity')),
                ]);
            }
        }

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        if ($request->wantsJson()) {
            $subtotal = 0;
            foreach ($cart as $cid => $cItem) {
                $subtotal += ($cItem['price'] ?? 0) * $cItem['quantity'];
            }

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa sản phẩm khỏi giỏ hàng!',
                'subtotal' => number_format($subtotal, 0, ',', '.'),
                'cartCount' => array_sum(array_column($cart, 'quantity')),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Đã xóa toàn bộ giỏ hàng!');
    }
}
