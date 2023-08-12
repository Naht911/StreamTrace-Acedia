<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Bảng ghi lại lịch sử click vào nút xem phim
     */
    public function up(): void
    {
        Schema::create('movie_tracking_out', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movie')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable()->defaule(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('streaming_service_provider_id')->nullable()->defaule(null);
            $table->foreign('streaming_service_provider_id')->references('id')->on('streaming_service_provider')->onDelete('cascade');
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_tracking_out');
    }
};
