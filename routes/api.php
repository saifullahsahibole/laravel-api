<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TimesheetController;
use App\Http\Controllers\Api\AuthController;

Route::middleware('auth:api')->group(function () {
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users/update', [UserController::class, 'update']);
    Route::post('/users/delete', [UserController::class, 'destroy']);

    Route::post('/projects', [ProjectController::class, 'store']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects/update', [ProjectController::class, 'update']);
    Route::post('/projects/delete', [ProjectController::class, 'destroy']);

    Route::post('/timesheets', [TimesheetController::class, 'store']);
    Route::get('/timesheets/{id}', [TimesheetController::class, 'show']);
    Route::get('/timesheets', [TimesheetController::class, 'index']);
    Route::post('/timesheets/update', [TimesheetController::class, 'update']);
    Route::post('/timesheets/delete', [TimesheetController::class, 'destroy']);
});

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);





