<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Get all notifications for customer
     */
    public function index()
    {
        $customer = Auth::guard('customer')->user();

        $notifications = Notification::where('customer_id', $customer->_id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('customers.notifications.index', [
            'notifications' => $notifications,
        ]);
    }

    /**
     * Get unread notifications (AJAX)
     */
    public function getUnread()
    {
        $customer = Auth::guard('customer')->user();

        $notifications = Notification::where('customer_id', $customer->_id)
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(fn($notif) => [
                'id' => (string)$notif->_id,
                'title' => $notif->title,
                'message' => $notif->message,
                'icon' => $notif->icon,
                'type' => $notif->type,
                'action_url' => $notif->action_url,
                'created_at' => $notif->created_at->diffForHumans(),
            ]);

        $unreadCount = Notification::where('customer_id', $customer->_id)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Notification $notification)
    {
        $customer = Auth::guard('customer')->user();

        if ((string)$notification->customer_id !== (string)$customer->_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        $customer = Auth::guard('customer')->user();

        Notification::where('customer_id', $customer->_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    /**
     * Delete notification
     */
    public function destroy(Notification $notification)
    {
        $customer = Auth::guard('customer')->user();

        if ((string)$notification->customer_id !== (string)$customer->_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $notification->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Clear all notifications
     */
    public function clearAll()
    {
        $customer = Auth::guard('customer')->user();

        Notification::where('customer_id', $customer->_id)->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Get notification count
     */
    public function count()
    {
        $customer = Auth::guard('customer')->user();

        $unreadCount = Notification::where('customer_id', $customer->_id)
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $unreadCount]);
    }
}
