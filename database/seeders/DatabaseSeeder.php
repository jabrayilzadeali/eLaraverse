<?php

use App\Models\Cart;
use Database\Seeders\ProductSeeder;

use App\Models\User;
use Database\Seeders\CartSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'is_seller' => true
        ]);

        $user = User::factory()->create([
            'username' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => '12345678',
            'is_seller' => true
        ]);

        Cart::factory(2)->create(['user_id' => 1]);
        Cart::factory(2)->create(['user_id' => 2]);
        // $this->call([
        //     ProductSeeder::class
        // ]);
        // $this->call([
        //     CartSeeder::class
        // ]);
    }
}
