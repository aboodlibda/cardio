<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::Create([
            'name' => 'Admin Management',
            'role_id' =>1
        ]);

    }
}
