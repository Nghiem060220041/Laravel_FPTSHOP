<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => 'brands/apple.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => 'brands/samsung.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'brands/xiaomi.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'OPPO',
                'slug' => 'oppo',
                'logo' => 'brands/oppo.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vivo',
                'slug' => 'vivo',
                'logo' => 'brands/vivo.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dell',
                'slug' => 'dell',
                'logo' => 'brands/dell.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'logo' => 'brands/lenovo.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ASUS',
                'slug' => 'asus',
                'logo' => 'brands/asus.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'HP',
                'slug' => 'hp',
                'logo' => 'brands/hp.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sony',
                'slug' => 'sony',
                'logo' => 'brands/sony.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'JBL',
                'slug' => 'jbl',
                'logo' => 'brands/jbl.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'logo' => 'brands/huawei.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Garmin',
                'slug' => 'garmin',
                'logo' => 'brands/garmin.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
