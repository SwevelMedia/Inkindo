<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProgramKerjaSeeder extends Seeder
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
                'nama_kategori' => 'Ketua',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Sekretaris',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bendahara',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Kemitraan dan Kerjasama',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Organisasi dan Pembinaan Anggota',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Perencanaan Strategis',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Kepranataan',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Teknologi dan Informasi',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Hukum dan Advokasi',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Peningkatan Kesejahteraan Anggota',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Sayembara dan Pengabdian Masyarakat',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Sarana dan Prasarana',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Bidang Hubungan Masyarakat dan Penyelenggara Kegiatan',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Dewan Kehormatan Provinsi (DKP)',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Dewan Pertimbangan Organisasi Provinsi (DPOP)',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Perwakilan Organisasi Provinsi (POP)',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Badan Advokasi dan Mediasi (BAM)',
                'periode' => '2022-2026'
            ],
            [
                'nama_kategori' => 'Badan Sertivikasi Anggota Provinsi (BSAP)',
                'periode' => '2022-2026'
            ],
        ];

        DB::table('kategori_program_kerja')->insert($kategoriData);
    }
}