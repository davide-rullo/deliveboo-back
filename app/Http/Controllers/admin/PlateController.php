<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlatesRequest;
use App\Http\Requests\UpdatePlatesRequest;
use App\Models\Plate;
use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();

        if ($restaurant === null) {
            return to_route('admin.restaurants.index', compact('restaurant'))->with('message', "Prima devi creare il tuo ristorante");
        } else {
            $restaurantId = $restaurant->id;
            $plates = Plate::all();
            $filteredPlates = $plates->where('restaurant_id', $restaurantId);
            return view('admin.plates.index', compact('filteredPlates'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;
        $plates = Plate::where('restaurant_id', $restaurantId)->first();
        return view('admin.plates.create', compact('plates', 'restaurantId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatesRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Plate::generateSlug($validated['name']);

        if ($request->has('cover_image')) {
            $file_path = Storage::put('covers', $request->cover_image);
            $validated['cover_image'] = $file_path;
        }

        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurant->price = str_replace(',', '.', $request->input('price'));
        $restaurantId = $restaurant->id;

        // Aggiungere il piatto alla relazione 'plates' del ristorante
        $plate = $restaurant->plates()->create($validated);

        return to_route('admin.plates.index')->with('message', '✅ Dish created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatesRequest $request, Plate $plate)
    {
        $validated = $request->validated();

        if ($request->has('cover_image')) {
            $updatedCoverImage = $request->cover_image;
            $file_path = Storage::put('covers', $updatedCoverImage);

            if (!is_null($plate->cover_image) && Storage::fileExists($plate->cover_image)) {
                Storage::delete($plate->cover_image);
            }

            $validated['cover_image'] = $file_path;
        }

        if (!Str::is($plate->getOriginal('name'), $request->name)) {
            $validated['slug'] = $plate->generateSlug($request->name);
        }

        $plate->update($validated);

        return to_route('admin.plates.index')->with('message', '✅ Dish updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plate $plate)
    {
        /* if (!is_null($plate->cover_image) && Storage::fileExists($plate->cover_image)) {
            Storage::delete($plate->cover_image);
        }; */

        //dd($plate);
        $plate->delete();
        return to_route('admin.plates.index')->with('message', '✅ Dish deleted successfully');
    }

    public function recycle()
    {
        $page_title = 'Plates Recycle Bin';
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;
        $trashed_plates = Plate::onlyTrashed()->where('restaurant_id', $restaurantId)->paginate(5);
        return view('admin.plates.recycle', compact('trashed_plates', 'page_title'));
    }

    public function restore($id)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;
        $plate = Plate::onlyTrashed()->where('restaurant_id', $restaurantId)->find($id);
        $plate->restore();

        return to_route('admin.plates.index')->with('message', 'Your plate was restored successfully');
    }

    public function forceDelete($id)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;
        $plate = Plate::onlyTrashed()->where('restaurant_id', $restaurantId)->find($id);

        /* if (!is_null($plate->cover_image) && Storage::fileExists($plate->cover_image)) {
            Storage::delete($plate->cover_image);
        }; */

        $plate->forceDelete();

        return to_route('admin.recycle.plates')->with('message', 'Your plate was deleted permanently');
    }

    public function showTrashed($id)
    {
        $page_title = 'Deleted Plate Details';
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $restaurantId = $restaurant->id;
        $plate = Plate::onlyTrashed()->where('restaurant_id', $restaurantId)->find($id);
        return view('admin.plates.showTrashed', compact('plate', 'page_title'));
    }
}
