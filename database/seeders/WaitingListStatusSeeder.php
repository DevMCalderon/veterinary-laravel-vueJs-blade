<?php

namespace Database\Seeders;

use App\Models\WaitingListStatus;
use Illuminate\Database\Seeder;

class WaitingListStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaitingListStatus::create([
            'name' => 'En espera',
        ]);
        WaitingListStatus::create([
            'name' => 'En proceso',
        ]);
        WaitingListStatus::create([
            'name' => 'Atendido',
        ]);
    }
}
