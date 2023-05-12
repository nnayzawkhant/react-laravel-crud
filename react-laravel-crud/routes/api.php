<?php
 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\EmployeeController;
 
 Route::get('/employees', [EmployeeController::class, 'index']);
 Route::get('/employees/{id}', [EmployeeController::class, 'show']);
 Route::post('/employees', [EmployeeController::class, 'store']);
 Route::put('/employees/{id}/edit', [EmployeeController::class, 'update']);
 Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
 Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit']);
 
 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
 });