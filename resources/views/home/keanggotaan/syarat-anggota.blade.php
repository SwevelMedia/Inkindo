@extends('layouts.app-home')

@section('content')
    <section>
        <div data-bss-parallax-bg="true"
            style="height: 424px;background: url(&quot;assets/img/profil.jpeg&quot;) center / cover;" class="parallax"></div>
    </section>

    <section>
        <div class="container py-5">
            <h2 class="text-center" style="padding-bottom: 30px;">Syarat Keanggotaan INKINDO</h2>
            <div role="tabpanel">
                <div class="col">
                    <div class="row">
                        <div class="col-xs-3 col-md-5" style="margin-top: 6px;">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action active" aria-current="true" id="syarat1"
                                    data-bs-toggle="pill" data-bs-target="#syarat1-content" role="tab" type="button"
                                    style="border-radius: 10px;">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/img/typcn_business-card.png') }}"
                                                style="width: 30px;">
                                        </div>
                                        <div class="col">
                                            <p class="text" style="padding-top: 15px;">Syarat Permohonan Kartu Tanda
                                                Anggota</p>
                                        </div>
                                    </div>
                                </a>
                                <br>
                                <a class="list-group-item list-group-item-action" aria-current="true" id="syarat2"
                                    data-bs-toggle="pill" data-bs-target="#syarat2-content" role="tab" type="button"
                                    style="border-radius: 10px;">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/img/dashicons_businessperson.png') }}"
                                                style="width: 30px;">
                                        </div>
                                        <div class="col">
                                            <p class="text" style="padding-top: 15px;">Syarat permohonan sertifikat badan
                                                usaha INKINDO</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-1 d-flex align-items-start justify-content-center">
                            <img class="pt-md-4 my-sm-3 my-lg-0" id="arrow-syarat"
                                src="{{ asset('assets/img/ic_round-keyboard-double-arrow-right.png') }}">
                        </div>

                        <div class="col-xs-5 col-md-6">
                            <div class="tab-content text-white">
                                <div class="tab-pane fade show active" id="syarat1-content" role="tabpanel"
                                    aria-labelledby="syarat1">
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Mengajukan permohonan
                                        menjadi anggota INKINDO secara tertulis (tersedia form isian.</p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Memiliki data aspek legal
                                        badan usaha jasa konsultasi : <br>
                                        1. Akta pendirian badan usaha (independen/hanya badan usaha bidang konsultasi) <br>
                                        2. NPWP perusahaan <br>
                                        3. SITU/domisili perusahaaan <br>
                                        4. Rekomendasi 2 perusahaan anggota inkindo yang memiliki sertifikat kode etik dan
                                        masih berlaku <br>
                                        5. Denah alamat kantor dan layout kantor <br>
                                        6. Daftar peralatan kator/studio/lapangan <br>
                                        7. Foto direktur ukuran 3:4 sebanyak 2 lembar dan file foto.</p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Pimpinan badan usaha
                                        memiliki ijazah S1(semua jurusan)</p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Memiliki personalia yang
                                        terdiri atas : <br>
                                        1. 1 orang penanggung jawab teknik (berijazah S1 Teknik) <br>
                                        2. Minimal 2 tenaga ahli tetap berijazah S1 Teknik (dapat dirangkap penanggung jawab
                                        teknik) <br>
                                        3. Minimal 1 orang tenaga ahli tidak tetap (berijazah S1 Teknik) <br>
                                        4. Minimal 1 orang tenaga administrasi (berijazah minimal SLTA/Sederajat)
                                    <p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Semua personil yang
                                        terlibat harus melampirkan copy ijazah, copy KTP, daftar riwayat hidup. </p>
                                </div>

                                <div class="tab-pane fade" id="syarat2-content" role="tabpanel" aria-labelledby="syarat2">
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Mengajukan permohonan
                                        menjadi anggota inkindo secara tertulis (tersedia form isisan)</p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">
                                        Melampirkan dokumen : <br>
                                        1. Akta pendirian badan usaha (terdaftar KEMENKUMHAM atau pengesahan pengadilan)
                                        <br>
                                        2. NPWP perusahaan <br>
                                        3. SITU/domisili perusahaaan <br>
                                        4. Copy KTP,NPWP, ijazah dan daftar riwayat hidup direktur <br>
                                        5. Copy KTP,NPWP, ijazah dan daftar riwayat hidup tenaga ahli
                                    </p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">Jasa Penilai Perawatan dan
                                        Kelayakan Bangunan Gedung <br>
                                        Jasa penelitian, nasehat dan rekomendasi yang berkaitan dengan masalah arsitektural
                                        dan hal berikut : <br>
                                        1. cara untuk melaksanakan pemeliharaan bangunan, renovasi gedung, dan jasa
                                        restorasi bangunan gedung; <br>
                                        2. penilaian kelayakan bangunan gedung termasuk juga didalamnya bangunan yang
                                        terkena musibah kebakaran; <br>
                                        3. tata cara penilaian usia bangunan; dan <br>
                                        4. tata cara pembongkaran (demolisi) bangunan gedung Tidak berkaitan dengan proyek
                                        konstruksi baru dan penambahan bangunan baru.
                                    </p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">1 orang penanggung jawab
                                        teknis (PJT) memiliki sertifikat keahlian (SKA) yang masih berlaku (dapat dirangkap
                                        oleh direktur utama)
                                    <p>
                                    <p class="syarat1 border-syarat" style="margin-bottom: 16px;">1 orang SKA madya untuk
                                        penanggung jawab bidang atau klasifikasi dan 1 orang SKA madya untuk setiap 2 sub
                                        bidang/ sub klasifikasi golongan M</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
