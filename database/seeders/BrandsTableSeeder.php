<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => 'brands/apple.png',
                'status' => 1
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => 'brands/samsung.png',
                'status' => 1
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'brands/xiaomi.png',
                'status' => 1
            ],
            [
                'name' => 'OPPO',
                'slug' => 'oppo',
                'logo' => 'brands/oppo.png',
                'status' => 1
            ],
            [
                'name' => 'Vivo',
                'slug' => 'vivo',
                'logo' => 'brands/vivo.png',
                'status' => 1
            ],
            [
                'name' => 'Dell',
                'slug' => 'dell',
                'logo' => 'brands/dell.png',
                'status' => 1
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'logo' => 'brands/lenovo.png',
                'status' => 1
            ],
            [
                'name' => 'ASUS',
                'slug' => 'asus',
                'logo' => 'brands/asus.png',
                'status' => 1
            ],
            [
                'name' => 'HP',
                'slug' => 'hp',
                'logo' => 'brands/hp.png',
                'status' => 1
            ],
            [
                'name' => 'Sony',
                'slug' => 'sony',
                'logo' => 'brands/sony.png',
                'status' => 1
            ],
            [
                'name' => 'JBL',
                'slug' => 'jbl',
                'logo' => 'brands/jbl.png',
                'status' => 1
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'logo' => 'brands/huawei.png',
                'status' => 1
            ],
            [
                'name' => 'Garmin',
                'slug' => 'garmin',
                'logo' => 'brands/garmin.png',
                'status' => 1
            ]
        ];

        foreach ($brands as $brandData) {
            Brand::updateOrCreate(
                ['slug' => $brandData['slug']],  // Tìm theo slug
                $brandData  // Cập nhật hoặc tạo mới với toàn bộ dữ liệu
            );
        }
        
        $this->command->info('Đã thêm/cập nhật các thương hiệu thành công!');
    }
}
