<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggotas = [
            [
                'perusahaan' => 'PT.ARS BARU',
                'penanggung_jawab' => 'Gunanto, SE',
                'alamat' => 'Jl. Mangkuyudan No.21 Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '4284115',
                'no_hp' => '085228033382',
            ],
            [
                'perusahaan' => 'PT. ADIKA WASISTA KONSULTINDO',
                'penanggung_jawab' => 'Ayu Tika Ariyani, S.Si',
                'alamat' => 'Ruko Royal Maguwo Blok R-1 Kadirojo II RT.7 RW.2 Purwomartani Kalasan Sleman 55571',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '081215621592',
                'no_hp' => '081215621592',
            ],
            [
                'perusahaan' => 'PT.ANDALAN MITRA NUSANTARA',
                'penanggung_jawab' => 'Dra. Hj. Endang Kusumawati',
                'alamat' => 'Puri Gejayan Indah Blok C-1A Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '518806-518993-7477334',
                'no_hp' => '085292297525',
            ],
            [
                'perusahaan' => 'CV.BHANGUN KHARSA RAHARJA',
                'penanggung_jawab' => 'Ir. Muhammad Wafiq',
                'alamat' => 'Bangmalang RT.06 Cepit Pendowoharjo Sewon Bantul',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '581436-515015',
                'no_hp' => '08124914151',
            ],
            [
                'perusahaan' => 'PT.CITRA GAMA SAKTI',
                'penanggung_jawab' => 'Gatot Kurniawan, S.Si., MSi',
                'alamat' => 'Jl. Gejayan No.76 Deresan, Sleman 55281',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '4531432',
                'no_hp' => '085659700753',
            ],
            [
                'perusahaan' => 'CV.CITA PRIMA',
                'penanggung_jawab' => 'Dwi Baru Raharjo, ST',
                'alamat' => 'Mergangsan Kidul MG II/1374 Wirogunan Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '374804',
                'no_hp' => '08121562972',
            ],
            [
                'perusahaan' => 'PT.CIPTA EKAPURNA ENG. CONS',
                'penanggung_jawab' => 'Ir. Suryanto, MT',
                'alamat' => 'Perum Griya Arga Permai Blok HH No.1 Kwarasan Slm',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '618005-618209-632073-618',
                'no_hp' => '08122788831',
            ],
            [
                'perusahaan' => 'PT.CITRA BINTANG MATARAM',
                'penanggung_jawab' => 'AGUNG DWI PRAMONO, SE',
                'alamat' => 'JL. KADISOKA RT.4 RW.35 BANJENG MAGUWOHARJO DEPOK SLEMAN',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '',
                'no_hp' => '081283972588',
            ],
            [
                'perusahaan' => 'CV.DIGINET MEDIA',
                'penanggung_jawab' => 'A. Sukarsono, ST, M.Cs',
                'alamat' => 'Ringroad Utara Mraen No.108 RT.04 RW.10 Sendangadi Mlati Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '623404-623515',
                'no_hp' => '081392390000',
            ],
            [
                'perusahaan' => 'PT.DUA TIGA EMPAT CONSULTANT',
                'penanggung_jawab' => 'Tri Adi Ujiarto, ST',
                'alamat' => 'Jl. Pajajaran Gandok No.234 RT.002 RW.055 Condongcatur Depok Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '520907-583783',
                'no_hp' => '08114719900',
            ],
            [
                'perusahaan' => 'PT.GAMA TECHNO INDONESIA',
                'penanggung_jawab' => 'Muhammad Aditya Arief Nugraha, ST',
                'alamat' => 'Jl. Cik Di Tiro 34 Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '566161-566160-560267',
                'no_hp' => '089608243464',
            ],
            [
                'perusahaan' => 'CV.GEO ART SCIENCE',
                'penanggung_jawab' => 'Aries Dwi Wahyu Rahmadana, Ssi, Msi',
                'alamat' => 'Perum Taman Pesona Asri Kav.17 No.A11 Dusun Ngebo Sukoharjo Ngaglik Sleman 55581',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '',
                'no_hp' => '085231596174',
            ],
            [
                'perusahaan' => 'CV.GLOBAL INTERMEDIA',
                'penanggung_jawab' => 'Eko Sutrisno, ST',
                'alamat' => 'Jl. Taman Siswa No. 125 Yogyakarta 55151',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '379492-7104343',
                'no_hp' => '08121561131',
            ],
            [
                'perusahaan' => 'PT.INIXINDO WIDYA ISWARA NUSANTARA',
                'penanggung_jawab' => 'Andi Yuniantoro, S.Si',
                'alamat' => 'Jl. Kenari No.69 Mujamuju Umbulharjo Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '515448-540967',
                'no_hp' => '083840753115',
            ],
            [
                'perusahaan' => 'PT.JAGAT INDO GEMILANG',
                'penanggung_jawab' => 'ARMY MAHATIR, ST',
                'alamat' => 'JL. KADISOKA RT.04 RW.035 BANJENG MAGUWOHARJO, DEPOK, SLEMAN',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '',
                'no_hp' => '081325731175',
            ],
            [
                'perusahaan' => 'PT.KERTA GANA',
                'penanggung_jawab' => 'Dien Kartolo, ST',
                'alamat' => 'Danunegaran MJ 3/1038 Mantrijeron Yogyakarta 55143',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '',
                'no_hp' => '08117570111',
            ],
            [
                'perusahaan' => 'PT.KARUNIA SEJAHTERA KONSULTAN',
                'penanggung_jawab' => 'Dr-Ing. Ir. Widodo Brontowiyono., MSc',
                'alamat' => 'Nitiprayan DK VII Jomegatan RT.03 RW.20 Ngestiharjo Kasihan Bantul',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '414539-381604',
                'no_hp' => '081225632843',
            ],
            [
                'perusahaan' => 'PT.KALA PRANA KONSULTAN',
                'penanggung_jawab' => 'Tarman,ST,MT',
                'alamat' => 'Wonocatur KD IV RT 01 RW 23 No. 250 Banguntapan',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '412563',
                'no_hp' => '0818265011',
            ],
            [
                'perusahaan' => 'CV. MITRA SEJATI FAZAHARA',
                'penanggung_jawab' => 'Ivar Kusradi Drajat. ST., M.Eng',
                'alamat' => 'JL. Indraprasta No. 8A Pringgolayan Dabag RT/RW. 001/026. Condongcatur Depok Sleman 55283',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '081328206962',
                'no_hp' => '081328206962',
            ],
            [
                'perusahaan' => 'CV. PRASETYO',
                'penanggung_jawab' => 'A. Hari Prasetyo, SH',
                'alamat' => 'Perum Gradara Pratama Residence Kav.D RT.22 RW.06 Tegalrejo Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '620319',
                'no_hp' => '0811-2652-989',
            ],
            [
                'perusahaan' => 'PT.PROPORSI',
                'penanggung_jawab' => 'Ir. Pamudji Judomojo',
                'alamat' => 'Jl. Pakuningratan No. 76 Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '518068-561239',
                'no_hp' => '0811254018',
            ],
            [
                'perusahaan' => 'CV. PRIMA DEWA KONSULINDO',
                'penanggung_jawab' => 'Wagiyo, ST, MT',
                'alamat' => 'JL. NGGANGIN PERUM TIRTAMAS NO.3C Lantai 2 TAMANTIRTO KASIHAN BANTUL',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '',
                'no_hp' => '087839979704',
            ],
            [
                'perusahaan' => 'PT.PUSER BUMI MEKON',
                'penanggung_jawab' => 'Ir. H. Djoko Sardjono Endrianto',
                'alamat' => 'Jl. HOS Cokroaminoto No. 15 Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '618005-618209-618110',
                'no_hp' => '0811283683',
            ],
            [
                'perusahaan' => 'CV. PADMA',
                'penanggung_jawab' => 'Deny Setya Afriyanto, SS',
                'alamat' => 'Jl. Lele I No.5 Perum Minomartani RT.28 RW.006 Ngaglik Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '081226015066',
                'no_hp' => '081225098984',
            ],
            [
                'perusahaan' => 'PT.RETRACINDO KONSULTAN INDONESIA',
                'penanggung_jawab' => 'Ir. Hari Yuwono',
                'alamat' => 'Jl. Kadisoka Banjeng RT.004 RW.035 Maguwoharjo Depok Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '',
                'no_hp' => '081215777444',
            ],
            [
                'perusahaan' => 'CV.SARANA REKA MANDIRI',
                'penanggung_jawab' => 'Dwi Vera Asmarayani, SE',
                'alamat' => 'Bodeh RT.008 RW.026 Ambarketawang Gamping Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '',
                'no_hp' => '0816688206',
            ],
            [
                'perusahaan' => 'PT.TRIKARSA BUWANA PERSADA GEMILANG',
                'penanggung_jawab' => 'Ir. Sulistyono, MT',
                'alamat' => 'Mergangsan Kidul MG 2/1374 Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '374804',
                'no_hp' => '081326918523',
            ],
            [
                'perusahaan' => 'CV.TRI MATRA',
                'penanggung_jawab' => 'Ir. Lucida',
                'alamat' => 'Mejing Lor RT.2 RW.3 No.99 Gang Prau Layar – Ambarketawang Gamping Sleman',
                'alamat_kabupaten' => 'sleman',
                'no_telp' => '4541266',
                'no_hp' => '08122745371',
            ],
            [
                'perusahaan' => 'PT.TRI PATRA KONSULTAN',
                'penanggung_jawab' => 'KURNIAWAN ARIF NUGROHO, ST',
                'alamat' => 'Demblaksari RT.05 Baturetno Banguntapan Bantul 55197',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '412663',
                'no_hp' => '087839773350',
            ],
            [
                'perusahaan' => 'PT.TUMOTO KARYA KONSULTINDO',
                'penanggung_jawab' => 'SETIONO INDRIAWAN,ST',
                'alamat' => 'JL. MOJO NO.18 RT.57 RW.15 BACIRO GONDOKUSUMAN YOGYAKARTA',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '633265',
                'no_hp' => '08164266770',
            ],
            [
                'perusahaan' => 'CV.WIKA SADEWA',
                'penanggung_jawab' => 'BUDDEWI SUKINDRAWATI,ST, MT',
                'alamat' => 'JL. NGGANGIN PERUM TIRTAMAS NO.3C TAMANTIRTO KASIHAN BANTUL',
                'alamat_kabupaten' => 'bantul',
                'no_telp' => '',
                'no_hp' => '085729019599',
            ],
            [
                'perusahaan' => 'PT.WASTU ANOPAMA',
                'penanggung_jawab' => 'Suharto Setiawan Agung, ST',
                'alamat' => 'Jl. Pemukti No.13-14 RT.018 RW.006 Giwangan Umbulharjo Yogyakarta',
                'alamat_kabupaten' => 'jogja',
                'no_telp' => '373837',
                'no_hp' => '081227240179',
            ],
        ];
        $users = User::get()->skip(1);
        foreach ($anggotas as $key => $anggota) {
            Anggota::create([
                'perusahaan' => $anggota['perusahaan'],
                'penanggung_jawab' => $anggota['penanggung_jawab'],
                'alamat' => $anggota['alamat'],
                'alamat_kabupaten' => $anggota['alamat_kabupaten'],
                'no_telp' => $anggota['no_telp'],
                'no_hp' => $anggota['no_hp'],
                'user_id' => $users[$key + 1]->id,
            ]);
        }
    }
}
