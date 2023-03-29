<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/agregar', [UserController::class, 'store']);
Route::get('/users/ver/{id}', [UserController::class, 'show']);
Route::put('/users/actualizar/{id}', [UserController::class, 'update']);
Route::delete('/users/eliminar/{id}', [UserController::class, 'destroy']);
Route::post('/users/{userId}/rol/{roleId}', [UserController::class, 'assignRole']);
Route::get('/users/findall', [UserController::class, 'findAll']);


Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles/agregar', [RoleController::class, 'store']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

