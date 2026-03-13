# 🎨 Color Selection Feature - Image Display Fix

## 🐛 Issue Fixed

**Error 500** khi click vào sản phẩm → khi click màu, hình không hiển thị

### Root Causes
1. **MongoDB Colors Storage**: Colors lưu dưới dạng JSON string, không tự động parse thành array
2. **Image URL Format**: Colors images không được format với `/storage/` prefix
3. **Template Logic**: Phức tạp với nhiều `Str::startsWith()` checks

---

## ✅ Solution Implemented

### 1. Product Model Fixes

#### `getColorsAttribute()` - Parse & Format
```php
public function getColorsAttribute($value)
{
    if (!$value) return [];
    
    // Parse JSON string to array
    $colors = is_array($value) ? $value : json_decode($value, true) ?? [];
    
    // Format image URLs in each color
    return collect($colors)->map(function ($color) {
        if (isset($color['images']) && is_array($color['images'])) {
            $color['images'] = array_map(function ($img) {
                if (!$img) return null;
                if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://') || str_starts_with($img, '/storage/')) {
                    return $img;
                }
                return '/storage/' . $img;  // Auto prepend /storage/
            }, $color['images']);
        }
        return $color;
    })->toArray();
}
```

#### `setColorsAttribute()` - Ensure JSON Storage
```php
public function setColorsAttribute($value)
{
    if (is_array($value)) {
        $this->attributes['colors'] = json_encode($value);  // Array → JSON
    } else if (is_string($value) && json_decode($value, true)) {
        $this->attributes['colors'] = $value;  // Valid JSON string
    } else {
        $this->attributes['colors'] = json_encode([]);  // Default empty
    }
}
```

### 2. Template Simplification (detail.blade.php)

**Before:**
```blade
@php
    $colorImages = [];
    if (!empty($colorItem['images'])) {
        foreach ((array) $colorItem['images'] as $ci) {
            $colorImages[] = Str::startsWith($ci, 'http') ? $ci : asset('storage/' . $ci);
        }
    }
@endphp
```

**After:**
```blade
@php
    // Colors accessor already returns formatted URLs
    $colorImages = $colorItem['images'] ?? [];
@endphp
```

### 3. JavaScript Feature (selectColor)

**Already implemented** - when user clicks color:
```javascript
function selectColor(element, index) {
    // 1. Get color images from data attribute
    let colorImages = JSON.parse(element.dataset.images || '[]');
    
    // 2. Update main image
    document.getElementById('mainImage').src = colorImages[0];
    
    // 3. Update thumbnails
    const thumbList = document.querySelector('.thumbnail-list');
    colorImages.forEach(function(imgUrl, i) {
        // Create thumbnail item
    });
    
    // 4. Update price, stock, etc.
}
```

---

## 🎯 How It Works Now

### Create/Update Product in Admin
1. Upload colors with images
2. Filament stores: `colors = [{"color":"Đỏ","images":["products/colors/..."],...}]`
3. Model mutator converts to JSON string automatically

### Display on Frontend
1. Product detail page loads
2. Accessor parses JSON → array
3. Images formatted with `/storage/` prefix
4. Template receives: `[{"color":"Đỏ","images":["/storage/products/colors/..."],...}]`

### User Interaction
1. User clicks color option
2. `selectColor()` extracts first image from color
3. Main image updates to: `<img src="/storage/products/colors/..." />`
4. Thumbnails update
5. Price & stock update

---

## 📝 Files Modified

| File | Change |
|------|--------|
| `app/Models/Product.php` | Added getColorsAttribute() & setColorsAttribute() |
| `resources/views/Customers/Products/detail.blade.php` | Simplified color picker code |

---

## 🧪 Testing Checklist

- [ ] Create product with colors & images in admin
- [ ] View product detail → see color picker
- [ ] Click different color → main image changes
- [ ] Verify image URL: `/storage/products/colors/...`
- [ ] Check price updates with color selection
- [ ] Verify stock updates with color selection
- [ ] Thumbnails update when color clicked

---

## 🔍 Debug Tips

If colors don't display:

1. **Check DB**: `db.products.findOne({}, {colors: 1})`
   - Should have valid JSON string
   
2. **Check Accessor**: In tinker
   ```php
   $p = Product::first();
   dd($p->colors);  // Should be parsed array with /storage/ URLs
   ```

3. **Check Template**: Browser DevTools
   ```html
   <!-- data-images should contain valid JSON array -->
   <div class="color-option" data-images='["/storage/products/colors/abc.jpg"]'>
   ```

4. **Check JS Console**: Check if selectColor fires & image src updates

---

## 🚀 Related Features

- Product image accessor (formats path to URL)
- Brand logo accessor
- Customer profile picture accessor
- Review images accessor
- All use same pattern for URL formatting

