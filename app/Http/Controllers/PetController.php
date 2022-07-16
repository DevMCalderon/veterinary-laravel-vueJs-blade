<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;

class PetController extends Controller
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
    public function list($id){
        $client = Pet::where('client_id',$id)->with('tipoMascota')->with('tipoRaza')->get();

        return response([
            'status' => true,
            'pets' => $client
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
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetRequest $request){
        $data = $request->all();

        

        $pet = Pet::create($data);

        if($pet){
            return response([
                'status' => true,
                'pet' => $pet,
            ]);
        }else{
            return response([
                'status' => false,
                'msg' => 'Ocurrio un error al intentar guardar la mascota'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        if($pet){
            return response([
                'status'=> true,
                'pet' => $pet
            ]);
        }else{
            return response([
                'status'=> true,
                'msg' => 'No se pudo encontrar la información de la mascota'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetRequest  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        if($pet){
            $data = $request->all();

            $pet->name        = $data['name'];
            $pet->fecha_nacimiento        = $data['fecha_nacimiento'];
            $pet->color        = $data['color'];
            $pet->comentarios        = $data['comentarios'];
            $pet->alergias        = $data['alergias'];
            $pet->pet_type_id        = $data['pet_type_id'];
            $pet->raza_id        = $data['raza_id'];
    
            if($pet->save()){
                return response([
                    'status' => true,
                    'pet' => $pet,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg' => 'Ocurrio un error al intentar actualizar la mascota'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg' => 'No se pudo obtener la información de la mascota'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        if($pet->delete()){
            return response([
                'status'=> true
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => "No fue posible eliminar la mascota"
            ]);
        }
    }
}
