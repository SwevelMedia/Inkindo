<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProgramKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programKerjaData = [
            [
                'nama_proker' => 'Memimpin seluruh jajaran organisasi sesuai Anggaran Dasar, Anggaran Rumah Tangga, Kode Etik, Standar, dan Pedoman Profesi.',
                'kategori_id' => 1,
            ],
            [
                'nama_proker' => 'Bertanggungjawab melaksanakan agenda organisasi 4 tahunan dan agenda organisasi sesuai Garis Besar Haluan Kebijakan Organisasi dan Rancangan Anggaran Pendapatan Belanja Organisasi.',
                'kategori_id' => 1,
            ],
            [
                'nama_proker' => 'Mengkoordinasikan serta membantu semua Wakil Ketua agar tercapai keterpaduan dalam pelaksanaan kegiatan organisasi.',
                'kategori_id' => 2,
            ],
            [
                'nama_proker' => 'Melaporkan tugas-tugasnya secara berkala dan bertanggung jawab kepada Ketua.',
                'kategori_id' => 2,
            ],
            [
                'nama_proker' => 'Bersama Ketua dan Bendahara mengkoordinir pelaksanaan rapat kerja.',
                'kategori_id' => 2,
            ],
            [
                'nama_proker' => 'Bersama Ketua menandatangani surat menyurat.',
                'kategori_id' => 2,
            ],
            [
                'nama_proker' => 'Bertanggung jawab dalam pengelolaan keuangan organisasi.',
                'kategori_id' => 3,
            ],
            [
                'nama_proker' => 'Bersama Wakil Ketua I mencari sumber keuangan untuk pendanaan kegiatan organisasi.',
                'kategori_id' => 3,
            ],
            [
                'nama_proker' => 'Melaporkan tugas-tugasnya secara berkala dan bertanggung jawab kepada Ketua.',
                'kategori_id' => 3,
            ],
            [
                'nama_proker' => 'Membuat laporan keuangan organisasi yang dilaporkan pada saat Rapat Kerja.',
                'kategori_id' => 3,
            ],
            [
                'nama_proker' => 'Menjalin, membina serta memantapkan hubungan kerjasama dengan pihak stakeholder (instansi pemerintah dan swasta) serta mitra kerja (perusahaan swasta).',
                'kategori_id' => 4,
            ],
            [
                'nama_proker' => 'Meningkatkan kerjasama dengan DPP INKINDO provinsi lain untuk kepentingan anggota',
                'kategori_id' => 4,
            ],
            [
                'nama_proker' => 'Membina hubungan dan meningkatkan kerjasama dengan Asosiasi Profesi dan Asosiasi Badan Usaha lainnya',
                'kategori_id' => 4,
            ],
            [
                'nama_proker' => 'Menciptakan kegiatan berkesinambungan yang berlandaskan kode etik profesional',
                'kategori_id' => 4,
            ],
            [
                'nama_proker' => 'Menjalin hubungan kerjasama antar anggota dan penguatan pembinaan anggota.',
                'kategori_id' => 5,
            ],
            [
                'nama_proker' => 'Melakukan pembinaan, peningkatan kemampuan, ketrampilan, dan integritas kepribadian anggota.',
                'kategori_id' => 5,
            ],
            [
                'nama_proker' => 'Mengadakan kegiatan pertemuan kepada Perwakilan Organisasi Provinsi (POP) secara periodik.',
                'kategori_id' => 5,
            ],
            [
                'nama_proker' => 'Menciptakan iklim hubungan harmonis antar anggota.',
                'kategori_id' => 5,
            ],
            [
                'nama_proker' => 'Mengadakan kajian dan usulan strategis yang berhubungan dengan isu-isu terbaru untuk kepentingan anggota.',
                'kategori_id' => 6,
            ],
            [
                'nama_proker' => 'Mengadakan kegiatan pelatihan atau workshop mengenai perencanaan strategis organisasi dan perusahaan.',
                'kategori_id' => 6,
            ],
            [
                'nama_proker' => 'Membuat kajian terkait dengan billing rate dan pajak.',
                'kategori_id' => 6,
            ],
            [
                'nama_proker' => 'Melakukan pendalaman dan membuat resume terhadap peraturan yang berkaitan dengan jasa konstruksi.',
                'kategori_id' => 7,
            ],
            [
                'nama_proker' => 'Mengkompilasi semua peraturan yang melekat dalam pelaksanaan jasa konstruksi kepada anggota.',
                'kategori_id' => 7,
            ],
            [
                'nama_proker' => 'Melakukan kegiatan berkaitan dengan sosialisasi peraturan dengan jasa konstruksi ter-update kepada anggota.',
                'kategori_id' => 7,
            ],
            [
                'nama_proker' => 'Melakukan program berkesinambungan yang berhubungan dengan kepranataan kepada anggota.',
                'kategori_id' => 7,
            ],
            [
                'nama_proker' => 'Menciptakan sistem digitalisasi yang berkaitan dengan sistem informasi jasa konstruksi INKINDO.',
                'kategori_id' => 8,
            ],
            [
                'nama_proker' => 'Menjalankan dan mengembangkan website INKINDO DIY.',
                'kategori_id' => 8,
            ],
            [
                'nama_proker' => 'Mengadakan kegiatan sosialisasi terkait dengan Sistem Informasi yang berkaitan dengan jasa konstruksi (Sistem informasi database Tenaga Ahli).',
                'kategori_id' => 8,
            ],
            [
                'nama_proker' => 'Menciptakan dan membuat program sistem informasi yang menguatkan anggota.',
                'kategori_id' => 8,
            ],
            [
                'nama_proker' => 'Membuat database stakeholder dan mitra kerja bekerjasama dengan Wakil Ketua 1 untuk kepentingan anggota.',
                'kategori_id' => 8,
            ],
            [
                'nama_proker' => 'Mengkompilasi dan mensosialisasi pada anggota terkait dengan hukum yang akan berdampak kepada anggota.',
                'kategori_id' => 9,
            ],
            [
                'nama_proker' => 'Mengadakan pelatihan dan sosialisasi terkait dengan hukum jasa konstruksi dengan mengundang narasumber dari BPK, PidSus, PU, LKPP, dan lain-lain.',
                'kategori_id' => 9,
            ],
            [
                'nama_proker' => 'Mewujudkan fungsi hukum sebagai instrumen perlindungan bagi anggota.',
                'kategori_id' => 9,
            ],
            [
                'nama_proker' => 'Bekerjasama dengan Badan Advokasi Mediasi untuk melakukan pendampingan hukum yang berdampak kepada anggota.',
                'kategori_id' => 9,
            ],
            [
                'nama_proker' => 'Mengadakan kerjasama dengan perbankan dan asuransi.',
                'kategori_id' => 10,
            ],
            [
                'nama_proker' => 'Membuat sarana pelayanan yang bermanfaat untuk kesejahteraan dan produktivitas anggota.',
                'kategori_id' => 10,
            ],
            [
                'nama_proker' => 'Meneliti dan mengkaji usulan kenaikan gaji berkala untuk Badan Pelaksana diproses sesuai peraturan yang berlaku besama dengan Wakil Ketua 2.',
                'kategori_id' => 10,
            ],
            [
                'nama_proker' => 'Mengadakan kegiatan bakti sosial dengan melibatkan anggota yang bermanfaat untuk masyarakat luas.',
                'kategori_id' => 11,
            ],
            [
                'nama_proker' => 'Mengadakan kegiatan sayembara yang khusus diikuti oleh anggota.',
                'kategori_id' => 11,
            ],
            [
                'nama_proker' => 'Menciptakan kegiatan yang berkelanjutan dalam meningkatkan kreativitas anggota dalam bidang Ilmu Pengetahuan dan Teknologi.',
                'kategori_id' => 11,
            ],
            [
                'nama_proker' => 'Meningkatkan pelayanan kepada anggota melalui peningkatan dan perbaikan sarana prasarana.',
                'kategori_id' => 12,
            ],
            [
                'nama_proker' => 'Merencanakan dan melaksanakan program pengembangan dan pemeliharaan sarana prasarana.',
                'kategori_id' => 12,
            ],
            [
                'nama_proker' => 'Mengkoordinasikan dan mengawasi pemeliharaan, perbaikan, dan pengembangan sarana kantor kesekretariatan.',
                'kategori_id' => 12,
            ],
            [
                'nama_proker' => 'Melaksanakan inventarisasi barang/alat per unit kerja.',
                'kategori_id' => 12,
            ],
            [
                'nama_proker' => 'Menjalin dan memantapkan hubungan kerjasama dengan masyarakat.',
                'kategori_id' => 13,
            ],
            [
                'nama_proker' => 'Mengkoordinasikan seluruh kegiatan.',
                'kategori_id' => 13,
            ],
            [
                'nama_proker' => 'Melakukan penegakan serta pengawasan terhadap penataan Kode Etik dan Tata Laku Keprofesian.',
                'kategori_id' => 14,
            ],
            [
                'nama_proker' => 'Memberikan keputusan atas pelanggaran kode etik dan sanksi yang dilakukan anggota.',
                'kategori_id' => 14,
            ],
            [
                'nama_proker' => 'Menjalankan program penataran kode etik bagi anggota secara berkesinambungan.',
                'kategori_id' => 14,
            ],
            [
                'nama_proker' => 'Memberikan pertimbangan kepada DPP tentang arahan kebijakan dan program kerja organisasi.',
                'kategori_id' => 15,
            ],
            [
                'nama_proker' => 'Memberikan pertimbangan tentang pelaksanaan dan kesinambungan program kerja demi tercapainya tujuan dan keutuhan organisasi.',
                'kategori_id' => 15,
            ],
            [
                'nama_proker' => 'Menjaga keselarasan hubungan anggota organisasi di daerah.',
                'kategori_id' => 16,
            ],
            [
                'nama_proker' => 'Membantu DPP dalam pendistribusian informasi dan isu-isu penting bagi kepentingan anggota daerah.',
                'kategori_id' => 16,
            ],
            [
                'nama_proker' => 'Mengadakan pertemuan penting antar anggota daerah.',
                'kategori_id' => 16,
            ],
            [
                'nama_proker' => 'Sebagai fasilitator dan mediator antara DPP dengan Instansi Pemerintah.',
                'kategori_id' => 16,
            ],
            [
                'nama_proker' => 'Melakukan pendampingan terhadap anggota dalam kasus-kasus hukum yang berdampak pada anggota.',
                'kategori_id' => 17,
            ],
            [
                'nama_proker' => 'Memberikan advice hukum kepada anggota sebagai tindakan pencegahan kriminalisasi anggota dalam masalah jasa konstruksi.',
                'kategori_id' => 17,
            ],
            [
                'nama_proker' => 'Melayani anggota dalam proses Sertifikasi Badan Usaha (SBU) Jasa konsultansi Non Konstruksi bekerjasama dengan KADIN.',
                'kategori_id' => 18,
            ],
            [
                'nama_proker' => 'Memberikan bimbingan teknis anggota terhadap proses SBU secara periodik.',
                'kategori_id' => 18,
            ],



        ];

        DB::table('program_kerja')->insert($programKerjaData);
    }
}