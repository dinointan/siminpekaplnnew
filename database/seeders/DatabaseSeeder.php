<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Perabotan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tambah user admin hanya jika belum ada
        User::firstOrCreate(
            ['username' => 'intan'], // kondisi unik
            [
                'name' => 'Admin',
                'email' => 'intannurkholisa@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        // Tambah 1 profile jika belum ada
        if (!Profile::exists()) {
            Profile::factory()->create();
        }

        // Tambah 5 kategori jika belum ada
        if (!Kategori::exists()) {
            Kategori::factory(5)->create();
        }

        // Tambah 5 lokasi jika belum ada
        if (!Lokasi::exists()) {
            Lokasi::factory(5)->create();
        }

        // Tambah 10 perabotan jika belum ada
        if (!Perabotan::exists()) {
            Perabotan::factory(10)->create(); // 5+5 sebelumnya
        }
    }
}
