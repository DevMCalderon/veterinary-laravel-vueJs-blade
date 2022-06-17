<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"Eber Reta",
            'email'=>"eber.retabaeza@gmail.com",
            'password'=>bcrypt("eber123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID
        ]);
    }
}
