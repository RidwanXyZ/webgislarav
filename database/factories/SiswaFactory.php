<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama" => fake()->name(),
            "nisn" => fake()->numberBetween(100000, 999999),
            "kelas" => fake()->randomElement(["10", "11", "12"]),
            "latitude" => fake()->latitude(111,112),
            "longitude" => fake()->longitude(-7,-7),
            "alamat" => fake()->address(),
        ];
    }
}
