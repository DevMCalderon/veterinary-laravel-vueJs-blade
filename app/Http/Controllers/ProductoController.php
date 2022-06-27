<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Traits\FileTrait;

class ProductoController extends Controller
{
    use FileTrait;
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
        $codeDs = explode('*',$dato['codigo']);
        if (count($codeDs)==1) {
            $cant=1;
            $producto = Producto::where('code',$codeDs[0])->first();
        }else{
            $cant=(int)$codeDs[0];
            $producto = Producto::where('code',$codeDs[1])->first();
        }
        if ($producto) {
            return response()->json(['status'=>true,'producto'=>$producto,'cant'=>$cant]);
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
    public function comprobarTotal(Request $carrito){
        $productos = $carrito->all();
        $total=0;
        foreach ($productos['carrito'] as $key => $value) {
            $producto = Producto::where('id',$key)->first();
            $total = $producto->price * $value['cant'];
        }
        return $total;
    }
    public function pago(Request $datos){
        $datos = $datos->all();
        $total=0;
        foreach ($datos['carrito'] as $key => $value) {
            $producto = Producto::where('id',$key)->first();
            $total = $producto->price * $value['cant'];
        }
        if (($total-$datos['datos']['dineroRecibido']) == 0) {
            return response()->json(array('estado'=>true,'msg'=>'pago exitoso'));

        }else{
            if (($total-$datos['datos']['dineroRecibido']) > 0) {
                return response()->json(array('estado'=>'faltante','msg'=>'Faltan: '.($total-$datos['datos']['dineroRecibido'])));
            }else{
                return response()->json(array('estado'=>'cambio','msg'=>'Debe entregar: '.abs($total-$datos['datos']['dineroRecibido'])));
            }
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
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();

        
        $imagePath =  ($data['image'] && $data['image'] != 'undefined' )? $this->storeImage($data['image'],'products')  : "";

        $product = Producto::create([
            'name' => $data['name'],
            'code' => $data['code'],
            'price' => $data['price'],
            'image' => $imagePath,
            'category_id' => $data['category_id'],
        ]);

        if($product){
            return response([
                'status' => true,
                'product' => $product,
            ]);
        }else{
            return response([
                'status' => false,
                'msg' => 'Ocurrio un error al intentar crear el producto'
            ]);
        }
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
    public function destroy(Producto $product)
    {
        if($product->delete()){
            
            if($product->image){
                $imageDeleted = $this->deleteFile($product->image);
            }

            return response([
                'status'=> true
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => "No fue posible eliminar el producto"
            ]);
        }
    }

    public function list(){
        $products = Producto::with('category')->get();

        return response([
            'status' => true,
            'products' => $products
        ]);
    }
}
