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
            'name'                  => $data['name'],
            'logo'                  => $data['logo'],
            'phone'                 => $data['phone'],
            'email'                 => $data['email'],
            'rfc'                   => $data['rfc'],
            'razon_social'          => $data['razon_social'],
            'admin_id'              => $data['admin_id'],
            'domicilio_empresa_id'  => $data['domicilio_empresa_id'],
            'domicilio_fiscal_id'   => $data['domicilio_fiscal_id'],
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
        $empresa = Empresa::with('userAdmin')->with('domicilioEmpresa')->with('domicilioFiscal')->where('id', $empresa->id)->get();

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

            if ($data['logo']!=null) $data['logo'] = hash('md5', $data['logo']);
            if ( $data['domicilio_empresa_id']=="null") $data['domicilio_empresa_id'] = null; 
            if ( $data['domicilio_fiscal_id']=="null") $data['domicilio_fiscal_id'] = null; 
                        
            $empresa->name                  = $data['name'];
            $empresa->logo                  = $data['logo'] ?? '';
            $empresa->phone                 = $data['phone'] ?? '';
            $empresa->email                 = $data['email'] ?? '';
            $empresa->rfc                   = $data['rfc'] ?? '';
            $empresa->razon_social          = $data['razon_social'] ?? '';
            $empresa->admin_id              = $data['admin_id'];
            $empresa->domicilio_empresa_id  = $data['domicilio_empresa_id'];
            $empresa->domicilio_fiscal_id   = $data['domicilio_fiscal_id'];

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
    public function destroy(Empresa $empresa)
    {
        if($empresa->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la empresa"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la empresa"
            ]);
        }
    }
}
