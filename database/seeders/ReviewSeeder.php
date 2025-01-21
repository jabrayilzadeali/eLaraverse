<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory(10)->create();

        $averageRatings = Review::select('product_id')->selectRaw('AVG(rating) as avg_rating')->groupBy('product_id')->get();

        foreach ($averageRatings as $ratingData) {
            Product::where('id', $ratingData->product_id)->update(['rating' => number_format($ratingData->avg_rating, 1)]);
        }
    }
}
