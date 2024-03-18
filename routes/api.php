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

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);

Route::post('/work-intervals', [WorkIntervalController::class, 'start']);
Route::put('/work-intervals', [WorkIntervalController::class, 'stop']);
