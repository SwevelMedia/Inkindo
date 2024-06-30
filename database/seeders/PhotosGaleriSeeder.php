<?php

namespace Database\Seeders;

use App\Models\PhotoGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotosGaleriSeeder extends Seeder
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
                'gallery_id' => 1,
                'nama_foto' => 'PUASA BERSAMA INKINDO D I YOGYAKARTA & PT SUNRISE STEEL.jpg',
            ],
            [
                'gallery_id' => 2,
                'nama_foto' => 'SYAWALAN UNIVERSITY CLUB UGM HOTEL & CONVENTION.jpg',
            ],
            [
                'gallery_id' => 3,
                'nama_foto' => 'musyawarah-26Maret.jpg',
            ],
            [
                'gallery_id' => 4,
                'nama_foto' => 'Buka bersama DPP INKINDO DIY.jpg',
            ],
            [
                'gallery_id' => 5,
                'nama_foto' => 'SYAWALAN & RAPAT KERJA PROVINSI DIY 1443H.jpg',
            ],
            [
                'gallery_id' => 6,
                'nama_foto' => 'forumAnggota.jpg',
            ],
            [
                'gallery_id' => 7,
                'nama_foto' => 'Inkindo_HUT_41.jpg',
            ],
        ];

        foreach ($data as $key => $value) {
            PhotoGallery::create($value);
        }
    }
}
