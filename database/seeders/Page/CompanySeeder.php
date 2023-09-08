<?php

namespace Database\Seeders\Page;

use App\Models\Page\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Pendiente',
            'email' => '',
            'phone' => '',
            'adress' => '',
            'city' => '',
            'social' => '',
            'description' => 'Cuando un usuario se registra queda en pendiente',
            'status' => '1',
            'membership_id' => '1',
        ]);
        Company::create([
            'name' => 'Clinica del oeste',
            'email' => 'clinica@gmail.com',
            'phone' => '2396513953',
            'adress' => 'Zanni 1508',
            'city' => 'Pehuajo',
            'social' => '',
            'description' => 'Empresa de prueba',
            'status' => '1',
            'membership_id' => '2',
        ]);
        Company::create([
            'name' => 'Grobocopatel',
            'email' => 'grobo@gmail.com',
            'phone' => '2396513953',
            'adress' => 'Belgrano 86',
            'city' => 'Carlos Casares',
            'social' => '',
            'description' => 'Empresa de acopio',
            'status' => '1',
            'membership_id' => '3',
        ]);
    }
}
