<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Prendo l'id dell utente autenticato
        $userId = Auth::id();

        /*Ricerco nella tabella Restaurant un elemento con user_id == allo userId. 
        Il metodo first() permette di ottenere il dato che ci interessa come singolo oggetto, 
        piuttosto che come una collezione con , in questo caso, un singoilo oggetto
        */
        $restaurant = Restaurant::where('user_id', $userId)->first();

        return view('admin.restaurants.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Restaurant::generateSlug($request->name);

        if ($request->has('logo')) {
            $file_path = Storage::put('logos', $request->logo);
            $validated['logo'] = $file_path;
        }

        $newRestaurant = Restaurant::create($validated);
        $newRestaurant->save();
        return to_route('restaurants.index')->with('message', 'Restaurant created successfully! You are ready to go');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();
        $validated['slug'] = $restaurant->generateSlug($request->name);
        if ($request->has('logo')) {
            $updatedLogo = $request->thumb;
            $file_path = Storage::put('logos', $updatedLogo);

            if (!is_null($restaurant->logo) && Storage::fileExists($restaurant->logo)) {
                Storage::delete($restaurant->logo);
            }

            $validated['logo'] = $file_path;
        }
        $restaurant->update($validated);
        return to_route('restaurants.index')->with('message', 'Restaurant updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return to_route('restaurants.index')->with('message', 'Your restaurant was deleted successfully');
    }
}
