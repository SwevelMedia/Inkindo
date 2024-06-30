<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class GaleriSeeder extends Seeder
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
                'judul' => 'BUKA PUASA BERSAMA INKINDO DI YOGYAKARTA & PT SUNRISE STEEL GRAND ZURI MALIOBORO',
                // 'gambar' => '6bukber zinium.jpg',
                'tanggal' => '2023-04-17',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => 'SYAWALAN UNIVERSITY CLUB UGM HOTEL & CONVENTION',
                // 'gambar' => 'Inkindo_Syawalan 1444H_2023_UC UGM_DSC_3395_2.jpg',
                'tanggal' => '2023-05-16',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => 'Musyawarah Provinsi 26 Maret 2022',
                // 'gambar' => 'Pilih_Inkindo_Htl Tentrem_2022_DSC_9228.jpg',
                'tanggal' => '2022-04-26',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => "Buka bersama DPP INKINDO DIY dengan mitra kerja PT.FAJAR LESTARI (DEKKSON) Hotel Grand
                  Ambarrukmo",
                // 'gambar' => 'Inkindo Bukber_Grand Ambarukmo_2022_DSC_9925_2.jpg',
                'tanggal' => '2022-04-14',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => 'SYAWALAN & RAPAT KERJA PROVINSI DIY 1443H',
                // 'gambar' => 'Inkindo_Syawalan_Sahid Raya_2022_DSC_0319_2.jpg',
                'tanggal' => '2022-05-24',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => 'Forum Anggota (FORA) INKINDO DIY',
                // 'gambar' => 'Inkindo_Forum Anggota_Sahid_Jan 2023_DSC_1967_2.jpg',
                'tanggal' => '2023-01-31',
                'kategori_gallery_id' => 3,
            ],
            [
                'judul' => 'Hari Ulang Tahun INKINDO DIY ke 41',
                // 'gambar' => 'Inkindo_HUT 41_Bukber_PA Bina Siwi Btl_2023_DSC_2819_2.jpg',
                'tanggal' => '2023-04-05',
                'kategori_gallery_id' => 3,
            ],
        ];

        foreach ($data as $key => $value) {
            Gallery::create($value);
        }
    }
}
