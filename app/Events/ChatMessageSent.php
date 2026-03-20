<?php

namespace App\Events;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ChatRoom $chatRoom;
    public ChatMessage $message;

    public function __construct(ChatRoom $chatRoom, ChatMessage $message)
    {
        $this->chatRoom = $chatRoom;
        $this->message = $message;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-room.' . $this->chatRoom->_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'message.sent';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => (string)$this->message->_id,
            'sender_type' => $this->message->sender_type,
            'sender_name' => $this->message->sender_name,
            'message' => $this->message->message,
            'created_at' => $this->message->created_at->format('H:i'),
        ];
    }
}
