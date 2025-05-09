<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat data dummy secara manual
        // \App\Models\Mahasiswa::create(
        //     [
        //         'name' => "John Doe",
        //         'nim' => "123456789",
        //         'jurusan' => "TI",
        //         'prodi' => "RPL",
        //         'email' => "john@gmail.com",
        //         'alamat' => "Jl. Raya No. 1",
        //     ]
        // );

        //membuat data dummy secara otomatis
        \App\Models\Mahasiswa::factory(40)->create();
        //\App\Models\Mahasiswa::factory()->count(40)->create();
    }
}
