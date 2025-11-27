<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%")
                  ->orWhere('customer_code', 'like', "%{$search}%");
            });
        }

        // Filter by membership tier
        if ($request->has('tier') && $request->tier) {
            $query->where('membership_tier', $request->tier);
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 5);
        $customers = $query->paginate($perPage);

        // Statistics
        $stats = [
            'total' => Customer::count(),
            'active' => Customer::where('status', 'active')->count(),
            'bronze' => Customer::where('membership_tier', 'bronze')->count(),
            'silver' => Customer::where('membership_tier', 'silver')->count(),
            'gold' => Customer::where('membership_tier', 'gold')->count(),
            'platinum' => Customer::where('membership_tier', 'platinum')->count(),
        ];

        // Check if it's an AJAX request
        if (request()->ajax()) {
            return response()->json([
                'customers' => $customers->items(),
                'stats' => $stats,
                'pagination' => [
                    'current_page' => $customers->currentPage(),
                    'last_page' => $customers->lastPage(),
                    'per_page' => $customers->perPage(),
                    'total' => $customers->total(),
                    'from' => $customers->firstItem(),
                    'to' => $customers->lastItem(),
                ]
            ]);
        }

        return view('Admins.Customers.index', compact('customers', 'stats'));
    }

    public function destroy(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customerName = $customer->full_name;
            $customer->delete();

            // Return JSON for AJAX requests
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Khách hàng \"{$customerName}\" đã được xóa thành công!",
                    'customer_id' => $id
                ]);
            }

            return redirect()->route('customers.index')
                ->with('success', 'Khách hàng ' . $customerName . ' đã được xóa!');
        } catch (\Exception $e) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra khi xóa khách hàng: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('customers.index')
                ->with('error', 'Có lỗi xảy ra khi xóa khách hàng!');
        }
    }
}
