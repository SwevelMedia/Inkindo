<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriHubungiKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Data = [
            [
                'nama_kategori' => 'keanggotaan'
            ],
            [
                'nama_kategori' => 'partnership'
            ],
        ];

        DB::table('kategori_hubungi_kami')->insert($Data);
    }
}
