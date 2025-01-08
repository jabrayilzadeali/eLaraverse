<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(2)->create(['user_id' => 1, 'is_featured' => true, 'stock' => 5]);
        Product::factory(3)->create(['user_id' => 1, 'stock' => 5]);
        Product::factory(3)->create(['user_id' => 2, 'stock' => 5]);
        Product::factory(3)->create(['user_id' => 2, 'is_featured' => true, 'stock' => 5]);
    }
}
