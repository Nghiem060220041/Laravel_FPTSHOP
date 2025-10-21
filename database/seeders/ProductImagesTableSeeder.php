<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hình ảnh cho iPhone 15 Pro Max
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-max_5.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m-iphone-15-pro-max_5.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Hình ảnh cho Samsung Galaxy S24 Ultra
        DB::table('product_images')->insert([
            [
                'product_id' => 2,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/s/2/s24-ultra_1.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 2,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/s/2/s24-ultra_2_1.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // MacBook Pro
        DB::table('product_images')->insert([
            [
                'product_id' => 6,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_pro_16_inch_m2_pro_space_gray_pure_front_screen__usen.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // iPad Pro
        DB::table('product_images')->insert([
            [
                'product_id' => 11,
                'image_path' => 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/i/p/ipad-pro-13-select-wifi-spacegray-202210-02.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
        // Thêm nhiều hình ảnh cho các sản phẩm khác tương tự
    }
}
