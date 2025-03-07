<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(2);
        $slug = Str::slug($title);
        return [
            'user_id' => 1,
            'category_id' => Category::inRandomOrder()->first()->id,
            'sku' => fake()->unique()->isbn10,
            'slug' => $slug,
            'title' => $title,
            'description' => fake()->sentence(10),
            'img_path' => 'default-img.jpg',
            'rating' => fake()->randomFloat(1, 0, 5),
            'is_featured' => fake()->boolean(),
            'discount' => fake()->numberBetween(50, 100),
            'price' => fake()->numberBetween(10, 1000),
        ];
    }
}
