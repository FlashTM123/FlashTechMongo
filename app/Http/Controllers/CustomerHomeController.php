<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

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
}
