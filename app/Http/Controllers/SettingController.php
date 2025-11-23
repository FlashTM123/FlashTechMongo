<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('Admins.Settings.setting');
    }

    public function updateLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|string|in:vi,en,ja'
        ]);

        // Save to session or database
        session(['app_language' => $request->language]);

        return response()->json([
            'success' => true,
            'message' => 'Ngôn ngữ đã được cập nhật',
            'language' => $request->language
        ]);
    }

    public function updateTimezone(Request $request)
    {
        $request->validate([
            'timezone' => 'required|string'
        ]);

        // Save to session or database
        session(['app_timezone' => $request->timezone]);

        return response()->json([
            'success' => true,
            'message' => 'Múi giờ đã được cập nhật',
            'timezone' => $request->timezone
        ]);
    }

    public function updateTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|string|in:gradient,blue,green,orange,pink'
        ]);

        // Save to session or database
        session(['admin_color_theme' => $request->theme]);

        return response()->json([
            'success' => true,
            'message' => 'Màu giao diện đã được cập nhật',
            'theme' => $request->theme
        ]);
    }

    public function updateDisplayMode(Request $request)
    {
        $request->validate([
            'mode' => 'required|string|in:light,dark,system'
        ]);

        // Save to session or database
        session(['display_mode' => $request->mode]);

        return response()->json([
            'success' => true,
            'message' => 'Chế độ hiển thị đã được cập nhật',
            'mode' => $request->mode
        ]);
    }
}
