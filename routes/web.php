<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Api\Payments\BrainTreeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->prefix('admin')->name("admin.")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug']);

    Route::get('/recycle', [RestaurantController::class, 'recycle'])->name('recycle');

    Route::get('/restore/{id}', [RestaurantController::class, 'restore'])->name('restore');


    Route::delete('/forceDelete/{id}', [RestaurantController::class, 'forceDelete'])->name('forceDelete');


    Route::resource('plates', PlateController::class)->parameters(['plates' => 'plate:slug']);

    Route::get('recycle/plates', [PlateController::class, 'recycle'])->name('recycle.plates');

    Route::get('/plates/restore/{id}', [PlateController::class, 'restore'])->name('plates.restore');

    Route::delete('/plates/forceDelete/{id}', [PlateController::class, 'forceDelete'])->name('plates.forceDelete');

    Route::get('/restaurants/{restaurant}/plates/create', [PlateController::class, 'create'])->name('restaurants.plates.create');

    Route::resource('orders', OrderController::class);

    Route::get('changeState/{order}/{string}', [OrderController::class, 'changeState'])->name('orders.changeState');
});

// Mail

Route::get('/mailable', function () {
    $lead = App\Models\Lead::find(1);

    return new App\Mail\NewLeadEmailMd($lead);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
