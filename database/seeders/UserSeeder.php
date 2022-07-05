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
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'FB_id' => "100005352432767"
        ]);
        User::create([
            'name'=>"Dueño Empresa A",
            'email'=>"empresa-a@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'FB_id' => "100005352432768"
        ]);
        User::create([
            'name'=>"Dueño Empresa B",
            'email'=>"empresa-b@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'FB_id' => "100005352432766"
        ]);
        User::create([
            'name'=>"Dueño Empresa C",
            'email'=>"empresa-c@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'FB_id' => "100005352432765"
        ]);
        User::create([
            'name'=>"José Rodríguez",
            'email'=>"a@a.com",
            'password'=>bcrypt("a"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'FB_id' => "10000535243274"
        ]);
        User::create([
            'name'=>"José Carlos Gomez",
            'email'=>"chipo@gmail.com",
            'password'=>bcrypt("chiporro"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'FB_id' => "100005352432763"
        ]);
    }
}
