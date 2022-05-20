<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->sentence(mt_rand(1, 5), false),
            "slug" => $this->faker->slug(mt_rand(1, 5)),
            "harga" => $this->faker->numberBetween(5000, 100000),
            "jenis" => $this->faker->randomElement(['makanan', 'minuman']),
        ];
    }
}
