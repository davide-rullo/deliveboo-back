<?php

use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\Api\Payments\BrainTreeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'restaurants']);

Route::get('/selected', [RestaurantController::class, 'selected']);

// Types

Route::get('/types', [TypeController::class, 'index']);
Route::post('/types/selected_types', [TypeController::class, 'show']);

Route::get('restaurants/{restaurant:slug}', [RestaurantController::class, 'show']);

// Braintree

Route::get('/orders/generate', [BrainTreeController::class, 'generate']);
Route::post('/orders/payment', [BrainTreeController::class, 'makePayment']);


// Order
Route::post('/orders/new', [OrderController::class, 'createOrder']);

// Mail

Route::post('/emails', [LeadController::class, 'store']);
