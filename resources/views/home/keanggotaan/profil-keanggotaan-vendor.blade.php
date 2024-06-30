@extends('layouts.app-home')

@section('title', 'Profil Anggota')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/portofolio-anggota.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
@endsection

@section('content')
<!-- Heading -->
<div class="container-fluid py-5 d-flex align-items-center justify-content-center" style=" background: url('{{ asset('assets/img/bg-navbar.svg') }}'); height: 180px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-white fw-bold text-heeader text-center" style="font-size: 40px;">{{ $anggota->perusahaan }}</h1>
            <div class="w-100 d-flex justify-content-center align-items-center alamat text-white">
                <i class="bi bi-geo-alt-fill mb-0" style="font-size: 14px;line-height: 0;"></i>
                <p class=" ms-2 mb-0 text-desc" style="color:white; max-width:100%;">
                    {{ $anggota->alamat }}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- End Heading -->

<div class="container pt-5">
    {{-- About --}}
    <div class="row about d-flex justify-content-center">
        <div class="col-lg-8 col-md-12 pe-lg-5">

            <div class="text-about-content fs-5 text-lg-start pb-sm-4 mb-5">
                <div class="card w-100 p-4 shadow border-0">
                    <div class="d-flex flex-column justify-content-start gap-4 mb-3" style="min-height:109px;">
                        <div class="d-flex flex-row ms-2 gap-4">
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                </i><b>Nomor KTA</b>
                            </p>
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                {{ $anggota->no_anggota }}
                            </p>

                        </div>
                        <div class="d-flex flex-row ms-2 gap-4">
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                </i><b>Bentuk Badan Usaha</b>
                            </p>
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                {{ $anggota->bentuk_usaha }}
                            </p>

                        </div>

                        <div class="d-flex flex-row ms-2 gap-4">
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                </i><b>Penanggung Jawab</b>
                            </p>
                            <p class=" mb-0 text-start text-semi-lg w-50">
                                {{ $anggota->penanggung_jawab }}
                            </p>

                        </div>

                        <p class="ms-2 mb-0 text-semi-lg fw-semibold text-start" style="color:#23538F;">
                            Informasi Kontak:
                        </p>

                        @if ($anggota->no_telp)
                        @php
                        $noTelpHTML = '';
                        $kontakHref = $anggota->email ? '' : route('login');
                        if ($anggota->no_telp) {
                        $numbers = explode(',', $anggota->no_telp);
                        foreach ($numbers as $index => $number) {
                        $noTelpHTML .= '<p class="mb-0 text-semi-lg">' . $number . '</p>';
                        $noTelpHTML .= $index < count($numbers) - 1 ? '<div class="stripe"></div>' : '' ; } } @endphp <div class="d-flex flex-row ms-2 gap-4">
                            <p class="mb-0 text-semi-lg w-50 text-start">
                                <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                            </p>
                            <div class="d-flex flex-row flex-wrap gap-2 align-items-center w-50 text-start">
                                {!! $noTelpHTML !!}
                            </div>
                    </div>
                    @else
                    <div class="d-flex flex-row ms-2 gap-4">
                        <p class="mb-0 text-semi-lg w-50 text-start">
                            <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                        </p>
                        <p class=" mb-0 text-semi-lg w-50 text-start">
                            -
                        </p>
                    </div>
                    @endif

                    @if ($anggota->no_hp)
                    @php
                    $noHpHTML = '';
                    $kontakHref = $anggota->email ? '' : route('login');
                    if ($anggota->no_hp) {
                    $numbers = [];
                    $numbers = explode(',', $anggota->no_hp);
                    foreach ($numbers as $index => $number) {
                    $noHpHTML .= '<p class="mb-0 text-semi-lg">' . $number . '</p>';
                    $noHpHTML .= $index < count($numbers) - 1 ? '<div class="stripe"></div>' : '' ; } } @endphp <div class="d-flex flex-row ms-2 gap-4">
                        <p class="mb-0 text-semi-lg w-50 text-start">
                            <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                        </p>
                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center w-50 text-start">
                            {!! $noHpHTML !!}
                            <a href="https://wa.me/62{{ $numbers[0] }}" target="_blank">
                                <button class="btn btn-admin py-1 text-small ms-2"> Hubungi WA</button>
                            </a>

                        </div>
                </div>
                @else
                <div class="d-flex flex-row ms-2 gap-4">
                    <p class="mb-0 text-semi-lg w-50 text-start">
                        <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                    </p>
                    <p class=" mb-0 text-semi-lg w-50 text-start">
                        -
                    </p>
                </div>
                @endif

                <div class="d-flex flex-row ms-2 gap-4">
                    <p class=" mb-0 text-start text-semi-lg w-50">
                        <i class="bi bi-envelope-fill me-2"></i><b>Email</b>
                    </p>
                    <p class="mb-0 text-start ps-2 ps-sm-0 text-semi-lg w-50">
                        {{ $anggota->email }}
                        <a href="mailto:{{ $anggota->email }}">
                            <i class="bi bi-envelope-fill ms-2" style="color:#0169b8"></i>
                        </a>
                    </p>


                </div>

                <div class="d-flex flex-row ms-2 gap-4">
                    <p class=" mb-0 text-semi-lg w-50 text-start">
                        <i class="bi bi-globe me-2"></i><b>Website</b>
                    </p>
                    <p class=" mb-0 text-semi-lg w-50 text-start">
                        @if ($anggota->website)
                        {{ $anggota->website }}
                        @else
                        -
                        @endif
                    </p>

                </div>

                <a href="https://wa.me/6281315289207" target="_blank"><button class="btn btn-admin w-100 mt-2"> Hubungi Admin</button></a>





            </div>
        </div>
    </div>
</div>

</div>
{{-- End About --}}


</div>
@endsection

@section('script')

@endsection