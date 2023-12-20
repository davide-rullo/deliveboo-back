<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;

        $orders = Order::with('plates')->where('restaurant_id', $restaurantId)->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('plates')->find($id);

        if (!$order) {
            abort(404, 'Ordine non trovato');
        }

        return view('admin.orders.show', compact('order'));
    }

    public function changeState(Order $order, $value)
    {
        $editingOrder = Order::find($order->id);

        if (!$editingOrder) {
            abort(404, 'Ordine non trovato');
        }

        $editingOrder->state = $value;

        $editingOrder->save();

        return redirect()->route('admin.orders.index');
    }
}
