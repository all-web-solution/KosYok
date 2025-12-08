<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'telepon' => '082373840010',
            'role' => 'admin',
            'status' => 'active',
        ]);
        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('password'),
            'telepon' => '082373840010',
            'role' => 'customer',
            'status' => 'active',
        ]);
    }
}
