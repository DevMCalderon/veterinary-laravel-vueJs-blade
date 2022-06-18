<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
