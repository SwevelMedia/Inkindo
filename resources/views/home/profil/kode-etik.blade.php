@extends('layouts.app-home')

@section('title', 'Kode Etik')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/profil/kode-etik.css') }}">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center bg-kode-etik px-0 position-relative">
                <img class="w-100 bg-kode-etik" src="{{ asset('assets/img/bg-kode-etik.svg') }}"
                    style="width:100vh; max-height: 500px; " alt="bg-kode-etik">
                <div class="row w-100 header-kode-etik position-absolute top-0 ">
                    <div
                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 px-0 d-flex justify-content-center align-items-center">
                        <div class="text-header-kode-etik">
                            <h1 class="fw-bold text-light px-0 pb-2 m-0" style="max-width: 500px">Kode Etik Inkindo</h1>
                            <p class="text-light m-0 pb-3 px-0 d-none d-md-block" style="max-width: 510px">Setiap anggota
                                wajib berpegang
                                teguh pada kode etik Inkindo
                            </p>
                        </div>

                    </div>
                    <div class="col-6 px-0 icon-kode-etik d-flex justify-content-center">
                        <img src="{{ asset('assets/img/profil/logo-kode-etik.png') }}" alt="icon-kode-etik"
                            style="width: 50%; ">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row my-5 d-flex justify-content-center">
                <div class="col-10">
                    <div class="reg-opt position-relative my-xxl-my-5 my-4">
                        @foreach ($kode_etik as $item)
                            <div class="div btn-kode-etik kodeEtik-list d-flex align-items-center pb-2">
                                <div class="d-flex flex-shrink-0 justify-content-center align-items-center rounded-circle"
                                    style="background:#005896;width: 40px; height:40px; ">
                                    <p class="m-0 p-0 text-light">{{ $loop->iteration }}</p>
                                </div>
                                <p class="px-0 ps-2 m-0 ms-2 text-desc">{!! $item->poin_kode_etik !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row pb-5">
            <div class="text-center" id="pagingControls"></div>
            <div class="text-center" id="showingInfo" class="well" style="margin-top:20px"></div>
        </div> --}}
    </div>
@endsection
