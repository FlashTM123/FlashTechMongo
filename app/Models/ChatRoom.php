<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatRoom extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_rooms';

    protected $fillable = [
        'customer_id',
        'assigned_user_id',
        'status', // 'open', 'closed', 'waiting'
        'subject',
        'last_message_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'last_message_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Customer relationship
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', '_id');
    }

    /**
     * Assigned support user relationship
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id', '_id');
    }

    /**
     * Messages relationship
     */
    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'chat_room_id', '_id');
    }

    /**
     * Unread messages
     */
    public function unreadMessages()
    {
        return $this->messages()->where('is_read', false);
    }
}
