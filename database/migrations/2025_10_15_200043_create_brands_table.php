<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Slug nên là duy nhất
            $table->string('logo')->nullable(); // Logo có thể có hoặc không
            $table->boolean('status')->default(true); // 1 = true, 0 = false
            $table->timestamps(); // Tự động tạo created_at và updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};