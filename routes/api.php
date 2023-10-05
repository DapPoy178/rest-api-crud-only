<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

// Route::post('auth/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->post('auth/logout', [AuthController::class, 'logout']);
// Route::middleware('auth:sanctum')->get('/auth/user', [AuthController::class, 'getUser']);

// Route::middleware('auth:sanctum')->group(function () {
// });
// Route::get('log', [LogController::class, 'index']);
// Route::get('log/{id}', [LogController::class, 'show']);

// Route::get('user', [UserController::class, 'index']);
// Route::get('user/{id}', [UserController::class, 'show']);
// Route::post('user/create', [UserController::class, 'store']);
// Route::delete('user/delete/{id}', [UserController::class, 'destroy']);

Route::get('item', [ItemController::class, 'index']);
Route::get('item/{id}', [ItemController::class, 'show']);
Route::post('item/create', [ItemController::class, 'store']);
Route::get('item/edit/{id}', [ItemController::class, 'edit']);
Route::put('item/edit/{id}', [ItemController::class, 'update']);
Route::delete('item/delete/{id}', [ItemController::class, 'destroy']);

// Route::get('dashboard', [DashboardController::class, 'index']);
