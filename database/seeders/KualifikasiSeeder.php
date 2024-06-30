<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KualifikasiSeeder extends Seeder
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
                'klasifikasi' => 'konstruksi',
                'sub_klasifikasi' => 'Perencanaan Arsitektur',
            ],
            [
                'klasifikasi' => 'konstruksi',
                'sub_klasifikasi' => 'Perencanaan Rekayasa',
            ],
            [
                'klasifikasi' => 'konstruksi',
                'sub_klasifikasi' => 'Perencanaan Penataan Ruang',
            ],
            [
                'klasifikasi' => 'konstruksi',
                'sub_klasifikasi' => 'Pengawasan Arsitektur',
            ],
            [
                'klasifikasi' => 'non_konstruksi',
                'sub_klasifikasi' => 'Pengawasan Arsitektur',
            ],
            [
                'klasifikasi' => 'non_konstruksi',
                'sub_klasifikasi' => 'Pengawasan Rekayasa',
            ],
            [
                'klasifikasi' => 'non_konstruksi',
                'sub_klasifikasi' => 'Pengawasan Penataan Ruang',
            ],
            [
                'klasifikasi' => 'non_konstruksi',
                'sub_klasifikasii' => 'Konsultasi',
            ],
        ];
         DB::table('klasifikasis')->insert($data);
    }
}
