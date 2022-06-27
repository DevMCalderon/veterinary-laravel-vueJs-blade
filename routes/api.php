<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductoController;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/products', [ProductoController::class, 'list']);
Route::post('/product', [ProductoController::class, 'store']);
Route::get('/product/{product}', [ProductoController::class, 'show']);
Route::post('/product/{product}', [ProductoController::class, 'update']);
Route::delete('/product/{product}', [ProductoController::class, 'destroy']);

Route::get('/categories', [ProductCategoryController::class, 'index']);