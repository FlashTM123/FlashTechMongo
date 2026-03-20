<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Notification extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'notifications';

    protected $fillable = [
        'customer_id',
        'order_id',
        'type', // 'order_placed', 'order_confirmed', 'order_shipped', 'order_delivered', 'order_cancelled', 'payment_confirmed'
        'title',
        'message',
        'icon',
        'is_read',
        'action_url',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
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
     * Order relationship
     */
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', '_id');
    }

    /**
     * Mark as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
        return $this;
    }

    /**
     * Mark as unread
     */
    public function markAsUnread()
    {
        $this->update(['is_read' => false]);
        return $this;
    }
}
