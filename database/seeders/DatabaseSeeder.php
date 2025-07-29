<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Property_app;
use App\Models\Suppliers;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
           "name"   =>    "seno",
           "email"      =>    "seno@gmail.com",
           "password"   =>     bcrypt('123')
        ]);

        Property_app::create([
            "app_name"  =>   "Stokify",
            "app_image" =>   "image/logo.png"
        ]);

    }
}
