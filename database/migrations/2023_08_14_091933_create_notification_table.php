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
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->boolean('is_read')->default(false);
            //khoá ngoại liên kết tới bảng subscription
            $table->foreignId('subscription_id')->nullable()->constrained('subscription')->onDelete('cascade');
            //khoá ngoại liên kết tới bảng user
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
