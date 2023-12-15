<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {

        $val_data = $request->validated();

        $validated['slug'] = Order::generateSlug($val_data['customer_name']);

        $order = new Order($validated);

        $order->save();

        $cartItems = $order->plates()->withPivot('order_plate')->get();


        return response()->json([
            'message' => 'Ordine completato con successo',
            'cart_items' => $cartItems
        ]);
    }
}
