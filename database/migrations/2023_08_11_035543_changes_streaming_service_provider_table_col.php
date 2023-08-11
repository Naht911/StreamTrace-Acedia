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
        Schema::table('streaming_service_provider', function (Blueprint $table) {
            //change column 'type' to nullable
            $table->string('type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('streaming_service_provider', function (Blueprint $table) {
            //huỷ nullable của column 'type'
            $table->string('type')->nullable(false)->change();
        });
    }
};
