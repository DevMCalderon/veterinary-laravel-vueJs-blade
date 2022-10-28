<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'logo',
        'razon_social',
        'phone',
        'address',
        'rfc',
        'state',
        'city',
        'admin_id',
    ];

    public function ciudad(){
        return $this->hasOne(City::class,'id','city');
    }
    // public function admin(){
    //     return $this->hasOne(User::class,'id','admin_id');
    // }
}
