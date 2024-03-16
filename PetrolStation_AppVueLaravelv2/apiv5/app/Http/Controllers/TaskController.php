<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    // Function to fetch tasks ordered by ID descending
    public function getTasksOrderedByIdDesc()
    {
        $tasks = Tasks::orderBy('id', 'desc')->get(); // Fetch tasks ordered by ID descending
        return response()->json(['tasks' => $tasks]);
    }

    // Function to fetch tasks by name
    public function getTasksByName(Request $request)
    {
        $name = $request->input('name'); // Get the name from the request
        $tasks = Tasks::where('name', $name)->get(); // Fetch tasks by name
        return response()->json(['tasks' => $tasks]);
    }
}
