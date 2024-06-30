<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FaqSeeder extends Seeder
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
                'pertanyaan' => 'Jam Operasional Inkindo Yogyakarta',
                'jawaban' => 'Inkindo Yogyakarta beroperasi setiap hari dengan jam kerja mulai pukul 8 pagi hingga 4 sore. Kami siap membantu Anda selama jam operasional tersebut untuk memenuhi kebutuhan dan pertanyaan Anda',
                'faq_kategori_id' => 1,
            ],
            [
                'pertanyaan' => 'Dimana Lokasi Inkindo Yogyakarta',
                'jawaban' => 'Kantor Inkindo Yogyakarta terletak di Jl. Godean KM. 5 Gg. Nogosaren Baru No. 32, Banyuraden, Gamping, Sleman, Yogyakarta 55293. Lokasi strategis ini memudahkan akses bagi masyarakat untuk mendapatkan layanan Inkindo. Jangan ragu untuk mengunjungi kami selama jam operasional pukul 8 pagi hingga 4 sore, Senin hingga Jumat.',
                'faq_kategori_id' => 1,
            ],
        ];

        DB::table('faqs')->insert($kategoriData);
    }
}
