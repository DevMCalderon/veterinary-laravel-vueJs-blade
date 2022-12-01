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
            'fb_id' => "100005352432767",
            'empresa_id' => "1"
        ]);
        User::create([
            'name'=>"Dueño Empresa A",
            'email'=>"empresa-a@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'fb_id' => "100005352432768",
            'empresa_id' => "1"
        ]);
        User::create([
            'name'=>"Dueño Empresa B",
            'email'=>"empresa-b@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'fb_id' => "100005352432766",
            'empresa_id' => "4"
        ]);
        User::create([
            'name'=>"Dueño Empresa C",
            'email'=>"empresa-c@example.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::ADMINISTRADOR_ID,
            'fb_id' => "100005352432765",
            'empresa_id' => "2"
        ]);
        User::create([
            'name'=>"José Rodríguez",
            'email'=>"a@a.com",
            'password'=>bcrypt("a"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'fb_id' => "10000535243274",
            'empresa_id' => "2"
        ]);
        User::create([
            'name'=>"José Carlos Gomez",
            'email'=>"chipo@gmail.com",
            'password'=>bcrypt("chiporro"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'fb_id' => "100005352432763",
            'empresa_id' => "3"
        ]);
        User::create([
            'name'=>"Veterinario",
            'email'=>"vet@a.com",
            'password'=>bcrypt("a"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::VETERINARIO_ID,
            'fb_id' => "100005352432763",
            'empresa_id' => "4"
        ]);
        User::create([
            'name'=>"Martín Calderon",
            'email'=>"mscalderon.developer@gmail.com",
            'password'=>bcrypt("123123"),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role_id' => RoleSeeder::SUPERADMIN_ID,
            'fb_id' => "100005352432763",
            'empresa_id' => "4"
        ]);
    }
}
