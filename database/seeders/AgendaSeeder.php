<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
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
                'kegiatan' => 'Memasak',
            ],

            [
                'kegiatan' => 'mancing',
            ],

            [
                'kegiatan' => 'turu',
            ]
        ];

        foreach ($data as $key => $value) {
            Agenda::create($value);
        }
    }
}
