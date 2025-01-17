<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique(); // Stock Keeping Unit
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('slug');
            $table->string('title');
            $table->json('attributes')->nullable();
            $table->string('description');
            $table->string('img_path');
            $table->string('rating')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->decimal('price', 9, 3);
            $table->unsignedTinyInteger('discount')->default(0);
            $table->decimal('discounted_price', 9, 3);
            $table->unsignedInteger('stock')->default(0);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE products ADD CONSTRAINT check_discount_range CHECK (discount >= 0 AND discount <= 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE products DROP CONSTRAINT check_discount_range');
        Schema::dropIfExists('products');
    }
};
