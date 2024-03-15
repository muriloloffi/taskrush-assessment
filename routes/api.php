<?php

use App\Http\Controllers\Api\v1\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects/{id}', [ProjectController::class, 'show']);
