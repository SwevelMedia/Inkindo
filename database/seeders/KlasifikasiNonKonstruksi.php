<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiNonKonstruksi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriData = [
            [
                'nama_klasifikasi_non_konstruksi' => 'Berorientasi Bidang',
                'logo_light' => 'Vector_w.png',
                'logo_dark' => 'Vector_b.png',
            ],
            [
                'nama_klasifikasi_non_konstruksi' => 'Berorientasi Layanan',
                'logo_light' => 'Services_w.png',
                'logo_dark' => 'Services_b.png',
            ],
            [
                'nama_klasifikasi_non_konstruksi' => 'Bidang Pariwisata',
                'logo_light' => 'trip_w.png',
                'logo_dark' => 'trip_b.png',
            ],
            [
                'nama_klasifikasi_non_konstruksi' => 'Layanan Kepariwisataan',
                'logo_light' => 'hotel_w.png',
                'logo_dark' => 'hotel_b.png',
            ],
        ];

        DB::table('klasifikasi_non_konstruksis')->insert($kategoriData);
    }
}
