<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananNonKonstruksi extends Seeder
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
                'jenis_layanan_non_konstruksi' => 'PENGEMBANGAN PERTANIAN dan PERDESAAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Prasarana Sosial Dan Pengembangan / Partisipasi Masyarakat</li><li>Kredit Dan Kelembagaan Pertanian </li><li>Perkebunan Dan Mekanisasi Pertanian </li><li>Pembibitan</li><li>Pengendalian Hama / Penyakit Tanaman </li><li>Peternakan</li><li> Kehutanan</li><li>Perikanan dan Kelautan</li><li>Tanaman Keras, Tanaman Pangan, dan Produk Tanaman Lain</li><li>Konservasi 
                dan Penghijauan</li><li>Sub-bidang Pengembangan Pertanian dan Perdesaan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'TRANSPORTASI',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Pengembangan Sarana Transportasi
                -Survei Asal-Tujuan
                -Peramalan Permintaan
                -Permodelan
                -Kebijakan dan Program Investasi </li><li>Legislasi/Peraturan Bidang Transportasi </li><li>Usaha Jasa Angkutan
                -Peraturan usaha jasa angkutan
                -Pengelolaan dan pengembangan organisasi usaha angkutan
                -Analisa keuangan, perhitungan harga pokok dan penetapan tarif </li><li>Penyusun Dokumen Analisis Dampak Lalu Lintas </li><li>Sub-bidang Transportasi Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'JASA SURVEY',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Survey Teristris </li><li>Penginderaan Jauh / Fotogrametri </li><li>Survey Hidrografi / Batimetri </li><li>Sistem Informasi Geografi </li><li>Survey Registrasi Kepemilikan Tanah / Kadastral </li><li>Survey Geologi dan Geofisika<br>– Interpretasi data geologi
                <br>– Interpretasi data seismik
                <br>– Interpretasi data logging
                <br>– Interpretasi data mud logging
                <br>– Interpretasi data geolistrik
                <br>– Interpretasi data gravitasi
                <br>– Pengolahan dan Penyajian data seismik</li><li>Survey Pertanian </li><li>Jasa Survey non Seismik
                <br>&nbsp;– Wireline Logging
                <br>&nbsp;– Logging while drilling (LWD)
                <br>&nbsp;– Measure while drilling (MWD) </li><li>Jasa Survey Geologi dan Geofisika (non seismik)
                <br>&nbsp;– Pemetaan Geologi Permukaan
                <br>&nbsp;– Pemetaan/Survey Geokimia
                <br>&nbsp;– 2D/3D laser scanning
                <br>&nbsp;– Off-shore &amp; On-shore Positioning<br>&nbsp;– Pemetaan/Survey Meteorologi
                <br>&nbsp;– Pemetaan/Survey Geolistrik
                <br>&nbsp;– Survey Geoteknik
                <br>&nbsp;– Survey Marine &amp; Oceanography</li></ol>',
                'klasifikasi_non_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Telematika',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Telekomunikasi Darat
                <br>&nbsp;– Sentral
                <br>&nbsp;– Transmisi
                <br>&nbsp;– Jaringan Telekomunikasi
                <br>&nbsp;– Teknologi dan Sistem Informasi
                <br>&nbsp;– Networking
                <br>&nbsp;– Sistem Pemancar dan penerima Radio dan Televisi
                <br>&nbsp;– Kontrol dan Instrumen </li><li>Telekomunikasi Satelit
                <br>&nbsp;– Sentral
                <br>&nbsp;– Transmisi
                <br>&nbsp;– Jaringan Telekomunikasi
                <br>&nbsp;– Teknologi dan Sistem Informasi Via Satelit
                <br>&nbsp;– Networking Via Satelit
                <br>&nbsp;– Sistem Pemancar dan Penerima Radio dan Televisi
                                – Kontrol dan Instrumen </li><li>Perangkat Keras
                <br>&nbsp;– Komputer
                <br>&nbsp;– Peripheral
                <br>&nbsp;– Projector Multimedia
                <br>&nbsp;– Input Devices
                <br>&nbsp;– Alat Penyimpan Data
                <br>&nbsp;– Networking Product
                <br>&nbsp;– Perangkat System Informasi Khusus </li><li>Konten
                <br>&nbsp;– Konten Distance Learning
                <br>&nbsp;– Konten Program TV Interactive
                <br>&nbsp;– Konten Program Multimedia
                <br>&nbsp;– Konten program Portal </li><li>Aplikasi / Perangkat Lunak
                <br>&nbsp;– Aplikasi Komputer
                <br>&nbsp;– Aplikasi Komunikasi
                <br>&nbsp;– Aplikasi telemetrik
                <br>&nbsp;– Aplikasi GIS
                <br>&nbsp;– Aplikasi GPS </li><li>Sub-bidang Telematika Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'PERINDUSTRIAN dan PERDAGANGAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Perindustrian
                <br>– Ekonomi Industri, Kebijakan dan Pendanaan
                <br>– Pengembangan, teknologi dan penelitian industri<br>– Efisiensi Industri
                <br>– Pengembangan Kawasan Industri
                <br>– Pengelolaan ekspor dan Perdagangan Bebas
                <br>– Industri Kecil dan Menengah </li><li>Hasil-hasil Industri, Pola Perdagangan Dan Pemasaran </li><li>Agroindustri </li><li>Industri Tekstil Dan Barang Jadi dari Tekstil </li><li>Industri Bahan Kimia </li><li>Industri Karet Dan Plastik </li><li>Industri Kulit Dan Barang Jadi dari Kulit </li><li>Industri minireal non-logam 
                </li><li>Industri logam dasar </li><li>Produk logam </li><li>Mesin dan perlengkapannya </li><li>Mesin listrik, peralatan listrik dan elektronik, dan perlengkapannya </li><li>Industri Perkapalan </li><li>Sub-bidang Perindustrian dan Perdagangan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'PERTAMBANGAN dan ENERGI',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Ekonomi Dan Konversi Energi </li><li>Minyak Dan Gas </li><li>Batubara, Lignite Dan Anthracite </li><li>Ekonomi Pemasaran dan eksplorasi mineral 
                </li><li>Teknologi mineral </li><li>Komoditi dan eksploitasi mineral </li><li>Sub-bidang Pertambangan dan Energi Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'KEUANGAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Bank Sentral Bank </li><li>Komersial Bank </li><li>Pembangunan Bank </li><li>Dagang </li><li>Pasar Uang </li><li>Manajemen Pasar Modal dan Bursa Efek </li><li>Manajemen Lembaga Keuangan Non-Bank </li><li>Pembelanjaan Sektor Pemerintah </li><li>Manajemen Keuangan Perusahaan
                 </li><li>Manajemen Investasi dan Portofolio </li><li>Pengawasan dan Regulasi Sektor Keuangan </li><li>Sub-bidang Keuangan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'PENDIDIKAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Sistem dan Evaluasi Pendidikan </li><li>Organisasi / Administrasi Sekolah </li><li>Pengembangan Kurikulum dan Metodologi Pendidikan </li><li>Bahan, Media dan Teknologi Pendidikan </li><li>Sub-bidang Pendidikan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'KESEHATAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Sistem / Organisasi Kesehatan </li><li>Pelayanan Medik, Kesehatan Kerja, Nutrisi dan </li><li>Pengembangan Tenaga Medis </li><li>Kesehatan Masyarakat dan penelitian Kesehatan </li><li>Sub-bidang Kesehatan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'KEPENDUDUKAN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Program Kependudukan dan Program Pengembangan Peran Wanita </li><li>Organisasi Program Kependudukan </li><li>Sistem Pelayanan Keluarga Berencana </li><li>Tenaga medis Pelayanan Keluarga Berencana </li><li>Penyuluhan, Pendidikan dan Komunikasi </li><li>Pemantauan, Evaluasi dan Penelitian </li><li>Sub-bidang Kependudukan Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'REKAYASA INDUSTRI',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Rekayasa Industri Transportasi </li><li>Rekayasa Industri Telekomunikasi </li><li>Rekayasa Industri Teknologi Informasi </li><li>Rekayasa Industri Mekanik </li><li>Rekayasa Industri Pengolahan </li><li>Rekayasa Industri Bioteknologi </li><li>Sub-bidang Rekayasa Lainnya</li></ol>',
                'klasifikasi_non_konstruksi_id' => 1,
            ], 
            [
                'jenis_layanan_non_konstruksi' => 'JASA STUDI, PENELITIAN & BANTUAN TEKNIK',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Studi Makro </li><li>Studi Kelayakan &amp; Studi Mikro Lainnya </li><li>Studi Perencanaan Umum </li><li>Jasa Penelitian </li><li>Jasa Bantuan Teknik </li><li>Jasa Penelitian dan Pengembangan Minyak dan Gas Bumi
                <br>– Analisis Hasil Pemboran Inti (Core Analysis)
                <br>– Analisis Fluida Reservoir (Reservoir Fluid Analysis)
                <br>– Analisis Mengenai Dampak Lingkungan (AMDAL)<br>– Upaya Pengelolaan Lingkungan/Pemantauan Lingkungan (UKL/UPL)<br>– Analisis Resiko (Risk Analysis)<br>– Studi Pengembangan Lapangan<br>– Studi Kelayakan (Feasibility Study)<br>– Perencanaan dan Bantuan Teknik (Engineering Design) diluar perencanaan Konstruksi
                <br>– Study Enhanced Oil Recovery (EOR)</li></ol>',
                'klasifikasi_non_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'JASA KONSULTANSI MANAJEMEN',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Perencanaan Sistim Akuntansi</li><li>Pelatihan dan Pengembangan SDM </li><li>Konsultasi Manajemen Fungsional </li><li>Konsultasi Hukum Bisnis</li></ol>',
                'klasifikasi_non_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'JASA KHUSUS',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Teknologi dan Sistem Informasi </li><li>Jasa Penilai / Appraisal / Valuer
                <br>– Konsultasi pengembangan properti<br>– Desain sistem informasi aset<br>– Pengelolaan properti<br>– Studi kelayakan usaha<br>– Jasa pengelolaan asset<br>– Pengawasan pembiayaan proyek. </li><li>Jasa Surveyor Independen </li><li>Jasa Sertifikasi </li><li>Jasa Inspeksi Teknik </li><li>Jasa Kehumasan</li></ol>',
                'klasifikasi_non_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Destinasi Pariwisata',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Pemberdayaan Masyarakat </li><li>Pembangunan Daya Tarik Wisata
                <br>– Pengembangan Daya Tarik Budaya, Adat Istiadat dan Peninggalan Sejarah
                <br>– Pengembangan Daya Tarik Alam<br>– Pengembangan Daya Tarik Buatan </li><li>Pembangunan Pra Sarana </li><li>Penyediaan &amp; Pembangunan Fasilitas / Sarana Pariwisata</li></ol>',
                'klasifikasi_non_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Industri Pariwisata
                SUB BIDANG',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Usaha Jasa Pengelolaan Daya Tarik Wisata </li><li>Usaha Jasa Pengelolaan Pelayanan Wisata<br>– Usaha Jasa Pengelolaan Transportasi Wisata<br>– Usaha Jasa Pengelolaan Perjalanan Wisata
                <br>&nbsp;– Usaha Jasa Pramu Wisata </li><li>Usaha Jasa Pengelolaan Kawasan Pariwisata Usaha Jasa </li><li>Pengelolaan dan Penyediaan Fasilitas Wisata
                <br>– Usaha Jasa Pengelolaan dan Penyediaan Akomodasi Wisata<br>– Usaha Jasa Pengelolaan dan Penyediaan Kegiatan Hiburan &amp; Rekreasi<br>– Usaha Jasa Pengelolaan dan Penyediaan Makanan dan Minuman<br>– Usaha Jasa Penyedia dan Pengelolaan Spa </li><li>Usaha Jasa Pengelolaan dan Penyelenggaraan Pertemuan, Perjalanan Insentif, Konferensi dan Pameran (MICE) </li><li>Usaha Jasa Pengelolaan dan Pelayanan Informasi</li><li>Usaha Jasa Pengelolaan Wisata Tirta</li></ol>',
                'klasifikasi_non_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Pemasaran Pariwisata',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Konsultansi Pemasaran Pariwisata</li></ol>',
                'klasifikasi_non_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Kelembagaan Kepariwisataan',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Pengembangan Sumber Daya Manusia</li><li>Pengembangan Pranata Kelembagaan Organisasi
                </li></ol>
                ',
                'klasifikasi_non_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Penelitian Kepariwisataan',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Survey dan Investigasi </li><li>Jasa Studi &amp; Analisa Sosial, Kultural dan Aspek Legal</li><li>Jasa Studi &amp; Analisa Lingkungan </li><li>Jasa Studi &amp; Analisa Keekonomian </li><li>Jasa Penilaian (Apprisal)</li></ol>',
                'klasifikasi_non_konstruksi_id' => 4,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Perencanaan Kepariwisataan',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Perencanaan Umum &amp; Konsultansi Pembangunan / Pengembangan </li><li>Jasa Rancang Bangun dan Bantuan Teknik </li><li>Jasa Perencanaan Sistem Akuntansi dan Keuangan </li><li>Jasa Perencanaan Informasi Teknologi</li></ol>',
                'klasifikasi_non_konstruksi_id' => 4,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Studi Kelayakan Kepariwisataan',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Konsultansi Studi Kelayakan Kepariwisataan</li></ol>',
                'klasifikasi_non_konstruksi_id' => 4,
            ],
            [
                'jenis_layanan_non_konstruksi' => 'Jasa Konsultansi Pengelolaan Kepariwisataan',
                'deskripsi_layanan_non_konstruksi' => '<ol><li>Jasa Konsultansi Manajemen Fungsional &amp; Pemeliharaan </li><li>Jasa Konsultansi Manajemen Keuangan &amp; Akuntansi </li><li>Jasa Monitoring, Supervisi &amp; Evaluasi</li></ol>',
                'klasifikasi_non_konstruksi_id' => 4,
            ],
        ];

        DB::table('layanan_non_konstruksis')->insert($kategoriData);
    }
}
