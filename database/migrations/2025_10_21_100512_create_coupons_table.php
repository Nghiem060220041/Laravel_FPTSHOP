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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // ví dụ: "GIAMGIA20", phải là duy nhất
            $table->enum('type', ['fixed', 'percent']); // 'fixed' (số tiền) hoặc 'percent' (phần trăm)
            $table->decimal('value', 10, 2); // Giá trị của mã (ví dụ: 50000 VNĐ hoặc 20%)
            $table->timestamp('expires_at')->nullable(); // Ngày hết hạn (có thể không có)
            $table->unsignedInteger('usage_limit')->nullable(); // Giới hạn số lần sử dụng
            $table->unsignedInteger('times_used')->default(0); // số lần đã được sử dụng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
