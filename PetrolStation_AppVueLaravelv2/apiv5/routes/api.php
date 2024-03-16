<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\FuelsController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\InventoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::post('/registerv1', [AuthController::class, 'register']);
Route::post('/loginv1', 'App\Http\Controllers\AuthController@login')->name('login');
Route::middleware('auth:sanctum')->post('/logoutv1', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-passwordv1', [AuthController::class, 'updatePassword']);
Route::middleware('auth:sanctum')->get('/user/name', 'App\Http\Controllers\AuthController@getLoggedUserName');

//others routes
Route::apiResource('sales', SalesController::class);
Route::get('sales/count/{id}', [SalesController::class, 'countSalesById']);

Route::apiResource('fuels',FuelsController::class);
Route::apiResource('stocks',StocksController::class);
Route::apiResource('inventories',InventoryController::class);





