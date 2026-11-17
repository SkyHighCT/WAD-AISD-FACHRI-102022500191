<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kos.test'],
            ['name' => 'Admin Kos', 'password' => 'admin123', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'user@kos.test'],
            ['name' => 'User Biasa', 'password' => 'user123', 'role' => 'user']
        );
    }
}
