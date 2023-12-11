<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function selected()
    {
        return response()->json([
            'status' => 'success',
            'selected' => Restaurant::all()->random(3)
        ]);
    }

    public function restaurants()
    {
        /* $restaurants = Restaurant::with('type')->orderByDesc('id')->paginate(20); */
        return response()->json([
            'status' => 'success',
            'restaurants' => Restaurant::with('types')->orderByDesc('id')->paginate(20),
        ]);
    }
}
