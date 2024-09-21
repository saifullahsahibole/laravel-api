<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return response()->json(['message' => 'User created successfully.'], 201);
    }

    public function index(Request $request)
    {
        $query = User::query();
        
        $filters = $request->only(['first_name', 'gender', 'date_of_birth']);
        
        foreach ($filters as $key => $value) {
            if ($value) {
                $query->where($key, $value);
            }
        }
        
        $users = $query->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No records found.'], 404);
        }
    
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'No records found.'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'date_of_birth' => 'sometimes|date',
            'gender' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $request->id,
            'password' => 'sometimes|string|min:6',
        ]);

        $user = User::findOrFail($validated['id']);
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $user->update($validated);
        return response()->json(['message' => 'User updated successfully.']);
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->timesheets()->delete();
        $user->delete();
        return response()->json(['message' => 'User and related timesheets deleted successfully.']);
    }
}

