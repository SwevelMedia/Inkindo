<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123'),
                'alamat' => 'Jl. Magelang No. 1',
                'no_hp' => '081234567890',
                'foto' => '1667378349.jpg',
                'role' => 'admin',
                'status' => 'aktif',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }

        // $usersAnggota = [
        //     [
        //         'name' => 'Gunanto, SE',
        //         'email' => 'ptarssbaru@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ayu Tika Ariyani, S.Si',
        //         'email' => 'adikawasistakonsultindo@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Dra. Hj. Endang Kusumawati',
        //         'email' => 'andalanmn@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Muhammad Wafiq',
        //         'email' => 'cv.bkrb@yahoo.co.id',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Gatot Kurniawan, S.Si., MSi',
        //         'email' => 'citra_gama_sakti@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Dwi Baru Raharjo, ST',
        //         'email' => 'citaprima@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Suryanto, MT',
        //         'email' => 'ceecjogja@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'AGUNG DWI PRAMONO, SE',
        //         'email' => 'agungdwipramono@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'A. Sukarsono, ST, M.Cs',
        //         'email' => 'marketing@diginetmedia online.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Tri Adi Ujiarto, ST',
        //         'email' => 'duatigaempatkonsultan@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Muhammad Aditya Arief Nugraha, ST',
        //         'email' => 'info@gamatechno.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Aries Dwi Wahyu Rahmadana, Ssi, Msi',
        //         'email' => 'geoartscience@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Eko Sutrisno, ST',
        //         'email' => 'info@gi.co.id',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Andi Yuniantoro, S.Si',
        //         'email' => 'sales@inixindojogja.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'ARMY MAHATIR, ST',
        //         'email' => 'armymahatir@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Dien Kartolo, ST',
        //         'email' => 'kertagana@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Dr-Ing. Ir. Widodo Brontowiyono., MSc',
        //         'email' => 'pt.karuniakons@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Tarman,ST,MT',
        //         'email' => 'ptkalaprana@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ivar Kusradi Drajat. ST., M.Eng',
        //         'email' => 'mitrasejatifazahara@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'A. Hari Prasetyo, SH',
        //         'email' => 'admin.prasetyo@prasetyo.co.id',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Pamudji Judomojo',
        //         'email' => 'proporsi.jogja@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Wagiyo, ST, MT',
        //         'email' => 'primadewakonsulind25@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. H. Djoko Sardjono Endrianto',
        //         'email' => 'pbjogja@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Deny Setya Afriyanto, SS',
        //         'email' => 'padmavennootschap@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Hari Yuwono',
        //         'email' => 'retracindo@yahoo.co.id',
        //         'password' => '123456789',
        //     ],
        //     [
        //         'name' => 'Dwi Vera Asmarayani, SE',
        //         'email' => 'srmjogja.konsultan@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Sulistyono, MT',
        //         'email' => 'trikarsabuwana@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Ir. Lucida',
        //         'email' => 'Lucida_matra@yahoo.co.id',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'KURNIAWAN ARIF NUGROHO, ST',
        //         'email' => 'tripatrakonsultan@yahoo.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'SETIONO INDRIAWAN,ST',
        //         'email' => 'tumotokarya@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'BUDDEWI SUKINDRAWATI,ST, MT',
        //         'email' => 'wikasadewa17@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        //     [
        //         'name' => 'Suharto Setiawan Agung, ST',
        //         'email' => 'wastuanopama@gmail.com',
        //         'password' => bcrypt('123456789'),
        //     ],
        // ];

        // foreach ($usersAnggota as $userData) {
        //     // Buat pengguna baru
        //     User::create([
        //         'name' => $userData['name'],
        //         'email' => $userData['email'],
        //         'password' => $userData['password'],
        //     ]);

        // }
    }
}
