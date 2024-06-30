<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeEtikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Menjunjung tinggi kehormatan, kemuliaan, dan nama baik profesi konsultan dalam hubungan kerja dengan pemberi tugas sesama rekan konsultan dan masyarakat.',
            'Bertindak jujur, tidak memihak, serta penuh dedikasi melayani pemberi tugas dan masyarakat.',
            'Tukar menukar pengetahuan bidang keahlian secara wajar dengan rekan konsultan dan kelompok profesi serta meningkatkan pengetahuan masyarakat terhadap profesi konsultan sehingga dapat lebih menghayati karya konsultan.',
            'Menghormati prinsip pemberian imbalan jasa yang layak dan memadai bagi konsultan, sehingga dapat dipertanggungjawabkan secara profesional dan moral yang menjamin dapat dilaksanakannya tugas yang dipercayakan memenuhi semua persyaratan yang terkait dengan keahlian, kompetensi, dan integritas tinggi.',
            'Menghargai dan menghormati reputasi profesional rekan konsultan dan setiap perjanjian kerja yang berhubungan dengan profesinya.',
            'Mendapatkan tugas terutama berdasarkan standar keahlian profesional tanpa melalui cara-cara persaingan yang tidak sehat.',
            'Bekerjasama sebagai konsultan hanya dengan rekan konsultan atau tenaga ahli lain yang memiliki integritas tinggi.',
            'Menjalankan asas pembangunan berkelanjutan dalam semua aspek pelayanan jasa konsultan sebagai bagian integral dari tanggungjawabnya terhadap sesama, lingkungan kehidupan yang luas, dan generasi yang akan datang.'
        ];

        foreach ($data as $item) {
            DB::table('kode_etik')->insert([
                'poin_kode_etik' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
