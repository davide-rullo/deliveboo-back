<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Americano, Argentino, Cinese, Colazione, Giapponese,
        // Greco, Healty, Indiano, Italiano, Messicano, Peruviano, Pizzeria, Sushi,  Taiwanese, Tedesco, Thailandese, Turco

        $types = [
            [
                'name' => 'American',
                'cover_image' => 'american.png',
                'slug' => 'american',

            ],
            [
                'name' => 'Chinese',
                'cover_image' => 'chinese.png',
                'slug' => 'chinese',

            ],
            [
                'name' => 'Breakfast',
                'cover_image' => 'breakfast.png',
                'slug' => 'breakfast',
            ],
            [
                'name' => 'Japanese',
                'cover_image' => 'japanese.png',
                'slug' => 'japanese',

            ],
            [
                'name' => 'Greek',
                'cover_image' => 'greek.png',
                'slug' => 'greek',
            ],
            [
                'name' => 'Healty',
                'cover_image' => 'healty.png',
                'slug' => 'healty',

            ],
            [
                'name' => 'Italian',
                'cover_image' => 'italian.png',
                'slug' => 'italian',
            ],

            [
                'name' => 'Indian',
                'cover_image' => 'indian.png',
                'slug' => 'indian',

            ],
            [
                'name' => 'Mexican',
                'cover_image' => 'mexican.png',
                'slug' => 'mexican',
            ],

            [
                'name' => 'Sushi',
                'cover_image' => 'sushi.png',
                'slug' => 'sushi',

            ],


        ];


        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->slug = Str::slug($type['name'], '-');
            $new_type->cover_image = $type['cover_image'];
            $new_type->save();
        }
    }
}
