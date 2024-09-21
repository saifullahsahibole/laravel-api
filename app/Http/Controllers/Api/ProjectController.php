<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Project::create($validated);
        return response()->json(['message' => 'Project created successfully.'], 201);
    }

    public function index(Request $request)
    {
        $query = Project::query();
        
        $filters = $request->only(['name', 'department', 'status', 'start_date', 'end_date']);
        
        foreach ($filters as $key => $value) {
            if ($value) {
                $query->where($key, $value);
            }
        }
        
        $projects = $query->get();

        if ($projects->isEmpty()) {
            return response()->json(['message' => 'No records found.'], 404);
        }
    
        return response()->json($projects);
    }

    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'No records found.'], 404);
        }
        return response()->json($project);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:projects,id',
            'name' => 'sometimes|string',
            'department' => 'sometimes|string',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'status' => 'sometimes|string',
        ]);

        $project = Project::findOrFail($validated['id']);
        $project->update($validated);
        return response()->json(['message' => 'Project updated successfully.']);
    }

    public function destroy(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully.']);
    }
}
