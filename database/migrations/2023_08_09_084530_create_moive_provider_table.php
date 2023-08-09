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
        Schema::create('moive_provider', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movie')->onDelete('cascade');
            $table->foreignId('provider_id')->constrained('streaming_service_provider')->onDelete('cascade');
            $table->integer('price')->comment('unit: usd, cent');
            $table->foreignId('type_price_id')->constrained('type_price')->onDelete('cascade');
            $table->foreignId('moive_resolution_id')->constrained('moive_resolution')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moive_provider');
    }
};
