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
        Schema::create('watchlist', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_tracked')->default(0);
            $table->tinyInteger('is_thumbs_up')->default(0);
            $table->tinyInteger('is_thumbs_down')->default(0);
            $table->foreignId('movie_id')->constrained('movie')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watchlist');
    }
};
