<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prakata;

class PrakataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prakata::create([
            'nama_prakata' => 'Ir. Dwiaryo Dyatmiko, MSi',
            'jabatan' => 'Ketua Dewan Pengurus Inkindo D.I Yogyakarta',
            'foto_prakata' => 'DWIARYO DYATMIKO.png',
            'sambutan' => 'Saya dengan bangga mempersembahkan website ini kepada Anda, anggota kami, dan masyarakat Daerah Jogja. Sebagai Ketua DPP INKINDO di wilayah ini, 
            saya merasa terhormat dapat berada di barisan terdepan dalam mendukung industri konsultansi yang berkembang pesat di Daerah Jogja.
            Daerah Jogja memiliki potensi luar biasa dengan lima kabupaten yang beragam. Kami, sebagai cabang INKINDO di sini, berkomitmen untuk memfasilitasi kolaborasi,
             pertukaran pengetahuan, dan dukungan bagi para profesional konsultan di wilayah ini. Melalui website ini, kami ingin memudahkan akses Anda kepada informasi terbaru, berita, dan sumber daya yang relevan.
            Saya mengundang Anda untuk aktif berpartisipasi dalam kegiatan kami dan bersama-sama membangun masa depan yang lebih cerah untuk industri konsultansi di Daerah Jogja. 
            Terima kasih atas dukungan dan kepercayaan Anda kepada INKINDO Yogyakarta.
            '
        ]);
    }
}
