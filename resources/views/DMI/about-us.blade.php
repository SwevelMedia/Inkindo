@extends('DMI.layouts.app')

@section('title', 'About')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/DMI/about-us.css') }}">

    <style>
        div .owl-nav {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <section id="about-us">
        <div class="row">
            <div class="position-relative">
                <img class="background position-absolute h-100vh d-none d-md-block top-25 end-0"
                    src="{{ asset('assets/img/DMI/about-us/phone.svg') }}" alt="">
            </div>
            <div class="container-fluid position-relative">
                <div class="container">
                    <div class="row mt-md-2 pt-lg-5">
                        <div class="col-md-6 col-lg-8 my-lg-5">
                            <div class="d-flex-column align-items-center"
                                style="border-left: 10px solid #0169B8 !important;">
                                <div class="mx-3 py-1">
                                    <h3 class="fw-semibold pt-2">Tentang Kami</h3>
                                </div>
                            </div>
                            <p class="mt-3 text-start">Direktori Material INKINDO adalah sebuah platform berbasis website
                                dan mobile app yang menyediakan informasi lengkap dan terpercaya mengenai berbagai material
                                yang diperlukan oleh para konsultan dalam berbagai proyek. Dengan terfokus pada digitalisasi
                                informasi, platform ini bertujuan untuk memberikan kemudahan kepada para konsultan dalam
                                pencarian dan identifikasi material yang sesuai dengan kebutuhan proyek mereka, sekaligus
                                memberikan peluang bagi vendor untuk mempromosikan dan memperkenalkan produk-produk unggul
                                mereka kepada target audiens yang tepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-75 px-3 mb-5" src="{{ asset('assets/img/DMI/about-us/gambar-1.svg') }}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row px-3">
                        <div class="card mb-3 rounded-start rounded-5 shadow"
                            style="border-left: 10px solid #1C92EB !important;">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2  ">
                                        <div class="d-flex justify-content-center">
                                            <img class="" src="{{ asset('assets/img/DMI/about-us/icon-1.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-10 ">
                                        <div class="row ">
                                            <h3 style="color: #0169B8" class="fw-semibold">Kualitas Tertinggi</h3>
                                            <p>Hadirkan Kualitas Tertinggi di setiap aspek produk kami</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" card mb-3 rounded-start rounded-5 shadow"
                            style="border-left: 10px solid #1C92EB !important;">
                            <div class="card-body  ">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2  ">
                                        <div class="d-flex justify-content-center">
                                            <img class="" src="{{ asset('assets/img/DMI/about-us/icon-2.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-10 ">
                                        <div class="row ">
                                            <h3 style="color: #0169B8" class="fw-semibold">Harga Terjangkau</h3>
                                            <p>Hadirkan Kualitas Tertinggi di setiap aspek produk kami</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 rounded-start rounded-5 shadow"
                            style="border-left: 10px solid #1C92EB !important;">
                            <div class="card-body  ">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2  ">
                                        <div class="d-flex justify-content-center">
                                            <img class="" src="{{ asset('assets/img/DMI/about-us/icon-3.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-10 ">
                                        <div class="row ">
                                            <h3 style="color: #0169B8" class="fw-semibold">Mudah dan Cepat</h3>
                                            <p>Hadirkan Kualitas Tertinggi di setiap aspek produk kami</p>
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
        <div class="container mb-5">
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
@endsection
