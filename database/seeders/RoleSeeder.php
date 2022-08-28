<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    
    const SUPERADMIN_ID = 1;
    const ADMINISTRADOR_ID = 2;
    const EMPLEADO_ID = 3;
    const VETERINARIO_ID = 4;

    public function run()
    {
        Role::create([
            'id'=> self::SUPERADMIN_ID,
            'name'=>'SuperAdmin'
        ]);

        Role::create([
            'id'=> self::ADMINISTRADOR_ID,
            'name'=>'Administrador'
        ]);
        Role::create([
            'id'=>self::EMPLEADO_ID,
            'name'=>'Empleado'
        ]);
        Role::create([
            'id'=>self::VETERINARIO_ID,
            'name'=>'Veterinario'
        ]);
    }
}
