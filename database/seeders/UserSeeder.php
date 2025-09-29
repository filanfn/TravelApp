<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // default password
        ]);
        $admin->assignRole('admin');

        $guide = User::create([
            'name' => 'Guide',
            'email' => 'guide@example.com',
            'password' => bcrypt('password123'), // default password
        ]);
        $guide->assignRole('guide');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'), // default password
        ]);
        $user->assignRole('user');
    }
}
