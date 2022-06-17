<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminA = User::where('name',"Dueño Empresa A")->first();
        $adminB = User::where('name',"Dueño Empresa B")->first();
        $adminC = User::where('name',"Dueño Empresa C")->first();

        $sucursalA = Sucursal::create(['name' => "Sucursal empresa A"]);
        $sucursalB = Sucursal::create(['name' => "Sucursal empresa B"]);
        $sucursalC = Sucursal::create(['name' => "Sucursal empresa C"]);

        $adminA->sucursales()->attach($sucursalA);
        $adminB->sucursales()->attach($sucursalB);
        $adminC->sucursales()->attach($sucursalC);

    }
}
