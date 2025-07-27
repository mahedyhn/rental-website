<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::where('is_available', true)->latest()->paginate(9);
    return view('welcome', compact('properties'));

    }

    
   public function myProperties(Request $request) 
{
   
    $properties = $request->user()->properties()->latest()->paginate(10);
    return view('owner.properties.index', compact('properties'));
}

    public function create()
    {
        return view('owner.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('owner.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'rent_price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
        ]);

        $property->update($validated);

        return redirect()->route('owner.properties.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if (Auth::id() !== $property->user_id) {
            abort(403);
        }

        $property->delete();
        
        return redirect()->route('owner.properties.index')->with('success', 'Property deleted successfully.');
    }
    }

