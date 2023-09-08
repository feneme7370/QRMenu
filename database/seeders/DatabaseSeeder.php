<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Page\RoleSeeder;
use Database\Seeders\Page\UserSeeder;
use Database\Seeders\Page\CompanySeeder;
use Database\Seeders\Page\ProductSeeder;
use Database\Seeders\Page\CategorySeeder;
use Database\Seeders\Page\MembershipSeeder;
use Database\Seeders\Page\SubcategorySeeder;
use Database\Seeders\Page\SuggestedSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            MembershipSeeder::class,
            CompanySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class, 
            SuggestedSeeder::class,
        ]);
    }
}
