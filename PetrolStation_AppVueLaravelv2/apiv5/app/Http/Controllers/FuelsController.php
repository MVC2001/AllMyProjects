<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Fuels;

class FuelsController extends Controller
{
    public function index()
    {
        try {
            $fuels = Fuels::all();
            return response()->json($fuels, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

   public function store(Request $request)
{
    try {
        // Validate request data
                $validated = $request->validate([
    'tank_number' => 'required|unique:fuels,tank_number',
    'category' => 'required|max:255',
    'volumeLevel' => 'required', // This is the problematic line
    'description' => 'required|max:255',
      ]);


        // Create a new fuel item
        $fuel = Fuels::create($validated);

        // Return success response
        return response()->json(['message' => 'Fuel item created successfully', 'data' => $fuel], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}

    public function show(Fuels $fuel)
    {
        try {
            return response()->json($fuel, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Fuels $fuel)
    {
        try {
            $validated = $request->validate([
                'tank_number' => 'required',
                'category' => 'required|max:255',
                'volumeLevel' => 'required',
                'description' => 'required|max:255',
            ]);

            $fuel->update($validated);
            return response()->json(['message' => 'Fuel item updated successfully', 'data' => $fuel], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Fuels $fuel)
    {
        try {
            $fuel->delete();
            return response()->json(['message' => 'Fuel item deleted successfully', 'data' => $fuel], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
