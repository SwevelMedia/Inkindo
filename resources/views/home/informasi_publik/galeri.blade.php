@extends('layouts.app-home')

@section('title', 'Galeri')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
@endsection
@section('content')
    <section>
        <section class="bg-galeri-1 py-5" style="background-image: url('{{ asset('assets/img/bg-navbar.svg') }}');">
            <div class="row">
                <div class="bg-galeri">
                    <h1 class="text-center text-uppercase fw-bold my-2 my-sm-3 ">galeri kegiatan</h1>
                    <div class="d-flex justify-content-center">
                    </div>
                    <div class="nav nav-pills mb-3 d-flex justify-content-center my-auto py-auto" id="pills-tab"
                        role="tablist">
                        <div class="d-flex justify-content-center my-auto py-auto">
                            <div class="btn-1">
                                <button class="active btn btn-outline-light rounded-pill fw-bold px-4 py-2" id="pills-home-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Semua</button>

                            </div>
                            @foreach ($kategori as $item)
                                <div class="btn-1">
                                    <button class="btn btn-outline-light rounded-pill fw-bold px-4 py-2"
                                        id="pills-profile-tab-{{ $item->id }}" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile-{{ $item->id }}" type="button" role="tab"
                                        aria-controls="pills-profile-{{ $item->id }}" aria-selected="false">
                                        {{ $item->nama_kategori }} </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row my-5">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="row row-cols-md-3 g-4">
                            @forelse ($galeri as $item)
                                <div class="col-6 col-sm-6 col-lg-3 p-1 p-md-2 mt-0 d-flex justify-content-center">
                                    <div class="item active border-0 card-agenda card m-0 w-100 p-2">
                                        <a href="{{ route('home.galeri-detail', $item->id) }}">
                                            <img src="{{ asset('storage/uploads/admin/galeri/' . $item->nama_foto) }}"
                                                height="180px" class="card-img-top" alt="">
                                        </a>
                                        <div class="card-body mb-0">
                                            <div class="card-text text-title-1 text-center fw-semibold p-0 my-auto"
                                                style="--bs-font-font-size: .75rem; height: 35px;">
                                                {{ Str::limit($item->judul, 35) }}
                                            </div>
                                            <div
                                                class="calender time d-inline d-flex justify-content-center align-items-center mt-3">
                                                <i class="bi bi-calendar2-minus me-2" style="color: #bbbbbb;"></i>
                                                <p class="m-0 text-calender-1 one-line-text">
                                                    {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}
                                                </p>
                                                {{-- <p class="d-inline fw-medium mb-0"> {{ $galeri->tanggal }}</p> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    <h5 class="fw-bold">Belum ada data</h5>
                                    {{-- <p class="fw-bold">Belum ada Data</p> --}}
                                </div>
                            @endforelse
                        </div>
                    </div>
                    @foreach ($kategori2 as $item)
                        <div class="tab-pane fade" id="pills-profile-{{ $item->id }}" role="tabpanel"
                            aria-labelledby="pills-profile-tab-{{ $item->id }}" tabindex="0">
                            <div class="row d-flex justify-content-center">
                                @php
                                    $galeriExists = false;
                                @endphp
                                @foreach ($galeri as $gali)
                                    @if ($gali->kategori_gallery_id == $item->id)
                                        <div class="col-6 col-sm-6 col-lg-3 p-1 p-sm-2 d-flex justify-content-center">
                                            <div class="item active card galeri-all-card mb-4 w-100">
                                                <div class="img-agenda">
                                                    <a href="{{ route('home.galeri-detail', $gali->id) }}">
                                                        <img src="{{ asset('storage/uploads/admin/galeri/' . $gali->nama_foto) }}"
                                                            height="180px" class="card-img-top" alt="">
                                                        <hr class="m-0 p-0" style="color: blue">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-text text-semi-lg text-center fw-bold p-0 my-2"
                                                        style="--bs-font-font-size: .75rem; height: 35px;">
                                                        {{ Str::limit($gali->judul, 35) }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="card-footer mt-auto btn-portofolio d-flex justify-content-center">
                                                    <div
                                                        class="calender time d-inline d-flex justify-content-center align-items-center">
                                                        <i class="bi bi-calendar2-minus me-2" style="color: #0F7DFF;"></i>
                                                        <p class="m-0" style="font-size: 0.8rem; color:#929395;">
                                                            {{ \Carbon\Carbon::parse($gali->tanggal)->isoFormat('D MMMM Y') }}
                                                        </p>
                                                        {{-- <p class="d-inline fw-medium mb-0"> {{ $galeri->tanggal }}</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $galeriExists = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if (!$galeriExists)
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <p class="fw-bold">Belum ada Data</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center my-3"> {{ $galeri->links('pagination::bootstrap-4') }} </div> --}}
        </div>
    </section>
@endsection
