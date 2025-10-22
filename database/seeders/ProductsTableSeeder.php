<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ nếu có
        Product::truncate();
        ProductVariant::truncate();

        $products = [
            [
                'name' => 'iPhone 15 Pro Max 256GB',
                'slug' => 'iphone-15-pro-max-256gb',
                'description' => 'iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, camera 48MP, khung titanium siêu bền và màn hình Super Retina XDR 6.7 inch',
                'brand_id' => 1,
                'category_id' => 1,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/iphone-15-pro-max.jpg',
                // Bỏ các trường price và quantity không còn tồn tại
                'variants' => [
                    [
                        'name' => 'Titanium Blue',
                        'price' => 33990000,
                        'quantity' => 30,
                        'attributes' => json_encode(['color' => 'Titanium Blue', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Titanium Black',
                        'price' => 33990000,
                        'quantity' => 25,
                        'attributes' => json_encode(['color' => 'Titanium Black', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Titanium White',
                        'price' => 33990000,
                        'quantity' => 20,
                        'attributes' => json_encode(['color' => 'Titanium White', 'storage' => '256GB'])
                    ],
                ]
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra 5G 512GB',
                'slug' => 'samsung-galaxy-s24-ultra-512gb',
                'description' => 'Samsung Galaxy S24 Ultra với S Pen tích hợp, camera 200MP với zoom quang học 10x, màn hình Dynamic AMOLED 2X 6.8 inch và chip Snapdragon 8 Gen 3',
                'brand_id' => 2,
                'category_id' => 1,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/samsung-galaxy-s24-ultra.jpg',
                'variants' => [
                    [
                        'name' => 'Bạc',
                        'price' => 31990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Bạc', 'storage' => '512GB'])
                    ],
                    [
                        'name' => 'Đen',
                        'price' => 31990000,
                        'quantity' => 15,
                        'attributes' => json_encode(['color' => 'Đen', 'storage' => '512GB'])
                    ],
                    [
                        'name' => 'Xanh dương',
                        'price' => 31990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Xanh dương', 'storage' => '512GB'])
                    ],
                ]
            ],
            [
                'name' => 'Xiaomi 14 Ultra 5G',
                'slug' => 'xiaomi-14-ultra-5g',
                'description' => 'Xiaomi 14 Ultra với camera Leica 50MP, màn hình AMOLED 6.73 inch, chip Snapdragon 8 Gen 3 và sạc nhanh 120W',
                'brand_id' => 3,
                'category_id' => 1,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/xiaomi-14-ultra.jpg',
                'variants' => [
                    [
                        'name' => 'Đen',
                        'price' => 25990000,
                        'quantity' => 20,
                        'attributes' => json_encode(['color' => 'Đen', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Trắng',
                        'price' => 25990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Trắng', 'storage' => '256GB'])
                    ],
                ]
            ],
            [
                'name' => 'OPPO Find X7 Ultra 5G',
                'slug' => 'oppo-find-x7-ultra-5g',
                'description' => 'OPPO Find X7 Ultra với hệ thống 4 camera Hasselblad, màn hình cong 6.78 inch và chip MediaTek Dimensity 9300',
                'brand_id' => 4,
                'category_id' => 1,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/oppo-find-x7-ultra.jpg',
                'variants' => [
                    [
                        'name' => 'Đen',
                        'price' => 21990000,
                        'quantity' => 15,
                        'attributes' => json_encode(['color' => 'Đen', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Trắng',
                        'price' => 21990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Trắng', 'storage' => '256GB'])
                    ],
                ]
            ],
            [
                'name' => 'Vivo X100 Pro 5G',
                'slug' => 'vivo-x100-pro-5g',
                'description' => 'Vivo X100 Pro với camera ZEISS 50MP, màn hình AMOLED 6.78 inch, chip MediaTek Dimensity 9300 và pin 5000mAh',
                'brand_id' => 5,
                'category_id' => 1,
                'status' => 1,
                'featured' => 0,
                'image' => 'products/vivo-x100-pro.jpg',
                'variants' => [
                    [
                        'name' => 'Đen',
                        'price' => 19990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Đen', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Xanh dương',
                        'price' => 19990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Xanh dương', 'storage' => '256GB'])
                    ],
                ]
            ],

            // Laptop
            [
                'name' => 'MacBook Pro 16 M3 Pro 2023',
                'slug' => 'macbook-pro-16-m3-pro-2023',
                'description' => 'MacBook Pro 16 inch với chip M3 Pro, màn hình Liquid Retina XDR, 32GB RAM và SSD 1TB',
                'brand_id' => 1,
                'category_id' => 2,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/macbook-pro-16-m3-pro-2023.jpg',
                'variants' => [
                    [
                        'name' => 'Màu bạc',
                        'price' => 62990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu bạc', 'storage' => '1TB'])
                    ],
                    [
                        'name' => 'Màu đen',
                        'price' => 62990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '1TB'])
                    ],
                ]
            ],
            [
                'name' => 'Dell XPS 15 9530',
                'slug' => 'dell-xps-15-9530',
                'description' => 'Dell XPS 15 với chip Intel Core i9-13900H, màn hình OLED 3.5K, 32GB RAM, SSD 1TB và card đồ họa NVIDIA RTX 4070',
                'brand_id' => 6,
                'category_id' => 2,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/dell-xps-15-9530.jpg',
                'variants' => [
                    [
                        'name' => 'Màu bạc',
                        'price' => 53990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Màu bạc', 'storage' => '1TB'])
                    ],
                    [
                        'name' => 'Màu đen',
                        'price' => 53990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '1TB'])
                    ],
                ]
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'slug' => 'lenovo-thinkpad-x1-carbon-gen-11',
                'description' => 'ThinkPad X1 Carbon Gen 11 với chip Intel Core i7-1365U, màn hình 14 inch WUXGA, 16GB RAM và SSD 1TB',
                'brand_id' => 7,
                'category_id' => 2,
                'status' => 1,
                'featured' => 0,
                'image' => 'products/lenovo-thinkpad-x1-carbon-gen-11.jpg',
                'variants' => [
                    [
                        'name' => 'Màu đen',
                        'price' => 44990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '1TB'])
                    ],
                ]
            ],
            [
                'name' => 'ASUS ROG Zephyrus G16 2023',
                'slug' => 'asus-rog-zephyrus-g16-2023',
                'description' => 'ROG Zephyrus G16 với chip Intel Core i9-13900H, màn hình QHD+ 16 inch, 32GB RAM, RTX 4070 và SSD 2TB',
                'brand_id' => 8,
                'category_id' => 2,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/asus-rog-zephyrus-g16-2023.jpg',
                'variants' => [
                    [
                        'name' => 'Màu đen',
                        'price' => 51990000,
                        'quantity' => 5,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '2TB'])
                    ],
                ]
            ],
            [
                'name' => 'HP Spectre x360 14',
                'slug' => 'hp-spectre-x360-14',
                'description' => 'HP Spectre x360 14 với chip Intel Core i7-1355U, màn hình OLED 13.5 inch, 16GB RAM và SSD 1TB',
                'brand_id' => 9,
                'category_id' => 2,
                'status' => 1,
                'featured' => 0,
                'image' => 'products/hp-spectre-x360-14.jpg',
                'variants' => [
                    [
                        'name' => 'Màu bạc',
                        'price' => 38990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu bạc', 'storage' => '1TB'])
                    ],
                    [
                        'name' => 'Màu đen',
                        'price' => 38990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '1TB'])
                    ],
                ]
            ],

            // Tablet
            [
                'name' => 'iPad Pro M2 12.9 inch WiFi 256GB',
                'slug' => 'ipad-pro-m2-12-9-inch-wifi-256gb',
                'description' => 'iPad Pro M2 12.9 inch với màn hình Liquid Retina XDR, chip M2, Face ID và hỗ trợ Apple Pencil 2',
                'brand_id' => 1,
                'category_id' => 3,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/ipad-pro-m2-12-9-inch-wifi-256gb.jpg',
                'variants' => [
                    [
                        'name' => 'Màu bạc',
                        'price' => 31990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu bạc', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Màu đen',
                        'price' => 31990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '256GB'])
                    ],
                ]
            ],
            [
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'slug' => 'samsung-galaxy-tab-s9-ultra',
                'description' => 'Galaxy Tab S9 Ultra với màn hình Dynamic AMOLED 2X 14.6 inch, chip Snapdragon 8 Gen 2, S Pen tích hợp',
                'brand_id' => 2,
                'category_id' => 3,
                'status' => 1,
                'featured' => 1,
                'image' => 'products/samsung-galaxy-tab-s9-ultra.jpg',
                'variants' => [
                    [
                        'name' => 'Màu đen',
                        'price' => 27990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu đen', 'storage' => '256GB'])
                    ],
                    [
                        'name' => 'Màu bạc',
                        'price' => 27990000,
                        'quantity' => 10,
                        'attributes' => json_encode(['color' => 'Màu bạc', 'storage' => '256GB'])
                    ],
                ]
            ]
        ];

        foreach ($products as $productData) {
            // Tách variants ra khỏi dữ liệu sản phẩm
            $variants = $productData['variants'] ?? [];
            unset($productData['variants']);
            
            // Tạo sản phẩm mới
            $product = Product::create($productData);
            
            // Tạo các biến thể cho sản phẩm
            foreach ($variants as $variantData) {
                $product->variants()->create($variantData);
            }
        }
    }
}
