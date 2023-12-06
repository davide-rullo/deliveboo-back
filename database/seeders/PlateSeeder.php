<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plate;
use Illuminate\Support\Str;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plates = [
            [
                "name" => "Spaghetti Bolognese",
                "slug" => "spaghetti-bolognese",
                "description" => "Classic Italian dish with meat sauce and pasta",
                "ingredients" => "Spaghetti, ground beef, tomatoes, onions, garlic",
                "cover_image" => "spaghetti_bolognese.jpg",
                "price" => 12.99,
                "is_available" => true
            ],

            [
                "name" => "Chicken Alfredo",
                "slug" => "chicken-alfredo",
                "description" => "Creamy pasta with grilled chicken",
                "ingredients" => "Fettuccine, chicken breast, cream, Parmesan cheese",
                "cover_image" => "chicken_alfredo.jpg",
                "price" => 15.50,
                "is_available" => true
            ],

            [
                "name" => "Pizza Margherita",
                "slug" => "pizza-margherita",
                "description" => "Classic pizza with tomato, mozzarella, and basil",
                "ingredients" => "Pizza dough, tomato sauce, mozzarella cheese, fresh basil",
                "cover_image" => "margherita_pizza.jpg",
                "price" => 10.99,
                "is_available" => true
            ],


            [
                "name" => "Caesar Salad",
                "slug" => "caesar-salad",
                "description" => "Fresh salad with romaine lettuce, croutons, and Caesar dressing",
                "ingredients" => "Romaine lettuce, croutons, Parmesan cheese, Caesar dressing",
                "cover_image" => "caesar_salad.jpg",
                "price" => 8.75,
                "is_available" => true
            ],


            [

                "name" => "Beef Stir-Fry",
                "slug" => "beef-stir-fry",
                "description" => "Savory stir-fried beef with vegetables",
                "ingredients" => "Beef strips, broccoli, bell peppers, soy sauce",
                "cover_image" => "beef_stir_fry.jpg",
                "price" => 14.25,
                "is_available" => true
            ],

        ];

        foreach ($plates as $plate) {
            $new_plate = new Plate();

            $new_plate->name = $plate['name'];
            $new_plate->slug = Str::slug($plate['name'], '-');
            $new_plate->description = $plate['description'];
            $new_plate->ingredients = $plate['ingredients'];
            $new_plate->cover_image = $plate['cover_image'];
            $new_plate->price = $plate['price'];
            $new_plate->is_available = $plate['is_available'];



            $new_plate->save();
        }
    }
}
