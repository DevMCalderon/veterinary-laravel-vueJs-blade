<?php

namespace Database\Seeders;

use App\Models\PetType;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PetType::create(['name'=>'Canino']);
        PetType::create(['name'=>'Felino']);
        PetType::create(['name'=>'Ave']);
        PetType::create(['name'=>'Reptil']);
    }
}
