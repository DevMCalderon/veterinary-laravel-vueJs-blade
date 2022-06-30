<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'client_id',
        'total',
        'iva',
        'status',
        'vendedor_id',
    ];
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
