<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product')->id ?? null;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $productId,
            'sku' => 'required|string|max:100|unique:products,sku,' . $productId,
            'color' => 'nullable|string|max:100',
            'category' => 'required|in:Smartphone,Tablet,Laptop,Computer,Accessory,Other',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'specifications.*.label' => 'nullable|string|max:100',
            'specifications.*.value' => 'nullable|string|max:255',
            'specifications.*.unit' => 'nullable|string|max:50',
            'existing_specs.*.id' => 'nullable|exists:specifications,id',
            'existing_specs.*.label' => 'nullable|string|max:100',
            'existing_specs.*.value' => 'nullable|string|max:255',
            'existing_specs.*.unit' => 'nullable|string|max:50',
            'deleted_specs' => 'nullable|string',
        ];
    }
}
