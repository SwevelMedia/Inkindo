<?php

namespace Database\Seeders;

use App\Models\RegulasiKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegulasiKategoriSeeder extends Seeder
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
                'nama' => 'Surat Edaran',            
            ],
            [
                'nama' => 'Surat Keputusan',            
            ],
            [
                'nama' => 'Undang-Undang',         
            ],
            [
                'nama' => 'Peraturan',           
            ],
        ];

        foreach ($data as $key => $value) {
            RegulasiKategori::create($value);
        }
    }
}
