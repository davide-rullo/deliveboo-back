<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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



    public function show($slug)
    {
        $type = Type::with('restaurants')->where('slug', $slug)->first();
        if ($type) {
            return response()->json([
                'success' => true,
                'result' => $type
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Page not found'
            ]);
        }
    }
}
