<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
           User::create([
            'name' => 'User Team',
            'email' => 'team@example.com',
            'password' => Hash::make('team123'),
            'role' => 'team',
        ]);
    }
}
