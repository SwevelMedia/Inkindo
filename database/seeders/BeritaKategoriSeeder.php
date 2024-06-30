<?php

namespace Database\Seeders;

use App\Models\BeritaKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita_kategori = [
            [
                'berita_kategori' => 'Konstruksi',
                'slug' => 'konstruksi',
            ],
            [
                'berita_kategori' => 'Non Konstruksi',
                'slug' => 'non-konstruksi',
            ],
            [
                'berita_kategori' => 'Umum',
                'slug' => 'umum',
            ],
        ];

        foreach ($berita_kategori as $kategori => $value) {
            BeritaKategori::create($value);
        }
    }
}
