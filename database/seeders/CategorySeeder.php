<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Delete old categories
        Category::truncate();

        // Create categories
        Category::create(['name' => 'Pizza']);
        Category::create(['name' => 'Burger']);
        Category::create(['name' => 'Chicken']);
        Category::create(['name' => 'Pasta']);
        Category::create(['name' => 'Drinks']);
        Category::create(['name' => 'Dessert']);
    }
}