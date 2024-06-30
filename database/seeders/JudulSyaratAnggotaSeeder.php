<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JudulSyaratAnggotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 0,
                'nama_judul' => 'Mengajukan permohonan menjadi anggota Inkindo secara tertulis (tersedia isian form)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 0,
                'nama_judul' => 'Memiliki data aspek legal badan usaha jasa konsultasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 0,
                'nama_judul' => 'Pimpinan bada usaha memiliki ijazah S1(semua jurusan)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 0,
                'nama_judul' => 'Memiliki Personalia yang terdiri atas ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 0,
                'nama_judul' => 'Semua Personil yang terlibat harus melampirkan copy ijazah, copy KTP, daftar riwayat hidup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 1,
                'nama_judul' => 'Mengajukan permohonan menjadi anggota Inkindo secara tertulis (tersedia isian form)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 1,
                'nama_judul' => 'Melampirkan dokumen pendukung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 1,
                'nama_judul' => 'Jasa Penilain Perawatan dan Kelayakan Bangunan Gedung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 1,
                'nama_judul' => '1 orang penanggung jawab teknis (PJT) memiliki sertifikat keahlian (SKA) yang masih berlaku (dapat dirangkap oleh direktur utama)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 1,
                'nama_judul' => '1 orang SKA madya untuk penanggung jawab bidang atau klasifikasi dan 1 orang SKA madya untuk setiap 2 sub bidang/ sub klasifikasi golongan M',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('judul_syarat_anggota')->insert($data);
    }
}

