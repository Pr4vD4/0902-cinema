<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Expert',
            'login' => 'expert',
            'email' => 'admin@example.com',
            'password' => Hash::make('expertadmin'),
            'role' => 'admin',
            'agree' => true
        ]);
    }
}
