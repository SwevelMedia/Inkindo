<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\ArsipText;
use Smalot\PdfParser\Parser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArsipSeeder extends Seeder
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
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'PERATURAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT REPUBLIK INDONESIA NOMOR 8 TAHUN 2022',
                'keterangan' => 'TENTANG TATA CARA PELAKSANAAN PEMENUHAN SERTIFIKAT STANDAR JASA KONSTRUKSI DALAM RANGKA MENDUKUNG KEMUDAHAN PERIZINAN BERUSAHA BAGI PELAKU USAHA JASA KONSTRUKSI',
                'file_arsip' => 'PERATURAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT REPUBLIK INDONESIA NOMOR 8 TAHUN 2022.pdf',
            ],

            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 144/KPTS/DK/2022',
                'keterangan' => 'TENTANG PENETAPAN STANDAR SKEMA SERTIFIKASI BADAN USAHA JASA KONSTRUKSI DIREKTUR JENDERAL BINA KONSTRUKSI',
                'file_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 144/KPTS/DK/2022.pdf',
            ],

            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 144/KPTS/DK/2022',
                'keterangan' => 'TENTANG PENETAPAN STANDAR SKEMA SERTIFIKASI BADAN USAHA JASA KONSTRUKSI',
                'file_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 144/KPTS/DK/2022.pdf',
            ],

            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Klasifikasi Bidang/Layanan Konsultansi Non Jasa Konstruksi Berdasarkan KBLI',
                'keterangan' => 'Klasifikasi Bidang/Layanan Konsultansi Non Jasa Konstruksi Berdasarkan KBLI',
                'file_arsip' => 'Klasifikasi Bidang-Layanan Konsultansi Non Jasa Konstruksi Berdasarkan KBLI.pdf',
            ],

            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Peraturan Badan Informasi Geospasial Republik Indonesia Nomor 14 Tahun 2019 Tentang Tata Cara Sertifikasi Penyedia Jasa Di Bidang Informasi Geospasial',
                'keterangan' => 'Peraturan Badan Informasi Geospasial Republik Indonesia Nomor 14 Tahun 2019 Tentang Tata Cara Sertifikasi Penyedia Jasa Di Bidang Informasi Geospasial',
                'file_arsip' => 'Klasifikasi Bidang-Layanan Konsultansi Non Jasa Konstruksi Berdasarkan KBLI.pdf',
            ],

            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Keputusan Menteri Perhubungan Republik Indonesia KM 197 Tahun 2020',
                'keterangan' => 'Keputusan Menteri Perhubungan Republik Indonesia KM 197  Tahun 2020 tentang Besaran Minimal Biaya Langsung Personil untuk Kegiatan Jasa Konsultansi Selain Konstruksi di lingkungan Kementerian Perhubungan',
                'file_arsip' => 'Keputusan Menteri Perhubungan Republik Indonesia KM 197 Tahun 2020.pdf',
            ],
        ];
        $data = [
            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'Undang - Undang No 40 Tahun 2007 Tentang Perseroan Terbatas',
                'keterangan' => 'UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 40 TAHUN 2007 TENTANG PERSEROAN TERBATAS ',
                'file_arsip' => 'Undang - Undang No 40 Tahun 2007 Tentang Perseroan Terbatas.pdf',
            ],
            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'Undang undang No 11 Tahun 2020 tentang Cipta Kerja',
                'keterangan' => 'UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 11 TAHUN 2O2O TENTANG CIPTA KERJA',
                'file_arsip' => 'Undang undang No 11 Tahun 2020 tentang Cipta Kerja.pdf',
            ],
            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'Undang undang No 2 Tahun 2017 tentang Jasa Konstruksi',
                'keterangan' => 'UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 2 TAHUN 2017 TENTANG JASA KONSTRUKSI',
                'file_arsip' => 'Undang undang No 2 Tahun 2017 tentang Jasa Konstruksi.pdf',
            ],
            [
                'arsip_kategori_id' => 1,
                'nama_arsip' => 'Undang undang No 20 Tahun 2014 tentang Standardisasi dan Penilaian Kesesuaian',
                'keterangan' => 'UNDANG-UNDANG REPUBLIK INDONESIANOMOR 20 TAHUN 2014 TENTANG STANDARDISASI DAN PENILAIAN KESESUAIAN',
                'file_arsip' => 'Undang undang No 20 Tahun 2014 tentang Standardisasi dan Penilaian Kesesuaian.pdf',
            ],

            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Lampiran IA PerMen PUPR No 6 Tahun 2021',
                'keterangan' => 'PERATURAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 6 TAHUN 2021 TENTANG STANDAR KEGIATAN USAHA DAN PRODUK PADA PENYELENGGARAAN PERIZINAN BERUSAHA BERBASIS RISIKO SEKTOR PEKERJAAN UMUM DAN PERUMAHAN RAKYAT',
                'file_arsip' => 'Lampiran IA PerMen PUPR No 6 Tahun 2021.pdf',
            ],

            // Lampiran IA PerMen PUPR No 6 Tahun 2021.pdf
            // Lampiran IB 1 PerMen PUPR No 6 Tahun 2021.pdf
            // Lampiran IB 2 PerMen PUPR No 6 Tahun 2021.pdf
            // Lampiran II PerMen PUPR No 6 Tahun 2021.pdf
            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Lampiran IB 1 PerMen PUPR No 6 Tahun 2021',
                'keterangan' => 'TENTANG TATA CARA PENILAIAN KINERJA PENYEDIA JASA TAHUNAN DAN FORMAT LAPORAN KEGIATAN USAHA TAHUNAN',
                'file_arsip' => 'Lampiran IB 1 PerMen PUPR No 6 Tahun 2021.pdf',
            ],
            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Lampiran IB 2 PerMen PUPR No 6 Tahun 2021',
                'keterangan' => 'TENTANG FORMAT LAPORAN KEGIATAN USAHA TAHUNAN',
                'file_arsip' => 'Lampiran IB 2 PerMen PUPR No 6 Tahun 2021.pdf',
            ],
            [
                'arsip_kategori_id' => 2,
                'nama_arsip' => 'Lampiran II PerMen PUPR No 6 Tahun 2021',
                'keterangan' => 'PERATURAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 6 TAHUN 2021 TENTANG STANDAR KEGIATAN USAHA DAN PRODUK PADA PENYELENGGARAAN PERIZINAN BERUSAHA BERBASIS RISIKO SEKTOR PEKERJAAN UMUM DAN PERUMAHAN RAKYAT',
                'file_arsip' => 'Lampiran II PerMen PUPR No 6 Tahun 2021.pdf',
            ],
            [
                'arsip_kategori_id' => 3,
                'nama_arsip' => 'KEPUTUSAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 713 /KPTS/M/2022',
                'keterangan' => 'TENTANG PENETAPAN BESARAN BIAYA SERTIFIKASI KOMPETENSI KERJA KONSTRUKSI DAN SERTIFIKASI BADAN USAHA JASA KONSTRUKSI YANG DILAKSANAKAN OLEH LEMBAGA SERTIFIKASI BIDANG JASA KONSTRUKSI',
                'file_arsip' => 'KepMen PUPR No 713_KPTS_M_2022.pdf',
            ],
            [
                'arsip_kategori_id' => 3,
                'nama_arsip' => 'KKEPUTUSAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 1410/KPTS/M/2020',
                'keterangan' => 'TENTANG ASOSIASI BADAN USAHA JASA KONSTRUKSI, ASOSIASI PROFESI JASA KONSTRUKSI DAN ASOSIASI TERKAIT RANTAI PASOK JASA KONSTRUKSI TERAKREDITASI',
                'file_arsip' => 'KepMen PUPR No 1410_KPTS_M_2020.pdf',
            ],
            [
                'arsip_kategori_id' => 3,
                'nama_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 144/KPTS/DK/2022',
                'keterangan' => 'TENTANG PENETAPAN STANDAR SKEMA SERTIFIKASI BADAN USAHA JASA KONSTRUKSI',
                'file_arsip' => 'KEPUTUSAN DIRJEN PENETAPAN SKEMA BUJK NOMOR 144 TAHUN 2022.pdf',
            ],
            [
                'arsip_kategori_id' => 3,
                'nama_arsip' => 'KEPUTUSAN DIREKTUR JENDERAL BINA KONSTRUKSI, KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 89/KPTS/DK/2021',
                'keterangan' => 'TENTANG PENETAPAN STANDAR SKEMA SERTIFIKASI BADAN USAHA JASA KONSTRUKSI',
                'file_arsip' => 'SK DIRJENBINAKONS No. 89 Penetapan Standar Skema Sertifikasi BUJK.pdf',
            ],

            [
                'arsip_kategori_id' => 4,
                'nama_arsip' => 'LAMPIRAN SURAT EDARAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 21/SE/M/2021',
                'keterangan' => 'TATA CARA PERSYARATAN PERIZINAN BERUSAHA, PELAKSANAAN SERTIFIKASI KOMPETENTSI KERJA KONSTRUKSI, DAN PEMBERLAKUAN SERTIFIKAT BADAN USAHA SERTA SERTIFIKAT KOMPETENSI KERJA KONSTRUKSI',
                'file_arsip' => 'Lampiran Surat Edaran Menteri PUPR No 21_SE_M_2021.pdf',
            ],
            // [
            //     'arsip_kategori_id' => 4,
            //     'nama_arsip' => 'SURAT EDARAN MENTERI PUPR NO. 02 TAHUN 2021 TENTANG PERUBAHAN SE MENTERI PUPR NO. 30 TAHUN 2020',
            //     'keterangan' => 'TENTANG PERUBAHAN ATAS SURAT EDARAN MENTERI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT NOMOR 30/SE/M/2020 TENTANG TRANSISI LAYANAN SERTIFIKASI BADAN USAHA DAN SERTIFIKASI KOMPETENSI KERJA JASA KONSTRUKSI',
            //     'file_arsip' => 'SE MENTERI PUPR NO. 02 TAHUN 2021 TENTANG PERUBAHAN SE MENTERI PUPR NO. 30 TAHUN
            //   2020.pdf',
            // ],
            // [
            //     'arsip_kategori_id' => 4,
            //     'nama_arsip' => 'SURAT EDARAN NOMOR: 02 /SE/LPJK/2021 ',
            //     'keterangan' => 'TENTANG PEDOMAN TEKNIS LISENSI LEMBAGA SERTIFIKASI BADAN USAHA JASA KONSTRUKSI',
            //     'file_arsip' => 'Surat Edaran LPJK No 02_SE_LPJK_2021 tentang Pedoman Teknis Lisensi Lembaga Sertifikasi
            //     Badan Usaha Jasa Konstruksi.pdf',
            // ],
            // [
            //     'arsip_kategori_id' => 4,
            //     'nama_arsip' => 'SURAT EDARAN NOMOR: 17/SE/LPJK/2021',
            //     'keterangan' => 'TENTANG
            //  PEDOMAN TEKNIS SERTIFIKASI BADAN USAHA JASA KONSTRUKSI MELALUI LEMBAGA SERTIFIKASI BADAN USAHA',
            //     'file_arsip' => 'Surat Edaran LPJK No 17_SE_LPJK_2021 tentang Pedoman Teknis Sertifikasi Badan Usaha Jasa
            //  Konstruksi Melalui Lembaga Sertifikasi Badan Usaha.pdf',
            // ],
        ];

        foreach ($data as $key => $value) {
            $arsip = Arsip::create($value);

            $parser = new Parser();
            $file = public_path('storage/uploads/admin/arsip/' . $value['file_arsip']);
            $pdf = $parser->parseFile($file);
            // $text = $pdf->getText();
            $pages = $pdf->getPages();
            $arsip_id = $arsip->id;
            foreach ($pages as $p => $value) {
               $cleanedString = preg_replace('/[^a-zA-Z0-9 ]/', '', $pages[$p]->getText());
               $arsipText = ArsipText::create([
               'arsip_id' => $arsip_id,
               'text' => $cleanedString,
               'halaman' => $p + 1,
               ]);
            }
        }
    }
}
