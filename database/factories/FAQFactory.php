<?php

namespace Database\Factories;

use App\Models\FAQ_Kategori;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ>
 */
class FAQFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pertanyaan' => fake()->sentence(),
            'jawaban' => fake()->sentence(),
            'faq_kategori_id' => fake()->randomElement(FAQ_Kategori::pluck('id')->toArray()),
        ];
    }
}
