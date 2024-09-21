<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'task_name' => 'required|string',
            'date' => 'required|date',
            'hours' => 'required|integer',
        ]);

        Timesheet::create($validated);
        return response()->json(['message' => 'Timesheet created successfully.'], 201);
    }

    public function index(Request $request)
    {
        $query = Timesheet::with(['user', 'project']);
        
        $filters = $request->only(['user_id', 'project_id', 'task_name', 'date']);
        
        foreach ($filters as $key => $value) {
            if ($value) {
                $query->where($key, $value);
            }
        }
        
        $timesheets = $query->get();

        if ($timesheets->isEmpty()) {
            return response()->json(['message' => 'No records found.'], 404);
        }

        return response()->json($timesheets);
    }

    public function show($id)
    {
        $timesheet = Timesheet::find($id);
        if (!$timesheet) {
            return response()->json(['message' => 'No records found.'], 404);
        }
        return response()->json($timesheet);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:timesheets,id',
            'task_name' => 'sometimes|string',
            'date' => 'sometimes|date',
            'hours' => 'sometimes|integer',
        ]);

        $timesheet = Timesheet::findOrFail($validated['id']);
        $timesheet->update($validated);
        return response()->json(['message' => 'Timesheet updated successfully.']);
    }

    public function destroy(Request $request)
    {
        $timesheet = Timesheet::findOrFail($request->id);
        $timesheet->delete();
        return response()->json(['message' => 'Timesheet deleted successfully.']);
    }
}

