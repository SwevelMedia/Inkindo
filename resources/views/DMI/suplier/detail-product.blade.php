@extends('DMI.layouts.app')
@section('title', 'Detail Product')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/DMI/detail-produk.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

@endsection
@section('content')
    <section>
        <div class="container d-flex align-items-end">
            <div class="row mt-5 w-100 ">
                {{-- <div class="col-12 col-md-2 ps-lg-5 d-flex  justify-content-center flex-md-column gap-2 gap-md-0">
                    @if (count($dataDetailProduk['product']['foto']) > 1)
                        @foreach ($dataDetailProduk['product']['foto'] as $item => $value)
                            <div class="image-list mb-2 rounded-4 d-flex justify-content-center align-items-center">
                                <img src="{{ 'https://estimator.id/assets/foto/produk/' . $dataDetailProduk['product']['foto'][$item] }}"
                                    alt="Image 1">
                            </div>
                        @endforeach
                    @endif                       
                </div> --}}
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <!---default-->
                    <div class="preview w-100 h-100 rounded-5 d-flex justify-content-center align-items-center">
                        @if (count($dataDetailProduk['product']['foto']) > 1)
                            @foreach ($dataDetailProduk['product']['foto'] as $item => $value)
                                <div class="image-list mb-2 rounded-4 d-flex justify-content-center align-items-center">
                                    <img id="preview-image"
                                        src="{{ 'https://estimator.id/assets/foto/produk/' . $dataDetailProduk['product']['foto'][$item + 1] }}"
                                        alt="Preview Image">
                                </div>
                            @endforeach
                        @else
                            @foreach ($dataDetailProduk['product']['foto'] as $item => $value)
                                <div class="image-list mb-2 rounded-4 d-flex justify-content-center align-items-center">
                                    <img id="preview-image"
                                        src="{{ 'https://estimator.id/assets/foto/produk/' . $dataDetailProduk['product']['foto'][$item] }}"
                                        alt="Preview Image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-10  col-md-4 mt-5 mt-md-0 d-flex align-items-center mx-auto">
                    <div class="d-flex flex-column btn-portofolio rounded-5 p-3" style="background-color: #F5F5F5;">
                        <h4 class="fw-medium">LED-E1-P45-E27-3W-3000K-CT-V7</h4>
                        <h4 class="my-3 fw-bold" style="color: #0169B8;">Rp
                            <span>{{ Str::limit(number_format($dataDetailProduk['product']['harga_dasar'], 0, ',', '.'), 60) }}</span><span
                                class="fw-normal text-dark">/buah</span>
                        </h4>
                        <p style="--bs-font-font-size:.75rem;">Kategori : <span class="fw-semibold"
                                style="color: #0169B8;">{{ $dataDetailProduk['product']['kategori'] }}</span></p>
                        <p>Merk : <span class="fw-semibold" style="color: #0169B8;">Dekson</span></p>
                        <h6>Supplier : <span class="fw-semibold"
                                style="color: #0169B8;">{{ $dataDetailProduk['supplier']['nama_pengguna'] }}</span>
                        </h6>
                        <a href="https://wa.me/{{ $dataDetailProduk['supplier']['phone'] }}" type="button"
                            class="btn my-3 custom-btn"><i class="fa-solid fa-cart-plus me-2"></i>Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs det-produk" id="nav-tab" role="tablist">
                            <button class="nav-link active fw-semibold btn-det-produk" id="nav-home-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                                aria-controls="nav-home" aria-selected="true">Deksripsi</button>
                            <button class="nav-link fw-semibold btn-det-produk" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Informasi
                                Supplier</button>
                        </div>
                    </nav>
                    <div class="tab-content mt-3 " id="nav-tabContent ">
                        <div class="tab-pane fade show active " id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <p class="px-3 px-md-0">{{ $dataDetailProduk['product']['deskripsi'] }}
                            </p>
                        </div>
                        <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-sm-3  ">
                                        <div class="d-flex justify-content-center ">
                                            <div class="bulat">
                                                <img class=""
                                                    src="{{ 'https://estimator.id/assets/foto/pengguna/' . $dataDetailProduk['supplier']['logo'] }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-9 ">
                                        <div class="d-flex flex-column text-center text-md-start pt-3 pt-sm-0">
                                            <h4 class="fw-bold">{{ $dataDetailProduk['supplier']['nama_pengguna'] }}</h4>
                                            <p class="px-3 px-md-0">{{ $dataDetailProduk['supplier']['profil'] }}</p>
                                            <div class="row">
                                                <div class="d-flex justify-content-center justify-content-md-start ">
                                                    <a href="#"
                                                        class="btn custom-btn fw-semibold text-white my-2 py-2 px-4 rounded-pill fs-6 shadow"
                                                        id="custom-blue" style="background-color: #0169B8 !important;">Lihat
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mitra -->
    <section>
        <div class="container pb-5 mt-4 ">
            <div class="row mb-2 mt-5">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="fw-bold text-uppercase">Produk Terkait</h3>
                    <a class="text-decoration-none" href="{{ route('dmi.produk-us') }}">
                        <p class="fw-semibold" style="color: #0169B8">Show All</p>
                    </a>
                </div>
            </div>
            <div class="d-flex mt-5">
                <div class="col-lg-12 col-md-8 col-sm-12 col-8 mx-auto position-relative">
                    <div class="terkait_next ft_nav position-absolute top-50 start-100 translate-middle"
                        style="height: 35px;width: 35px;">
                        <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div id="terkait_slider" class="owl-carousel terkait_slider">
                            @foreach ($produkPopuler as $item)
                                <div class="card item active card card-dmi w-100 mt-3 mb-4">
                                    <div class="img-agenda">
                                        <img src="{{ 'https://estimator.id/assets/foto/produk/' . $item['foto'] }}"
                                            height="180px; width: 270px;" class="card-img-top" alt="">
                                        <hr class="m-0 p-0" style="color: #0169B8">
                                    </div>
                                    <div class="card-body mt-1">
                                        <div class="row">
                                            <div class="text-semi-lg d-flex align-items-center fw-bold"
                                                style="height: 40px;">
                                                {{ Str::limit($item['nama_produk'], 37) }} </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="merk-produk">
                                                <div class="text-semi-lg d-inline-block">
                                                    <p class="my-0 m-0 fw-bold" style="color: #0169B8;">
                                                        Rp<span>{{ Str::limit(number_format($item['harga_dasar'], 0, ',', '.'), 60) }}<Span
                                                                class="fw-semibold"
                                                                style="font-size: 14px;">/{{ $item['satuan'] }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center pb-2">
                                            <div class="logo-suplier">
                                                <a href="#"><img class="w-100"
                                                        src="{{ 'https://estimator.id/assets/foto/pengguna/' . $item['logo_suplier'] }}"
                                                        alt="..." style="max-width: 40px; max-height:20px"></a>
                                            </div>
                                            <div class="text-smaller ms-3 pt-3 d-inline-block fw-bold">
                                                <p> {{ Str::limit($item['nama_suplier'], 25) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer btn-portofolio">
                                        <div class="d-flex justify-content-between my-2">
                                            <a href="{{ route('dmi.detail-product', $item['id_produk']) }}"
                                                type="button" class="btn btn-outline-secondary px-4">Detail</a>
                                            <a href="https://wa.me/{{ $item['phone'] }}" type="button"
                                                class="btn btn-outline-primary px-3 active"><i
                                                    class="fa-solid fa-cart-plus me-2"></i>Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="terkait_prev ft_nav position-absolute top-50 start-0 translate-middle"
                        style="height: 35px;width: 35px;"><img
                            src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const imageList = document.querySelectorAll('.image-list img');
        const previewImage = document.getElementById('preview-image');

        imageList.forEach((img) => {
            img.addEventListener('click', () => {
                previewImage.src = img.src;
            });
        });
    </script>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.terkait_slider').length) {
                var trendsSlider = $('.terkait_slider');
                trendsSlider.owlCarousel({
                    loop: true,
                    margin: 25,
                    nav: false,
                    autoplayHoverPause: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        575: {
                            items: 2
                        },
                        991: {
                            items: 4
                        }
                    }
                });

                if ($('.terkait_next').length) {
                    var next = $('.terkait_next');
                    next.on('click', function() {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.terkait_prev').length) {
                    var prev = $('.terkait_prev');
                    prev.on('click', function() {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.owl-mitra').length) {
                var ftSlider = $('.owl-mitra');
                ftSlider.owlCarousel({
                    loop: true,
                    autoWidth: 1,
                    nav: false,
                    autoplayHoverPause: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            item: 3
                        },
                        768: {
                            item: 3
                        },
                        1400: {
                            items: 3
                        },
                    }
                });

                if ($('.ft_next_mitra').length) {
                    var next = $('.ft_next_mitra');
                    next.on('click', function() {
                        ftSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev_mitra').length) {
                    var prev = $('.ft_prev_mitra');
                    prev.on('click', function() {
                        ftSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
@endsection