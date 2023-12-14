<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterTypeRequest;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $types = Type::all(); */
        return response()->json([
            'success' => true,
            'types' => Type::all()
        ]);
    }

    public function show(Request $request)
    {
        $selected_types = $request->input('selected_types');
        $restaurants = Restaurant::query();

        foreach ($selected_types as $type) {
            $restaurants->whereHas('types', function ($query) use ($type) {
                $query->where('name', $type);
            });
        }

        $restaurants = $restaurants->get();

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
            'selected_types' => $selected_types
        ]);
    }
}
