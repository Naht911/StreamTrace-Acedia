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
        Schema::table('subscription', function (Blueprint $table) {
            //set streaming_service_id  nullable, type_price_id nullable
            $table->unsignedBigInteger('streaming_service_id')->nullable()->change();
            $table->unsignedBigInteger('type_price_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription', function (Blueprint $table) {
            //huỷ nullable
            $table->unsignedBigInteger('streaming_service_id')->nullable(false)->change();
            $table->unsignedBigInteger('type_price_id')->nullable(false)->change();
        });
    }
};
