<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class KategoriGallery extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
        public function run()
        {
            $kategoriData = [
                ['nama_kategori' => 'Kontruksi'],
                ['nama_kategori' => 'Non Kontruksi'],    
                 ['nama_kategori' => 'Forum'],
            ];
    
            DB::table('kategori_galleries')->insert($kategoriData);
        }
    
}
