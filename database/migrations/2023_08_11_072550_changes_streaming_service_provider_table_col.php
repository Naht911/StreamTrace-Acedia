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
            //đổi cột description thành nullable và text
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('streaming_service_provider', function (Blueprint $table) {
            //đổi cột description thành text và không nullable
            $table->text('description')->nullable(false)->change();
        });
    }
};
