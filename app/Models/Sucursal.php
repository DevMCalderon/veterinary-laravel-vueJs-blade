<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'state',
        'city',
        'phone',
        'email',
        'encargado_id',
        'empresa_id',
    ];

    public function ciudad(){
        return $this->hasOne(City::class,'id','city');
    }
    public function estado(){
        return $this->hasOne(State::class,'id','state');
    }
    public function encargado()
    {
        return $this->hasOne(User::class, 'id', 'encargado_id');
    }
}
