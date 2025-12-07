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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code')->unique();
            $table->string('full_name'); // Sử dung trong đang ký
            $table->string('email')->unique(); // Sử dụng trong đăng ký
            $table->string('phone_number')->nullable(); // Sử dụng trong đăng ký
            $table->string('address')->nullable(); // Sử dụng trong đăng ký
            $table->string('password'); // Sử dụng trong đăng ký
            $table->date('date_of_birth')->nullable(); // Sử dụng trong đăng ký
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Sử dụng trong đăng ký
            $table->string('profile_picture')->nullable(); // Sử dụng trong đăng ký
            $table->integer('loyalty_points')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
