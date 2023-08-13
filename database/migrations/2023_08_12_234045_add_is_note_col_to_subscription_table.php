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
            //thêm cột note, is_remind sau cột status
            $table->string('note')->nullable()->after('status');
            $table->boolean('is_remind')->default(false)->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription', function (Blueprint $table) {
            //huỷ cột note, is_remind
            $table->dropColumn('note');
            $table->dropColumn('is_remind');
        });
    }
};
