<?php

namespace Database\Seeders;

use App\Models\Domicilio;
use Illuminate\Database\Seeder;

class DomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domicilio::factory(4)->create();
    }
}
