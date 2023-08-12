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
        //đổi tên thành subscription
        Schema::rename('user_streaming_service', 'subscription');
        Schema::table('subscription', function (Blueprint $table) {
            //thêm cột custom_name và price sau cột streaming_service_id
            $table->string('custom_name')->nullable()->after('streaming_service_id');
            $table->integer('price')->nullable()->after('custom_name');
            //huỷ bỏ cột username
            $table->dropColumn('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //đổi tên thành user_streaming_service
        Schema::rename('subscription', 'user_streaming_service');
        Schema::table('user_streaming_service', function (Blueprint $table) {
            //xóa cột custom_name
            $table->dropColumn('custom_name');
            //price
            $table->dropColumn('price');
            //thêm cột username
            $table->string('username')->nullable();
        });
    }
};
