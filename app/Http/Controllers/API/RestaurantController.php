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
            'restaurants' => Restaurant::random(3)->get()
        ]);
    }
}
