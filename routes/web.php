<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('login/{provider}', [SocialAuthController::class,'redirectTo']);
Route::get('{provider}/callback', [SocialAuthController::class,'handleCallback']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('ticket', [VentaController::class, 'showTicket'])->name('ticket');
    Route::get('vistaCaja', [HomeController::class, 'vistaCaja'])->name('vistaCaja');
    Route::post('buscarProducto', [ProductoController::class, 'buscarProducto'])->name('buscarProducto');
    Route::get('searchClient/{nombre}', [ClientController::class, 'searchClient'])->name('searchClient');
    Route::get('clientes', [HomeController::class, 'clientList'])->name('client-list');
    
    Route::get('searchProducto/{nombre}', [ProductoController::class, 'searchProducto'])->name('searchProducto');
    Route::post('comprobarTotal', [ProductoController::class, 'comprobarTotal'])->name('comprobarTotal');
    Route::post('pagar', [ProductoController::class, 'pago'])->name('pagar');

    Route::get('productos', [HomeController::class, 'productosList'])->name('productos-list');
    Route::get('cliente/crear', [HomeController::class, 'clienteCrear'])->name('cliente-crear');
    Route::get('productos/crear', [HomeController::class, 'productosCrear'])->name('productos-crear');
    Route::get('product/{product}/editar', [HomeController::class, 'productosUpdate'])->name('productos-update');
    Route::get('client/{client}/editar', [HomeController::class, 'clientesUpdate'])->name('clientes-update');
    Route::get('cliente/{client}', [ClientController::class, 'showOne'])->name('cliente');
    Route::post('clients/search', [ClientController::class, 'search']);

    Route::get('pet/{pet}/editar', [HomeController::class, 'petUpdate'])->name('clientes-update');
    Route::get('pet/detalle/{pet}', [HomeController::class, 'petDetalle'])->name('detalle-mascota');
    Route::get('login/facebook', [SocialAuthController::class, 'redirectFacebook']);
    Route::get('facebook/callback', [SocialAuthController::class, 'callbackFacebook']);

    Route::get('/agregar/mascota/{client}', [HomeController::class, 'petCrear']);

    /** LISTA DE ESPERA */
    Route::get('listEspera', [HomeController::class, 'esperaList'])->name('espera-list');
    Route::get('espera/crear', [HomeController::class, 'esperaCrear'])->name('lista-espera-crear');

    /** CONSULTA */
    Route::get('consulta/{waitingList?}', [HomeController::class, 'consulta'])->name('consulta');





});
