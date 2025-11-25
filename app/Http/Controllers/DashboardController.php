<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get statistics
            $totalUsers = Users::count();
            $activeUsers = Users::where(function($query) {
                $query->where('is_blocked', false)
                      ->orWhere('is_blocked', 0)
                      ->orWhere('is_blocked', '0')
                      ->orWhereNull('is_blocked');
            })->count();

            $blockedUsers = Users::where(function($query) {
                $query->where('is_blocked', true)
                      ->orWhere('is_blocked', 1)
                      ->orWhere('is_blocked', '1')
                      ->orWhere('is_blocked', 'true');
            })->count();

            $adminUsers = Users::where('role', 'admin')->count();
            $moderatorUsers = Users::where('role', 'moderator')->count();

            // Get recent users
            $recentUsers = Users::orderBy('created_at', 'desc')->limit(5)->get();

            // Get users by role
            $usersByRole = [
                'admin' => Users::where('role', 'admin')->count(),
                'moderator' => Users::where('role', 'moderator')->count(),
                'employee' => Users::where('role', 'employee')->count(),
                'user' => Users::where('role', 'user')->count(),
            ];

            return view('Admins.Dashboard.dashboard', compact(
                'totalUsers',
                'activeUsers',
                'blockedUsers',
                'adminUsers',
                'moderatorUsers',
                'recentUsers',
                'usersByRole'
            ));
        } catch (\Exception $e) {
            return view('Admins.Dashboard.dashboard', [
                'totalUsers' => 0,
                'activeUsers' => 0,
                'blockedUsers' => 0,
                'adminUsers' => 0,
                'moderatorUsers' => 0,
                'recentUsers' => collect(),
                'usersByRole' => [
                    'admin' => 0,
                    'moderator' => 0,
                    'employee' => 0,
                    'user' => 0,
                ],
                'error' => $e->getMessage()
            ]);
        }
    }
}
