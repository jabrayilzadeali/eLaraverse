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
        $tech = Category::create([
            'name' => 'Texnalogiya',
            'slug' => 'texnalogiya'
        ]);
        $phone = Category::create([
            'name' => 'Telefonlar',
            'slug' => 'texnalogiya/telefonlar',
            'parent_id' => $tech->id
        ]);
        Category::create([
            'name' => 'Apple',
            'slug' => 'texnalogiya/telefonlar/apple',
            'parent_id' => $phone->id
        ]);
        Category::create([
            'name' => 'Samsung',
            'slug' => 'texnalogiya/telefonlar/samsung',
            'parent_id' => $phone->id
        ]);
        $laptop = Category::create([
            'name' => 'Notbuk',
            'slug' => 'texnalogiya/notbuk',
            'parent_id' => $tech->id
        ]);
        Category::create([
            'name' => 'Macbook',
            'slug' => 'texnalogiya/notbuk/macbook',
            'parent_id' => $laptop->id
        ]);
        Category::create([
            'name' => 'Asus',
            'slug' => 'texnalogiya/notbuk/Asus',
            'parent_id' => $laptop->id
        ]);
        Category::create([
            'name' => 'Lenovo',
            'slug' => 'texnalogiya/notbuk/lenovo',
            'parent_id' => $laptop->id
        ]);

        Category::create([
            'name' => 'Geyimlər',
            'slug' => 'geyimler'
        ]);
        Category::create([
            'name' => 'Kozmetik',
            'slug' => 'kozmetik'
        ]);
        Category::create([
            'name' => 'Mebel',
            'slug' => 'mebel'
        ]);
        Category::create([
            'name' => 'Sağlamlıq',
            'slug' => 'saglamliq'
        ]);
        Category::create([
            'name' => 'Uşaq geyimləri və oyuncaqları',
            'slug' => 'usaq-geyimleri-ve-oyuncaqlari'
        ]);
        Category::create([
            'name' => 'Kitablar',
            'slug' => 'kitablar'
        ]);
        // Uşaq geyimləri və oyuncaqları
        // Kitablar
        // Category::factory(3)->create(['parent_id' => 3]);
        // Category::factory(3)->create(['parent_id' => 4]);
    }
}
