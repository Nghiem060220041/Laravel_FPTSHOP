<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Điện thoại
        DB::table('products')->insert([
            [
                'name' => 'iPhone 15 Pro Max 256GB',
                'slug' => 'iphone-15-pro-max-256gb',
                'description' => 'iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, camera 48MP, khung titanium siêu bền và màn hình Super Retina XDR 6.7 inch',
                'price' => 33990000,
                'original_price' => 35990000,
                'quantity' => 100,
                'featured' => 1,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra 5G 512GB',
                'slug' => 'samsung-galaxy-s24-ultra-512gb',
                'description' => 'Samsung Galaxy S24 Ultra với S Pen tích hợp, camera 200MP với zoom quang học 10x, màn hình Dynamic AMOLED 2X 6.8 inch và chip Snapdragon 8 Gen 3',
                'price' => 31990000,
                'original_price' => 33990000,
                'quantity' => 50,
                'featured' => 1,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Xiaomi 14 Ultra 5G',
                'slug' => 'xiaomi-14-ultra-5g',
                'description' => 'Xiaomi 14 Ultra với camera Leica 50MP, màn hình AMOLED 6.73 inch, chip Snapdragon 8 Gen 3 và sạc nhanh 120W',
                'price' => 25990000,
                'original_price' => 27990000,
                'quantity' => 30,
                'featured' => 1,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'OPPO Find X7 Ultra 5G',
                'slug' => 'oppo-find-x7-ultra-5g',
                'description' => 'OPPO Find X7 Ultra với hệ thống 4 camera Hasselblad, màn hình cong 6.78 inch và chip MediaTek Dimensity 9300',
                'price' => 21990000,
                'original_price' => 23990000,
                'quantity' => 40,
                'featured' => 1,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vivo X100 Pro 5G',
                'slug' => 'vivo-x100-pro-5g',
                'description' => 'Vivo X100 Pro với camera ZEISS 50MP, màn hình AMOLED 6.78 inch, chip MediaTek Dimensity 9300 và pin 5000mAh',
                'price' => 19990000,
                'original_price' => 21990000,
                'quantity' => 25,
                'featured' => 0,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Laptop
            [
                'name' => 'MacBook Pro 16 M3 Pro 2023',
                'slug' => 'macbook-pro-16-m3-pro-2023',
                'description' => 'MacBook Pro 16 inch với chip M3 Pro, màn hình Liquid Retina XDR, 32GB RAM và SSD 1TB',
                'price' => 62990000,
                'original_price' => 64990000,
                'quantity' => 20,
                'featured' => 1,
                'status' => 1,
                'category_id' => 2,
                'brand_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dell XPS 15 9530',
                'slug' => 'dell-xps-15-9530',
                'description' => 'Dell XPS 15 với chip Intel Core i9-13900H, màn hình OLED 3.5K, 32GB RAM, SSD 1TB và card đồ họa NVIDIA RTX 4070',
                'price' => 53990000,
                'original_price' => 55990000,
                'quantity' => 15,
                'featured' => 1,
                'status' => 1,
                'category_id' => 2,
                'brand_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'slug' => 'lenovo-thinkpad-x1-carbon-gen-11',
                'description' => 'ThinkPad X1 Carbon Gen 11 với chip Intel Core i7-1365U, màn hình 14 inch WUXGA, 16GB RAM và SSD 1TB',
                'price' => 44990000,
                'original_price' => 47990000,
                'quantity' => 25,
                'featured' => 0,
                'status' => 1,
                'category_id' => 2,
                'brand_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ASUS ROG Zephyrus G16 2023',
                'slug' => 'asus-rog-zephyrus-g16-2023',
                'description' => 'ROG Zephyrus G16 với chip Intel Core i9-13900H, màn hình QHD+ 16 inch, 32GB RAM, RTX 4070 và SSD 2TB',
                'price' => 51990000,
                'original_price' => 54990000,
                'quantity' => 10,
                'featured' => 1,
                'status' => 1,
                'category_id' => 2,
                'brand_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'HP Spectre x360 14',
                'slug' => 'hp-spectre-x360-14',
                'description' => 'HP Spectre x360 14 với chip Intel Core i7-1355U, màn hình OLED 13.5 inch, 16GB RAM và SSD 1TB',
                'price' => 38990000,
                'original_price' => 41990000,
                'quantity' => 20,
                'featured' => 0,
                'status' => 1,
                'category_id' => 2,
                'brand_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Tablet
            [
                'name' => 'iPad Pro M2 12.9 inch WiFi 256GB',
                'slug' => 'ipad-pro-m2-12-9-inch-wifi-256gb',
                'description' => 'iPad Pro M2 12.9 inch với màn hình Liquid Retina XDR, chip M2, Face ID và hỗ trợ Apple Pencil 2',
                'price' => 31990000,
                'original_price' => 33990000,
                'quantity' => 30,
                'featured' => 1,
                'status' => 1,
                'category_id' => 3,
                'brand_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'slug' => 'samsung-galaxy-tab-s9-ultra',
                'description' => 'Galaxy Tab S9 Ultra với màn hình Dynamic AMOLED 2X 14.6 inch, chip Snapdragon 8 Gen 2, S Pen tích hợp',
                'price' => 27990000,
                'original_price' => 29990000,
                'quantity' => 20,
                'featured' => 1,
                'status' => 1,
                'category_id' => 3,
                'brand_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
