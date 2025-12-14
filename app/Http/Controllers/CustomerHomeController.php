<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Specifications;

class CustomerHomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm nổi bật
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with('brand')
            ->take(8)
            ->get();

        // Lấy sản phẩm theo từng danh mục
        $smartphones = Product::where('is_active', true)
            ->where('category', 'Smartphone')
            ->with('brand')
            ->take(8)
            ->get();

        $laptops = Product::where('is_active', true)
            ->where('category', 'Laptop')
            ->with('brand')
            ->take(8)
            ->get();

        $tablets = Product::where('is_active', true)
            ->where('category', 'Tablet')
            ->with('brand')
            ->take(8)
            ->get();

        $computers = Product::where('is_active', true)
            ->where('category', 'Computer')
            ->with('brand')
            ->take(8)
            ->get();

        $accessories = Product::where('is_active', true)
            ->where('category', 'Accessory')
            ->with('brand')
            ->take(8)
            ->get();

        // Lấy thương hiệu
        $brands = Brand::where('is_active', true)
            ->orderBy('name')
            ->get();

        // Đếm số lượng sản phẩm theo danh mục
        $categoryCounts = [
            'Smartphone' => Product::where('category', 'Smartphone')->where('is_active', true)->count(),
            'Laptop' => Product::where('category', 'Laptop')->where('is_active', true)->count(),
            'Tablet' => Product::where('category', 'Tablet')->where('is_active', true)->count(),
            'Computer' => Product::where('category', 'Computer')->where('is_active', true)->count(),
            'Accessory' => Product::where('category', 'Accessory')->where('is_active', true)->count(),
            'Other' => Product::where('category', 'Other')->where('is_active', true)->count(),
        ];

        return view('Customers.Home.home', compact(
            'featuredProducts',
            'smartphones',
            'laptops',
            'tablets',
            'computers',
            'accessories',
            'brands',
            'categoryCounts'
        ));
    }

    /**
     * Hiển thị chi tiết sản phẩm
     */
    public function productDetail($slug)
    {
        // Tìm sản phẩm theo slug
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with('brand')
            ->firstOrFail();

        // Tăng lượt xem
        $product->increment('views_count');

        // Lấy thông số kỹ thuật
        $specifications = Specifications::where('product_id', $product->id)
            ->orderBy('order')
            ->get();

        // Lấy reviews của sản phẩm
        $reviews = \App\Models\Review::where('product_id', $product->_id)
            ->where('is_approved', true)
            ->with('customer')
            ->orderBy('created_at', 'desc')
            ->get();

        // Lấy sản phẩm liên quan (cùng category hoặc brand)
        $relatedProducts = Product::where('is_active', true)
            ->where('_id', '!=', $product->_id)
            ->where(function($query) use ($product) {
                $query->where('category', $product->category)
                      ->orWhere('brand_id', $product->brand_id);
            })
            ->with('brand')
            ->take(4)
            ->get();

        return view('Customers.Products.detail', compact(
            'product',
            'specifications',
            'relatedProducts',
            'reviews'
        ));
    }

    /**
     * Hiển thị sản phẩm theo danh mục
     */
    public function category(Request $request, $category)
    {
        // Map slug to category name
        $categoryMap = [
            'smartphone' => 'Smartphone',
            'laptop' => 'Laptop',
            'tablet' => 'Tablet',
            'computer' => 'Computer',
            'accessory' => 'Accessory',
            'component' => 'Component',
            'other' => 'Other'
        ];

        $categoryName = $categoryMap[$category] ?? abort(404);

        // Base query
        $query = Product::where('is_active', true)
            ->where('category', $categoryName)
            ->with('brand');

        // Search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Brand filter
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }

        // Price range filter
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'popular':
                $query->orderBy('views_count', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Paginate
        $products = $query->paginate(12)->appends($request->query());

        // Get brands for filter
        $brands = Brand::where('is_active', true)->orderBy('name')->get();

        // Category info
        $categoryInfo = [
            'slug' => $category,
            'name' => $categoryName,
            'count' => Product::where('category', $categoryName)->where('is_active', true)->count()
        ];

        return view('Customers.Products.category', compact(
            'products',
            'brands',
            'categoryInfo'
        ));
    }
    public function profile_detail(){
        // Lấy thông tin khách hàng đang đăng nhập
        $customer = auth()->guard('customer')->user();

        if (!$customer) {
            return redirect()->route('customer.login')
                ->with('error', 'Vui lòng đăng nhập để xem thông tin cá nhân');
        }

        return view('Customers.profile_detail', compact('customer'));
    }
}
