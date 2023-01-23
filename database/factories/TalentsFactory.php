<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talents>
 */
class TalentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Nama' => fake()->name,
            'Umur' => fake()->numberBetween(18, 65),
            'Alamat' => fake()->address,
            'No' => fake()->phoneNumber,
            'Deskripsi' => fake()->text(50),
            'Image' => 'https://picsum.photos/200/300?random=1',
        ];
    }
}
