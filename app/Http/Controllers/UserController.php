<?php



namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Users;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use function Flasher\Prime\flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::paginate(5);
        return view('Admins.User.index', compact('users'));
    }

    /**
     * Search users via AJAX
     */
    public function search()
    {
        $query = request('query', '');
        $roles = request('roles', '');
        $statuses = request('statuses', '');
        $dateRange = request('date_range', '');

        $users = Users::query()
            ->when($query, function($q) use ($query) {
                $q->where(function($subQ) use ($query) {
                    $subQ->where('name', 'like', '%' . $query . '%')
                         ->orWhere('email', 'like', '%' . $query . '%')
                         ->orWhere('phone_number', 'like', '%' . $query . '%');
                });
            })
            ->when($roles, function($q) use ($roles) {
                $roleArray = explode(',', $roles);
                $q->whereIn('role', $roleArray);
            })
            ->when($statuses, function($q) use ($statuses) {
                $statusArray = explode(',', $statuses);

                // Nếu chọn cả 2 status, không filter
                if (count($statusArray) === 2) {
                    return;
                }

                $status = $statusArray[0];
                if ($status === 'active') {
                    // Chỉ lấy is_blocked = false hoặc null (không bị khóa)
                    $q->where(function($subQ) {
                        $subQ->where('is_blocked', false)
                             ->orWhere('is_blocked', 0)
                             ->orWhere('is_blocked', '0')
                             ->orWhereNull('is_blocked');
                    });
                } elseif ($status === 'blocked') {
                    // Chỉ lấy is_blocked = true (bị khóa) - hỗ trợ nhiều kiểu dữ liệu
                    $q->where(function($subQ) {
                        $subQ->where('is_blocked', true)
                             ->orWhere('is_blocked', 1)
                             ->orWhere('is_blocked', '1')
                             ->orWhere('is_blocked', 'true');
                    });
                }
            })
            ->when($dateRange, function($q) use ($dateRange) {
                if ($dateRange === 'today') {
                    $q->whereDate('created_at', today());
                } elseif ($dateRange === 'week') {
                    $q->where('created_at', '>=', now()->subDays(7));
                } elseif ($dateRange === 'month') {
                    $q->where('created_at', '>=', now()->subDays(30));
                }
            })
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $users->items(),
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'per_page' => $users->perPage(),
                'total' => $users->total(),
                'first_item' => $users->firstItem(),
                'last_item' => $users->lastItem(),
            ]
        ]);
    }

    /**
     * Bulk delete users
     */
    public function bulkDelete()
    {
        $userIds = request('user_ids', []);

        if (empty($userIds)) {
            return redirect()->back()->with('error', 'Không có người dùng nào được chọn.');
        }

        Users::whereIn('_id', $userIds)->delete();

        return redirect()->route('users.index')->with('success', 'Đã xóa thành công ' . count($userIds) . ' người dùng!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admins.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request ->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'required|in:admin,moderator,user,employee',
        ]);

        $data = $request->all();
        if ($request->hasFile('profile_picture')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('profile_picture')->getRealPath(), [
                'folder' => 'avatars'
            ])->getSecurePath();
            $data['profile_picture'] = $uploadedFileUrl;
        }
        Users::create($data);


         if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Người dùng đã được tạo thành công!",

                ]);
            }

        return redirect()->route('users.index')->with('success', 'Nguoì dùng đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        return view('Admins.User.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Users $users)
    {
        $request ->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $users->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'required|in:admin,moderator,user,employee',
        ]);

        $data = $request->all();
        if ($request->hasFile('profile_picture')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('profile_picture')->getRealPath(), [
                'folder' => 'avatars'
            ])->getSecurePath();
            $data['profile_picture'] = $uploadedFileUrl;
        }
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $users->update($data);
        $userName = $users->name;

        if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Người dùng " . $userName . " đã được cập nhật thành công!",

                ]);
            }

        return redirect()->route('users.index')->with('success', "Người dùng " . $userName . " đã được cập nhật thành công.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        $users->delete();
        $userName = $users->name;

        return redirect()->route('users.index')->with('success', "Người dùng " . $userName . " đã được xóa thành công.");
    }
}
