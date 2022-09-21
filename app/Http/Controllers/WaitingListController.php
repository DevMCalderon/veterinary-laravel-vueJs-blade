<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaitingListRequest;
use App\Http\Requests\UpdateWaitingListRequest;
use App\Models\Client;
use App\Models\WaitingList;
use Illuminate\Support\Facades\DB;

class WaitingListController extends Controller
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

    public function list($date){
        $citas = WaitingList::with('client')->where('date',$date)->where('waiting_list_status_id',1)->get();

        return response([
            'status' => true,
            'citas' => $citas
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
     * @param  \App\Http\Requests\StoreWaitingListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function consultar(WaitingList $cita)
    {
        $cita = $cita->update(['waiting_list_status_id'=>2]);
        if($cita){
            return response([
                'status'=> true
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => "No fue posible mandarlo a consulta"
            ]);
        }
    }
    public function store(StoreWaitingListRequest $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        if($request->clientType == 'existente'){
            $client = Client::find($data['client_id']);
            $client->name = $data['client']['name'];
            $client->phone = $data['client']['phone'];
            $client->email = $data['client']['email'];
            $client->save();
        }else{
            $client = Client::create([
                'name' => $data['client']['name'],
                'email' => $data['client']['email'],
                'phone' => $data['client']['phone'],
            ]);
        }

        if($client){
            $waitingList = WaitingList::create([
                'client_id' => $client->id,
                'date' => $data['date'],
                'time' => $data['time'],
                'waiting_list_status_id' => 1,
            ]);

            DB::commit();

            if($waitingList){
                return response([
                    'status' => true,
                    'waitingList' => $waitingList,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg' => 'Ocurrio un error al intentar guardar a la lista de espera'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaitingList  $waitingList
     * @return \Illuminate\Http\Response
     */
    public function show(WaitingList $waitingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaitingList  $waitingList
     * @return \Illuminate\Http\Response
     */
    public function edit(WaitingList $waitingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWaitingListRequest  $request
     * @param  \App\Models\WaitingList  $waitingList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWaitingListRequest $request, WaitingList $waitingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaitingList  $waitingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaitingList $cita){
        if($cita->delete()){

            return response([
                'status'=> true
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => "No fue posible eliminar la cita"
            ]);
        }
    }
}
