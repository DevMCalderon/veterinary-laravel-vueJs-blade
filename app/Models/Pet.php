<?php

namespace App\Models;

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

}
