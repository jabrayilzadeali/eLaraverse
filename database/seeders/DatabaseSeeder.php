<?php

use App\Models\Admin;
use App\Models\Cart;
use Database\Seeders\ProductSeeder;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Wishlist;
use Database\Seeders\CartSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ReviewSeeder;
use Illuminate\Support\Facades\Hash;
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

        $seller1 = Seller::create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            // 'password' => '12345678',
            'password' => Hash::make('12345678'),
        ]);
        $seller2 = Seller::create([
            'username' => 'Test2 User',
            'email' => 'test2@example.com',
            // 'password' => '12345678',
            'password' => Hash::make('12345678'),
        ]);
        $seller3 = Seller::create([
            'username' => 'Test3 User',
            'email' => 'test3@example.com',
            // 'password' => '12345678',
            'password' => Hash::make('12345678'),
        ]);
        $seller4 = Seller::create([
            'username' => 'Test4 User',
            'email' => 'test4@example.com',
            // 'password' => '12345678',
            'password' => Hash::make('12345678'),
        ]);

        $user = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
            'balance' => 500000,
            'is_seller' => true
        ]);

        $user2 = User::factory()->create([
            'username' => 'Test2 User',
            'email' => 'test2@example.com',
            'password' => '12345678',
            'balance' => 10000,
            'is_seller' => true
        ]);

        $user3 = User::factory()->create([
            'username' => 'Test3 User',
            'email' => 'test3@example.com',
            'password' => '12345678',
            'balance' => 10000,
            'is_seller' => true
        ]);
        $user4 = User::factory()->create([
            'username' => 'Test4 User',
            'email' => 'test4@example.com',
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
        
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => 1
        ]);
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => 2
        ]);

        Wishlist::create([
            'user_id' => $user2->id,
            'product_id' => 2
        ]);

        Wishlist::create([
            'user_id' => $user2->id,
            'product_id' => 3
        ]);

        Wishlist::create([
            'user_id' => $user2->id,
            'product_id' => 4
        ]);
        
        
        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'order_number' => 1234567890,
        //     'total_price' => 4000,
        //     'status' => 'completed'
        // ]);
        // OrderItem::create([
        //     'order_id' => $order->id,
        //     'product_id' => 1,
        //     'status' => 'delivered',
        //     'quantity' => 2,
        // ]);
        // OrderItem::create([
        //     'order_id' => $order->id,
        //     'product_id' => 2,
        //     'status' => 'delivered',
        //     'quantity' => 2,
        // ]);
    }
}
