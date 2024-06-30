@extends('layouts.app-home')

@section('title', 'Profil')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/profil/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/profil/responsive-profil.css') }}">
@endsection

@section('content')
    <section id="profile">
        <body style="font-family: Poppins, sans-serif;">
            <div class="container-fluid">
                <div class="row">
                    <div class="d-block nav-prof d-flex align-items-center justify-content-center w-100"
                        style="background-image: url('{{ asset('assets/img/bg-navbar.svg') }}');">
                        <h2>Profil</h2>
                    </div>
                </div>
            </div>
            @foreach ($profil as $item)
                <div class="container">
                    <div class="container">
                        <div class="row apa-itu mt-5">
                            <h2 class="fw-semibold">Tentang Inkindo</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="kata-profile justify-txt-align">
                                    <p class="d-flex pb-0 mb-0"> {!! $item->prakata !!} </p>
                                </div>
                            </div>
                            <div
                                class="komponen-profile-1 col-md-12 col-lg-6 d-flex align-items-center justify-content-center">
                                <div class="d-flex justify-content-center ">
                                    <img class="rounded-4"
                                        src="{{ asset('storage/uploads/profil/' . $item->gambar_prakata) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container px-3">
                        <div class="row mt-5 d-flex justify-content-center">
                            <div class="col-md-4 d-flex align-items-center">
                                <img class="gambar-visi my-5" style="max-width: 100%"
                                    src="{{ asset('storage/uploads/profil/' . $item->gambar_visi) }}" alt="">
                            </div>
                            <div class="visi col-md-7 ms-2">
                                <div class="justify-txt-align">
                                    <h3 class="fw-semibold"> Visi </h3>
                                    <p class="mb-3 p-0"> {!! $item->visi !!} </p>
                                </div>
                                <div class="justify-txt-align">
                                    <h3 class="fw-semibold mt-5">Misi </h3>
                                    <p class="mb-3 p-0"> {!! $item->misi !!} </p>
                                    @foreach ($daftar_misi as $sub_misi)
                                        <div class="d-flex sub-misi">
                                            <div
                                                class="visi-number d-flex justify-content-center align-items-center rounded-circle">
                                                <h4 class="m-0 ">{{ $loop->iteration }} </h4>
                                            </div>
                                            <p class="output-misi">{{ $sub_misi }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row mt-5">
                            <div class="persebaran col-lg-6 col-md-4">
                                <h3 class="fw-semibold mt-lg-5">Persebaran Perusahaan InkIndo D.I Yogyakarta</h3>
                                <div class="mt-3">
                                    <p>Perusahaan-perusahaan yang tergabung dalam Inkindo Yogyakarta tersebar pada 5 daerah
                                        yang berbeda.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex col-md-8 justify-content-center">
                                <div class="d-flex gap-4 flex-wrap justify-content-center" style="width: 460px">
                                    <div
                                        class="kotak d-flex flex-column align-items-center justify-content-center border border-0 rounded shadow-1 ">
                                        <i class="bi bi-geo-alt my-3 d-flex align-items-center justify-content-center"></i>
                                        <p class="d-block mb-2 p-0 text-center fw-semibold">Sleman
                                        </p>
                                        <p class="d-block p-0 text-center fw-semibold">78
                                            Anggota</p>
                                    </div>
                                    <div
                                        class="kotak d-flex flex-column align-items-center justify-content-center border border-0 rounded shadow-1">
                                        <i class="bi bi-geo-alt my-3 d-flex align-items-center justify-content-center"></i>
                                        <p class="d-block mb-2 p-0 text-center fw-semibold">Bantul
                                        </p>
                                        <p class="d-block p-0 text-center fw-semibold">38
                                            Anggota</p>
                                    </div>
                                    <div
                                        class="kotak d-flex flex-column align-items-center justify-content-center border border-0 rounded shadow-1">
                                        <i class="bi bi-geo-alt my-3 d-flex align-items-center justify-content-center"></i>
                                        <p class="d-block mb-2 p-0 text-center fw-semibold">Gunung Kidul
                                        </p>
                                        <p class="d-block p-0 text-center fw-semibold">6 Anggota</p>
                                    </div>
                                    <div
                                        class="kotak d-flex flex-column align-items-center justify-content-center border border-0 rounded shadow-1">
                                        <i class="bi bi-geo-alt my-3 d-flex align-items-center justify-content-center"></i>
                                        <p class="d-block mb-2 p-0 text-center fw-semibold">Kulon Progo
                                        </p>
                                        <p class="d-block p-0 text-center fw-semibold">15 Anggota</p>
                                    </div>
                                    <div
                                        class="kotak d-flex flex-column align-items-center justify-content-center border border-0 rounded shadow-1">
                                        <i class="bi bi-geo-alt my-3 d-flex align-items-center justify-content-center"></i>
                                        <p class="d-block mb-2 p-0 text-center fw-semibold">Yogyakarta
                                        </p>
                                        <p class="d-block p-0 text-center fw-semibold">48 Anggota</p>
                                    </div>
                                    {{-- @foreach ($persebaran as $item)
                                        <div class="kotak border border-2 border-primary rounded">
                                            <i class="bi bi-geo-alt d-flex align-items-center justify-content-center"></i>
                                            @if ($item['alamat_kabupaten'] == 'bantul')
                                                <p class="d-block text-center fw-semibold">Bantul <br>
                                                    <span class="fw-bold fs-6">{{ $item['jumlah'] }} Anggota</span>
                                                </p>
                                            @elseif($item['alamat_kabupaten'] == 'gunungkidul')
                                                <p class="d-block text-center fw-semibold">Gunung Kidul <br>
                                                    <span class="fw-bold fs-6">{{ $item['jumlah'] }} Anggota</span>
                                                </p>
                                            @elseif($item['alamat_kabupaten'] == 'jogja')
                                                <p class="d-block text-center fw-semibold">Kota Jogja <br>
                                                    <span class="fw-bold fs-6">{{ $item['jumlah'] }} Anggota</span>
                                                </p>
                                            @elseif($item['alamat_kabupaten'] == 'kulonprogo')
                                                <p class="d-block text-center fw-semibold">Kulon Progo <br>
                                                    <span class="fw-bold fs-6">{{ $item['jumlah'] }} Anggota</span>
                                                </p>
                                            @elseif($item['alamat_kabupaten'] == 'sleman')
                                                <p class="d-block text-center fw-semibold">Sleman <br>
                                                    <span class="fw-bold fs-6">{{ $item['jumlah'] }} Anggota</span>
                                                </p>
                                            @endif
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row my-5">
                            <div class="kaki text-center">
                                <h3 class="fw-semibold">Kualifikasi Anggota</h3>
                                <p class="mb-3">kualifikasi Perusahaan Anggota Inkindo D.I. Yogyakarta</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex gap-4 justify-content-center card-head">
                                    {{-- @foreach ($kualifikasi as $item)
                                        <div class="card" style="border: #0169B8 2px solid;">
                                            <div class="card-body d-flex flex-column align-items-center text-center my-2">
                                                <div
                                                    class="bulat rounded-circle d-flex justify-content-center align-items-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div>
                                                    <h2 class="pt-md-3 fw-semibold fs-5 blue-c-v2">
                                                        {{ Str::title($item['kualifikasi']) }}
                                                    </h2>
                                                    <p class="fs-4 fw-bold blue-c-v2">{{ $item['jumlah'] }} Anggota</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                    <div class="card d-flex border-0 shadow-1">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                            <div
                                                class="bulat mb-3 rounded-circle d-flex justify-content-center align-items-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div>
                                                <h2 class="fw-semibold fs-5">
                                                    Besar
                                                </h2>
                                                <p class="fs-4 p-0 fw-semibold">3 Anggota</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card d-flex border-0 shadow-1">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                            <div
                                                class="bulat mb-3 rounded-circle d-flex justify-content-center align-items-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div>
                                                <h2 class="fw-semibold fs-5">
                                                    Menengah
                                                </h2>
                                                <p class="fs-4 p-0 fw-semibold">17 Anggota</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card d-flex border-0 shadow-1">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                            <div
                                                class="bulat mb-3 rounded-circle d-flex justify-content-center align-items-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div>
                                                <h2 class="fw-semibold fs-5">
                                                    Kecil
                                                </h2>
                                                <p class="fs-4 p-0 fw-semibold">
                                                    170 Anggotaa</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </body>
    </section>
@endsection
