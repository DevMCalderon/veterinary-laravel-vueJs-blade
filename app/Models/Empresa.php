<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'email',
        'rfc',
        'razon_social',
        'admin_id',
        'domicilio_empresa_id',
        'domicilio_fiscal_id',
    ];

    public function userAdmin()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }

    public function domicilioEmpresa()
    {
        return $this->hasOne(Domicilio::class, 'id', 'domicilio_empresa_id');
    }

    public function domicilioFiscal()
    {
        return $this->hasOne(Domicilio::class, 'id', 'domicilio_fiscal_id');
    }

}
