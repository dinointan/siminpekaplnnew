<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perabotan>
 */
class PerabotanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => fake()->numerify('PB-####'),
            'nama' => fake()->sentence(3),
            'kategori_id' => fake()->randomElement(\App\Models\Kategori::pluck('id')->toArray()),
            'tahun_pengadaan' => fake()->randomElement(['2020', '2021', '2022', '2023']),
            'lokasi_id' => fake()->randomElement(\App\Models\Lokasi::pluck('id')->toArray()),
            'keterangan' => fake()->sentence(),
        ];
    }
}
