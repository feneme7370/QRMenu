<?php

namespace Database\Seeders\Page;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Federico',
            'lastname' => 'Marasco',
            'email' => 'marascofederico95@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2396513953',
            'birthday' => '1995-09-07',
            'adress' => 'Arenales 356',
            'city' => '',
            'social' => '',
            'description' => 'Cuando un usuario se registra queda en pendiente',
            'status' => '1',
            'role_id' => '1',
            'company_id' => '1',
        ]);
        User::create([
            'name' => 'Cintia',
            'lastname' => 'Navarro',
            'email' => 'cintisnavarro@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2396515175',
            'birthday' => '1993-03-11',
            'adress' => 'Pio XI 991',
            'city' => 'Pehuajo',
            'social' => '',
            'description' => 'Ya pago el primer pago',
            'status' => '1',
            'role_id' => '2',
            'company_id' => '2',
        ]);
        User::create([
            'name' => 'Agustin',
            'lastname' => 'Marasco',
            'email' => 'agustin@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2396515175',
            'birthday' => '1993-03-11',
            'adress' => 'Pio XI 991',
            'city' => 'Pehuajo',
            'social' => '',
            'description' => 'Ya pago el primer pago',
            'status' => '1',
            'role_id' => '3',
            'company_id' => '2',
        ]);
        User::create([
            'name' => 'Laura',
            'lastname' => 'Catibiela',
            'email' => 'laura@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2396515175',
            'birthday' => '1993-03-11',
            'adress' => 'Pio XI 991',
            'city' => 'Pehuajo',
            'social' => '',
            'description' => 'Ya pago el primer pago',
            'status' => '1',
            'role_id' => '2',
            'company_id' => '3',
        ]);
    }
}
