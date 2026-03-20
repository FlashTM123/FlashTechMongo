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

        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_room_id')->index();
            $table->enum('sender_type', ['customer', 'support'])->index();
            $table->unsignedBigInteger('sender_id')->index();
            $table->string('sender_name');
            $table->longText('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getName() !== 'mongodb') {
            Schema::dropIfExists('chat_messages');
        } else {
            DB::connection('mongodb')->collection('chat_messages')->drop();
        }
    }
};
