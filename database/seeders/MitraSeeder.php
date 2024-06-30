<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MitraSeeder extends Seeder
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
                'nama' => 'ACP MACO',
                'logo' => '1695625291.jpg',
            ],
            [
                'nama' => 'ALCOTUF',
                'logo' => '1695625584.jpg',
            ],
            [
                'nama' => 'ALDERON',
                'logo' => '1695625603.jpg',
            ],
            [
                'nama' => 'Alkycoat',
                'logo' => '1695625631.png',
            ],
            [
                'nama' => 'Alumetalec',
                'logo' => '1695625644.jpg',
            ],
            [
                'nama' => 'BERCA CARRIER',
                'logo' => '1695625659.jpg',
            ],
        ];

        foreach ($data as $key => $value) {
            Mitra::create($value);
        }
    }
}
