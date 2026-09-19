<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Category;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        // Delete old food records
        Food::query()->delete();

        // Get category IDs
        $categories = Category::pluck('id', 'name');

        $foods = [

            // ==================== PIZZA ====================

            [
                'category_id' => $categories['Pizza'] ?? null,
                'name' => 'Chicken Pizza',
                'description' => 'Delicious chicken pizza with cheese',
                'price' => 350,
                'image' => 'chicken-pizza.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pizza'] ?? null,
                'name' => 'Cheese Pizza',
                'description' => 'Cheesy and tasty pizza',
                'price' => 300,
                'image' => 'cheese-pizza.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pizza'] ?? null,
                'name' => 'Pepperoni Pizza',
                'description' => 'Classic pepperoni pizza with extra cheese',
                'price' => 380,
                'image' => 'pepperoni-pizza.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pizza'] ?? null,
                'name' => 'BBQ Chicken Pizza',
                'description' => 'BBQ chicken with mozzarella cheese',
                'price' => 420,
                'image' => 'bbq-chicken-pizza.PNG',
                'is_available' => true,
            ],


            // ==================== BURGER ====================

            [
                'category_id' => $categories['Burger'] ?? null,
                'name' => 'Beef Burger',
                'description' => 'Juicy beef burger with fresh vegetables',
                'price' => 250,
                'image' => 'beef-burger.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Burger'] ?? null,
                'name' => 'Chicken Burger',
                'description' => 'Crispy chicken burger',
                'price' => 220,
                'image' => 'chicken-burger.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Burger'] ?? null,
                'name' => 'Cheese Burger',
                'description' => 'Beef burger with melted cheese',
                'price' => 280,
                'image' => 'cheese-burger.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Burger'] ?? null,
                'name' => 'Double Beef Burger',
                'description' => 'Double beef patty with special sauce',
                'price' => 350,
                'image' => 'double-beef-burger.PNG',
                'is_available' => true,
            ],


            // ==================== CHICKEN ====================

            [
                'category_id' => $categories['Chicken'] ?? null,
                'name' => 'Fried Chicken',
                'description' => 'Crispy fried chicken',
                'price' => 180,
                'image' => 'fried-chicken.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Chicken'] ?? null,
                'name' => 'Chicken Wings',
                'description' => 'Spicy and crispy chicken wings',
                'price' => 220,
                'image' => 'chicken-wings.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Chicken'] ?? null,
                'name' => 'Chicken Nuggets',
                'description' => 'Crispy golden chicken nuggets',
                'price' => 200,
                'image' => 'chicken-nuggets.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Chicken'] ?? null,
                'name' => 'Grilled Chicken',
                'description' => 'Juicy grilled chicken with herbs',
                'price' => 320,
                'image' => 'grilled-chicken.PNG',
                'is_available' => true,
            ],


            // ==================== PASTA ====================

            [
                'category_id' => $categories['Pasta'] ?? null,
                'name' => 'Creamy Pasta',
                'description' => 'Creamy and delicious pasta',
                'price' => 280,
                'image' => 'creamy-pasta.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pasta'] ?? null,
                'name' => 'Chicken Pasta',
                'description' => 'Delicious pasta with chicken',
                'price' => 300,
                'image' => 'chicken-pasta.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pasta'] ?? null,
                'name' => 'Spaghetti',
                'description' => 'Classic Italian spaghetti',
                'price' => 260,
                'image' => 'spaghetti.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Pasta'] ?? null,
                'name' => 'Cheese Pasta',
                'description' => 'Pasta loaded with delicious cheese',
                'price' => 290,
                'image' => 'cheese-pasta.PNG',
                'is_available' => true,
            ],


            // ==================== DRINKS ====================

            [
                'category_id' => $categories['Drinks'] ?? null,
                'name' => 'Cold Coffee',
                'description' => 'Refreshing cold coffee',
                'price' => 150,
                'image' => 'cold-coffee.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Drinks'] ?? null,
                'name' => 'Coca Cola',
                'description' => 'Chilled Coca Cola',
                'price' => 80,
                'image' => 'coca-cola.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Drinks'] ?? null,
                'name' => 'Orange Juice',
                'description' => 'Fresh orange juice',
                'price' => 130,
                'image' => 'orange-juice.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Drinks'] ?? null,
                'name' => 'Chocolate Milkshake',
                'description' => 'Creamy chocolate milkshake',
                'price' => 200,
                'image' => 'chocolate-milkshake.PNG',
                'is_available' => true,
            ],


            // ==================== DESSERT ====================

            [
                'category_id' => $categories['Dessert'] ?? null,
                'name' => 'Chocolate Cake',
                'description' => 'Soft and delicious chocolate cake',
                'price' => 200,
                'image' => 'chocolate-cake.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Dessert'] ?? null,
                'name' => 'Strawberry Cake',
                'description' => 'Fresh strawberry cream cake',
                'price' => 250,
                'image' => 'strawberry-cake.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Dessert'] ?? null,
                'name' => 'Ice Cream',
                'description' => 'Creamy vanilla ice cream',
                'price' => 120,
                'image' => 'ice-cream.PNG',
                'is_available' => true,
            ],

            [
                'category_id' => $categories['Dessert'] ?? null,
                'name' => 'Brownie',
                'description' => 'Warm chocolate brownie',
                'price' => 180,
                'image' => 'brownie.PNG',
                'is_available' => true,
            ],
        ];

        // Insert all foods
        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}