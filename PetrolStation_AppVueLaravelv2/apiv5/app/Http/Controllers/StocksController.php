<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Stocks;

class StocksController extends Controller
{
    public function index()
    {
        try {
            $stocks = Stocks::all();
            return response()->json($stocks, 200);
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
            'number' => 'required|numeric|unique:stocks',
            'category' => 'required|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|max:255',
        ]);

        // Create a new stock item
        $stock = Stocks::create($validated);

        // Return success response
        return response()->json(['message' => 'Stock item created successfully', 'data' => $stock], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}


    public function show(Stocks $stock)
    {
        try {
            return response()->json($stock, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }



public function update(Request $request, Stocks $stock)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'item' => 'required|max:255',
            'number' => [
                'required',
                'numeric',
                Rule::unique('stocks')->ignore($stock->id),
            ],
            'category' => 'required|max:255',
            'quantity' => 'required|numeric',
            'description' => 'required|max:255',
        ]);

        // Update the stock item
        $stock->update($validated);

        // Return success response
        return response()->json(['message' => 'Stock item updated successfully', 'data' => $stock], 200);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}



    public function destroy(Stocks $stock)
    {
        try {
            $stock->delete();
            return response()->json(['message' => 'Stock item deleted successfully', 'data' => $stock], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
