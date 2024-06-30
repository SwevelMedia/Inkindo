<?php

namespace Database\Factories;

use App\Models\ArsipKategori;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsip>
 */
class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_arsip' => fake()->sentence(),
            'keterangan' => fake()->sentence(),
            'file_arsip' => fake()->fileExtension(),
            // arsip_kategori_id randomize from arsip_kategoris table
            'arsip_kategori_id' => fake()->randomElement(ArsipKategori::pluck('id')->toArray()),
        ];
    }
}
