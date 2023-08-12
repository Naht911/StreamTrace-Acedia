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
            //change price column to float
            $table->float('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_provider', function (Blueprint $table) {
            // change price column to integer
            $table->integer('price')->change();
        });
    }
};
