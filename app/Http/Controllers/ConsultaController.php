<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreconsultaRequest;
use App\Http\Requests\UpdateconsultaRequest;
use App\Models\Consulta;

class ConsultaController extends Controller
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
     * @param  \App\Http\Requests\StoreconsultaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreconsultaRequest $request)
    {
        $data = $request->all();

        $consulta = Consulta::create([
            'client_id' => $data['client'],
            'pet_id' => $data['pet'],
            'peso' => $data['peso'],
            'temp' => $data['temp'],
            'mucosas' => $data['mucosas'],
            'palpitacion_abdominal' => $data['palpitacion_abdominal'],
            'sintomas' => $data['sintomas'],
            'diagnostico' => $data['diagnostico'],
            'receta' => $data['receta'],
        ]);

        if($consulta){
            return response([
                'status'=> true,
                'msg' => 'Información almacenada'
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => 'Ocurrio un error al intentar registrar la consulta'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateconsultaRequest  $request
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateconsultaRequest $request, consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(consulta $consulta)
    {
        //
    }
}
