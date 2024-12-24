<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'role' => 'admin',
            'password' => 'admin123'
        ]);

        $categories = ['Culture','Business','Politics'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
