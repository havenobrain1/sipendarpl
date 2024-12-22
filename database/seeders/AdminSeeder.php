<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}

