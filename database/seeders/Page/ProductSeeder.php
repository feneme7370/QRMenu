<?php

namespace Database\Seeders\Page;

use App\Models\Page\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'SevenUp',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Coca Cola',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Pomelo',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Naranja',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '2',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Blanco',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Tinto',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Quilmes',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '4',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Brahama',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '4',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Especial',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '5',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Napolitana',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '5',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Simple',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '6',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Completa',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '6',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Carne',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '7',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Pollo',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '7',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Sorrentinos',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '8',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Tallarines',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '8',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Bife de chorizo',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '9',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Asado para 4',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '9',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Cafe',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '10',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Sumarino',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '10',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Cheesecake de frutilla',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '11',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Chocotorta',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '11',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Dulces',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '12',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Saladas',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '12',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Chocolate',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '13',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Limon',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '13',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Cheesecake de limon',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '14',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Lemonpie',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '14',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Tarta de frutillas',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '15',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        Product::create([
            'name' => 'Tarta multifrutal',
            'price' => 1200,
            'description' => 'Esta es una descripcion',
            'subcategory_id' => '15',
            'user_id' => '2',
            'company_id' => '2',
            'status' => '1',
        ]);
        // Product::factory(35)->create();
    }
}
