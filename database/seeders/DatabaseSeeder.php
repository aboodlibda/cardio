<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Attribute::factory(50000)->create();
//         User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//
//          $this->call(RoleSeeder::class);
//          $this->call(UserSeeder::class);
//          $this->call(PermissionSeeder::class);
    }
}
