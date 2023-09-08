<?php

namespace Database\Seeders\Page;

use App\Models\Page\Membership;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::create([
            'code' => 'Plate',
            'name' => 'Plate',
            'category' => '3',
            'subcategory' => '5',
            'product' => '10',
            'user' => '1',
            'suggested' => '1',
            'status' => '1',
        ]);
        Membership::create([
            'code' => 'Gold',
            'name' => 'Gold',
            'category' => '10',
            'subcategory' => '13',
            'product' => '100',
            'user' => '2',
            'suggested' => '3',
            'status' => '1',
        ]);
        Membership::create([
            'code' => 'Platinium',
            'name' => 'Platinium',
            'category' => '20',
            'subcategory' => '50',
            'product' => '500',
            'user' => '5',
            'suggested' => '10',
            'status' => '1',
        ]);
    }
}
