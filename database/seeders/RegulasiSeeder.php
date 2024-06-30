<?php

namespace Database\Seeders;

use App\Models\Regulasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegulasiSeeder extends Seeder
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
                'nama_regulasi' => 'dummy 1',
                'regulasi' => 'dummy regulasi',
                'kategori_id' => 1,
            ],
            [
                'nama_regulasi' => 'dummy 2',
                'regulasi' => 'dummy regulasi 2',
                'kategori_id' => 2,
            ],
        ];

        foreach ($data as $key => $value) {
            Regulasi::create($value);
        }
    }
}
