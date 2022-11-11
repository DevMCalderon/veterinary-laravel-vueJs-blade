<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function empresaUpdate(Empresa $empresa){
        return view('empresa-update', compact('empresa'));
    }
    public function showOne(Empresa $empresa){
        return view('empresa-detalle', compact('empresa'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreEmpresaRequest $request)
    {
        $data = $request->all();

        $empresa = Empresa::create([
            'nombre'       => $data['nombre'],
            'logo'         => $data['logo'],
            'razon_social' => $data['razon_social'],
            'phone'        => $data['phone'],
            'address'      => $data['address'],
            'rfc'          => $data['rfc'],
            'state'        => $data['state'],
            'city'         => $data['city'],
            'admin_id'     => $data['admin_id'],
        ]);

        if($empresa){
            return response([
                'status'  => true,
                'empresa' => $empresa,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la empresa'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $empresa = Empresa::with('ciudad')->with('estado')->with('userAdmin')->where('id', $empresa->id)->get();

        if($empresa){
            return response([
                'status'  => true,
                'empresa' => $empresa
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la empresa'
            ]); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa){
        if($empresa){
            $data = $request->all();

            $empresa->nombre       = $data['nombre'];
            $empresa->logo         = hash('md5', $data['logo']);
            $empresa->razon_social = $data['razon_social'];
            $empresa->phone        = $data['phone'];
            $empresa->address      = $data['address'];
            $empresa->rfc          = $data['rfc'];
            $empresa->state        = $data['state'];
            $empresa->city         = $data['city'];
            $empresa->admin_id     = $data['admin_id'];

            if($empresa->save()){
                return response([
                    'status'  => true,
                    'empresa' => $empresa,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la empresa'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información de la empresa'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
