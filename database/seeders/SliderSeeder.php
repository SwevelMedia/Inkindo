<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'judul' => 'Forum Anggota (FORA) INKINDO DIY',
                'deskripsi' => 'Siap hadapi tantangan di tahun 2023',
                'gambar' => 'forumAnggota.jpg',
            ],
            [
                'judul' => 'Malam Puncak HUT Inkindo',
                'deskripsi' => 'Malam puncak perayaaan HUT Inkindo ke-43',
                'gambar' => 'slider2.jpeg',
            ],
            [
                'judul' => 'HUT-43 Inkindo',
                'deskripsi' => 'Perayaan HUT Inkindo ke-43',
                'gambar' => 'slider3.jpg',
            ],
        ];

        foreach ($data as $key => $value) {
            Slider::create($value);
        }
    }
}
