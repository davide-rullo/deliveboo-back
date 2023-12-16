<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());

        /* $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:50',
            'customer_mail' => 'required|email',
            'customer_address' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
        } */
    }
}
