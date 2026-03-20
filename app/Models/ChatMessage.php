<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatMessage extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_messages';

    protected $fillable = [
        'chat_room_id',
        'sender_type', // 'customer' or 'support'
        'sender_id',
        'sender_name',
        'message',
        'is_read',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * ChatRoom relationship
     */
    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id', '_id');
    }

    /**
     * Get sender info
     */
    public function getSenderAttribute()
    {
        if ($this->sender_type === 'customer') {
            return Customer::find($this->sender_id);
        } else {
            return User::find($this->sender_id);
        }
    }
}
