<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('plates')->get();

        return view('admin.orders.index', compact('orders'));
    }
}
