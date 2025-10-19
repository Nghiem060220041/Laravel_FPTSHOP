<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Điện thoại', 'slug' => Str::slug('Điện thoại')],
            ['name' => 'Laptop', 'slug' => Str::slug('Laptop')],
            ['name' => 'Máy tính bảng', 'slug' => Str::slug('Máy tính bảng')],
            ['name' => 'Phụ kiện', 'slug' => Str::slug('Phụ kiện')],
        ]);
    }
}
