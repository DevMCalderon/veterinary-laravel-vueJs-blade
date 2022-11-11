<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use App\Models\Sucursal;

class SucursalController extends Controller
{

    public function sucursalList()
    {
        return view('sucursal-list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucusales = Sucursal::all();

        return response([
            'status'    => true,
            'sucursales' => $sucusales
        ]);
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
     * @param  \App\Http\Requests\StoreSucursalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSucursalRequest $request)
    {
        $data = $request->all();

        $sucursal = Sucursal::create([
            'name'         => $data['name'],
            'address'      => $data['address'],
            'phone'        => $data['phone'],
            'email'        => $data['email'],
            'encargado_id' => $data['encargado_id']
        ]);

        if($sucursal){
            return response([
                'status'   => true,
                'sucursal' => $sucursal,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la sucursal'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        if($sucursal){
            return response([
                'status'   => true,
                'sucursal' => $sucursal
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la sucursal'
            ]); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSucursalRequest  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSucursalRequest $request, Sucursal $sucursal)
    {
        if($sucursal){
            $data = $request->all();

            $sucursal->name         = $data['name'];
            $sucursal->address      = $data['address'];
            $sucursal->phone        = $data['phone'];
            $sucursal->email        = $data['email'];
            $sucursal->encargado_id = $data['encargado_id'];

            if($sucursal->save()){
                return response([
                    'status'   => true,
                    'sucursal' => $sucursal,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la sucursal'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información de la sucursal'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        if($sucursal->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la sucursal"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la sucursal"
            ]);
        }
    }
}
