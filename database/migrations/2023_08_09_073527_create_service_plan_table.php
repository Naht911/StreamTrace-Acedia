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
        Schema::create('service_plan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('features')->nullable();
            $table->integer('price')->comment('unit: usd, cent');
            $table->integer('duration')->comment('unit: month');
            $table->integer('max_profile')->comment('max profile per account');
            $table->timestamps();
            //foreign key
            $table->foreignId('service_provider_id')->constrained('streaming_service_provider')->onDelete('cascade');
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
// SQLSTATE[HY000]: General error: 1824 Failed to open the referenced table 'provider' (Connection: mysql, SQL: alter table `moive_provider` add constraint `moive_provider_provider_id_foreign` foreign key (`provider_id`) references `provider` (`id`) on delete cascade)
