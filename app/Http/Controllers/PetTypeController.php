<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetTypeRequest;
use App\Http\Requests\UpdatePetTypeRequest;
use App\Models\PetType;

class PetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PetType = PetType::all();

        return response([
            'status' => true,
            'pet_type' => $PetType
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
     * @param  \App\Http\Requests\StorePetTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function show(PetType $petType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function edit(PetType $petType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetTypeRequest  $request
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetTypeRequest $request, PetType $petType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetType $petType)
    {
        //
    }
}
