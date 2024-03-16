<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Sales;

class SalesController extends Controller
{
    public function index()
    {
        try {
            // Fetch sales orders by id in descending order
            $sales = Sales::orderBy('id', 'desc')->get();
            return response()->json($sales, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }



   public function store(Request $request)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'customer_id' => [
                'required',
                Rule::unique('sales')->where(function ($query) use ($request) {
                    return $query->where('customer_id', $request->customer_id);
                }),
            ],
            'amount' => 'required',
            'category' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // Create a new sales item
        $sale = Sales::create($validated);

        // Return success response
        return response()->json(['message' => 'Sale item created successfully', 'data' => $sale], 201);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}



    public function show(Sales $sale)
    {
        try {
            return response()->json($sale, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }


    public function update(Request $request, Sales $sale)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'customer_id' => [
                'required',
                Rule::unique('sales')->ignore($sale->id)->where(function ($query) use ($request) {
                    return $query->where('customer_id', $request->customer_id);
                }),
            ],
            'amount' => 'required',
            'category' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // Update the sales item
        $sale->update($validated);

        // Return success response
        return response()->json(['message' => 'Sale item updated successfully', 'data' => $sale], 200);
    } catch (\Exception $e) {
        // Return error response if validation fails or an exception occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}


    public function destroy(Sales $sale)
    {
        try {
            $sale->delete();
            return response()->json(['message' => 'Sale item deleted successfully', 'data' => $sale], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
}
