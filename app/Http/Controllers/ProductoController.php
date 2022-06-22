<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function buscarProducto(Request $request){
        $dato = $request->all();
        $producto = Producto::where('code',$dato['codigo'])->first();
        if ($producto) {
            return response()->json(['status'=>true,'producto'=>$producto]);
        }else{
            return response()->json(['status'=>false,'msg'=>'Articulo no encontrado']);
        }
    }
    public function searchProducto($nombre){
        if (isset($nombre)) {
            $Query = Producto::where('name', 'LIKE', "%$nombre%")->get();

            $li = '';
            foreach ($Query as $key => $Result) {
                $resp = (object) $Result;
                $li.="
                    <a class='list-group-item list-group-item-action cursor-pointer' onclick=\"fillCode($resp->code)\">
                        $resp->name
                    </a>
                ";
            }
            echo "
                <div class='list-group'>
                    $li
                </div>
            ";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
