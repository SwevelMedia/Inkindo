<?php

namespace Database\Factories;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // user_id where role = anggota
            'user_id' => User::where('role', 'anggota')->get()->random()->id,
            'no_anggota' => $this->faker->unique()->randomNumber(8),
            'perusahaan' => $this->faker->company,
            'foto_perusahaan' => $this->faker->imageUrl(),
            'logo' => $this->faker->imageUrl(),
            'deskripsi' => $this->faker->paragraph,
            'penanggung_jawab' => function (array $attributes) {
                return User::find($attributes['user_id'])->name;
            },       
            'website' => $this->faker->url,
            'email' => $this->faker->unique()->safeEmail,
            'npwp' => $this->faker->numberBetween(1, 9999),
            'alamat' => $this->faker->streetAddress,
        ];
    }
}
