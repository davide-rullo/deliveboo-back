<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Plate;

class RestaurantController extends Controller
{
    public function selected()
    {
        return response()->json([
            'status' => 'success',
            'selected' => Restaurant::all()->random(6)
        ]);
    }

    public function restaurants()
    {
        /* $restaurants = Restaurant::with('type')->orderByDesc('id')->paginate(20); */
        return response()->json([
            'status' => 'success',
            'restaurants' => Restaurant::with('types')->orderByDesc('id')->paginate(9),
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::with('types')->where('slug', $slug)->first();

        /* $restaurant_id = Restaurant::where('slug', $slug)->first(); */

        $restaurant_id = $restaurant->id;

        $plates = Plate::where('restaurant_id', $restaurant_id)->where('is_available', 1)->get();


        if ($restaurant) {
            return response()->json([
                'success' => true,
                'result' =>  [
                    'restaurant' => $restaurant,
                    'plates' => $plates
                ]

            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops, page not found'
            ]);
        };

        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);
    }
}
