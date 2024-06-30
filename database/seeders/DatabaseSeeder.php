<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateUserSeeder::class,
            ProfilSeeder::class,
            SliderSeeder::class,
            // AnggotaSeeder::class,
            ArsipKategoriSeeder::class,
            ArsipSeeder::class,
            MitraSeeder::class,
            BeritaKategoriSeeder::class,
            BeritaSeeder::class,
            KategoriGallery::class,
            GaleriSeeder::class,
            PhotosGaleriSeeder::class,
            PrakataSeeder::class,
            KodeEtikSeeder::class,
            JudulSyaratAnggotaSeeder::class,
            PoinSyaratAnggotaSeeder::class,
            KategoriProgramKerjaSeeder::class,
            ProgramKerjaSeeder::class,
            KlasifikasiKonstruksi::class,
            KlasifikasiNonKonstruksi::class,
            LayananKonstruksi::class,
            LayananNonKonstruksi::class,
            KategoriHubungiKamiSeeder::class,
            KualifikasiSeeder::class,
            StrukturOrganisasiSeeder::class,
            KategoriFaqSeeder::class,
            FaqSeeder::class,
        ]);
        // Factory
        // User::factory(10)->create();
        // Anggota::factory(5)->create();
        // Profil::factory(1)->create();
        // Slider::factory(5)->create();
        // FAQ_Kategori::factory(3)->create();
        // FAQ::factory(10)->create();
        // ArsipKategori::factory(3)->create();
        // Arsip::factory(10)->create();
    }
}
