<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fecha_nacimiento',
        'color',
        'comentarios',
        'alergias',
        'pet_type_id',
        'raza_id',
        'client_id',
    ];
    public function tipoMascota(){
        return $this->HasOne(PetType::class,'id','pet_type_id');
    }
    public function tipoRaza(){
        return $this->HasOne(Raza::class,'id','raza_id');
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function edad(){

        $nacimiento = new DateTime($this->fecha_nacimiento);
        $now = new DateTime(date("Y-m-d"));
        $diff = $now->diff($nacimiento);
        if($diff->format("%y") == 0){
            return $diff->format("%m meses");
        }else{
            return $diff->format("%y años, %m meses");
        }
    }

}
