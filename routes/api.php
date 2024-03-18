<?php

use App\Models\User;
use App\Http\Controllers\Api\v1\{
    ProjectController,
    WorkIntervalController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// WIP: This is a temporary route to test the create Project endpoint
Route::get('/users', function (Request $request) {
    return User::all('id', 'name');
});

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);

Route::post('/work-intervals', [WorkIntervalController::class, 'start']);
Route::put('/work-intervals', [WorkIntervalController::class, 'stop']);
