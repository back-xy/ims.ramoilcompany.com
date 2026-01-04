<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => env('ADMIN_NAME', 'بەڕێوەبەر'),
            'email' => env('ADMIN_EMAIL', 'admin@ramoilcompany.com'),
            'role' => 'admin',
            'password' => Hash::make(env('ADMIN_PASSWORD', '1111')),
            'email_verified_at' => now(),
        ]);

        // Regular User
        User::create([
            'name' => env('USER_NAME', 'بەکارهێنەر'),
            'email' => env('USER_EMAIL', 'user@ramoilcompany.com'),
            'role' => 'user',
            'password' => Hash::make(env('USER_PASSWORD', '1111')),
            'email_verified_at' => now(),
        ]);
    }
}
