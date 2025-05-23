<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'pet_id',
        'peso',
        'temp',
        'mucosas',
        'palpitacion_abdominal',
        'sintomas',
        'diagnostico',
        'receta',
    ];

    public function pet(){
        return $this->belongsTo(Pet::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
