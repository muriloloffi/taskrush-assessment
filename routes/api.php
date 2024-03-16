<?php

use App\Http\Controllers\Api\v1\{
    ProjectController,
    WorkIntervalController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Get all projects
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/project/{id}', [ProjectController::class, 'show']);

// Start a new workInterval for a given user and task
Route::post('/work-intervals', [WorkIntervalController::class, 'start']);

// Stop a workInterval for a given user
Route::put('/work-intervals', [WorkIntervalController::class, 'stop']);
