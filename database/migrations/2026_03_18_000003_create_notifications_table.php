<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::connection()->getName() === 'mongodb') {
            // For MongoDB, collections are created automatically
            return;
        }

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('order_id')->nullable()->index();
            $table->enum('type', [
                'order_placed',
                'order_confirmed',
                'order_shipped',
                'order_delivered',
                'order_cancelled',
                'payment_confirmed'
            ])->index();
            $table->string('title');
            $table->longText('message');
            $table->string('icon')->nullable();
            $table->boolean('is_read')->default(false)->index();
            $table->string('action_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getName() !== 'mongodb') {
            Schema::dropIfExists('notifications');
        } else {
            DB::connection('mongodb')->collection('notifications')->drop();
        }
    }
};
