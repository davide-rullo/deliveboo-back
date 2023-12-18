<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createOrder(StoreOrderRequest $request)
    {

        $flag = false;

        $validated = $request->validated();
        $validated['orderDetail']['slug'] = Order::generateSlug($validated['orderDetail']['customer_email']);
        $validated['orderDetail']['data'] = Carbon::now();
        $validated['orderDetail']['state'] = "In preparazione";

        $order = new Order($validated['orderDetail']);
        $order->save();

        foreach ($validated['orderDetail']['items'] as $item) {
            $order->plates()->attach($item['id'], ['quantity_plate' => $item['quantity']]);
        }
        $flag = true;
        if ($flag) {
            $data = [
                'success' => true,
                'message' => 'Ordine creato'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Ordine fallito",
            ];
            return response()->json($data, 401);
        }
    }
}
