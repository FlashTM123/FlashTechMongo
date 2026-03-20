<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::connection()->getName() === 'mongodb') {
            // For MongoDB, we don't need explicit schema creation
            // Collections are created automatically when first document is inserted
            return;
        }

        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('assigned_user_id')->nullable()->index();
            $table->enum('status', ['open', 'closed', 'waiting'])->default('waiting');
            $table->string('subject')->default('Support Request');
            $table->timestamp('last_message_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getName() !== 'mongodb') {
            Schema::dropIfExists('chat_rooms');
        } else {
            // For MongoDB, drop the collection
            \DB::connection('mongodb')->collection('chat_rooms')->drop();
        }
    }
};
