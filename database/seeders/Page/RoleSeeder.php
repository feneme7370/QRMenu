<?php

namespace Database\Seeders\Page;

use App\Models\Page\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'code' => 'admin',
            'name' => 'admin',
            'description' => 'puede acceder a la lista de usuarios y modificarlos',
            'status' => '1',
        ]);
        Role::create([
            'code' => 'cliente',
            'name' => 'cliente',
            'description' => 'esta autorizado y asociado a una empresa',
            'status' => '1',
        ]);
        Role::create([
            'code' => 'usuario',
            'name' => 'usuario',
            'description' => 'solicito la app pero no esta asociado ni pago',
            'status' => '1',
        ]);
    }
}
