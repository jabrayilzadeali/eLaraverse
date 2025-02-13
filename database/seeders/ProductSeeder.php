<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sku = '224460912X';
        $price = 4000;
        $discount = 10;
        $discounted_price = $price - $price * $discount / 100;
        $product1 = Product::create([
            'seller_id' => 1,
            'sku' => $sku,
            'title' => 'Iphone 16 Pro Max',
            'description' => 'iPhone 16 Pro Max 512GB Desert Titanium bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'iphone-16-pro-max',
            'img_path' => "$sku/iphone-16-pro-max.jpg",
            'is_featured' => true,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 3
        ]);
        
        ProductImage::create([
            'product_id' => $product1->id,
            'img_path' => "$sku/carousel/iphone_16_pro_max_1.jpg",
            'alt' => 'iphone img',
            'order' => 1
        ]);

        ProductImage::create([
            'product_id' => $product1->id,
            'img_path' => "$sku/carousel/iphone_16_pro_max_2.jpg",
            'alt' => 'iphone img',
            'order' => 2
        ]);
        ProductImage::create([
            'product_id' => $product1->id,
            'img_path' => "$sku/carousel/iphone_16_pro_max_3.jpg",
            'alt' => 'iphone img',
            'order' => 3
        ]);

        $sku = '224460911X';
        $price = 3000;
        $discount = 20;
        $discounted_price = $price - $price * $discount / 100;
        Product::create([
            'seller_id' => 2,
            'sku' => $sku,
            'title' => 'Iphone 15',
            'description' => 'iPhone 15 256GB Desert Titanium bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'iphone-15',
            'img_path' => "$sku/iphone-15.jpg",
            'is_featured' => false,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 3
        ]);

        $sku = '224460910X';
        $price = 2500;
        $discount = 5;
        $discounted_price = $price - $price * $discount / 100;
        Product::create([
            'seller_id' => 3,
            'sku' => $sku,
            'title' => 'Samsung S24 Ultra',
            'description' => 'Samsung S24 Ultra bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'samsung-s24-ultra',
            'img_path' => "$sku/samsung-s24-ultra.jpg",
            'is_featured' => true,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 4
        ]);

        $sku = '224460900X';
        $price = 2000;
        $discount = 0;
        $discounted_price = $price - $price * $discount / 100;
        Product::create([
            'seller_id' => 3,
            'sku' => $sku,
            'title' => 'Samsung S23',
            'description' => 'Samsung S23 bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'samsung-s23',
            'img_path' => "$sku/samsung-s23.jpg",
            'is_featured' => true,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 4
        ]);

        $sku = '224460940X';
        $price = 7000;
        $discount = 40;
        $discounted_price = $price - $price * $discount / 100;
        Product::create([
            'seller_id' => 1,
            'sku' => $sku,
            'title' => 'Macbook pro m4',
            'description' => 'Macbook pro m4 bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'macbook-pro-m4',
            'img_path' => "$sku/macbook-pro-m4.jpg",
            'is_featured' => true,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 6
        ]);

        $sku = '224460950X';
        $price = 3500;
        $discount = 50;
        $discounted_price = $price - $price * $discount / 100;
        $attributes = json_encode([
            'cpu' => 'm3',
            'İstehsalçı' => 'Apple',
            'ram' => '16',
        ]);
        Product::create([
            'seller_id' => 1,
            'sku' => $sku,
            'title' => 'Macbook air m3',
            'description' => 'Macbook air m3 bu qabaqcıl texnologiyaları və zərif dizaynı özündə birləşdirən güclü bir cihazdır. Yüksək keyfiyyət və funksionallıq axtaranlar üçün ideal seçimdir.',
            'slug' => 'macbook-air-m3',
            'img_path' => "$sku/macbook-air-m3.jpg",
            'attributes' => $attributes,
            'is_featured' => true,
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'stock' => 5,
            'category_id' => 6
        ]);
        // Product::factory(3)->create(['user_id' => 1, 'stock' => 5]);
        // Product::factory(3)->create(['user_id' => 2, 'stock' => 5]);
        // Product::factory(3)->create(['user_id' => 2, 'is_featured' => true, 'stock' => 5]);
    }
}
