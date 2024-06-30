<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoinSyaratAnggotaSeeder extends Seeder
{
    public function run()
    {
        // Data untuk seeding
        $data = [
            [
                'poin' => 'Akta Pendirian badan usaha (independen/hanya badan usaha bidang konsultasi)',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'NPWP Perusahaan',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'SITU/domisili Perusahaan',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Rekomendasi 2 perusahaan anggota inkindo yang memilki sertifikat kode etik dan masih berlaku',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Denah alamat kantor dan layout kantor',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Daftar peralatan kantor/studio/lapangan',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Foto Direktur ukuran 3:4 sebanyak 2 lembar dan file foto',
                'judul_syarat_anggota_id' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Satu orang penanggung jawab teknik (berijazah S1 Teknik)',
                'judul_syarat_anggota_id' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Minimal 2 tenaga ahli tetap berijazah S1 Teknik (dapat dirangkap penanggung jawab teknik)',
                'judul_syarat_anggota_id' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Minimal 1 orang tenaga ahli tidak tetap (berijazah S1 Teknik)',
                'judul_syarat_anggota_id' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Minimal  1 orang tenaga administrasi (berijazah minimal SLTA/Sederajat)',
                'judul_syarat_anggota_id' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Akta pendirian badan usaha (terdaftar KEMENKUMHAM atau pengesahan pengadilan)',
                'judul_syarat_anggota_id' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'NPWP Perusahaan',
                'judul_syarat_anggota_id' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'SITU/domisili Perusahaan',
                'judul_syarat_anggota_id' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Copy KTP,NPWP, ijazah dan daftar riwayat hidup direktur',
                'judul_syarat_anggota_id' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Copy KTP,NPWP, ijazah dan daftar riwayat hidup tenaga ahli',
                'judul_syarat_anggota_id' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Cara untuk melaksanakan pemeliharaan bangunan, renovasi gedung, dan jasa restorasi bangunan gedung',
                'judul_syarat_anggota_id' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Penilaian kelayakan bangunan gedung termasuk juga didalamnya bangunan yang terkena musibah kebakaran;',
                'judul_syarat_anggota_id' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Tata cara penilaian usia bangunan',
                'judul_syarat_anggota_id' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'poin' => 'Tata cara pembongkaran (demolisi) bangunan gedung Tidak berkaitan dengan proyek konstruksi baru dan penambahan bangunan baru.',
                'judul_syarat_anggota_id' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('poin_syarat_anggota')->insert($data);
    }
}

