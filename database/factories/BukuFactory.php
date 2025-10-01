<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = \App\Models\Buku::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'penulis' => $this->faker->name(),
            'harga' => $this->faker->numberBetween(10000, 50000),
            'tgl_terbit' => $this->faker->date(),
        ];
    }
}
