<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDomicilioRequest;
use App\Http\Requests\UpdateDomicilioRequest;
use App\Models\Domicilio;
use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domicilios = Domicilio::with('ciudad')->with('estado')->with('pais')->get();

        return response([
            'status'    => true,
            'domicilios' => $domicilios
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomicilioRequest $request)
    {
        $data = $request->all();

        $domicilio = Domicilio::create([
            'street'        => $data['street'],
            'num_interior'  => $data['num_interior'],
            'num_exterior'  => $data['num_exterior'],
            'cp'            => $data['cp'],
            'country'       => $data['country'],
            'state'         => $data['state'],
            'city'          => $data['city']
        ]);

        if($domicilio){
            return response([
                'status'   => true,
                'domicilio' => $domicilio,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar el domicilio'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domicilio $domicilio)
    {
        $domicilio = Domicilio::with('ciudad')->with('estado')->with('pais')->where('id', $domicilio->id)->get();

        if($domicilio){
            return response([
                'status'   => true,
                'domicilio' => $domicilio
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información del domicilio'
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
    public function update(UpdateDomicilioRequest $request, Domicilio $domicilio)
    {
        if($domicilio){
            $data = $request->all();
            
            $domicilio->street          = $data['street'];
            $domicilio->num_interior    = ($data['num_interior'] === 'null' || empty($data['num_interior'])) ? null : $data['num_interior'];
            $domicilio->num_exterior    = $data['num_exterior'];
            $domicilio->cp              = $data['cp'];
            $domicilio->country         = $data['country'];
            $domicilio->state           = $data['state'];
            $domicilio->city            = $data['city'];

            if($domicilio->save()){
                return response([
                    'status'   => true,
                    'domicilio' => $domicilio,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar el domicilio'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del domicilio'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domicilio $domicilio)
    {
        if($domicilio->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado el domicilio"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar el domicilio"
            ]);
        }
    }
}
