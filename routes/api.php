<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\WaitingListController;
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

Route::get('/citas/{date}', [WaitingListController::class, 'list']);
Route::delete('/cita/{cita}', [WaitingListController::class, 'destroy']);
Route::get('/consulta/{cita}', [WaitingListController::class, 'consultar']);

Route::get('/products', [ProductoController::class, 'list']);
Route::get('/clients', [ClientController::class, 'list']);
Route::delete('/client/{client}', [ClientController::class, 'destroy']);
Route::get('/client/{client}/pets', [PetController::class, 'list']);
Route::get('/pets/{pet}', [PetController::class, 'list']);
Route::delete('/pet/{pet}', [PetController::class, 'destroy']);
Route::post('/pet/{pet}', [PetController::class, 'update']);
Route::get('/pet/{pet}', [PetController::class, 'show']);
Route::post('/pet', [PetController::class, 'store']);
Route::post('/product', [ProductoController::class, 'store']);
Route::get('/product/{product}', [ProductoController::class, 'show']);
Route::post('/product/{product}', [ProductoController::class, 'update']);
Route::delete('/product/{product}', [ProductoController::class, 'destroy']);
Route::get('/client/{client}', [ClientController::class, 'show']);
Route::post('/client/{client}', [ClientController::class, 'update']);
Route::post('/client', [ClientController::class, 'store']);

Route::get('/categories', [ProductCategoryController::class, 'index']);
Route::get('/estado', [StateController::class, 'index']);
Route::get('/ciudades/{id}', [CityController::class, 'index']);
Route::get('/petType', [PetTypeController::class, 'index']);
Route::get('/razaType/{pettype}', [RazaController::class, 'index']);

Route::post('/consulta', [ConsultaController::class, 'store']);

Route::post('/consulta/{consulta}/send-mail', [ConsultaController::class, 'sendMail'])->name('consulta-mail');
/** WAITING LIST */

Route::post('/waiting-list', [WaitingListController::class, 'store']);

// EMPRESAS 
Route::post('/empresa', [EmpresaController::class, 'store']);
Route::delete('/empresa/{empresa}', [EmpresaController::class, 'destroy']);
Route::get('/empresa/{empresa}', [EmpresaController::class, 'show']);
Route::post('/empresa/{empresa}', [EmpresaController::class, 'update']);

//SUCURSALES 
Route::post('/sucursal', [SucursalController::class, 'store']);
Route::delete('/sucursal/{sucursal}', [SucursalController::class, 'destroy']);
Route::get('/sucursal/{sucursal}', [SucursalController::class, 'show']);
Route::get('/sucursals', [SucursalController::class, 'index']);
Route::post('/sucursal/{sucursal}', [SucursalController::class, 'update']);

// COUNTRIES 
Route::get('/pais', [CountryController::class, 'index']);

// DOMICILIOS 
Route::post('/domicilio', [DomicilioController::class, 'store']);
Route::delete('/domicilio/{domicilio}', [DomicilioController::class, 'destroy']);
Route::get('/domicilio/{domicilio}', [DomicilioController::class, 'show']);
Route::get('/domicilios', [DomicilioController::class, 'index']);
Route::post('/domicilio/{domicilio}', [DomicilioController::class, 'update']);