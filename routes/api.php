<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json(['message' => 'Hello world!']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/user', [AuthController::class, 'updateUser']);

});
Route::get('/employe', [EmployeController::class, 'index']);
Route::post('/employe', [EmployeController::class, 'store']);
Route::get('/employe/{id}', [EmployeController::class, 'show']);
Route::put('/employe/{id}/edit', [EmployeController::class, 'update']);
Route::delete('/employe/{id}', [EmployeController::class, 'destroy']);


