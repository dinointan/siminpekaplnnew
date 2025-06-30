<?php

namespace Database\Factories;

use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'telp' => fake()->numerify('#############'),
            'gender' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->sentence(),
            'divisi' => fake()->randomElement(['Admin', 'Penjualan']),
            // 'foto' => fake()->optional()->image('public/storage/foto', 400, 400, null, false) ?? 'default.jpg',
            'user_id' => \App\Models\User::first()->id,
        ];
    }
}
