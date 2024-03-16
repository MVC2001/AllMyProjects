<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventories;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    public function index()
    {
        try {
            $inventories = Inventories::all();
            return response()->json($inventories, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }


  public function store(Request $request)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'item' => 'required|max:255',
            'number' => [
                'required',
                'numeric',
                Rule::unique('inventories')->where(function ($query) use ($request) {
                    return $query->where('number', $request->number);
                }),
            ],
            'category' => 'required|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|max:255',
        ]);

        // Create a new inventory item
        $inventory = Inventories::create($validated);

        // Return success response
        return response()->json(['message' => 'Inventory item created successfully', 'data' => $inventory], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}


    public function show(Inventories $inventory)
    {
        try {
            return response()->json($inventory, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }



    public function update(Request $request, Inventories $inventory)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'item' => 'required|max:255',
            'number' => [
                'required',
                'numeric',
                Rule::unique('inventories')->ignore($inventory->id)->where(function ($query) use ($request) {
                    return $query->where('number', $request->number);
                }),
            ],
            'category' => 'required|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|max:255',
        ]);

        // Update the inventory item
        $inventory->update($validated);

        // Return success response
        return response()->json(['message' => 'Inventory item updated successfully', 'data' => $inventory], 200);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}



    public function destroy(Inventories $inventory)
    {
        try {
            $inventory->delete();
            return response()->json(['message' => 'Inventory item deleted successfully', 'data' => $inventory], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
