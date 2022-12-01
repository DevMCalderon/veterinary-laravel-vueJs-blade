<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'num_interior',
        'num_exterior',
        'cp',
        'country',
        'state',
        'city'
    ];
    public function pais()
    {
        return $this->hasOne(Country::class,'id','country');
    }
    public function estado()
    {
        return $this->hasOne(State::class,'id','state');
    }
    public function ciudad()
    {
        return $this->hasOne(City::class,'id','city');
    }
    
}
