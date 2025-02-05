<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreconsultaRequest;
use App\Models\consulta;
use App\Notifications\ConsultaNotification;
use Illuminate\Support\Facades\Storage;
use PDF;

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

    public function imprimir(Consulta $consulta){
        $data = [
            'consulta' => $consulta,
            'client' => $consulta->pet->client
        ];

        return PDF::loadView('pdf.consulta', $data)
            ->stream('Historia clinica '.$consulta->pet->name.' '.$consulta->created_at.'.pdf');
    }

    public function sendMail(consulta $consulta)
    {
        $data = [
            'consulta' => $consulta,
            'client' => $consulta->pet->client
        ];


        $pdf = PDF::loadView('pdf.consulta', $data);
        $fileName = 'Consulta '.$consulta->pet->name.' '.$consulta->created_at.'.pdf';
        Storage::put("/public/pdf/$fileName", $pdf->output());



        $consulta->client->notify(new ConsultaNotification($consulta, $fileName));

        if(Storage::exists("/public/pdf/$fileName")){
            Storage::delete("/public/pdf/$fileName");
        }

        return response($consulta);
    }

}
