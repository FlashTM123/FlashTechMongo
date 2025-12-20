<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

        // Handle main image upload with Cloudinary
        if ($request->hasFile('image')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'products'
            ])->getSecurePath();
            $validated['image'] = $uploadedFileUrl;
        }

        // Handle multiple images upload with Cloudinary
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'products'
                ])->getSecurePath();
                $images[] = $uploadedFileUrl;
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

        // Handle main image upload with Cloudinary
        if ($request->hasFile('image')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'products'
            ])->getSecurePath();
            $validated['image'] = $uploadedFileUrl;
        }

        // Handle multiple images upload with Cloudinary
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'products'
                ])->getSecurePath();
                $images[] = $uploadedFileUrl;
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
}
