<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ChartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/activate-user', [EmployeeController::class, 'activateUser']);
Route::post('/deactivate-user', [EmployeeController::class, 'deactivateUser']);
Route::get('/charts-data', [ChartController::class, 'getChartData']);