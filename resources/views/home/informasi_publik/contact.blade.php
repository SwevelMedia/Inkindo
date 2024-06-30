@extends('layouts.app-home')

@section('title', 'Contact-us')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
@endsection

@section('content')
    {{-- <section> --}}
    <div class="container-fluid px-0" id="contact-us">
        <div class="kontak row bg">
            <div class="col-xl-6 col-md-6 col-sm-6 position-relative d-flex align-items-center bg-kontak1-col">
                <img class="bg-kontak-1 position-absolute" src="{{ asset('assets/img/bg-contact-us-2.svg') }}"
                    alt="">
                <h1 class="position-absolute ">Hubungi kami <span class="d-flex sub-h1">Kami siap menanggapi pesan dengan
                        cepat dan profesional</span></h1>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6 bg-kontak2-col">
                <img class="bg-kontak-2" src="{{ asset('assets/img/bg-contact-us-1.svg') }}" alt="">
            </div>
        </div>
        <div class="container mt-5">
            @foreach ($kontak as $item)
                <div class="row px-2 ">
                    <div class="col-md-12 col-lg-4 card-contact">
                        <div class="card my-2" style="max-width: 100%">
                            <div class="card-body">
                                <div class="coba d-flex px-2 py-2 rounded">
                                    <i class="bi bi-telephone-plus mx-auto" style="color: white"></i>
                                </div>
                                <h5 class="card-title fw-bold pt-2">Hubungi kami</h5>
                                <p class="card-text px-0">Kami siap membantu kapan saja<a style=" text-decoration:none;"
                                        href="https://wa.me/{{ $item->no_hp }}"><span class="number d-flex"
                                            style="color: #0169B8;">
                                            {{ $item->no_hp }}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="card my-2" style="max-width: 100%">
                            <div class="card-body">
                                <div class="coba d-flex px-2 py-2 rounded">
                                    <i class="bi bi-envelope mx-auto" style="color: white"></i>
                                </div>
                                <h5 class="card-title fw-bold pt-2">Hubungi via email</h5>
                                <p class="card-text px-0">Kirimkan pesan anda lewat email<a style=" text-decoration:none;"
                                        href="mailto:{{ $item->email }}"><span class="d-flex"
                                            style="color: #0169B8">{{ $item->email }}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="card my-2" style="max-width: 100%">
                            <div class="card-body">
                                <div class="coba d-flex px-2 py-2 rounded">
                                    <i class="bi bi-instagram mx-auto" style="color: white"></i>
                                </div>
                                <h5 class="card-title fw-bold pt-2">Kunjungi sosial media kami</h5>
                                <p class="card-text px-0">Kunjungi kami lewat instagram<a style=" text-decoration:none;"
                                        href="https://www.instagram.com/{{ $item->instagram }}"><span class="d-flex"
                                            style="color: #0169B8">
                                            {{ $item->instagram }}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="card my-2" style="max-width: 100%">
                            <div class="card-body">
                                <div class="coba d-flex px-2 py-2 rounded">
                                    <i class="bi bi-geo-alt mx-auto" style="color: white"></i>
                                </div>
                                <h5 class="card-title fw-bold pt-2">kunjungi kami</h5>
                                <p class="card-text px-0">Kunjungi kami secara langsung <span class="d-flex"
                                        style="color: #0169B8">
                                        {{ $item->alamat }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-header-form form col-md-12 m-md-0  pt-lg-0 pt-xs pt-sm-5">
                        <div>
                            <h3 class=" fw-bold fs-3">Silahkan hubungi tim kami <span class="d-flex fs-6 fw-normal">Kami
                                    siap menanggapi pesan dengan cepat dan profesional</span></h3>
                        </div>
                        <form action="{{ route('hubungi.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3 mt-4">
                                <label for="nama" class="form-label fw-bold">Nama</label>
                                <input type="nama" class="form-control" name="nama" id="nama"
                                    placeholder="Masukan nama instansi">
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="subjek" class="form-label fw-bold">Subjek</label>
                                <select class="form-select" aria-label="Default select example" name="subjek">
                                    <option selected disabled>Pilih subjek</option>
                                    @foreach ($kategori as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                    placeholder="masukan alamat email">
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="pesan" class="form-label fw-bold">Pesan</label>
                                <textarea class="form-control" placeholder="Tuliskan pesan anda disini" name="pesan"
                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"
                                    style="width: 100%; background : #005896;">kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-12">
                        <div class="peta rounded nmx-auto px-0 d-flex justify-content-center">
                            {!! $item->maps !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- </section> --}}
@endsection
