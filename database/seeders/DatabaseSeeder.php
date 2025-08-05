<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Property_app;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\UserActivity;
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
           "name"       =>    "King Seno 👑",
           "email"      =>    "seno@gmail.com",
           "password"   =>     bcrypt('123')
        ]);
        User::create([
           "name"       =>    "Rehan King Robloxx",
           "email"      =>    "rehan@gmail.com",
           "password"   =>     bcrypt('123'),
           "role"       =>     "Staff gudang"
        ]);
        User::create([
           "name"       =>    "Argi King Robloxx",
           "email"      =>    "argi@gmail.com",
           "password"   =>     bcrypt('123'),
           "role"       =>     "Manajer gudang"
        ]);

        Property_app::create([
            "app_name"  =>   "Stokify",
            "app_image" =>   "image/logo.png"
        ]);

        Suppliers::create([
              "name"     =>     "Argii",
              "address"  =>    "Wanareja",
              "phone"    =>    "08755357543",
              "email"    =>    "argi9@gmail.com"
        ]);
        Suppliers::create([
              "name"     =>     "Rehan",
              "address"  =>    "langensari",
              "phone"    =>    "078883478344",
              "email"    =>    "rehan@gmail.com"
        ]);
        Suppliers::create([
              "name"     =>     "Seno King Muncak roblox",
              "address"  =>    "langensari",
              "phone"    =>    "08212121",
              "email"    =>    "seno@gmail.com"
        ]);


        Categories::create([
           "name"          =>   "Elektronik",
           "description"   =>   "Seputar Elektronik"
        ]);
        Categories::create([
           "name"          =>   "Pakaian",
           "description"   =>   "Seputar Pakaian"
        ]);
        Categories::create([
           "name"          =>   "Aksesoris",
           "description"   =>   "Seputar Aksesoris"
        ]);

      //   UserActivity::create([
      //      "user_id"  =>    1,
      //      "action"   =>   "Migrate Fresh",
      //      "activity" =>    "Migrate"
      //   ]);

    }
}
