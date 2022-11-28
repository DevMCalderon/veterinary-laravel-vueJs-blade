<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name'=>'Aguascalientes', 'country_id'=>'1']);
        State::create(['name'=>'Baja California', 'country_id'=>'1']);
        State::create(['name'=>'Baja California Sur', 'country_id'=>'1']);
        State::create(['name'=>'Campeche', 'country_id'=>'1']);
        State::create(['name'=>'Chiapas', 'country_id'=>'1']);
        State::create(['name'=>'Chihuahua', 'country_id'=>'1']);
        State::create(['name'=>'Ciudad de México', 'country_id'=>'1']);
        State::create(['name'=>'Coahuila', 'country_id'=>'1']);
        State::create(['name'=>'Colima', 'country_id'=>'1']);
        State::create(['name'=>'Durango', 'country_id'=>'1']);
        State::create(['name'=>'Guanajuato', 'country_id'=>'1']);
        State::create(['name'=>'Guerrero', 'country_id'=>'1']);
        State::create(['name'=>'Hidalgo', 'country_id'=>'1']);
        State::create(['name'=>'Jalisco', 'country_id'=>'1']);
        State::create(['name'=>'México', 'country_id'=>'1']);
        State::create(['name'=>'Michoacán', 'country_id'=>'1']);
        State::create(['name'=>'Morelos', 'country_id'=>'1']);
        State::create(['name'=>'Nayarit', 'country_id'=>'1']);
        State::create(['name'=>'Nuevo León', 'country_id'=>'1']);
        State::create(['name'=>'Oaxaca', 'country_id'=>'1']);
        State::create(['name'=>'Puebla', 'country_id'=>'1']);
        State::create(['name'=>'Querétaro', 'country_id'=>'1']);
        State::create(['name'=>'Quintana Roo', 'country_id'=>'1']);
        State::create(['name'=>'San Luis Potosí', 'country_id'=>'1']);
        State::create(['name'=>'Sinaloa', 'country_id'=>'1']);
        State::create(['name'=>'Sonora', 'country_id'=>'1']);
        State::create(['name'=>'Tabasco', 'country_id'=>'1']);
        State::create(['name'=>'Tamaulipas', 'country_id'=>'1']);
        State::create(['name'=>'Tlaxcala', 'country_id'=>'1']);
        State::create(['name'=>'Veracruz', 'country_id'=>'1']);
        State::create(['name'=>'Yucatán', 'country_id'=>'1']);
        State::create(['name'=>'Zacatecas', 'country_id'=>'1']);
    }
}
