<?php

namespace Database\Seeders\Page;

use Illuminate\Database\Seeder;
use App\Models\Page\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::create([
            'name' => 'Gaseosas',
            'description' => 'Variedad de gaseosas',
            'category_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Agua Saborizada',
            'description' => 'Variedad de aguas',
            'category_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Vinos',
            'description' => 'Blanco y Tinto',
            'category_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Cervezas',
            'description' => 'Rubias, negras y Artesanales',
            'category_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Pizzas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Hamburguesas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Milanesas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Pastas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Carnes',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Beber',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Tortas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Medias Lunas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Helados',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '4',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Tortas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '4',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Subcategory::create([
            'name' => 'Tartas',
            'description' => 'Gran cantidad para elegir',
            'category_id' => '4',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);

        // Subcategory::factory(35)->create();
    }
}
