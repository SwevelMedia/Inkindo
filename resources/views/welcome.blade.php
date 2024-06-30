@extends('layouts.app-home')

@section('title', 'Home')

@section('css')
    <style>
        div .owl-nav {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- Carousel -->
    <div class="carousel-main position-relative">
        <div class="ft_next_mainCar ft_nav btn-next-main-car position-absolute" style="height: 35px;width: 35px;">
            <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}" style="height: 35px;width: 35px; "
                alt="nav-button-right">
        </div>
        <div class="owl-carousel mainCraousel">
            @forelse($slider as $slider)
                <div class="position-relative">
                    <img class="d-block img-fluid" id="carousel_image"
                        src="{{ asset('storage/uploads/admin/slider/' . $slider->gambar) }}" alt="Slide Image">
                    <div class="caraousel-text position-absolute text-center py-3 px-5" id="caraousel-bg"
                        style="color: #0169B8;">
                        <h4 class="fw-semibold mb-1">{{ $slider->judul }}</h4>
                        <p class="mb-0" style="--bs-font-font-size: .75rem;">{{ $slider->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger my-5">
                    Tidak Ada Data Slider
                </div>
            @endforelse
        </div>
        <div class="ft_prev_mainCar btn-prev-main-car ft_nav position-absolute" style="height: 35px;width: 35px;">
            <img src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}" style="height: 35px;width: 35px; "
                alt="nav-button-left">
        </div>
        {{-- <div>
            <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div> --}}
        {{-- <ol class="carousel-indicators">
            <li class="active" data-bs-target="#carousel-1" data-bs-slide-to="0"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="3"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="4"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="5"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="6"></li>
        </ol> --}}
    </div>
    <!-- End Carousel -->

    {{-- Profile --}}
    <section>
        <div class="container mb-5">
            @foreach ($profil as $profil)
                <div class="row gy-4 gy-md-0">
                    <div class="col-md-6 position-relative">
                        <div class="p-xl-3 mx-xl-5 mt-xl-5">
                            <div class="position-relative">
                                <img class="img-fluid rounded-4"
                                    style="padding: 5px; column-count: 2; column-gap: 50px; border-radius:70%;"
                                    src="{{ asset('storage/uploads/profil/' . $profil->gambar_prakata) }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-start d-flex justify-content-center align-items-center">
                        <div class="profil-text pt-xl-5 px-xl-5 mx-xl-3">
                            <h1 class="text-uppercase fw-semibold" style="color: #000000">Profil</h1>
                            {{-- style="--bs-btn-font-size: .75rem;" --}}
                            <div class="mt-0 justify-txt-align" style="--bs-font-font-size: .75rem;">{!! $profil->deskripsi_home !!}
                            </div>
                            <a href="{{ route('home.profil') }}"
                                class="btn fw-medium btn-outline-primary custom-tombol mt-3 px-4 py-2 rounded-pill fs-6">Selengkapnya
                                <i class="fas fa-arrow-right fs-medium ms-1 "></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Profile -->

    {{-- Galeri --}}
    <section>
        <div class="container mb-5">
            <div class="row h-75 ">
                <div class="galeri">
                    <div class="px-0 d-flex flex-column justify-content-center align-items-center">
                        <div class="galeri-title mx-2">
                            <h1 class="fw-semibold mt-2 mb-3 text-uppercase">GALERI KEGIATAN</h1>
                        </div>

                        <div class="container position-relative">
                            <div class="ft_prev_galeri ft_nav position-absolute top-50 start-0 translate-middle"
                                style="height: 35px;width: 35px;">
                                <img src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                                    style="height: 35px;width: 35px; " alt="nav-button-left">
                            </div>
                            <div class="d-flex flex-wrap justify-content-center align-items-center w-100 mx-2 mb-3"
                                role="tablist">
                                <div class="mx-2 menu-galeri-btn">
                                    <a class="menu-galeri btn nav-item active d-flex justify-content-center align-items-center fs-6 border-0 py-2 px-4 fw-medium rounded-pill"
                                        data-bs-toggle="pill" data-bs-target="#list-galeri-galAll" type="button"
                                        role="tab" aria-controls="list-galeri-galAll">Semua</a>
                                </div>
                                @foreach ($galeri_kategori as $item)
                                    <div class="mx-2 menu-galeri-btn">
                                        <a class="menu-galeri btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 py-2 px-4 fw-medium rounded-pill"
                                            data-bs-toggle="pill" data-bs-target="#list-galeri-{{ $item->id }}"
                                            type="button" role="tab"
                                            aria-controls="list-galeri-{{ $item->id }}">{{ $item->nama_kategori }}</a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="list-galeri-galAll" role="tabpanel"
                                    tabindex="0">
                                    <div class="img-card owl-carousel galeri_slider galeri-card d-flex flex-wrap justify-content-center"
                                        id="owl-latest">
                                        @foreach ($galeris as $galeri)
                                            <div class="card card-agenda border-0 rounded-3 mb-2 p-2"
                                                style="width: 15rem; height:18rem">
                                                <img class="max-img-height object-fit-cover rounded-2"
                                                    src="{{ asset('storage/uploads/admin/galeri/' . $galeri->nama_foto) }}"
                                                    style="height: 156px;width:225px;" alt="galeri-img">
                                                <div class="card-body mb-0">
                                                    <div
                                                        class="text-center w-100 two-line-text text-title-1 fw-semibold p-0 my-auto">
                                                        {{ $galeri->judul }}
                                                    </div>
                                                    <div
                                                        class="calender time d-inline d-flex justify-content-center align-items-center mt-3">
                                                        <i class="bi bi-calendar2-minus me-2" style="color: #bbbbbb;"></i>
                                                        <p class="m-0 text-calender-1 one-line-text">
                                                            {{ \Carbon\Carbon::parse($galeri->tanggal)->isoFormat('D MMMM Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                @foreach ($galeri_kategori as $kat)
                                    <div class="tab-pane fade" id="list-galeri-{{ $kat->id }}" role="tabpanel"
                                        tabindex="0">
                                        <div class="img-card owl-carousel galeri_slider galeri-card d-flex flex-wrap justify-content-center"
                                            id="owl-latest" data-aos="zoom-in" data-aos-duration="1500"
                                            data-aos-offset="5px" data-bss-baguettebox>
                                            @foreach ($galeris as $galeri)
                                                @if ($galeri->kategori_gallery_id == $kat->id)
                                                    <div class="card card-agenda border-0 rounded-3 mb-2 p-2"
                                                        style="width: 15rem; height:18rem">
                                                        <img class="max-img-height object-fit-cover rounded-2"
                                                            src="{{ asset('storage/uploads/admin/galeri/' . $galeri->nama_foto) }}"
                                                            style="height: 156px;width:225px;" alt="galeri-img">
                                                        <div class="card-body mb-0">
                                                            <div
                                                                class="text-center w-100 two-line-text text-title-1 fw-semibold p-0 my-auto">
                                                                {{ $galeri->judul }}
                                                            </div>
                                                            <div
                                                                class="calender time d-inline d-flex justify-content-center align-items-center mt-3">
                                                                <i class="bi bi-calendar2-minus me-2"
                                                                    style="color: #bbbbbb;"></i>
                                                                <p class="m-0 text-calender-1 one-line-text">
                                                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->isoFormat('D MMMM Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <strong>Mohon maaf!</strong> Belum ada data.
                                                        <button type="button"></button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="ft_next_galeri ft_nav position-absolute top-50 start-100 translate-middle"
                                style="height: 35px;width: 35px; ">
                                <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                                    style="height: 35px;width: 35px; " alt="nav-button-left">
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('home.galeri') }}"
                                    class="btn fw-medium btn-outline-primary custom-tombol mt-3 px-4 py-2 rounded-pill fs-6">Selengkapnya
                                    <i class="fas fa-arrow-right ms-1 "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END Galeri --}}

    <!-- Berita -->
    <section>
        <div class="container mb-5">
            <div class="row d-flex flex-column justify-content-center align-items-center">
                <div class="mx-2">
                    <h1 class="fw-semibold text-center text-uppercase mt-2">BERITA</h1>
                </div>
                <div class="review-text w-50 ">
                    <p class="text-center text-dark p-0 mb-3" style="--bs-font-font-size: .75rem;">Dokumentasi kegiatan
                        dan
                        agenda yang telah dilaksanakan</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 mb-2 main-berita d-flex flex-column align-items-center" style="height: 400px;">
                    @forelse($lastBerita as $mainBerita)
                        <div class="card card-main-berita border-0 mx-2 p-0 " style="height: 400px;">
                            <a class="text-decoration-none" href="{{ route('home.berita', $mainBerita->id) }}">
                                <img class="card-img-top"
                                    src="{{ asset('storage/uploads/admin/berita/' . $mainBerita->poster) }}"
                                    alt="img-main-berita" style="max-height: 260px;object-fit: fill;"></a>
                            <hr style="color: #0169B8;" class="pt-0 my-0">
                            <div class="card-body pb-3">
                                <div class="berita-header pb-2">
                                    <img src="{{ asset('assets/img/homepage/stick.png') }}" alt="stick">
                                    <div class="d-inline card-text text-desc-card-1 text-start p-0 pb-1"
                                        style="color:#005896">
                                        <i class="bi bi-calendar2-minus mx-2" style="color: #005896;"></i>
                                        {{-- <i class="fa-regular ms-2 fa-calendar-days" style="font-size: 18px;"></i> <span
                                            class="fw-light ms-1"> --}}
                                        {{ \Carbon\Carbon::parse($mainBerita->created_a)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                </div>
                                <a class="card-text text-decoration-none two-line-text fw-semibold fs-5 text-start px-0 py-0"
                                    href="{{ route('home.berita', $mainBerita->id) }}"
                                    style="font-size: 1rem; color:#202124; max-width:478px;">
                                    {{ $mainBerita->judul }}</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            Belum Ada Data Berita
                        </div>
                    @endforelse
                </div>
                <div class="col-md-5 flex-md-nowrap ms-md-2 mb-2 mt-2 mt-md-0"
                    style="overflow-y: scroll;overflow-x:hidden; height: 400px;">
                    @forelse($recentBerita as $berita)
                        <div class="row mb-md-2 card-main-berita">
                            <div class="col-md-4">
                                <a class="text-decoration-none" href="{{ route('home.berita', $berita->id) }}">
                                    <img class="card-img-top "
                                        style="max-height: 60px;object-fit: cover;border-radius:5px;"
                                        src="{{ asset('storage/uploads/admin/berita/' . $berita->poster) }}" /></a>
                            </div>
                            <div class="col pt-2 pt-md-0 mb-0">
                                <a class="text-over text-decoration-none mb-0 pb-1"
                                    href="{{ route('home.berita', $berita->id) }}">
                                    <div class="fw-semibold pb-1 text-title-1 two-line-text" style="max-width: 328px;">
                                        {{ $berita->judul }}
                                    </div>
                                </a>
                                <p class="m-0 text-calender-1">
                                    {{-- <i class="fa-regular me-1 fa-calendar-days"
                                        style="font-size: 18px;"></i> --}}
                                    <i class="bi bi-calendar2-minus me-2" style="color: #bbbbbb;"></i>
                                    <span>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</span>
                                </p>
                            </div>
                            <hr class="pt-0 mt-0 mt-2 mb-0" style="color: #0169B8 1px solid;">
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            Belum Ada Data Berita
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center ">
                    <a href="{{ route('home.beritas') }}"
                        class="btn fw-medium btn-outline-primary custom-tombol mt-3 px-4 py-2 rounded-pill fs-6 ">Selengkapnya
                        <i class="fas fa-arrow-right ms-1 "></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- END Berita --}}

    <!-- Anggota -->
    <section>
        <div class="container mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-2 col-md-12 agenda-header mx-auto d-flex align-items-center">
                    <div class="row row-agenda-header">
                        <div class="agenda-header">
                            <h1 class="fw-semibold text-uppercase mt-2">ANGGOTA</h1>
                            <p class="text-dark px-0 mb-3">Daftar anggota yang terdaftar</p>
                            <div class="btn-agenda px-0">
                                <a href="{{ route('home.daftar-anggota') }}"
                                    class="btn fw-medium btn-outline-primary custom-tombol px-4 py-2 rounded-pill fs-6">Selengkapnya
                                    <i class="fas fa-arrow-right ms-1 "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto position-relative">
                    <div class="ft_next_agenda ft_nav position-absolute top-50 start-100 translate-middle"
                        style="height: 35px;width: 35px;">
                        <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div id="owl-latest" class="owl-carousel agenda_slider">
                            @foreach ($anggotas as $anggota)
                                <div class="card card-agenda border-0 rounded-3 mt-3 mb-2 p-2"
                                    style="width: 15rem; height: 25.5rem">
                                    <div class="p-2">
                                        @if ($anggota->anggota->logo)
                                            <img src="{{ asset('storage/uploads/anggota/logo/' . $anggota->anggota->logo) }}"
                                                class="card-img-top pb-1" alt="..." height="180px; width: 270px;">
                                        @else
                                            <img src="{{ asset('uploads/anggota/profil/logo_inkindo_grey.png') }}"
                                                class="card-img-top pb-1" alt="..." height="180px; width: 270px;">
                                        @endif
                                    </div>
                                    <div class="card-body mb-0">
                                        <div class="px-3 perusahaan">
                                            <div class="two-line-text w-100 text-title-1 mb-3 fw-semibold">
                                                {{ $anggota->anggota->perusahaan }}</div>
                                        </div>
                                        <div class="mb-3 px-3 d-flex justify-content-start email">
                                            {{-- <i class="fa-solid fa-envelope" style="font-size: 20px; color:#0169B8;"></i> --}}
                                            <i class="bi bi-envelope mb-0"
                                                style="font-size: 20px; color:#0169B8;line-height: 0;"></i>
                                            <p class="ms-2 mb-0 one-line-text text-desc-card-1">
                                                {{ $anggota->email }}
                                            </p>
                                        </div>
                                        <div class="mb-3 px-3 d-flex justify-content-start alamat">
                                            {{-- <i class="fa-solid fa-location-dot"
                                                style="font-size: 20px; color:#0169B8;"></i> --}}
                                            <i class="bi bi-geo-alt mb-0"
                                                style="font-size: 20px; color:#0169B8;line-height: 0;"></i>
                                            <p class=" ms-2 mb-0 one-line-text text-desc-card-1">
                                                {{ $anggota->anggota->alamat }}
                                            </p>
                                        </div>
                                        <div>
                                            <a href="{{ route('home.profil-anggota', $anggota->id) }}"
                                                class="btn fw-semibold btn-outline-primary w-100 custom-tombol px-4 py-2 rounded-3 text-desc-card-1">Profil
                                                Anggota
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ft_prev_agenda ft_nav position-absolute top-50 start-0 translate-middle"
                        style="height: 35px;width: 35px;"><img
                            src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END Anggota --}}

    <!-- Mitra -->
    <section>
        <div class="container mb-5">
            <div class="row mt-3 ">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1 class="fw-semibold text-uppercase mt-2">Mitra</h1>
                    <p class="w-lg-50 mb-3" style="--bs-font-font-size: .75rem;">Beberapa perusahaan rekanan yang
                        bekerjasama
                        dengan kami</p>
                </div>
            </div>
            <div class="caraousel-mitra2 position-relative">
                <div class="ft_next_mitra ft_nav position-absolute top-50 start-100 translate-middle"
                    style="height: 35px;width: 35px;">
                    <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                        style="height: 35px;width: 35px; " alt="nav-button-right">
                </div>
                <div class="row d-lg-flex align-items-lg-center mitra_slider owl-carousel owl-theme">
                    @foreach ($mitras as $mitra)
                        <div class="col item d-flex align-items-center">
                            <div class="card card-agenda border-0 rounded-3 mb-2 p-2" style="width: 15rem; height: 10rem">
                                <img class="max-img-height rounded-2"
                                    src="{{ asset('storage/uploads/admin/mitra/' . $mitra->logo) }}"
                                    style="object-fit: contain;  height:150px" alt="galeri-img">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ft_prev_mitra ft_nav position-absolute top-50 start-0 translate-middle"
                    style="height: 35px;width: 35px;">
                    <img src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                        style="height: 35px;width: 35px; " alt="nav-button-left">
                </div>
            </div>
        </div>
    </section>
    <!-- End Mitra -->

    {{-- DMI --}}
    <section>
        <div class="container mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-2 dmi-header-area col-md-12 mx-auto d-flex align-items-center">
                    <div class="row row-dmi-header">
                        <div class="dmi-header">
                            <h1 class="fw-semibold text-uppercase px-0">direktori material inkindo</h1>
                            <p class="text-dark mb-3 px-0" style="--bs-font-font-size: .75rem;">Temukan berbagai
                                material terbaik</p>
                            <div class="btn-agenda px-0">
                                <a href="{{ route('dmi.search') }}" target="_blank"
                                    class="btn fw-medium btn-outline-primary custom-tombol px-4 py-2 rounded-pill fs-6">Selengkapnya
                                    <i class="fas fa-arrow-right fs-medium ms-1 "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-8 mx-auto position-relative">
                    <div class="ft_next_dmi ft_nav position-absolute top-50 start-100 translate-middle"
                        style="height: 35px;width: 35px;">
                        <img src="{{ asset('assets/img/homepage/btn-navigation-right.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                    <div class="row d-flex justify-content-center ">
                        <div id="owl-latest" class="owl-carousel bbb_slider">
                            @if ($dmiResponse)
                                @foreach ($dmiResponse as $dmi)
                                    <div class="item active card border-0 card-search-product mt-3 mb-4 p-1"
                                        style="width: 18rem;height: 28rem;">
                                        <div class="img-agenda">
                                            <img src="{{ 'https://estimator.id/assets/foto/produk/' . $dmi['foto'] }}"
                                                height="180px" class="card-img-top" alt="imgDmi">
                                            <hr class="m-0 p-0" style="color: #0169B8">
                                        </div>
                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="d-flex align-items-center">
                                                    <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                                        {{ $dmi['nama_produk'] }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="merk-produk">
                                                    <div class="d-inline-block">
                                                        <p class="mb-3 fw-semibold one-line-text text-title-2" style="color: #0169B8;">
                                                            Rp<span>{{ number_format($dmi['harga_dasar'], 0, ',', '.') }}<Span
                                                                    class="fw-normal text-desc-card-1">/{{ $dmi['satuan'] }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center pb-0 mb-3">
                                                <div class="logo-suplier">
                                                    <a href="#"><img class="w-100"
                                                            src="{{ 'https://estimator.id/assets/foto/pengguna/' . $dmi['foto_suplier'] }}"
                                                            alt="..." style="max-width: 40px; max-height:20px"></a>
                                                </div>

                                                <div class="d-inline-block">
                                                    <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                                        {{ $dmi['nama_suplier'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-fill d-flex align-items-center">
                                                    <a href="{{ route('dmi.detail-product', $dmi['id_produk']) }}"
                                                        type="button" class="btn btn-outline-secondary w-100">Detail</a>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <a href="https://wa.me/{{ $dmi['no_wa'] }}" type="button"
                                                        class="btn btn-outline-primary active w-100"
                                                        style="background:#0169B8">
                                                        <i class="bi bi-cart me-2"></i>
                                                        Pesan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Mohon maaf!</strong> Server bermasalah.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="ft_prev_dmi ft_nav position-absolute top-50 start-0 translate-middle"
                        style="height: 35px;width: 35px;"><img
                            src="{{ asset('assets/img/homepage/btn-navigation-left.png') }}"
                            style="height: 35px;width: 35px; " alt="nav-button-left">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END DMI --}}

    <!-- Regulasi -->
    <section>
        <div class="container regulasi-container mb-5">
            <div class="row">
                <div class="col-md-8 col-xl-6 col-12 text-center mx-auto">
                    <h1 class="fw-semibold text-uppercase mt-2">Regulasi</h1>
                    <p class="w-lg-50 mb-3" style="--bs-font-font-size: .75rem;">Regulasi-regulasi terbaru yang ada di
                        Inkindo
                    </p>
                </div>
                <div class="search col-md-12 d-flex justify-content-center">
                    <input id="search-data-input"
                        class="input-search form-control-sm mt-md-0 pt-md-2 pb-md-2 pe-md-5 ps-md-4" type="search"
                        placeholder="Ketik kata kunci regulasi" style="border-radius: 30px;width: 40%;" />
                </div>
            </div>
            <div class="row d-flex flex-row justify-content-center regulasi-row">
                <div class="col-md-4 mt-3 regulasi-kategori">
                    <div class="row d-flex justify-center">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <div class="reg-opt opt-first position-relative mb-2">
                                <div class="reg-number border border-2 border-light d-flex justify-content-center align-items-center rounded-circle position-absolute top-50 translate-middle"
                                    style="background:#0169B8;width: 40px; height:40px; left:0;border:white;">
                                    <p class="m-0 p-0 text-light">1</p>
                                </div>
                                <a class="nav-item active w-100 ps-4 btn reg-btn fw-semibold " id="v-pills-home-tab"
                                    data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Semua Regulasi</a>
                            </div>
                            <?php
                            $counter = 2;
                            ?>
                            @foreach ($kategori as $kategori)
                                <div class="reg-opt position-relative my-2">
                                    <div class="reg-number border border-2 border-light d-flex justify-content-center align-items-center rounded-circle position-absolute top-50 translate-middle"
                                        style="background:#0169B8;width: 40px; height:40px; left:0;">
                                        <p class="m-0 p-0 text-light">{{ $counter++ }}</p>
                                    </div>
                                    <a class="nav-item w-100 px-4 btn reg-btn fw-semibold"
                                        id="v-pills-{{ $kategori->id }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-{{ $kategori->id }}" type="button" role="tab"
                                        aria-controls="v-pills-{{ $kategori->id }}"
                                        aria-selected="false">{{ $kategori->arsip_kategori }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row d-flex regulasi-img justify-content-center mt-5">
                        <img height="200px" src="{{ asset('assets/img/homepage/komponen_DMI-1.svg') }}" alt="img-dmi">
                    </div>
                </div>
                {{-- arsip_kategori_id --}}
                <div class="col-md-6 mt-3 regulasi-content">
                    <div class="tab-content ms-3" id="v-pills-tabContent">
                        <div class="tab-pane content-first fade show active tab-pane-custom" id="v-pills-home"
                            role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            @foreach ($arsips as $arsip)
                                <h5 class="text-title-1 fs-semibold">{{ $arsip->nama_arsip }}</h5>
                                <p class="text-desc-card-1">{{ $arsip->keterangan }}</p>
                                <a href="{{ asset('storage/uploads/admin/arsip/' . $arsip->file_arsip) }}"
                                    class="btn btn-sm btn-outline-primary custom-tombol d-inline-flex justify-content-xl-center align-items-xl-center px-4"
                                    role="button">
                                    Lihat <i class="fa-solid ms-2 fas fa-arrow-right"></i>
                                    {{-- <i class="fas fa-arrow-right fs-medium ms-1 "></i> --}}
                                </a>
                                <hr style=" border: 1px solid black;">
                            @endforeach
                        </div>
                        @foreach ($kategori2 as $kategori)
                            <div class="tab-pane fade" id="v-pills-{{ $kategori->id }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $kategori->id }}-tab" tabindex="0">
                                @foreach ($arsips as $arsip)
                                    @if ($arsip->arsip_kategori_id == $kategori->id)
                                        <h5 class="text-title-1 fs-semibold">{{ $arsip->nama_arsip }}</h5>
                                        <p class="text-desc-card-1">{{ $arsip->keterangan }}</p>

                                        <a href="{{ asset('storage/uploads/admin/arsip/' . $arsip->file_arsip) }}"
                                            class="btn btn-sm btn-outline-primary custom-tombol d-inline-flex justify-content-xl-center align-items-xl-center px-4"
                                            role="button">
                                            Lihat <i class="fa-solid ms-2 fa-arrow-right"></i></a>
                                        <hr style="border: 1px solid black;">
                                    @endif
                                @endforeach
                            </div>
                        @endforeach

                        <div class="tab-result-reg">
                            <div class="tab-pane fade tab-pane-custom" id="v-pills-searchReg" role="tabpanel"
                                aria-labelledby="v-pills-searchReg-tab" tabindex="0">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Regulasi -->

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.mainCraousel').length) {
                var mainSlider = $('.mainCraousel');
                mainSlider.owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                });

                if ($('.ft_next_mainCar').length) {
                    var next = $('.ft_next_mainCar');
                    next.on('click', function() {
                        mainSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev_mainCar').length) {
                    var prev = $('.ft_prev_mainCar');
                    prev.on('click', function() {
                        mainSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.bbb_slider').length) {
                var ftSlider = $('.bbb_slider');
                ftSlider.owlCarousel({
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
                        768: {
                            items: 3
                        },
                        991: {
                            items: 4
                        }
                    }
                });

                if ($('.ft_next_dmi').length) {
                    var next = $('.ft_next_dmi');
                    next.on('click', function() {
                        ftSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev_dmi').length) {
                    var prev = $('.ft_prev_dmi');
                    prev.on('click', function() {
                        ftSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.agenda_slider').length) {
                var ftSlider = $('.agenda_slider');
                ftSlider.owlCarousel({
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

                if ($('.ft_next_agenda').length) {
                    var next = $('.ft_next_agenda');
                    next.on('click', function() {
                        ftSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_next_agenda').length) {
                    var prev = $('.ft_prev_agenda');
                    prev.on('click', function() {
                        ftSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.galeri_slider').length) {
                var ftSlider = $('.galeri_slider');
                ftSlider.owlCarousel({
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
                        576: {
                            item: 3
                        },
                        768: {
                            item: 3
                        },
                        1700: {
                            items: 3
                        },
                    }
                });

                if ($('.ft_next_galeri').length) {
                    var next = $('.ft_next_galeri');
                    next.on('click', function() {
                        ftSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev_galeri').length) {
                    var prev = $('.ft_prev_galeri');
                    prev.on('click', function() {
                        ftSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.mitra_slider').length) {
                var ftSlider = $('.mitra_slider');
                ftSlider.owlCarousel({
                    loop: true,
                    autoWidth: true,
                    margin: 20,
                    nav: false,
                    autoplay: false,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        576: {
                            item: 3
                        },
                        768: {
                            item: 3
                        },
                        1700: {
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
    <script>
        $(document).ready(function() {
            $('.tab-result-reg').hide();
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Atur token dalam header setiap kali melakukan permintaan Ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $("#search-data-input").on('keyup', function(e) {
                e.preventDefault();
                $('.tab-result-reg').show();
                $('.reg-opt .active').removeClass('active');
                $('.regulasi-content .active').removeClass('show active');
                let value = $(this).val();

                if (value == '') {
                    $('.tab-result-reg').hide();
                    $('.opt-first .reg-btn').addClass('active');
                    $('.regulasi-content .content-first').addClass('show active');
                } else {
                    $.ajax({
                        type: "GET",
                        url: "/searchTextRegulasi",
                        data: {
                            kata_kunci: value
                        },
                        success: function(response) {
                            setTimeout(() => {
                                tampilkanReg(response);
                            }, 0);
                        }
                    });
                }
            });

            function tampilkanReg(data) {
                const containerTarget = $('#v-pills-searchReg');
                containerTarget.addClass('show active');

                const dataArray = Object.values(data);
                const lengthData = dataArray.length;
                console.log('lenth data', lengthData)

                let resultArsipHtml = ``;
                $.each(dataArray, function(key, value) {

                    let nama_reg = value[0].arsip.nama_arsip;
                    let file_reg = value[0].arsip.file_arsip;
                    let keterangan = value[0].arsip.keterangan;
                    let arsip_id = value[0].arsip_id;

                    resultArsipHtml += `<h5>${nama_reg}</h5>
                    <p>${keterangan}</p> 
                     <p>Terdapat di halaman : <span class="arsipHal${arsip_id}"></span> buka file untuk lebih jelasnya</p> 
                     <a href="{{ asset('storage/uploads/admin/arsip/', '') }}/${file_reg}"
                                            class="btn btn-sm btn-outline-primary custom-tombol d-inline-flex justify-content-xl-center align-items-xl-center px-4"
                                            role="button">
                                            Lihat <i class="fa-solid ms-2 fa-arrow-right"></i></a>
                    <hr style=" border: 1px solid black;">`
                });
                containerTarget.empty();
                $(containerTarget).append(resultArsipHtml);
                // console.log('result arsip', resultArsipHtml);  
                // let targetHal = ``;
                setTimeout(() => {
                    $.each(dataArray, function(key, value) {
                        $.each(value, function(index, item) {
                            let targetHal = $(`.arsipHal${item.arsip_id}`);
                            targetHal.append(item.halaman, ', ');
                        });
                    });
                    // console.log('target hal', targetHal);
                }, 0);

            }
        });
    </script>
@endsection
