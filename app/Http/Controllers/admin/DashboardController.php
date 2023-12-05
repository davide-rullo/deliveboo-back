<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("admin.dashboard", compact("restaurants"));
    }
}
