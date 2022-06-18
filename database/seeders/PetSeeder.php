<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Pet;
use App\Models\PetType;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();
        $petType = PetType::first()->id;
        foreach ($clients as $key => $client) {
            $pet = Pet::create([
                'name' => 'Mascota '.$key,
                'fecha_nacimiento' => date('Y-m-d'),
                'pet_type_id' => $petType,
                'client_id' =>$client->id
            ]);
        }
    }
}
