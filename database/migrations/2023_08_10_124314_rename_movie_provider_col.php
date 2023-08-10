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
        Schema::table('movie_provider', function (Blueprint $table) {
            //rename provider_id to streaming_service_provider_id
            $table->renameColumn('provider_id', 'streaming_service_provider_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_provider', function (Blueprint $table) {
            //rename streaming_service_provider_id to provider_id
            $table->renameColumn('streaming_service_provider_id', 'provider_id');
        });
    }
};
