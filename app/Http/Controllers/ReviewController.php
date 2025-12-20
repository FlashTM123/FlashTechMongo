<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Lưu hoặc cập nhật đánh giá
     */
    public function store(Request $request, $productSlug)
    {
        // Kiểm tra đăng nhập chuẩn Laravel guard
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customers.login')
                ->with('error', 'Vui lòng đăng nhập để đánh giá sản phẩm');
        }

        $product = Product::where('slug', $productSlug)->firstOrFail();
        $customer = Auth::guard('customer')->user();

        // Validate
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'required|string|min:10|max:1000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'rating.required' => 'Vui lòng chọn số sao đánh giá',
            'comment.required' => 'Vui lòng nhập nội dung đánh giá',
            'comment.min' => 'Nội dung đánh giá phải có ít nhất 10 ký tự',
        ]);

        // Kiểm tra đã đánh giá chưa
        $existingReview = Review::where('product_id', $product->_id)
            ->where('customer_id', $customer->_id)
            ->first();

        // Upload ảnh mới nếu có
        $images = $existingReview ? ($existingReview->images ?? []) : [];
        if ($request->hasFile('images')) {
            // Xóa ảnh cũ nếu đang update (nếu muốn xoá Cloudinary thì cần thêm API, ở đây chỉ clear DB)
            $images = [];
            foreach ($request->file('images') as $image) {
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'reviews'
                ])->getSecurePath();
                $images[] = $uploadedFileUrl;
            }
        }

        if ($existingReview) {
            // Cập nhật review cũ
            $existingReview->update([
                'rating' => $validated['rating'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
                'images' => $images,
            ]);
            $message = 'Đánh giá của bạn đã được cập nhật!';
        } else {
            // Tạo review mới
            Review::create([
                'product_id' => $product->_id,
                'customer_id' => $customer->_id,
                'rating' => $validated['rating'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
                'images' => $images,
                'is_verified' => false,
                'is_approved' => true,
                'helpful_count' => 0,
            ]);
            $message = 'Cảm ơn bạn đã đánh giá sản phẩm!';
        }

        // Cập nhật rating trung bình của sản phẩm
        $avgRating = Review::where('product_id', $product->_id)->avg('rating');
        $product->update(['rating' => round($avgRating, 2)]);

        return back()->with('review_success', $message);
    }

    /**
     * Xóa đánh giá
     */
    public function destroy($reviewId)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $customer = Auth::guard('customer')->user();
        $review = Review::where('_id', $reviewId)
            ->where('customer_id', $customer->_id)
            ->first();

        if (!$review) {
            return back()->with('review_error', 'Không tìm thấy đánh giá hoặc bạn không có quyền xóa');
        }

        // Xóa ảnh
        if ($review->images) {
            foreach ($review->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $productId = $review->product_id;
        $review->delete();

        // Cập nhật rating trung bình
        $avgRating = Review::where('product_id', $productId)->avg('rating') ?? 0;
        Product::where('_id', $productId)->update(['rating' => round($avgRating, 2)]);

        return back()->with('review_success', 'Đánh giá đã được xóa');
    }

    /**
     * Đánh dấu review hữu ích
     */
    public function helpful($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->increment('helpful_count');

        return response()->json(['helpful_count' => $review->helpful_count]);
    }
}
