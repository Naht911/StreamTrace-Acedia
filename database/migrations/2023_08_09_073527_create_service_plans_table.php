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
        Schema::create('service_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('features')->nullable();
            $table->integer('price')->comment('unit: usd, cent');
            $table->integer('duration')->comment('unit: month');
            $table->integer('max_profile')->comment('max profile per account');

            //foreign key
            $table->foreignId('service_provider_id')->constrained('service_provider')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_plans');
    }
};
