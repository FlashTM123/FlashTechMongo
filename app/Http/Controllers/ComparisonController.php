<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    /**
     * Show comparison page
     */
    public function index()
    {
        $compared = session()->get('comparison', []);
        $products = collect();

        if (!empty($compared)) {
            $products = Product::whereIn('_id', $compared)->get();
        }

        return view('customers.comparison.index', [
            'products' => $products,
            'count' => count($compared),
        ]);
    }

    /**
     * Add product to comparison
     */
    public function add(Request $request, Product $product)
    {
        $compared = session()->get('comparison', []);

        // Check if product already in comparison
        if (in_array((string)$product->_id, $compared)) {
            return response()->json([
                'success' => false,
                'message' => __('messages.compare.added'),
            ], 200);
        }

        // Check max 5 products
        if (count($compared) >= 5) {
            return response()->json([
                'success' => false,
                'message' => __('messages.compare.max'),
            ], 400);
        }

        $compared[] = (string)$product->_id;
        session()->put('comparison', $compared);

        return response()->json([
            'success' => true,
            'message' => __('messages.compare.added'),
            'count' => count($compared),
        ]);
    }

    /**
     * Remove product from comparison
     */
    public function remove(Request $request, $productId)
    {
        $compared = session()->get('comparison', []);
        $compared = array_filter($compared, fn($id) => $id !== $productId);
        session()->put('comparison', array_values($compared));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('messages.compare.removed'),
                'count' => count($compared),
            ]);
        }

        return redirect()->route('comparison.index')->with('success', __('messages.compare.removed'));
    }

    /**
     * Clear all comparisons
     */
    public function clear()
    {
        session()->forget('comparison');

        return redirect()->route('comparison.index')->with('success', __('messages.compare.clear'));
    }

    /**
     * Get comparison count (for AJAX)
     */
    public function count()
    {
        $compared = session()->get('comparison', []);

        return response()->json([
            'count' => count($compared),
        ]);
    }

    /**
     * Check if product is in comparison
     */
    public function isInComparison($productId)
    {
        $compared = session()->get('comparison', []);

        return response()->json([
            'in_comparison' => in_array($productId, $compared),
        ]);
    }
}
