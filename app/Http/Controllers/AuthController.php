<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('Admins.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Find user
        $user = Users::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email không tồn tại trong hệ thống.',
            ])->withInput($request->except('password'));
        }

        // Check if user is blocked
        if ($user->is_blocked) {
            return back()->withErrors([
                'email' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.',
            ])->withInput($request->except('password'));
        }

        // Verify password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Mật khẩu không chính xác.',
            ])->withInput($request->except('password'));
        }

        // Login user
        Auth::login($user, $remember);

        // Regenerate session to prevent fixation attacks
        $request->session()->regenerate();

        // Update last login
        $user->update(['last_login_at' => now()]);

        // Redirect based on role
        return $this->redirectBasedOnRole($user->role);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole($role)
    {
        // All roles go to dashboard
        return redirect()->route('dashboard.index')
            ->with('success', 'Đăng nhập thành công!');
    }
}
