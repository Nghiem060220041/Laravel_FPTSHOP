<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'description' => 'Các loại điện thoại thông minh',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'description' => 'Máy tính xách tay đa dạng thương hiệu',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tablet',
                'slug' => 'tablet',
                'description' => 'Máy tính bảng các loại',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tai nghe',
                'slug' => 'tai-nghe',
                'description' => 'Tai nghe có dây và không dây',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Đồng hồ thông minh',
                'slug' => 'dong-ho-thong-minh',
                'description' => 'Đồng hồ thông minh các thương hiệu',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Loa',
                'slug' => 'loa',
                'description' => 'Loa bluetooth và loa gia đình',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'description' => 'Các phụ kiện công nghệ',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
