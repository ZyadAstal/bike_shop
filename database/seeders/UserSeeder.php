<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bikeshop.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '0500000000',
            'address' => 'Riyadh, Saudi Arabia',
        ]);

        // Create test customer
        User::create([
            'name' => 'Ahmed Ali',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '0501234567',
            'address' => 'Jeddah, Saudi Arabia',
        ]);

        // Create more test customers
        User::create([
            'name' => 'Sara Mohammed',
            'email' => 'sara@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '0509876543',
            'address' => 'Dammam, Saudi Arabia',
        ]);
    }
}
