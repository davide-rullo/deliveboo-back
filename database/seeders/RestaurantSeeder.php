<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'La Trattoria Del Gusto',
                'address' => 'Via del Sapore, 123',
                'vat_number' => 'IT123456789',
                'logo' => 'trattoria_logo.png',
                'slug' => 'trattoria-del-gusto',
                'phone' => '+39 123 456789',
            ],
            [
                'name' => 'Gourmet Fusion Grill',
                'address' => 'Piazza del Sapore Elegante, 45',
                'vat_number' => 'IT987654321',
                'logo' => 'fusion_grill_logo.png',
                'slug' => 'gourmet-fusion-grill',
                'phone' => '+39 987 654321',
            ],
            [
                'name' => 'Rustic Pizzeria',
                'address' => 'Vicolo delle Pizze, 67',
                'vat_number' => 'IT543210987',
                'logo' => 'rustic_pizzeria_logo.png',
                'slug' => 'rustic-pizzeria',
                'phone' => '+39 543 210987',
            ],
            [
                'name' => 'Seafood Delight',
                'address' => 'Lungomare del Mare, 12',
                'vat_number' => 'IT876543210',
                'logo' => 'seafood_delight_logo.png',
                'slug' => 'seafood-delight',
                'phone' => '+39 876 543210',
            ],
            [
                'name' => 'Vegetarian Oasis',
                'address' => 'Oasi Verde, 34',
                'vat_number' => 'IT135792468',
                'logo' => 'vegetarian_oasis_logo.png',
                'slug' => 'vegetarian-oasis',
                'phone' => '+39 135 792468',
            ],
        ];
        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();

            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->vat_number = $restaurant['vat_number'];
            $new_restaurant->logo = $restaurant['logo'];
            $new_restaurant->slug = Str::slug($restaurant['name'], '-');
            $new_restaurant->phone = $restaurant['phone'];

            $new_restaurant->save();
        }
    }
}
