@extends('layouts.app-home')

@section('title', 'Struktur Organisasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/profil/struktur-organisasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/profil/responsive-struktur-organisasi.css') }}">

@endsection

@section('content')
    <section>
        <div class="container-fluid gx-0">
            <div class="background-nav" style="background-image: url('{{ asset('assets/img/backgorund-navbar.svg') }}');">
                <div class="d-flex align-items-md-center justify-content-center">
                    <h3 class="my-4 my-sm-5">Struktur Organisasi</h3>
                </div>
                <div class="tombol d-flex gap-2 justify-content-center">
                    <ul class="nav nav-pills mb-3 mx-4 mx-lg-0 d-flex justify-content-center" id="pills-tab" role="tablist">
                        <li class="mb-2 btn-1" role="presentation">
                            <button class="active btn btn-outline-light fw-bold rounded-pill mx-2 px-4 py-2"
                                id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                role="tab" aria-controls="pills-home" aria-selected="true">DPP
                                {{-- <p class="my-auto mx-3 mx-md-2 text-dark">DPP</p> --}}
                            </button>
                        </li>
                        <li class="mb-2 btn-1" role="presentation">
                            <button class="btn btn-outline-light fw-bold rounded-pill mx-2 px-4 py-2" id="pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">DKP
                                {{-- <p class="my-auto mx-3 mx-md-2">DKP</p> --}}
                            </button>
                        </li>
                        <li class="mb-2 btn-1" role="presentation">
                            <button class="btn btn-outline-light fw-bold rounded-pill mx-2 px-4 py-2" id="pills-contact-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">DPOP
                                {{-- <p class="my-auto mx-3 mx-md-2">DPOP</p> --}}
                            </button>
                        </li>
                        <li class="mb-2 btn-1" role="presentation">
                            <button class="btn btn-outline-light fw-bold rounded-pill mx-2 px-4 py-2"
                                id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                                type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">BSAP
                                {{-- <p class="my-auto mx-3 mx-md-2">BSAP</p> --}}
                            </button>
                        </li>
                        <li class="mb-2 btn-1" role="presentation">
                            <button class="btn btn-outline-light fw-bold rounded-pill mx-2 px-4 py-2"
                                id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-bam" type="button"
                                role="tab" aria-controls="pills-bam" aria-selected="false">BAM
                                {{-- <p class="my-auto mx-3 mx-md-2">BAM</p> --}}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="row mt-5">
                    <h4 class="fw-bold text-center">Dewan Pengurus Provinsi (DPP)</h4>
                    <div class="d-flex justify-content-center">
                        <hr class="garis border border-3 opacity-100">
                    </div>
                </div>
                <div class="my-5">
                    <img style="width: 100%;" src="{{ asset('storage/uploads/admin/organisasi/DPP.png') }}" alt="">
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <section class="container pb-5">
                    @php
                        use App\Models\OrganisasiLain;

                        $organisasilain = OrganisasiLain::all();
                    @endphp
                    <div class="row ">
                        <div class="col">
                            <h4 class="fw-bold pb-2 text-center mt-5">Dewan Kehormatan Provinsi (DKP)</h4>
                            <div class="d-flex justify-content-center">
                                <hr class="garis border border-3 opacity-100">
                            </div>
                            <div class="row">
                                <div class="mx-auto w-50">
                                    {{-- <div class="nama mt-5 d-flex justify-content-center align-items-center rounded"
                                        style="background-color: #0169B8;">
                                        <b class="my-2">DKP</b>
                                    </div> --}}
                                    <img class="my-4" style="width: 100%;"
                                        src="{{ asset('storage/uploads/admin/organisasi/DKP.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">
                <section>
                    <div class="row">
                        <div class="col mt-5">
                            <h4 class="fw-bold pb-2 text-center">Dewan Pertimbangan Organisasi Provinsi (DPOP)</h4>
                            <div class="d-flex justify-content-center">
                                <hr class="garis border border-3 opacity-100">
                            </div>
                            <div class="row mb-5">
                                <div class="mx-auto w-50">
                                    <img class="my-4" style="width: 100%;"
                                        src="{{ asset('storage/uploads/admin/organisasi/DPOP.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                </section>
            </div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">
                <section>
                    <div class="row">
                        <div class="col mt-5">
                            <h4 class="fw-bold pb-2 text-center">Badan Sertifikasi Anggota Provinsi (BSAP)</h4>
                            <div class="d-flex justify-content-center">
                                <hr class="garis border border-3 opacity-100">
                            </div>
                            <div class="row mb-5">
                                <div class="mx-auto w-50">
                                    <img class="my-4" style="width: 100%;"
                                        src="{{ asset('storage/uploads/admin/organisasi/BSAP.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="pills-bam" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">
                <section>
                    <div class="row">
                        <div class="col mt-5">
                            <h4 class="fw-bold pb-2 text-center">Badan Advokasi Mediasi (BAM)</h4>
                            <div class="d-flex justify-content-center">
                                <hr class="garis border border-3 opacity-100">
                            </div>
                            <div class="row mb-5">
                                <div class="mx-auto w-50">
                                    <img class="my-4" style="width: 100%;"
                                        src="{{ asset('storage/uploads/admin/organisasi/BAM.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Scroll Top Button - Show
        var $scrollTop = $('#scroll-top');

        $(window).on('load scroll', function() {
            if ($(window).scrollTop() >= 100) {
                $scrollTop.addClass('show');
            } else {
                $scrollTop.removeClass('show');
            }
        });
        // On click animate to top
        $scrollTop.on('click', function(e) {
            $('html, body').animate({
                'scrollTop': 0
            }, 10);
            e.preventDefault();
        });
    </script>
@endsection
