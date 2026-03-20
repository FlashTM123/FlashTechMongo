<?php

namespace App\Events;

use App\Models\ChatRoom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRoomClosed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ChatRoom $chatRoom;

    public function __construct(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-room.' . $this->chatRoom->_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'room.closed';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => __('messages.chat.ended'),
        ];
    }
}
