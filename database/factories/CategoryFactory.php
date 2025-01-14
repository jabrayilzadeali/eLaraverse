<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(2);
        $slug = Str::slug($name);
        return [
            'parent_id' => $this->faker->randomElement([null, Category::inRandomOrder()->first()?->id]), // Random parent_id or null
            'slug' => $slug,
            'name' => $name,
            'order' => 0
        ];
    }
}
