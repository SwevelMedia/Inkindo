<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prakata' => fake()->paragraph(),
            'gambar_prakata' => fake()->imageUrl(),
            'visi' => fake()->paragraph(),
            'misi' => fake()->paragraph(),
            'kode_etik' => fake()->paragraph(),
            'email' => fake()->email(),
            'no_hp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'whatsapp' => fake()->url(),
        ];
    }
}
