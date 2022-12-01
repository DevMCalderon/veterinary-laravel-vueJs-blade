<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            DomicilioSeeder::class,
            EmpresaSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            ProductCategorySeeder::class,
            ProductoSeeder::class,
            VentaSeeder::class,
            PetTypeSeeder::class,
            PetSeeder::class,
            SucursalSeeder::class,
            WaitingListStatusSeeder::class,
            WaitingListSeeder::class,
            RazaSeeder::class
        ]);
    }
}
