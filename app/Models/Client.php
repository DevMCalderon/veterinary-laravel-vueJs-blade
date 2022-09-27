<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'rfc',
    ];

    public function ciudad(){
        return $this->hasOne(City::class,'id','city');
    }
    
    public function pets(){
        return $this->hasMany(Pet::class,'name');
    }
}
