<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadEmail;
use App\Mail\NewLeadEmailMd;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:50',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'customer_message' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
        }

        $lead = Lead::create($request->all());

        //mail admin
        Mail::to('info@deliveboo.it')->send(new NewLeadEmailMd($lead));

        //mail customer
        Mail::to($lead->customer_email)->send(new NewLeadEmailMd($lead));


        return response()->json([
            'success' => true,
            'message' => 'Your order has been sent'
        ]);
    }
}
