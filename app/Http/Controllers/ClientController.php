<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
    public function showOne(Client $client){
        return view('cliente-detalle', compact('client'));
    }
    public function searchClient($nombre){
        if (isset($nombre)) {
            $Query = Client::where('name', 'LIKE', "%$nombre%")->get();

            $li = '';
            foreach ($Query as $key => $Result) {
                $resp = (object) $Result;
                $li.="
                    <a class='list-group-item list-group-item-action cursor-pointer' onclick=\"fill(`$resp->id`,`$resp->name`)\">
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

    public function search(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        
        $name = $request->name;
        
        $clients = Client::where('name', 'LIKE', "%$name%")->get();
        return response([
            'status' => true,
            'clients' => $clients
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
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->all();

        $client = Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'address' => $data['address'],
            'rfc' => $data['rfc'],
        ]);

        if($client){
            return response([
                'status' => true,
                'client' => $client,
            ]);
        }else{
            return response([
                'status' => false,
                'msg' => 'Ocurrio un error al intentar guardar al cliente'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client){
        $client['ciudad'] = $client->ciudad;
        if($client){
            return response([
                'status'=> true,
                'client' => $client
            ]);
        }else{
            return response([
                'status'=> true,
                'msg' => 'No se pudo encontrar la información del cliente'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client){
        if($client){
            $data = $request->all();

            $client->name        = $data['name'];
            $client->email        = $data['email'];
            $client->phone        = $data['phone'];
            $client->city        = $data['city'];
            $client->address        = $data['address'];
            $client->rfc        = $data['rfc'];
    
            if($client->save()){
                return response([
                    'status' => true,
                    'client' => $client,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg' => 'Ocurrio un error al intentar actualizar al cliente'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg' => 'No se pudo obtener la información del cliente'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client){
        if($client->delete()){

            return response([
                'status'=> true
            ]);
        }else{
            return response([
                'status'=> false,
                'msg' => "No fue posible eliminar el cliente"
            ]);
        }
    }
    
    public function list(){
        $client = Client::with('ciudad')->get();

        return response([
            'status' => true,
            'clients' => $client
        ]);
    }
}
