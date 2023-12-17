<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function createOrder(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Order::generateSlug($validated['name']);
        $validated['data'] = Carbon::now();
        $validated['state'] = "In preparazione";
    }
}
