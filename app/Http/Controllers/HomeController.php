<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Pet;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            return view('home');
        } else {
            return redirect('/login');
        }
    }
    public function vistaCaja()
    {
        return view('venta');
    }

    public function productosList()
    {
        return view('productos-list');
    }
    public function clientList()
    {
        return view('client-list');
    }
    public function esperaList()
    {
        return view('lista-espera');
    }

    public function productosCrear()
    {
        return view('productos-crear');
    }
    public function clienteCrear()
    {
        return view('client-crear');
    }

    public function productosUpdate(Producto $product)
    {
        return view('productos-update', compact('product'));
    }
    public function clientesUpdate(Client $client){
        return view('client-update', compact('client'));
    }
    public function petUpdate(Pet $pet){
        return view('pet-update', compact('pet'));
    }
    public function petCrear(Client $client){
        return view('pet-store', compact('client'));
    }
    public function petDetalle(Pet $pet){
        $pet->with('tipoMascota')->with('tipoRaza');
        return view('pet-detalle', compact('pet'));
    }
}
