<?php

use App\Models\Admin;
use App\Models\Cart;
use Database\Seeders\ProductSeeder;

use App\Models\User;
use Database\Seeders\CartSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ReviewSeeder;
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
        
        $admin = Admin::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'is_seller' => true
        ]);

        $user = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'balance' => 600,
            'is_seller' => true
        ]);

        $user = User::factory()->create([
            'username' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => '12345678',
            'balance' => 500,
            'is_seller' => true
        ]);

        $user = User::factory()->create([
            'username' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => '12345678',
            'is_seller' => false
        ]);

        // Cart::factory(2)->create(['user_id' => 1]);
        // Cart::factory(2)->create(['user_id' => 2]);
        $this->call([
            CategorySeeder::class
        ]);
        $this->call([
            ProductSeeder::class
        ]);
        $this->call([
            ReviewSeeder::class
        ]);
    }
}
