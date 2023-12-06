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

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurantId = Restaurant::where('user_id', Auth::id())->id()->first();
        $plates = Plate::where('restaurant_id', $restaurantId);
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatesRequest $request, Plate $plate)
    {
        $validated = $request->validated();
        $validated['slug'] = Plate::generateSlug($validated['name']);
        if ($request->has('cover_image')) {
            $file_path = Storage::put('covers', $request->cover_image);
            $validated['cover_image'] = $file_path;
        }

        $plate = Plate::create($validated);
        return to_route('plates.index')->with('message', 'Plate created!');
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
        $validated['slug'] = $plate->generateSlug($request->name);
        if ($request->has('cover_image')) {
            $updatedCoverImage = $request->thumb;
            $file_path = Storage::put('covers', $updatedCoverImage);

            if (!is_null($plate->cover_image) && Storage::fileExists($plate->cover_image)) {
                Storage::delete($plate->cover_image);
            }

            $validated['cover_image'] = $file_path;
        }

        $plate->update($validated);
        return to_route('plates.index')->with('message', 'Plate updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plate $plate)
    {
        if (!is_null($plate->cover_image) && Storage::fileExists($plate->cover_image)) {
            Storage::delete($plate->cover_image);
        };
        $plate->delete();
        return to_route('plates.index')->with('message', 'Your plate was deleted successfully');
    }
}
