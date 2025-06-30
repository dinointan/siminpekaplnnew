<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use App\Models\User;
use App\Models\WholesalePrice;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'intan',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        \App\Models\Profile::factory(1)->create();
        \App\Models\Kategori::factory(5)->create();
        \App\Models\Lokasi::factory(5)->create();
        \App\Models\Perabotan::factory(5)->create();
        // \App\Models\Perabotan::factory(5)->create();
    }
}
