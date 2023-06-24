<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        return [
            'judul' => $title,
            'slug' => Str::slug($title),
            'deskripsi' => $this->faker->text(),
            'thumbnail' => 'default-thumbnail.jpg',
            'user_id' => 1,
            'kelas_id' => 1,
            'tab_materi_id' => $this->faker->numberBetween(1, 2),
            'tersedia' => $this->faker->date('Y-m-d'),
        ];
    }
}
