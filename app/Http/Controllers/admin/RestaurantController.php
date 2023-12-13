<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Plate;

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

        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Restaurant::generateSlug($validated['name']);

        if ($request->has('logo')) {
            $file_path = Storage::put('img', $request->logo);
            $validated['logo'] = $file_path;
        }

        $restaurant = new Restaurant($validated);
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        // Verifica se il campo "types" è presente e non vuoto prima di eseguire l'operazione di attach
        if ($request->has('types') && !empty($request->types)) {
            $restaurant->types()->attach($request->types);
        } else {
            
        }

        return to_route('admin.restaurants.index', compact('restaurant'))->with('message', '✅ Restaurant created successfully! You are ready to go');
    }


    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $types = Type::all();
        return view('admin.restaurants.show', compact('restaurant', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $types = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();
        /* $validated['slug'] = $restaurant->generateSlug($request->name); */
        //dd($request);

        /* if (!is_null($restaurant->logo) || Storage::fileExists($restaurant->logo)) {
            Storage::delete($restaurant->logo);
        } */

        if ($request->has('logo')) {
            $updatedLogo = $request->logo;
            $file_path = Storage::put('img', $updatedLogo);




            $validated['logo'] = $file_path;
        }

        if (!Str::is($restaurant->getOriginal('name'), $request->name)) {
            $validated['slug'] = $restaurant->generateSlug($request->name);
        }

        if ($request->has('types')) {
            $restaurant->types()->sync($request->types);
        }

        $restaurant->update($validated);
        return to_route('admin.restaurants.index')->with('message', '✅ Restaurant updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {

        $restaurant->types()->detach();

        /* if (!is_null($restaurant->logo) && Storage::fileExists($restaurant->logo)) {
            Storage::delete($restaurant->logo);
        }; */

        $plates = Plate::where('restaurant_id', $restaurant->id)->get();
        foreach ($plates as $plate) {
            $plate->forceDelete();
        }

        $restaurant->delete();
        return to_route('admin.restaurants.index')->with('message', '✅ Restaurant deleted successfully');
    }

    public function recycle()
    {
        $userId = Auth::id();
        $page_title = 'Restaurant Recycle Bin';
        $trashed_restaurants = Restaurant::onlyTrashed()->where('user_id', $userId)->orderByDesc('deleted_at')->paginate(5);
        return view('admin.restaurants.recycle', compact('trashed_restaurants', 'page_title'));
    }

    public function restore($id)
    {


        $restaurant =  Restaurant::onlyTrashed()->where('user_id', Auth::id())->find($id);
        $restaurant->restore();
        return to_route('admin.restaurants.index')->with('message', '✅ Restaurant restored successfully');
    }

    public function forceDelete($id)
    {

        $restaurant =  Restaurant::onlyTrashed()->where('user_id', Auth::id())->find($id);

        if (!is_null($restaurant->logo) && Storage::fileExists($restaurant->logo)) {
            Storage::delete($restaurant->logo);
        }
        $restaurant->types()->detach();

        $restaurant->forceDelete();

        return to_route('admin.recycle')->with('message', '✅ Restaurant deleted permanently');
    }

    public function showTrashed($id)
    {
        $page_title = 'Deleted Restaurant Details';
        $restaurant = Restaurant::onlyTrashed()->find($id);
        return view('admin.restaurants.showTrashed', compact('restaurant', 'page_title'));
    }
}
