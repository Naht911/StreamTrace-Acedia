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
        Schema::create('user_streaming_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('streaming_service_id')->constrained('streaming_service_provider')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('username')->nullable();
            $table->foreignId('type_price_id')->constrained('type_price')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('subscription_date')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_streaming_service');
    }
};
