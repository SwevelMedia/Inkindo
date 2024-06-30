@extends('layouts.app-home')

@section('title', 'Galeri')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/galeri-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
@endsection

@section('content')
    <div class="container-fluid px-0">
        <div class="row bg position-relative">
            <div class="bg" style=" background: url('{{ asset('assets/img/bg-navbar.svg') }}'); height: 180px;">
            </div>
            <h1 class="text-heeader text-center text-white fw-bold  position-absolute top-50 start-50 translate-middle"
                style="font-size: 40px;">Detail Galeri</h1>
        </div>
        <div class="row p-5">
            <div class="sub-title col-12 d-flex align-items-center">
                <img class="bg-danger d-inline-block" src="{{ asset('assets/img/informasi_publik/stick-2.png') }}"
                    alt="stick">
                <div class="d-inline-block card-text text-start fw-semibold ms-2 fs-5 p-0">
                    {{ $tanggal->judul }} <span class="ms-1"
                        style="color: #005896">{{ \Carbon\Carbon::parse($tanggal->tanggal)->format('d F Y') }}</span>
                </div>
            </div>
        </div>
        <div class="container my-3 my-md-5">
            <div class="row px-0 d-auto justify-content-center">
                @foreach ($galeriDetail as $item)
                    <div class="col-6 col-md-4 col-lg-3 p-1 p-sm-2 m-0">
                        <div class="card d-flex w-100 ">
                            <img src="{{ asset('storage/uploads/admin/galeri/' . $item->nama_foto) }}"
                                style="object-fit:cover;" class="card-img-top" alt="gambar">
                            {{-- <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center my-3"> {{ $galeriDetail->links('pagination::bootstrap-4') }}</div>
    </div>
@endsection
