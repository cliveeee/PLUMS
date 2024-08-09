<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run() : void
    {

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),

        ]);
        $admin->assignRole('Administrator');

        $staff = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'), // Ensure you hash the password
        ]);
        $staff->assignRole('Staff');

//        User::create([
//            'name' => 'Admin User',
//            'email' => 'admin@example.com',
//            'password' => Hash::make('password123'), // Ensure you hash the password
//        ]);
    }
}
