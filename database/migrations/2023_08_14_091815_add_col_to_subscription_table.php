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
            //thêm cột last_notify
            $table->timestamp('last_notify')->nullable()->after('is_remind');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription', function (Blueprint $table) {
            //huỷ cột last_notify
            $table->dropColumn('last_notify');

        });
    }
};
