<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Support\Facades\Hash;

class GuideSeeder extends Seeder
{
    public function run()
    {
        $guidesData = [
            [
                'name' => 'Made Wijaya',
                'email' => 'made.wijaya@example.com', // Email untuk login user
                'phone' => '+62-812-3456-7890',
                'language' => 'Indonesian, English',
                'rating' => 4.8,
            ],
            [
                'name' => 'Kenji Yamamoto',
                'email' => 'kenji.yamamoto@example.com',
                'phone' => '+81-90-1234-5678',
                'language' => 'Japanese, English',
                'rating' => 4.9,
            ],
            [
                'name' => 'Pierre Dubois',
                'email' => 'pierre.dubois@example.com',
                'phone' => '+33-6-12-34-56-78',
                'language' => 'French, English',
                'rating' => 4.7,
            ],
        ];

        foreach ($guidesData as $data) {
            // 1. Buat akun User terlebih dahulu
            $newUser = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password123'), // Password default untuk semua guide
            ]);

            // 2. Berikan role 'guide' ke user yang baru dibuat
            $newUser->assignRole('guide');

            // 3. Buat profil Guide dan hubungkan dengan user_id
            Guide::create([
                'user_id' => $newUser->id, // Menghubungkan ke user yang baru dibuat
                'name' => $data['name'],
                'phone' => $data['phone'],
                'language' => $data['language'],
                'rating' => $data['rating'],
            ]);
        }
    }
}
