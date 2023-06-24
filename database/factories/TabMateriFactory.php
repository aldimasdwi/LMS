<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TabMateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word(5),
            'kelas_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
