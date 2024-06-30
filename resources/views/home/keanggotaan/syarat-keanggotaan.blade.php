@extends('layouts.app-home')

@section('title', 'keanggotaan')

@section('css')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/syarat-anggota.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/responsive.css') }}">
@endsection
@section('content')
    <section id="syarat-anggota">
        <div>
            <div class="row position-relative">
                <div class="nav-syarat d-none d-sm-block">
                    <img src="{{ asset('assets/img/keanggotaan/bg-nav.svg') }}" alt="">
                </div>
                <div class="row position-absolute sub-nav mb-5 d-none d-sm-flex">
                    <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center">
                        <h3 class="fw-bold ps-5" style="font-size: 40px;">Syarat Keanggotaan</h3>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/keanggotaan/gambar-nav.svg') }}" alt="">
                    </div>
                </div>
                <div class="nav-bg d-sm-none py-5" style="background-image: url('{{ asset('assets/img/bg-navbar.svg') }}');">
                    <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center">
                        <h3 class="fw-bold ps-5 d-flex align-items-center" style="font-size: 40px;">Syarat Keanggotaan</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <div class="list-group" id="list-tab" role="tablist">
                        <div class="d-flex flex-column flex-sm-row gap-3 mt-5">
                            <button
                                class="tombol btn list-group-item list-group-item-action active rounded-4 d-flex align-items-center justify-content-center fw-semibold shadow"
                                id="list-profile-list" data-bs-toggle="list" href="#list-home" role="tab"
                                aria-controls="list-home">
                                <i class="bi bi-person-vcard me-2 me-lg-3">
                                </i>
                                <h5 class=" p-0">Syarat permohonan KTA</h5>
                            </button>
                            <button
                                class="tombol btn list-group-item py-md-2 list-group-item-action rounded-4 d-flex align-items-center justify-content-center shadow"
                                id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab"
                                aria-controls="list-profile">
                                <i class="bi bi-file-earmark-text me-2 me-lg-3"></i>
                                <h5 class="text-center p-0">Syarat Permohonan SBU</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                            aria-labelledby="list-home-list">
                            <div class="mt-5">
                                {{-- <div class="card mt-3"> --}}
                                @foreach ($kategori1 as $judulId => $items)
                                    <div class="accordion accordion-flush" id="accordionFlushExample{{ $judulId }}">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingOne">
                                                <button class="accordion-button mt-2 collapsed rounded shadow"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne{{ $judulId }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseOne{{ $judulId }}">
                                                    <h5>{!! $items->nama_judul !!}</h5>
                                                </button>
                                                <div id="flush-collapseOne{{ $judulId }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample{{ $judulId }}">
                                                    <div class="accordion-body">
                                                        @if ($items->poinSyaratAnggota)
                                                            @foreach ($items->poinSyaratAnggota as $poin)
                                                                <div class="d-flex number1">
                                                                    <div
                                                                        class="number d-flex justify-content-center align-items-center rounded-circle">
                                                                        <h3>{{ $loop->iteration }}</h3>
                                                                    </div>
                                                                    @if ($poin->poin !== null)
                                                                        <p class="ms-2 mt-1">{!! $poin->poin !!}</p>
                                                                    @else
                                                                        <p class="ms-2 mt-1">Poin Kosong</p>
                                                                    @endif
                                                                    {{-- <p class=" ms-2 mt-1">{!! $poin->poin !!}</p> --}}
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- </div> --}}
                            </div>
                        </div>
                        {{-- -------------------------------------------     batas isi------------------------------------------------------------------ --}}

                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"
                            tabindex="0">
                            <div class="mt-5">
                                @foreach ($kategori2 as $judulId => $items)
                                    {{-- <div class="card mt-3"> --}}
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingOne">
                                                <button class="accordion-button mt-2 collapsed rounded shadow"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne{{ $judulId }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseOne{{ $judulId }}">
                                                    <h5>{!! $items->nama_judul !!}</h5>
                                                </button>
                                                <div id="flush-collapseOne{{ $judulId }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample{{ $judulId }}">
                                                    <div class="accordion-body">
                                                        @if ($items->poinSyaratAnggota)
                                                            @foreach ($items->poinSyaratAnggota as $poin)
                                                                <div class="d-flex number1">
                                                                    <div
                                                                        class="number d-flex justify-content-center align-items-center rounded-circle">
                                                                        <h3>{{ $loop->iteration }}</h3>
                                                                    </div>
                                                                    @if ($poin->poin !== null)
                                                                        <p class="ms-2 mt-1">{!! $poin->poin !!}</p>
                                                                    @else
                                                                        <p class="ms-2 mt-1">Poin Kosong</p>
                                                                    @endif
                                                                    {{-- <p class=" ms-2 mt-1">{!! $poin->poin !!}</p> --}}
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
