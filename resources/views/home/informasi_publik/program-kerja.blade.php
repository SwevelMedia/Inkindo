@extends('layouts.app-home')

@section('title', 'Proker')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/program-kerja.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
@endsection

@section('content')
    <div class="section" id="program-kerja">
        <div class="nav d-flex align-items-center justify-content-center"
            style="background-image: url({{ asset('assets/img/bg-navbar.svg') }});">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <h5>Program Kerja</h5>
                    </div>
                    <div class="tombol d-flex justify-content-center mt-3">
                        <select class="form-select w-75 rounded-pill d-flex justify-content-center" id="kategoriSelect">
                            @foreach ($kategori as $item)
                                <option class="text-center" value="{{ $item->id }}">
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="body">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center" id="subNavContainer">
                            <div class="sub-nav">
                                <h4 class="fw-bold" id="namaProker" style="color: #202124">
                                    {{ $kategori2->nama_kategori }}<span
                                        class="blue-icon-inkindo">&nbsp{{ $kategori2->periode }}</span>
                                </h4>
                                <div class="d-flex justify-content-center">
                                    <hr class="border border-3 opacity-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 main mb-5" id="prokerResult">
                    @foreach ($proker1 as $item)
                        <div class="col-md-12 mb-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="kotak d-flex align-items-center">
                                    <div class="m-0 p-0 bg-bulat d-flex justify-content-center align-items-center">
                                        <div class="m-0 p-0 bulat d-flex justify-content-center align-items-center">
                                            <h3 class="m-0 p-0 fs-6">{{ $loop->iteration }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border border-1 opacity-100">
                                <h5 class="m-0" style="font-size: 0px;">
                                    <span class="badge rounded-circle blue-bg-inkindo" style="font-size:7px;">&nbsp;</span>
                                </h5>
                                <div class="card">
                                    <div class="card-body">
                                        <p class="my-1">{{ $item->nama_proker }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kategoriSelect').change(function() {
                var kategoriId = $(this).val();
                console.log(kategoriId);
                if (kategoriId) {
                    $.get('/ambil-proker/' + kategoriId, function(data) {
                        var prokerContainer = $('#prokerResult');
                        var namaProker = $('#namaProker');
                        namaProker.empty();
                        prokerContainer.empty();

                        var judulproker = `
                        ${data.meta.nama_kategori}<span class="blue-icon-inkindo">&nbsp${data.meta.periode}</span>
                        `
                        namaProker.append(judulproker);
                        if (data.proker.length > 0) {
                            // Tampilkan program kerja
                            $.each(data.proker, function(index, item) {
                                var prokerItem = `
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="kotak d-flex align-items-center">
                                                <div class="m-0 p-0 bg-bulat d-flex justify-content-center align-items-center">
                                                    <div class="m-0 p-0 bulat d-flex justify-content-center align-items-center">
                                                        <h3 class="m-0 p-0 fs-6" style="color:white;">${index + 1}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border border-1 opacity-100">
                                            <h5 class="m-0" style="font-size: 0px;">
                                                <span class="badge rounded-circle blue-icon-inkindo" style="font-size:7px;">&nbsp;</span>
                                            </h5>
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="my-1">${item.nama_proker}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                prokerContainer.append(prokerItem);
                            });
                        } else {
                            prokerContainer.append(
                                '<h4 class="my-5 text-center">Data belum tersedia</h4>');
                        }
                    });
                }
            });
        });
    </script>
@endsection
