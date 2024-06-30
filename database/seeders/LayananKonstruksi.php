<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananKonstruksi extends Seeder
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
                'jenis_layanan_konstruksi' => 'Jasa Nasehat dan Pra Desain Arsitektural',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi, nasehat, dan rekomendasi mengenai arsitektural dan hal-hal yang terkait dengan arsitektural. Termasuk didalamnya melaksanakan kajian pendahuluan tentang isu- isu seperti site philosopi, tujuan dari pembangunan, tinjauan lingkungan dan iklim, kebutuhan hunian, batasan biaya, analisa pemilihan lokasi, penjadwalan pelaksanaan konstruksi, dan isu lain yang mempengaruhi desain dan konstruksi dari suatu proyek. Jasa ini meliputi tidak hanya proyek konstruksi yang baru namun dapat meliputi nasihat mengenai metode dalam melaksanakan perawatan, renovasi, restorasi, atau recycling dari bangunan, atau penentuan nilai dan kualitas dari bangunan atau nasihat arsitektural lainnya.',
                'klasifikasi_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Arsitektural',

                'deskripsi_layanan_konstruksi' => '<p>Jasa desain arsitektural untuk bangunan dan struktur lainnya, dapat meliputi satu atau kombinasi dari kegiatan sebagai berikut:
                </p><ol><li>Jasa desain skematik yang meliputi penentuan (bersama dengan klien) batasan anggaran dan penjadwalan waktu; serta menyiapkan sketsa yang     meliputi floor plans, site plans, dan exterior views;
                </li><li>Jasa desain pembangunan yang meliputi ilustrasi presisi dari konsep desain dalam hal siting plan, bentuk dan material yang akan digunakan, struktur, sistem mekanikal dan elektrikal, dan kemungkinan biaya konstruksi; dan&nbsp;</li><li> 
                Jasa desain akhir yang meliputi spesifikasi tertulis dan gambar yang cocok untuk digunakan sebagai detail dari pelaksanaan tender dan konstruksi, dan juga nasihat ahli kepada klien pada saat evaluasi tender.</li></ol>',
                'klasifikasi_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Penilai Perawatan dan Kelayakan Bangunan Gedung',
                'deskripsi_layanan_konstruksi' => '<p>Jasa penelitian, nasehat dan rekomendasi yang berkaitan dengan masalah arsitektural dan hal berikut:</p><ol><li><span style="color: inherit; font-size: 1rem;">cara untuk melaksanakan pemeliharaan bangunan, renovasi gedung, dan jasa restorasi bangunan gedung; </span></li><li><span style="color: inherit; font-size: 1rem;">penilaian kelayakan bangunan gedung termasuk juga didalamnya bangunan yang terkena musibah kebakaran; </span></li><li><span style="color: inherit; font-size: 1rem;">tata cara penilaian usia bangunan; dan </span></li><li><span style="color: inherit; font-size: 1rem;">tata cara pembongkaran (demolisi) bangunan gedung Tidak berkaitan dengan proyek konstruksi baru dan penambahan bangunan baru.</span></li></ol>',
                'klasifikasi_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Interior',
                'deskripsi_layanan_konstruksi' => '<ol><li>Jasa desain interior seperti perencanaan dan perancangan ruangan interior untuk kebutuhan fisik, estetik dan fungsi; </li><li>Penggambaran desain untuk dekorasi interior; dan </li><li>Dekorasi interior termasuk penyempurnaan jendela dan gudang.</li></ol>',
                'klasifikasi_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Arsitektur lainnya',
                'deskripsi_layanan_konstruksi' => 'Semua jasa yang membutuhkan keahlian arsitek seperti penyiapan promotional material dan presentasi, serta as built drawings. Termasuk juga sebagai representasi lapangan saat fase konstruksi, pembuatan manual operasi dan lain sebagainya.',
                'klasifikasi_konstruksi_id' => 1,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Nasehat dan Konsultansi Rekayasa Teknik',
                'deskripsi_layanan_konstruksi' => '<p>Rekomendasi, nasihat dan asistensi mengenai rekayasa teknik, termasuk didalamnya melaksanakan studi kelayakan dan dampak dari proyek contohnya antara lain: </p><ol><li>studi dampak topografi dan geologi dalam desain, konstruksi dan biaya dari jalan, saluran pipa dan infrastruktur transportasi lainnya; </li><li>Studi dari kualitas atau kecocokan material yang akan digunakan dalam proyek konstruksi dan dampaknya dalam desain, serta konstruksi dan biaya jika menggunakan material yang berbeda; </li><li>Studi dampak lingkungan dari proyek konstruksi</li><li>Studi keuntungan efesiensi produksi sebagai dampak dari penggunaan alternative proses, teknologi dan lay out. </li><li>Ruang lingkup dari jasa ini tidak selalu terkait dengan proyek konstruksi namun dapat juga meliputi penilaian dari struktur bangunan dan instalasi mekanikal dan elektrikal, testimoni ahli dalam kasus litigation serta memberikan asistensi kepada pemerintah dalam penyusunan peraturan perundangan.</li></ol>',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa untuk Konstruksi Pondasi serta Struktur Bangunan',
                'deskripsi_layanan_konstruksi' => '<p>Jasa desain rekayasa struktur untuk the load bearing framework dari bangunan perumahan dan komersial, bangunan institusi dan industrial. Jasa desain ini meliputi satu atau kombinasi dari kegiatan berikut: </p><ol><li>Estimasi biaya, spesifikasi dan rencana pendahuluan untuk mendefinisikan konsep desain teknik</li><li>Rencana akhir, spesifikasi dan estimasi biaya termasuk didalamnya gambar kerja, spesifikasi material yang digunakan, metode instalasi, batasan waktu dan spesifikasi yang dibutuhkan untuk keperluan tender dan konstruksi serta nasihat ahli untuk klient pada saat evaluasi dan penerimaan tender</li><li>Jasa yang diberikan pada saat fase konstruksi.</li></ol>',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Air',
                'deskripsi_layanan_konstruksi' => 'Jasa pembuatan desain rekayasa (engineering) untuk pekerjaan rekayasa sipil keairan seperti dam, catchment basins, sistem irigasi, pekerjaan pengendalian banjir, pelabuhan, pekerjaan penyaluran air dan sanitasi serta sistem saluran air limbah industri. Jasa Desain meliputi salah satu dari kombinasi layanan berikut: perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis; perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender; layanan pada saat fase konstruksi.',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Transportasi',
                'deskripsi_layanan_konstruksi' => 'Jasa pembuatan desain rekayasa (engineering) untuk pekerjaan rekayasa sipil transportasi seperti jembatan, jalan layang, dan jalan raya. Jasa Desain meliputi salah satu dari kombinasi layanan berikut: perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis, perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender layanan pada saat fase konstruksi. Termasuk didalamnya jasa pembuatan desain structural health monitoring system untuk bentang jembatan.',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa untuk Pekerjaan Mekanikal dan Elektrikal Dalam Bangunan',
                'deskripsi_layanan_konstruksi' => 'Jasa pembuatan desain rekayasa (engineering) mekanikal dan elektrikal untuk system energi, sistem penerangan, sistem alarm kebakaran, sistem komunikasi dan sistem eletrikal lainnya untuk semua jenis bangunan dan atau sistem pemanas ruangan, ventilasi, pendingin ruangan lemari pendingin dan pemasangan mekanikal lainnya untuk semua jenis bangunan. Jasa Desain meliputi salah satu dari kombinasi layanan berikut : perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis; perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender layanan pada saat fase konstruksi.',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa untuk Proses Industrial dan Produksi',
                'deskripsi_layanan_konstruksi' => '<p>Jasa desain teknik untuk proses produksi, prosedur dan fasilitas produksi. Termasuk didalamnya jasa desain yang berkaitan dengan produksi metode pemotongan, handling dan transportasi logistik dan lay out lokasi antara lain lay out pembangunan pertambangan dan dan konstruksi bawah tanah, gabungan pelaksanaan sipil, instalasi mekanikal dan elektrikal lokasi pertambangan bawah tanah termasuk didalamnya hoists, kompresor, stasiun pompa, crushers, conveyor dan sistem handling limbah, prosedur recovery dari minyak dan gas, konstruksi, instalasi dan perawatan dari peralatan pengeboran, fasilitas penyimpanan. Jasa desain meliputi satu atau kombinasi dari beberapa kegiatan antara lain: </p><ol><li>Estimasi biaya, spesifikasi dan rencana pendahuluan untuk mendefinisikan konsep desain teknik</li><li>Rencana akhir, spesifikasi dan estimasi biaya termasuk didalamnya gambar kerja, spesifikasi material yang digunakan, metode instalasi, batasan waktu dan spesifikasi 
                yang dibutuhkan untuk keperluan tender dan konstruksi serta nasihat ahli untuk klien pada
                 saat evaluasi dan penerimaan tender</li><li>Jasa yang diberikan pada saat fase konstruksi.</li></ol>',
                'klasifikasi_konstruksi_id' => 2,
            ], 
            [
                'jenis_layanan_konstruksi' => 'Jasa Nasehat dan Konsultansi Jasa Rekayasa Konstruksi',
                'deskripsi_layanan_konstruksi' => 'Jasa konsultansi di bidang jasa konstruksi yang meliputi jasa nasihat dalam pembinaan usaha dan kelembagaan, pembinaan penyelenggaraan dan pembinaan investasi konstruksi serta pembinaan kompetensi dan keahlian Tenaga Kerja Konstruksi oleh Pemerintah baik Pemerintah Pusat maupun Pemerintah Daerah. Termasuk jasa penelitian dan pengembangan bidang konstruksi.',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Desain Rekayasa Lainnya',
                'deskripsi_layanan_konstruksi' => 'Jasa desain rekayasa khusus lainnya. Termasuk desain rekayasa akustik dan vibrasi, sistem pengendalian lalu-lintas, pengembangan prototype dan desain detail dari produk baru serta jasa desain rekayasa khusus lainnya.',
                'klasifikasi_konstruksi_id' => 2,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Perencanaan dan Perancangan Perkotaan',
                'deskripsi_layanan_konstruksi' => 'Jasa perencanaan tata ruang (mencakup darat, laut, udara, dan di dalam bumi) perkotaan,jasa perancangan bagian perkotaan, termasuk juga jasa pengkajian dan jasa penasehatan dalam penataan ruang perkotaan.',
                'klasifikasi_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Perencanaan Wilayah',
                'deskripsi_layanan_konstruksi' => 'Jasa perencanaan tata ruang (mencakup darat, laut, udara, dan di dalam bumi) wilayah nasional, pulau, provinsi, kabupaten, dan kota, termasuk juga jasa pengkajian dan jasa penasehatan dalam penataan ruang wilayah yang didalamnya dapat meliputi kawasan koridor pulau, kawasan strategis nasional/provinsi/kabupaten/kota, kawasan andalan dan kawasan permukiman termasuk ruang terbuka publik/terbuka hijau.',
                'klasifikasi_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Perencanaan dan Perancangan lingkungan bangunan dan lansekap',
                'deskripsi_layanan_konstruksi' => 'Jasa pembuatan desain dan rencana dari aesthetic landscaping untuk taman, lahan komersial dan permukiman. Meliputi penyiapan rencana lapangan, gambar kerja,spesifikasi dan estimasi biaya untuk pengembangan lahan yang menggambar kan kontur tanah, tanaman yang akan ditanam, dan fasilitas lain seperti tempat pejalan kaki, pagar,dan area parkir. Termasuk juga didalamnya jasa inspeksi dari pekerjaan selama konstruksi,jasa pengkajian dan penasehatan penataan lingkungan bangunan dan lansekap.',
                'klasifikasi_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengembangan Pemanfaatan Ruang',
                'deskripsi_layanan_konstruksi' => 'Jasa perumusan kebijakan strategis operasional rencana tata ruang (mencakup darat,laut, udara, dan di dalam bumi), jasa pemrograman pemanfaatan ruang perkotaan, wilayah, kawasan/ lingkungan, termasuk juga jasa manajemen mitigasi dan adaptasi bencana dan kerusakan lingkungan, fasilitasi kemitraan dan pelembagaan dalam penyelenggaraan penataan ruang.',
                'klasifikasi_konstruksi_id' => 3,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas Administrasi Kontrak',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi teknis dan nasihat selama fase konstruksi 
                untuk memastikan struktur terbangun sama dengan gambar teknis final beserta spesifikasinya. Jasa ini meliputi jasa yang disediakan baik di kantor maupun di lapangan seperti inspeksi teknis konstruksi, penyiapan laporan kemajuan, penerbitan sertifikat untuk pembayaran ke penyedia jasa pelaksana konstruksi, memberikan panduan kepada penyedia jasa dan/atau pengguna jasa dalam hal interpretasi terhadap dokumen kontrak dan jasa nasihat lain dalam aspek teknikal selama proses konstruksi.Termasuk didalamnya juga jasa yang diberikan setelah selesainya proses konstruksi yang meliputi penilaian pada konstruksi dan instruksi mengenai koreksi pengukuran yang harus dilakukan selama periode 12 bulan setelah selesainya proses konstruksi.',
                'klasifikasi_konstruksi_id' => 4,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi bangunan gedung untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain. Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik ke lapangan untuk mengukur progress dan kualitas pekerjaan, memberikan panduan kepada klien dan penyedia jasa pelaksana konstruksi dalam menginterpretasikan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi bangunan gedung.',
                'klasifikasi_konstruksi_id' => 5,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Transportasi',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi infrastruktur sipil transportasi seperti jalan raya, jembatan, jalan bebas hambatan dan sebagainya untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain. Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik ke lapangan untuk mengukur progress dan kualitas pekerjaan, memberikan panduan kepada klien dan kontraktor dalam menginterpretasi kan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi infrastruktur sipil transportasi.',
                'klasifikasi_konstruksi_id' => 5,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Air',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi infrastruktur sipil keairan seperti dam, catchment basins, sistem irigasi, pekerjaan pengendalian banjir, pelabuhan, pekerjaan penyaluran air dan sanitasi serta sistem saluran air limbah industri, untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain . Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik kelapangan untuk mengukur progres dan kualitas pekerjaan, memberikan panduan kepada klient dan kontraktor dalam menginterpretasikan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi infrastruktur sipil keairan.',
                'klasifikasi_konstruksi_id' => 5,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas Pekerjaan Konstruksi dan Instalasi Proses dan Fasilitas Industri',
                'deskripsi_layanan_konstruksi' => 'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi dan instalasi proses dan fasilitas industri untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain, meliputi kunjungan secara periodik ke lapangan untuk mengukur progres dan kualitas pekerjaan.',
                'klasifikasi_konstruksi_id' => 5,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengawas dan Pengendali Penataan Ruang',
                'deskripsi_layanan_konstruksi' => 'Jasa pengawasan teknis penyelenggaraan penataan ruang, jasa audit pemanfaatan ruang,dan pengaturan zonasi, termasuk juga jasa pengkajian dan penasehatan dalam pengawasan dan pengendalian penataan ruang.',
                'klasifikasi_konstruksi_id' => 6,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pembuatan Prospektus Geologi dan Geofisika',
                'deskripsi_layanan_konstruksi' => 'Jasa konsultansi geologi, geofisika dan geo kimia yang berhubungan dengan kandungan mineral, minyak dan gas serta air bawah tanah dengan melakukan studi parameter terhadap bumi dan formasi batu dan struktur.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Survey bawah Tanah',
                'deskripsi_layanan_konstruksi' => 'Jasa pengambilan data pada formasi dibawah permukaan bumi dengan metode lainnya termasuk didalamnya pengukuran seismograf, gravimeter, magnetometer, dan metode survey bawah permukaan lainnya.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Survey Permukaan Tanah',
                'deskripsi_layanan_konstruksi' => 'Jasa pengambilan informasi dari bentuk posisi dan/atau lapisan dari permukaan bumi dengan menggunakan metode lain, termasuk transit, fotogrametri dan survey hydrografi untuk tujuan persiapan pembuatan peta.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pembuatan Peta',
                'deskripsi_layanan_konstruksi' => 'Terdiri dari perisapan dan revisi dari segala jenis peta (jalan, cadastral, topografi, dan planimeter).',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengujian dan Analisa Komposisi dan Tingkat kemurnian',
                'deskripsi_layanan_konstruksi' => 'Jasa pengujian dan analisa dari parameter kimia dan biologi material seperti udara, air, dan limbah (limbah rumah tangga dan industri), minyak, metal, mineral dan zat kimia. Termasuk didalamnya jasa pengujian dan analisa yang berhubungan dengan mikrobiologi, biokimiawi, bakteriologi, dan sebagainya.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengujian dan Analisa Parameter fisikal',
                'deskripsi_layanan_konstruksi' => 'Jasa pengujian dan analisa parameter fisikal seperti kekuatan, keringkihan, konduktivitas elektriksitas dan radioaktivitas dari material seperti metal, plastik, tekstil, kayu,kaca, beton, dan material lainnya. Termasuk didalamnya pengujian daya tarik, kekerasan, impact resistance, ketahanan fatique, serta efek temperatur tinggi.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Pengujian dan Analisa Sistem Mekanikal dan Elektrikal',
                'deskripsi_layanan_konstruksi' => 'Jasa Pengujian dan analisa dari karakteristik permesinan lengkap, motor, mobil, peralatan dan penerapan, peralatan komunikasi, dan peralatan lainnya yang berhubungan dengan mekanikal dan elektrikal.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Inspeksi Teknikal',
                'deskripsi_layanan_konstruksi' => 'Jasa Pengujian dan Analisa dari teknikal yang tidak mempengaruhi objek yang dilakukan pengujian, Termasuk didalamnya radiografi, magnetic, dan pengujian ultrasonic dari komponen mesin dan struktur yang dilakukan untuk mengidentifikasi cacat produk. Pengujian ini dilakukan langsung di lapangan.',
                'klasifikasi_konstruksi_id' => 7,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Konsultansi Lingkungan',
                'deskripsi_layanan_konstruksi' => 'Jasa konsultansi yang mencakup kegiatan pengolahan air bersih, penyehatan lingkungan permukiman, serta nasihat pengelolaan persampahan.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Konsultansi Estimasi Nilai Lahan dan Bangunan',
                'deskripsi_layanan_konstruksi' => 'Jasa konsultansi yang dengan metode tertentu melakukan estimasi terhadap nilai dari suatu lahan dan/atau bangunan (baik bangunan gedung maupun bangunan sipil). Termasuk didalamnya memberikan rekomendasi perencanaan pembebasan lahan untuk proyek konstruksi.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Bangunan',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang sipil bangunan gedung antara bangunan hunian, dan bangunan bukan hubian seperti bangunan industri, pertanian dan komersial, dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Teknik Sipil Transportasi',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang sipil transportasi antara lain jalan bebas hambatan, jalan raya, jalan, jalan kereta api, landasan pacu pesawat, jembatan, jalan layang, terowongan dan jalan bawah tanah, dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Teknik Sipil Keairan',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang sipil keairan antara lain pelabuhan, saluran air, bendungan, irigasi dan pekerjaan air lainnya dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' =>8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Teknik Sipil Lainnya',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang sipil lainnya antara lain pemipaan, kabel komunikasi dan listrik, jarak jauh, pemipaan lokal dan kabel dan pekerjaan yang terkait olahraga outdoor dan fasilitas rekreasi dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan konstruksi proses dan fasilitas industrial',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang konstruksi industri dan proses antara lain pertambangan, konstruksi pembangkit tenaga listrik, kimia dan fasilitas terkait, konstruksi untuk manufaktur, dan otomasi proses industri dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk di dalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Sistem Kendali Lalu Lintas',
                'deskripsi_layanan_konstruksi' => 'Jasa konstruksi menyeluruh di bidang sistem kontrol lalu lintas antara lain sistem kontrol lalu lintas untuk transportasi darat, udara dan laut dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                'klasifikasi_konstruksi_id' => 8,
            ],
            [
                'jenis_layanan_konstruksi' => 'Jasa Rekayasa (Engineering) Terpadu',
                'deskripsi_layanan_konstruksi' => '<p>Jasa enjiniring terpadu untuk pembangunan proyek-proyek konstruksi dengan layanan yang diberikan secara terpadu meliputi: </p><ol><li>perencanaan dan studi pra-investasi</li><li>pembuatan desain awal dan desain final</li><li>pembuatan estimasi biaya dan jadwal pelaksanaan proyek</li><li>pelaksanaan inspeksi dan penerimaan pekerjaaan sesuai kontrak</li><li>pelayanan teknis,
                 seperti pemilihan dan pelatihan personil dan penyediaan operasi serta pemeliharaan manual beserta jasa-jasa teknik lain yang diberikan kepada klien.</li></ol><p><span style="color: inherit; font-size: 1rem;">Layanan enjiniring terpadu dapat diberikan untuk seluruh pekerjaan berikut :</span></p><ol><li><span style="color: inherit; font-size: 1rem;">Jalan bebas hambatan (highways), jalan raya (streets), jalan (roads),
                  jalan kereta api, landas pacu pesawat;</span><br></li><li>Jembatan, jalan layang, terowongan dan jalan bawah tanah</li><li>Pelabuhan, saluran air, bendungan, irigasi dan pekerjaan air lainnya</li><li>Pemipaan, kabel komunikasi dan jalur tenaga (power lines) jarak jauh</li><li>Pemipaan lokal dan kabel dan pekerjaan yang terkait</li><li>Fasilitas olah raga outdoor dan fasilitas rekreasi</li><li>Konstruksi bangunan hunian dan 
                  bangunan bukan hunian seperti bangunan industri, komersial atau pertanian</li><li>Industrial plant dan proses serta manufaktur</li><li>Konstruksi pembangkit tenaga (power plant)</li><li>Bangunan modifikasi dari bangunan diatas.</li></ol>',
                'klasifikasi_konstruksi_id' => 8,
            ],
        ];

        DB::table('layanan_konstruksis')->insert($kategoriData);
    }
}