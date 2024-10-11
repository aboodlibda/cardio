<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::Create([
            'name' => 'Administrator',
            'email' => 'admin@cardio.com',
            'user_name'=>'cardio01',
            'password' => Hash::make('Admin@cardio01'),
            'phone_number' => '00970597644664',
            'status' =>'active',
            'gender' =>'male',
            'role_id' => 1

        ]);

    }
}
