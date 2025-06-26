<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin jika belum ada
        User::firstOrCreate(
            ['email' => 'admin@desa.test'],
            [
                'name' => 'Admin Desa',
                'password' => Hash::make('password')
            ]
        );

        // Tambahkan kategori jika belum ada
        $kategoriList = ['Pendidikan', 'Kejahatan', 'Warga'];

        foreach ($kategoriList as $nama) {
            Kategori::firstOrCreate(['nama' => $nama]);
        }
    }
}
