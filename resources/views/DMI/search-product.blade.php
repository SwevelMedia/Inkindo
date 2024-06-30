@extends('DMI.layouts.app')

@section('title', 'DMI')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/DMI/search.css') }}">
    <style>
        div .owl-nav {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row mt-lg-5">
                <div class="col-md-7 d-flex align-items-center">
                    <div class="bundle">
                        <h1 class="fw-semibold">Temukan berbagai material di <span class="my-3"> <br>Direktori Material
                                Inkindo</span></h1>
                        <p class="mb-3" style="--bs-font-font-size: .75rem;">Semua layanan anggota INKINDO berbasis online
                        </p>
                        <div class="mt-p">
                            <a href="{{ route('dmi.about-us') }}"> <button
                                    class="btn btn-outline-primary custom-tombol-red me-4">Tentang
                                    DMI</button>
                            </a>
                            <a href="{{ route('dmi.produk-us') }}">
                                <button class="btn btn-outline-primary custom-tombol-red">Lihat Produk</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 position-relative">
                    <div class="kotak mt-5 rounded-5 d-flex align-items-center position-absolute shadow">
                        <div class="kecil ms-3 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-list-check text-white"></i>
                        </div>
                        <div class="text ms-3 d-flex align-items-center ">
                            <h6>100+</h6>
                            <p>Product</p>
                        </div>
                    </div>
                    <div
                        class="kotak rounded-5 ms-5 d-flex align-items-center shadow position-absolute top-100 start-50 translate-middle">
                        <div class="kecil ms-3 d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-list-check text-white"></i>
                        </div>
                        <div class="text ms-2 d-flex align-items-center">
                            <h6>100+</h6>
                            <p>Supllier DMI</p>
                        </div>
                    </div>
                    <div class="position abbsolute">
                        <img src="{{ asset('assets/img/DMI/search/image.png') }}" height="100%" width="360px" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Suplier --}}
    <section>
        <div class="container">
            <div class="row mb-2 mt-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3 class="fw-semibold text-uppercase">Supplier kami</h3>
                    <p class="w-lg-50 mb-3" style="--bs-font-font-size: .75rem;">Bekerja sama dengan perusahaan pemasok
                        profesional</p>
                </div>
            </div>
            <div class="caraousel-mitra2 position-relative">
                <div class="ft_next_mitra ft_nav position-absolute top-50 start-100 translate-middle"
                    style="height: 35px;width: 35px;">
                    <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                        style="height: 35px;width: 35px; " alt="nav-button-right">
                </div>
                <div class="row d-lg-flex align-items-lg-center owl-mitra owl-carousel owl-theme ">
                    @foreach ($dataAllSuplier as $item)
                        <div class="col item d-flex align-items-center">
                            <div class="card card-agenda border-0 rounded-3 mb-2 p-2" style="width: 15rem; height: 10rem">
                                <img class="max-img-height rounded-2"
                                    src="{{ 'https://estimator.id/assets/foto/pengguna/' . $item['logo'] }}"
                                    style="object-fit: contain;  height:150px" alt="galeri-img">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ft_prev_mitra ft_nav position-absolute top-50 start-0 translate-middle"
                    style="height: 35px;width: 35px;">
                    <img src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}" style="height: 35px;width: 35px; "
                        alt="nav-button-left">
                </div>
            </div>
        </div>
    </section>
    {{-- End Suplier --}}
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="d-flex-column align-items-center text-center">
                    <h2 class="fw-semibold">Rekomendasi Produk</h2>
                    <div class="d-block">
                        <p class="mb-3">Temukan berbagai tawaran produk menarik untuk anda</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($dataRekomendasi as $item)
                    <div class="col-6 col-sm-6 col-lg-3 p-1 p-md-2 d-flex justify-content-center">
                        <div class="card item active w-100 card card-rek-dmi">
                            <div class="img-agenda">
                                <img src="{{ 'https://estimator.id/assets/foto/produk/' . $item['foto'] }}"
                                    class="card-img-top" alt="">
                                <hr class="m-0 p-0" style="color: #0169B8">
                            </div>
                            <div class="card-body mt-2">
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                            {{ $item['nama_produk'] }}</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="merk-produk">
                                        <div class="text-semi-lg d-inline-block">
                                            <p class="mb-3 fw-semibold" style="color: #0169B8;">
                                                Rp<span>{{ Str::limit(number_format($item['harga_dasar'], 0, ',', '.'), 60) }}<Span
                                                        class="fw-normal"
                                                        style="font-size: 14px;">/{{ $item['satuan'] }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pb-0 mb-3">
                                    <div class="logo-suplier">
                                        <a href="#"><img class="w-100 my-0"
                                                src="{{ 'https://estimator.id/assets/foto/pengguna/' . $item['logo_suplier'] }}"
                                                alt="..." style="max-width: 40px; max-height:20px"></a>
                                    </div>
                                    <div class="d-inline-block">
                                        <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                            {{ $item['nama_suplier'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between gap-1 gap-sm-0">
                                    <div class="flex-fill d-flex align-items-center">
                                        <a href="{{ route('dmi.detail-product', $item['id_produk']) }}" type="button"
                                            class="btn btn-outline-secondary w-100">Detail</a>
                                    </div>
                                    <div class="flex-fill ms-3">
                                        <a href="https://wa.me/{{ $item['phone'] }}" type="button"
                                            class="btn btn-outline-primary active w-100" style="background:#0169B8">
                                            <i class="bi bi-cart me-2"></i>
                                            Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="m-2 menu-galeri-btn">
                        <a href="{{ route('dmi.produk-us') }}"
                            class="btn fw-medium btn-outline-primary custom-tombol mt-3 px-4 py-2 rounded-pill fs-6">Selengkapnya
                            <i class="d-none d-md-inline fas fa-arrow-right ms-1 "></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row mt-5">
                <h3 class="fw-semibold mb-3">Produk Terbaru </h3>
                <div class="d-flex">
                    <div class="col-lg-12 col-md-8 col-sm-12 col-12  mx-auto position-relative">
                        <div class="news_next ft_nav position-absolute top-50 start-100 translate-middle"
                            style="height: 35px;width: 35px;">
                            <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                                style="height: 35px;width: 35px; " alt="nav-button-left">
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div id="news_slider" class="owl-carousel mt-3 news_slider">
                                @foreach ($dataTerbaru as $item)
                                    <div class="card item active shadow-produk border-0 card card-rek-dmi p-1 mb-5" style="width: 20rem;height: 28rem;">
                                        <div class="img-agenda">
                                            <img src="{{ 'https://estimator.id/assets/foto/produk/' . $item['foto'] }}"
                                                height="180px; width: 290px;" class="card-img-top" alt="">
                                            <hr class="m-0 p-0" style="color: #0169B8">
                                        </div>
                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="d-flex align-items-center">
                                                    <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                                        {{ $item['nama_produk'] }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="merk-produk">
                                                    <div class="text-semi-lg d-inline-block">
                                                        <p class="mb-3 fw-semibold text-title-2" style="color: #0169B8;">
                                                            Rp<span>{{ Str::limit(number_format($item['harga_dasar'], 0, ',', '.'), 60) }}<Span
                                                                    class="fw-normal text-desc-card-1">/{{ $item['satuan'] }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center pb-0 mb-3">
                                                <div class="logo-suplier">
                                                    <a href="#"><img class="w-100"
                                                            src="{{ 'https://estimator.id/assets/foto/pengguna/' . $item['logo_suplier'] }}"
                                                            alt="..." style="max-width: 40px; max-height:20px"></a>
                                                </div>
                                                <div class="d-inline-block">
                                                    <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                                        {{ $item['nama_pengguna'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between gap-1">
                                                <div class="flex-fill d-flex align-items-center">
                                                    <a href="{{ route('dmi.detail-product', $item['id_produk']) }}"
                                                        type="button"
                                                        class="btn btn-outline-secondary w-100">Detail</a>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <a href="https://wa.me/{{ $item['phone'] }}" type="button"
                                                        class="btn btn-outline-primary w-100 h-100 p-2 px-md-4 px-lg-3 active"  style="background:#0169B8"><i
                                                            class="d-none d-lg-inline bi bi-cart me-sm-2"></i>Pesan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="news_prev ft_nav position-absolute top-50 start-0 translate-middle"
                            style="height: 35px;width: 35px;"><img
                                src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                                style="height: 35px;width: 35px; " alt="nav-button-left">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <h3 class="fw-semibold mb-3">Produk Paling Populer </h3>
                <div class="d-flex">
                    <div class="col-lg-12 col-md-8 col-sm-12 col-12 mx-auto position-relative">
                        <div class="pop_next ft_nav position-absolute top-50 start-100 translate-middle"
                            style="height: 35px;width: 35px;">
                            <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                                style="height: 35px;width: 35px; " alt="nav-button-left">
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div id="owl-latest" class="owl-carousel mt-3 pop_slider">
                                @foreach ($dataPopuler as $item)
                                     <div class="card item active shadow-produk border-0 card card-rek-dmi p-1 mb-5" style="width: 20rem;height: 28rem;">
                                        <div class="img-agenda">
                                            <img src="{{ 'https://estimator.id/assets/foto/produk/' . $item['foto'] }}"
                                                height="180px; width: 290px;" class="card-img-top" alt="">
                                            <hr class="m-0 p-0" style="color: #0169B8">
                                        </div>
                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="d-flex align-items-center">
                                                    <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                                        {{ $item['nama_produk'] }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="merk-produk">
                                                    <div class="text-semi-lg d-inline-block">
                                                        <p class="mb-3 fw-semibold text-title-2" style="color: #0169B8;">
                                                            Rp<span>{{ Str::limit(number_format($item['harga_dasar'], 0, ',', '.'), 60) }}<Span
                                                                    class="fw-normal text-desc-card-1">/{{ $item['satuan'] }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center pb-0 mb-3">
                                                <div class="logo-suplier">
                                                    <a href="#"><img class="w-100"
                                                            src="{{ 'https://estimator.id/assets/foto/pengguna/' . $item['logo_suplier'] }}"
                                                            alt="..." style="max-width: 40px; max-height:20px"></a>
                                                </div>
                                                <div class="d-inline-block">
                                                    <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                                        {{ $item['nama_suplier'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between gap-1">
                                                <div class="flex-fill d-flex align-items-center">
                                                    <a href="{{ route('dmi.detail-product', $item['id_produk']) }}"
                                                        type="button"
                                                        class="btn btn-outline-secondary w-100">Detail</a>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <a href="https://wa.me/{{ $item['phone'] }}" type="button"
                                                        class="btn btn-outline-primary w-100 h-100 p-2 px-md-4 px-lg-3 active"  style="background:#0169B8"><i
                                                            class="d-none d-lg-inline bi bi-cart me-sm-2"></i>Pesan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pop_prev ft_nav position-absolute top-50 start-0 translate-middle"
                            style="height: 35px;width: 35px;"><img
                                src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                                style="height: 35px;width: 35px; " alt="nav-button-left">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.owl-mitra').length) {
                var trendsSlider = $('.owl-mitra');
                trendsSlider.owlCarousel({
                    loop: true,
                    autoWidth: true,
                    margin: 20,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 4
                        },
                        600: {
                            items: 6
                        },
                        1000: {
                            items: 7
                        }
                    }
                });

                if ($('.ft_next_mitra').length) {
                    var next = $('.ft_next_mitra');
                    next.on('click', function() {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev_mitra').length) {
                    var prev = $('.ft_prev_mitra');
                    prev.on('click', function() {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.news_slider').length) {
                var trendsSlider = $('.news_slider');
                trendsSlider.owlCarousel({
                    loop: true,
                    autoWidth: true,
                    margin: 20,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        575: {
                            items: 2
                        },
                        991: {
                            items: 4
                        }
                    }
                });

                if ($('.news_next').length) {
                    var next = $('.news_next');
                    next.on('click', function() {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.news_prev').length) {
                    var prev = $('.news_prev');
                    prev.on('click', function() {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.pop_slider').length) {
                var trendsSlider = $('.pop_slider');
                trendsSlider.owlCarousel({
                    loop: true,
                    autoWidth: true,
                    margin: 20,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        575: {
                            items: 2
                        },
                        991: {
                            items: 4
                        }
                    }
                });

                if ($('.pop_next').length) {
                    var next = $('.pop_next');
                    next.on('click', function() {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.pop_prev').length) {
                    var prev = $('.pop_prev');
                    prev.on('click', function() {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
@endsection
