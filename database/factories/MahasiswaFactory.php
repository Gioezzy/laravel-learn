<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nim' => fake()->bothify('#########'),
            'jurusan' => fake()->randomElement(['TI', 'SI', 'SK']),
            'prodi' => fake()->randomElement(['MI', 'TK', 'TRPL', 'Multimedia']),
            'email' => fake()->unique()->safeEmail,
            'alamat' => fake()->address(),
            //'nohp' => fake()->phoneNumber(),
            //'tgllahir' => fake()->date('Y-m-d')

        ];
    }
}
