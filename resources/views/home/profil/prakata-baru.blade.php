@extends('layouts.app-home')

@section('title', 'Prakata')

@section('css')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/profil/prakata.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profil/responsive.css') }}">
@endsection
@endsection
@section('content')
<section>
    @foreach ($prakata as $item)
        <div class="container-fluid px-0" id="prakata">
           <div class="row">
                <div>
                    <div class="d-block nav-pra d-flex align-items-center justify-content-center"
                        style="background-image: url('{{ asset('assets/img/bg-navbar.svg') }}'); object-fit-cover;">
                        <h2>Prakata</h2>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="container my-5">
                    <div class="row mb-0 justify-content-between">
                        <div class="col-lg-4 col-md-12 my-lg-5 my-md-0">
                            <div class="d-flex justify-content-center">
                                <div class="rectangle-2">
                                    <img src="{{ asset('assets/img/profil/bg-kotak.svg') }}" alt="">
                                </div>
                                <div class="rectangle">
                                    <img src="{{ asset('storage/uploads/profil/' . $item->foto_prakata) }} "
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 my-lg-4 mb-md-5">
                            <div class="sub-prakata mx-5 ">
                                <div class="nama">
                                    <h1 class="fw-semibold text-center">{!! $item->nama_prakata !!}</h1>
                                </div>
                                <div class="jabatan">
                                    <h1 class="fw-semibold text-center mb-3">{!! $item->jabatan !!}
                                </div>
                                <div class="kata">
                                    <p class="mb-0 text-desc">{!! $item->sambutan !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection
