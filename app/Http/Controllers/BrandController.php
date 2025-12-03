<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('Admins.Brands.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admins.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'slug' => 'nullable|string|max:255|unique:brands,slug', // Có thể nullable
            'description' => 'nullable|string|max:500',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        // Auto-generate slug nếu không có
        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Brand::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            'website' => $validated['website'] ?? null,
            'logo' => $logoPath,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('brands.index')
            ->with('success', "Brand '{$validated['name']}' created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        
        return view('Admins.Brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'nullable|string|max:255|unique:brands,slug,' . $brand->id,
            'description' => 'nullable|string|max:500',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        // Auto-generate slug nếu không có
        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $brand->logo = $logoPath;
        }

        $brand->name = $validated['name'];
        $brand->slug = $validated['slug'];
        $brand->description = $validated['description'] ?? null;
        $brand->website = $validated['website'] ?? null;
        $brand->is_active = $validated['is_active'] ?? true;
        $brand->save();

        return redirect()->route('brands.index')
            ->with('success', "Brand '{$validated['name']}' updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
