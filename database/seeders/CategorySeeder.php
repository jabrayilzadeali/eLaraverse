<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Category::factory(10)->create();
        // Category::factory(3)->create(['parent_id' => 3]);
        // Category::factory(3)->create(['parent_id' => 4]);
    }
}
