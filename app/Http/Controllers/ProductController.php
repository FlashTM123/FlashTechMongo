<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::with('brand');

        // Search
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by brand
        if (request('brand_id')) {
            $query->where('brand_id', request('brand_id'));
        }

        // Filter by category
        if (request('category')) {
            $query->where('category', request('category'));
        }

        // Filter by status
        if (request('status') !== null && request('status') !== true && request('status') !== false) {
            $query->where('is_active', request('status'));
        }

        // Filter by featured
        if (request('featured')) {
            $query->where('is_featured', true);
        }

        // Sort
        $sort = request('sort', 'newest');
        switch ($sort) {
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default: // newest
                $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        $brands = \App\Models\Brand::where('is_active', true)->orderBy('name')->get();

        return view('Admins.Products.list', compact('products', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('is_active', true)->orderBy('name', 'asc')->get();
        return view('Admins.Products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        }

        // Convert boolean fields
        $validated['is_featured'] = isset($validated['is_featured']) ? (bool)$validated['is_featured'] : false;
        $validated['is_active'] = isset($validated['is_active']) ? (bool)$validated['is_active'] : false;

        // Convert numeric fields
        if (isset($validated['price'])) {
            $validated['price'] = (float)$validated['price'];
        }
        if (isset($validated['sale_price'])) {
            $validated['sale_price'] = (float)$validated['sale_price'];
        }
        if (isset($validated['stock_quantity'])) {
            $validated['stock_quantity'] = (int)$validated['stock_quantity'];
        }

        // Handle main image upload to LOCAL STORAGE (NOT Cloudinary)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;  // Store path only
        }

        // Handle multiple images upload to LOCAL STORAGE (NOT Cloudinary)
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                $images[] = $imagePath;  // Store path only
            }
            $validated['images'] = $images;
        }

        // Create product
        $product = Product::create($validated);

        // Create specifications
        if ($request->has('specifications')) {
            $specifications = [];
            foreach ($request->specifications as $index => $spec) {
                if (!empty($spec['label']) && !empty($spec['value'])) {
                    $specifications[] = [
                        'key' => \Illuminate\Support\Str::slug($spec['label']),
                        'label' => $spec['label'],
                        'value' => $spec['value'],
                        'unit' => $spec['unit'] ?? null,
                        'display_order' => $index + 1,
                    ];
                }
            }
            if (!empty($specifications)) {
                $product->specifications()->createMany($specifications);
            }
        }

        return redirect()->route('products.index')
            ->with('success', "Sản phẩm '{$validated['name']}' đã được tạo thành công!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::where('is_active', true)->orderBy('name', 'asc')->get();
        $product->load('specifications');
        return view('Admins.Products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        }

        // Convert boolean fields
        $validated['is_featured'] = isset($validated['is_featured']) ? (bool)$validated['is_featured'] : false;
        $validated['is_active'] = isset($validated['is_active']) ? (bool)$validated['is_active'] : false;

        // Convert numeric fields
        if (isset($validated['price'])) {
            $validated['price'] = (float)$validated['price'];
        }
        if (isset($validated['sale_price'])) {
            $validated['sale_price'] = (float)$validated['sale_price'];
        }
        if (isset($validated['stock_quantity'])) {
            $validated['stock_quantity'] = (int)$validated['stock_quantity'];
        }

        // Handle main image upload to LOCAL STORAGE (NOT Cloudinary)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;  // Store path only
        }

        // Handle multiple images upload to LOCAL STORAGE (NOT Cloudinary)
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                $images[] = $imagePath;  // Store path only
            }
            $validated['images'] = $images;
        }

        // Update product
        $product->update($validated);

        // Update specifications
        // Delete removed specifications
        if (!empty($validated['deleted_specs'])) {
            $deletedIds = explode(',', $validated['deleted_specs']);
            $product->specifications()->whereIn('id', $deletedIds)->delete();
        }

        // Update existing specifications
        if ($request->has('existing_specs')) {
            foreach ($validated['existing_specs'] as $index => $spec) {
                if (!empty($spec['id'])) {
                    $product->specifications()->where('id', $spec['id'])->update([
                        'label' => $spec['label'],
                        'value' => $spec['value'],
                        'unit' => $spec['unit'] ?? null,
                    ]);
                }
            }
        }

        // Add new specifications
        if ($request->has('specifications')) {
            $newSpecifications = [];
            $existingSpecCount = $product->specifications()->count();
            foreach ($validated['specifications'] as $index => $spec) {
                if (!empty($spec['label']) && !empty($spec['value'])) {
                    $newSpecifications[] = [
                        'key' => \Illuminate\Support\Str::slug($spec['label']),
                        'label' => $spec['label'],
                        'value' => $spec['value'],
                        'unit' => $spec['unit'] ?? null,
                        'display_order' => $existingSpecCount + $index + 1,
                    ];
                }
            }
            if (!empty($newSpecifications)) {
                $product->specifications()->createMany($newSpecifications);
            }
        }

        return redirect()->route('products.index')
            ->with('success', "Sản phẩm '{$validated['name']}' đã được cập nhật thành công!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    /**
     * Search products with suggestions (API endpoint for autocomplete)
     */
    public function search()
    {
        $query = request('q') ?? request('search') ?? '';

        // Minimum 1 character to search
        if (strlen($query) < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Nhập ít nhất 1 ký tự',
                'suggestions' => []
            ]);
        }

        // Search active products only
        $products = Product::where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('sku', 'like', "%{$query}%");
            })
            ->select('_id', 'name', 'sku', 'slug', 'image', 'price', 'sale_price', 'stock_quantity')
            ->limit(8)
            ->get();

        // Format suggestions for autocomplete
        $suggestions = $products->map(function($product) {
            // Handle price when product has multiple colors
            $price = $product->price ?? 0;
            $salePrice = $product->sale_price ?? 0;

            if ($product->colors && is_array($product->colors) && count($product->colors) > 0) {
                // Get price from first color variation
                $firstColor = $product->colors[0];
                if (isset($firstColor['price'])) {
                    $price = $firstColor['price'];
                }
                if (isset($firstColor['sale_price'])) {
                    $salePrice = $firstColor['sale_price'];
                }
            }

            $currentPrice = $salePrice > 0 ? $salePrice : $price;

            // Handle stock when product has multiple colors
            $stock = (int) ($product->stock_quantity ?? 0);
            if ($product->colors && is_array($product->colors) && count($product->colors) > 0) {
                // Get stock from first color
                $firstColor = $product->colors[0];
                $stock = (int) ($firstColor['stock'] ?? $stock);
            }

            return [
                'id' => (string) $product->_id,
                'slug' => $product->slug,
                'name' => $product->name,
                'sku' => $product->sku ?? 'N/A',
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'price' => number_format($currentPrice, 0, ',', '.') . ' ₫',
                'stock' => $stock,
                'inStock' => $stock > 0,
                'stockText' => $stock > 0 ? 'Còn hàng' : 'Hết hàng',
            ];
        });

        return response()->json([
            'success' => true,
            'suggestions' => $suggestions,
            'count' => $suggestions->count()
        ]);
    }
}
