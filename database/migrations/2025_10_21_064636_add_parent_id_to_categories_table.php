<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
        {
            Schema::table('categories', function (Blueprint $table) {
                // Thêm cột parent_id, cho phép null (nếu là danh mục cha)
                // Đặt sau cột 'slug' cho gọn
                $table->foreignId('parent_id')
                    ->nullable()
                    ->after('slug')
                    ->constrained('categories') // Tạo khóa ngoại, tham chiếu đến chính nó
                    ->onDelete('set null'); // Nếu xóa cha, con sẽ thành danh mục gốc
            });
        }

        public function down(): void
        {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropForeign(['parent_id']);
                $table->dropColumn('parent_id');
            });
        }
};
