<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('customer.' . $this->notification->customer_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'notification.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => (string)$this->notification->_id,
            'title' => $this->notification->title,
            'message' => $this->notification->message,
            'icon' => $this->notification->icon,
            'type' => $this->notification->type,
            'action_url' => $this->notification->action_url,
            'created_at' => $this->notification->created_at->diffForHumans(),
        ];
    }
}
