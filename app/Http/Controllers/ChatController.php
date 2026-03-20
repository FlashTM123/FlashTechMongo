<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Show chat widget/page
     */
    public function index()
    {
        $customer = Auth::guard('customer')->user();

        $chatRoom = ChatRoom::where('customer_id', $customer->_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$chatRoom) {
            return view('customers.chat.widget', [
                'chatRoom' => null,
                'messages' => [],
            ]);
        }

        $messages = $chatRoom->messages()->orderBy('created_at', 'asc')->get();
        $chatRoom->unreadMessages()->update(['is_read' => true]);

        return view('customers.chat.widget', [
            'chatRoom' => $chatRoom,
            'messages' => $messages,
        ]);
    }

    /**
     * Create new chat room
     */
    public function create(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        $chatRoom = ChatRoom::where('customer_id', $customer->_id)
            ->whereIn('status', ['open', 'waiting'])
            ->first();

        if (!$chatRoom) {
            $chatRoom = ChatRoom::create([
                'customer_id' => $customer->_id,
                'status' => 'waiting',
                'subject' => $request->input('subject', 'Support Request'),
                'last_message_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'chat_room_id' => (string)$chatRoom->_id,
        ]);
    }

    /**
     * Send message
     */
    public function sendMessage(Request $request, ChatRoom $chatRoom)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $customer = Auth::guard('customer')->user();

        // Check if customer owns this chat room
        if ((string)$chatRoom->customer_id !== (string)$customer->_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $message = ChatMessage::create([
            'chat_room_id' => $chatRoom->_id,
            'sender_type' => 'customer',
            'sender_id' => $customer->_id,
            'sender_name' => $customer->name,
            'message' => $request->input('message'),
            'is_read' => false,
        ]);

        $chatRoom->update([
            'last_message_at' => now(),
            'status' => 'waiting', // Change to waiting if it was closed
        ]);

        // Broadcast to support agents
        broadcast(new \App\Events\ChatMessageSent($chatRoom, $message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => [
                'id' => (string)$message->_id,
                'text' => $message->message,
                'sender' => $message->sender_name,
                'created_at' => $message->created_at->format('H:i'),
            ],
        ]);
    }

    /**
     * Get messages for a chat room
     */
    public function getMessages(ChatRoom $chatRoom)
    {
        $customer = Auth::guard('customer')->user();

        if ((string)$chatRoom->customer_id !== (string)$customer->_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $messages = $chatRoom->messages()
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(fn($msg) => [
                'id' => (string)$msg->_id,
                'sender_type' => $msg->sender_type,
                'sender_name' => $msg->sender_name,
                'text' => $msg->message,
                'created_at' => $msg->created_at->format('H:i'),
                'is_read' => $msg->is_read,
            ]);

        $chatRoom->unreadMessages()->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);
    }

    /**
     * Close chat room
     */
    public function close(ChatRoom $chatRoom)
    {
        $customer = Auth::guard('customer')->user();

        if ((string)$chatRoom->customer_id !== (string)$customer->_id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $chatRoom->update(['status' => 'closed']);

        broadcast(new \App\Events\ChatRoomClosed($chatRoom))->toOthers();

        return response()->json(['success' => true]);
    }

    /**
     * Get or create chat room for widget
     */
    public function widget()
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return response()->json([
                'authenticated' => false,
            ]);
        }

        $chatRoom = ChatRoom::where('customer_id', $customer->_id)
            ->whereIn('status', ['open', 'waiting'])
            ->first();

        $unreadCount = 0;
        if ($chatRoom) {
            $unreadCount = $chatRoom->unreadMessages()->count();
        }

        return response()->json([
            'authenticated' => true,
            'has_chat' => (bool)$chatRoom,
            'chat_room_id' => $chatRoom ? (string)$chatRoom->_id : null,
            'unread_count' => $unreadCount,
        ]);
    }
}
