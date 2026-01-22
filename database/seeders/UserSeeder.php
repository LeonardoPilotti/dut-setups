<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'userTeste',
            'email' => 'user@example.com',
            'password' => Hash::make('senha123'),
        ]);

    }
}
