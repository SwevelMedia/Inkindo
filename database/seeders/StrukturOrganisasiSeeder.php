<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriData =
            [
                [
                    'bidang_jabatan' => 'Dewan Pengurus Provinsi',
                    'foto' => 'DPP.png',
                ],
                [
                    'bidang_jabatan' => 'Dewan Kehormatan Provinsi',
                    'foto' => 'DKP.png',

                ],
                [
                    'bidang_jabatan' => 'Dewan Pertimbangan Organisasi Provinsi',
                    'foto' => 'DPOP.png',
                ],
                [
                    'bidang_jabatan' => 'Badan Sertifikasi Anggota Provinsi',
                    'foto' => 'BSAP.png',
                ],
                [
                    'bidang_jabatan' => 'Badan Advokasi Mediasi ',
                    'foto' => 'BAM.png',
                ],
            ];

        DB::table('organisasi_dpps')->insert($kategoriData);
    }
}
