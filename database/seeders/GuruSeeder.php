<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::create([
            'nama' => 'Muhamad Alfin Fauzi',
            'nip' => '809011',
            'email' => 'muhamad.alfin@guru.com',
            'telp' => '081234567890',
            'alamat' => 'Jl. Kendalpayak No. 21, Jakarta',
        ]);

        Guru::create([
            'nama' => 'Intan Dwi Cahyani',
            'nip' => '809012',
            'email' => 'inta.dwi@guru.com',
            'telp' => '082345678901',
            'alamat' => 'Jl. Gadang No. 16, Bandung',
        ]);

        Guru::create([
            'nama' => 'Muhammad Avid Maulana',
            'nip' => '809013',
            'email' => 'muhammad.avid@guru.com',
            'telp' => '083455678901',
            'alamat' => 'Jl. Ngantang No. 28, Bandung',
        ]);

        Guru::create([
            'nama' => 'Son Hatta Pramudya',
            'nip' => '809014',
            'email' => 'son.hatta@guru.com',
            'telp' => '082345634901',
            'alamat' => 'Jl. Kediri No. 31, Bandung',
        ]);
    }
}
