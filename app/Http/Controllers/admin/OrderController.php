<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;

        $orders = Order::with('plates')->where('restaurant_id', $restaurantId)->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
