<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('vistaCaja', [HomeController::class, 'vistaCaja'])->name('vistaCaja');
    Route::post('buscarProducto', [ProductoController::class, 'buscarProducto'])->name('buscarProducto');
    Route::get('searchClient/{nombre}', [ClientController::class, 'searchClient'])->name('searchClient');
    Route::get('clientes', [HomeController::class, 'clientList'])->name('client-list');
    Route::get('searchProducto/{nombre}', [ProductoController::class, 'searchProducto'])->name('searchProducto');
    Route::post('comprobarTotal', [ProductoController::class, 'comprobarTotal'])->name('comprobarTotal');
    Route::post('pagar', [ProductoController::class, 'pago'])->name('pagar');

    Route::get('productos', [HomeController::class, 'productosList'])->name('productos-list');
    Route::get('productos/crear', [HomeController::class, 'productosCrear'])->name('productos-crear');
    Route::get('product/{product}/editar', [HomeController::class, 'productosUpdate'])->name('productos-update');
    Route::get('client/{product}/editar', [HomeController::class, 'clientesUpdate'])->name('clientes-update');

});
