<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTestSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin.test@example.com'],
            [
                'name' => 'Admin Test',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );
    }
}

