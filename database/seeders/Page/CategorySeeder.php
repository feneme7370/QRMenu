<?php

namespace Database\Seeders\Page;

use App\Models\Page\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Bebidas',
            'description' => 'Vinos, Gaseosas, Aguas saborizadas',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Category::create([
            'name' => 'Comidas',
            'description' => 'Platos elaborados y ricos',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Category::create([
            'name' => 'Merienda',
            'description' => 'Cafe, Te, Submarinos',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Category::create([
            'name' => 'Postres',
            'description' => 'Postres dulces muy ricos',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        // Category::factory(35)->create();
    }
}
