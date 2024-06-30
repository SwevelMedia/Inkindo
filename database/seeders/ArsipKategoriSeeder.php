<?php

namespace Database\Seeders;

use App\Models\ArsipKategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArsipKategoriSeeder extends Seeder
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
                'arsip_kategori' => 'Undang-Undang',
            ],

            [
                'arsip_kategori' => 'Peraturan',
            ],
            [
                'arsip_kategori' => 'Surat Keputusan',
            ],
            [
                'arsip_kategori' => 'Surat Edaran',
            ],
        ];

        foreach ($data as $key => $value) {
            ArsipKategori::create($value);
        }
    }
}
