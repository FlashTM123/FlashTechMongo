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

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $price = $product->sale_price > 0 ? $product->sale_price : $product->price;
                $itemTotal = $price * $item['quantity'];
                $cartItems[] = [
                    'id' => $id,
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'total' => $itemTotal,
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

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'quantity' => $request->quantity,
            ];
        }

        // Không cho vượt quá stock
        if ($cart[$id]['quantity'] > $product->stock_quantity) {
            $cart[$id]['quantity'] = $product->stock_quantity;
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
        $id = $request->product_id;

        if (isset($cart[$id])) {
            $product = Product::find($id);
            $cart[$id]['quantity'] = min($request->quantity, $product ? $product->stock_quantity : $request->quantity);
            session()->put('cart', $cart);

            $price = $product && $product->sale_price > 0 ? $product->sale_price : $product->price;
            $itemTotal = $price * $cart[$id]['quantity'];

            // Tính lại subtotal
            $subtotal = 0;
            foreach ($cart as $cid => $item) {
                $p = Product::find($cid);
                if ($p) {
                    $pPrice = $p->sale_price > 0 ? $p->sale_price : $p->price;
                    $subtotal += $pPrice * $item['quantity'];
                }
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
            foreach ($cart as $cid => $item) {
                $p = Product::find($cid);
                if ($p) {
                    $pPrice = $p->sale_price > 0 ? $p->sale_price : $p->price;
                    $subtotal += $pPrice * $item['quantity'];
                }
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
