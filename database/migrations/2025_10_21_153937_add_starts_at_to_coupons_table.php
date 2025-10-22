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
        Schema::table('coupons', function (Blueprint $table) {
            // Kiểm tra xem trường starts_at đã tồn tại chưa
            if (!Schema::hasColumn('coupons', 'starts_at')) {
                $table->timestamp('starts_at')->nullable()->after('value');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            if (Schema::hasColumn('coupons', 'starts_at')) {
                $table->dropColumn('starts_at');
            }
        });
    }
};
