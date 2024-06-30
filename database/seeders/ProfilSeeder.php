<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
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
                'prakata' => '<div>Ikatan Nasional Konsultan Indonesia (INKINDO) adalah Asosiasi Perusahaan yang
                    bergerak dibidang jasa konsultansi secara independen, serta saat ini (2023) memiliki sekitar 6252
                    anggota yang tersebar di 34 Propinsi di seluruh Indonesia. INKINDO didirikan pada tanggal 20 Juni
                    1979 sebagai fusi dari Ikatan Konsultan Indonesia (IKINDO) yang didirikan tanggal 10 Februari 1970
                    dan Persatuan Konsultan Teknik Pembangunan Indonesia (PKTPI) yang didirikan tanggal 8 Oktober 1971.
                    Dewan Pengurus Nasional (DPN) berkedudukan di Jakarta, sedangkan Dewan Pengurus Provinsi (DPP)
                    berkedudukan di masing-masing Ibukota Provinsi.
                    Untuk INKINDO Propinsi Daerah Istimewa Yogyakarta , perusahaan konsultan yang telah menjadi anggota
                    Anggota INKINDO sampai akhir tahun 2022 adalah 214 perusahaan. Dengan rincian persebaran sebagai
                    berikut :</div>',
                'deskripsi_home' => '<div>Ikatan Nasional Konsultan Indonesia (INKINDO) adalah Asosiasi Perusahaan yang
                          bergerak dibidang jasa konsultansi secara independen, serta saat ini (2023) memiliki sekitar
                          6252
                          anggota yang tersebar di 34 Propinsi di seluruh Indonesia. INKINDO didirikan pada tanggal 20
                          Juni
                          1979 sebagai fusi dari Ikatan Konsultan Indonesia (IKINDO) yang didirikan tanggal 10 Februari
                          1970
                          dan Persatuan Konsultan Teknik Pembangunan Indonesia (PKTPI) yang didirikan tanggal 8 Oktober
                          1971.
                        </div>',
                'gambar_prakata' => '1695370131.png',
                'visi' => 'Menjadikan INKINDO DKI dapat berperan di tingkat Provinsi maupun Nasional dan menjadi pelopor dalam penerapan Good Corporate Governance dan penerapan praktek usaha jasa konsultansi bebas dari korupsi.',
                'gambar_visi' => 'gambar-visi.png',
                'misi' => 'Untuk merealisasikan Visi dari inkindo DIY maka kami merancang misi kami yaitu :',
                'daftar_misi' => 'Harmonisasi, Brangga (Berwibawa), Amanah, Tawakal',
                'kode_etik' => '<p>Dengan menjunjung tinggi Etika Ikatan Nasional Konsultan Indonesia sebagai dasar yang dinamis untuk melayani sesama manusia, maka tiap Anggota Ikatan Nasional Konsultan Indonesia wajib untuk:</p>
                                <ol>
                                    <li>Menjunjung tinggi kehormatan, kemuliaan, dan nama baik profesi konsultan dalam hubungan kerja dengan pemberi tugas sesama rekan konsultan dan masyarakat.<br>&nbsp;</li>
                                    <li>Bertindak jujur, tidak memihak, serta penuh dedikasi melayani pemberi tugas dan masyarakat.<br>&nbsp;</li>
                                    <li>Tukar menukar pengetahuan bidang keahlian secara wajar dengan rekan konsultan dan kelompok profesi serta meningkatkan pengetahuan masyarakat terhadap profesi konsultan sehingga dapat lebih menghayati karya konsultan.<br>&nbsp;</li>
                                    <li>Menghormati prinsip pemberian imbalan jasa yang layak dan memadai bagi konsultan, sehingga dapat dipertanggungjawabkan secara profesional dan moral yang menjamin dapat dilaksanakannya tugas yang dipercayakan memenuhi semua persyaratan yang terkait dengan keahlian, kompetensi, dan integritas tinggi.<br>&nbsp;</li>
                                    <li>Menghargai dan menghormati reputasi profesional rekan konsultan dan setiap perjanjian kerja yang berhubungan dengan profesinya.<br>&nbsp;</li>
                                    <li>Mendapatkan tugas terutama berdasarkan standar keahlian profesional tanpa melalui cara- cara persaingan yang tidak sehat.<br>&nbsp;</li>
                                    <li>Bekerjasama sebagai konsultan hanya dengan rekan konsultan atau tenaga ahli lain yang memiliki integritas tinggi.<br>&nbsp;</li>
                                    <li>Menjalankan asas pembangunan berkelanjutan dalam semua aspek pelayanan jasa konsultan sebagai bagian integral dari tanggungjawabnya terhadap sesama, lingkungan kehidupan yang luas, dan generasi yang akan datang.</li>
                                </ol>',
                'email' => 'inkindo.yogyakarta@gmail.com',
                'alamat' => 'jl. Godean KM.5 Gg. Nogosaren Baru No.32, Banyuraden, Gamping Sleman Yogyakarta 55293',
                'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.133601052022!2d110.33218182420634!3d-7.775655227138806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5874e9c51603%3A0x60da252574438ffc!2sINKINDO%20YOGYAKARTA!5e0!3m2!1sid!2sid!4v1698213592218!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'no_hp' => '(0274) 627063 / 627151',
                'instagram' => 'inkindojogja',
                'whatsapp' => '+6282329564648',
            ],
        ];

        foreach ($data as $key => $value) {
            Profil::create($value);
        }
    }
}
