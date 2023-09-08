<?php

namespace Database\Seeders\Page;

use App\Models\Page\Suggested;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suggested::create([
            'product_id' => '1',
            'user_id' => '2',
            'company_id' => '2',
        ]);
        Suggested::create([
            'product_id' => '3',
            'user_id' => '2',
            'company_id' => '2',
        ]);
        Suggested::create([
            'product_id' => '8',
            'user_id' => '2',
            'company_id' => '2',
        ]);
        Suggested::create([
            'product_id' => '12',
            'user_id' => '3',
            'company_id' => '2',
        ]);
        Suggested::create([
            'product_id' => '15',
            'user_id' => '3',
            'company_id' => '2',
        ]);
    }
}
