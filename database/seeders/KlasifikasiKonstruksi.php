<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiKonstruksi extends Seeder
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
                'nama_klasifikasi_konstruksi' => 'Perancangan Arsitektur',
                'logo_light' => 'Construction Worker_w.png',
                'logo_dark' => 'Construction Worker_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Perancangan Rekayasa',
                'logo_light' => 'Construction_w.png',
                'logo_dark' => 'Construction_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Perencanaan Penataan Ruang',
                'logo_light' => 'Crane_w.png',
                'logo_dark' => 'Crane_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Pengawasan Arsitektur',
                'logo_light' => 'Building_w.png',
                'logo_dark' => 'Building_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Pengawasan Rekayasa',
                'logo_light' => 'manager_w.png',
                'logo_dark' => 'manager_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Pengawasan Penataan Ruang',
                'logo_light' => 'Engineering Plan_w.png',
                'logo_dark' => 'Engineering Plan_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Konsultasi Spesialis',
                'logo_light' => 'Clipboard_w.png',
                'logo_dark' => 'Clipboard_b.png',
            ],
            [
                'nama_klasifikasi_konstruksi' => 'Jasa Arsitektur lainnya',
                'logo_light' => 'Engineer_w.png',
                'logo_dark' => 'Engineer_b.png',
            ],
        ];

        DB::table('klasifikasi_konstruksis')->insert($kategoriData);
    }
}
