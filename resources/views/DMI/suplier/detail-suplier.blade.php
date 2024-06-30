@extends('DMI.layouts.app')
@section('title', 'Detail Suplier')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/DMI/detail-supplier.css') }}">
@endsection
@section('content')
    <section style="background-color: #0169B8">
        <div class="container py-5">
            <div class="row  d-flex justify-content-between">
                <div class="col-12 col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="bulat">
                                <img class="object-fit-fill"
                                    src="{{ 'https://estimator.id/assets/foto/pengguna/' . $dataSuplierDetail['logo'] }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-8 col-md-9">
                            <h1 class="fw-semibold text-white nama_suplier mb-0" style="color: #000000; font-size: 30px;">
                                {{ $dataSuplierDetail['nama_pengguna'] }}
                            </h1>

                            <p class="mb-0 text-white full-konten d-none" style="text-align: justify">
                                {{ $dataSuplierDetail['profil'] }}<a class="btn-modal-reset fw-normal text-decoration-none"
                                    style="cursor: pointer;color:#ffff;"> Tampilkan
                                    lanjut sedikit...</a>
                            </p>
                            <p class="mb-0 text-white part-konten" style="text-align: justify">
                                {{ Str::limit($dataSuplierDetail['profil'], 100) }}<a
                                    class="btn-full-konten fw-bold text-decoration-none"
                                    style="cursor: pointer;color:#ffff;"> Lebih
                                    lanjut...</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-md-column align-items-center justify-content-center gap-3 gap-md-0 btn-hubungi">
                    <a href="#">
                        <button type="button" class="btn mb-md-2" style="background-color: white; width:150px;">
                            <p class="my-0 px-2 fw-normal"><i class="fa-brands fa-whatsapp me-2"
                                    style="color: #0169B8"></i><a class="text-decoration-none"
                                    href="https://wa.me/{{ $dataSuplierDetail['phone'] }}"
                                    style="color: #0169B8">Hubungi</a></p>
                        </button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn" style="background-color: white; width:150px;">
                            <p class="my-0 px-2 fw-normal">
                                <i class="fa-brands fa-info me-2" style="color: #0169B8"></i><a class="text-decoration-none"
                                    href="http://{{ $dataSuplierDetail['website'] }}" style="color: #0169B8">Kunjungi</a>
                            </p>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-9 col-md-3">
                    <div class="d-flex align-items-center mb-3 gap-3 p-2 ps-3 text-white "
                        style="background-color: #0169B8;">
                        <i class="fa-solid fa-filter"></i>
                        <h4 style="margin: 0; align-self: center !important;">Filter</h4>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn keyword_submit" type="button" id="keyword_submit"
                            style="border:1px solid #ced4da;"> <i class="fas fa-search"
                                style="color: #0169B8;"></i></button>
                        <input type="text" class="form-control keyword_produk" placeholder="Cari material"
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                    <section>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed active rounded-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false"
                                        aria-controls="collapseFilter" style="background-color: #0169B8;">
                                        <p class="m-0 text-white">Kategori Material</p>
                                    </button>
                                </h2>
                                <div id="collapseFilter" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach ($dataKategori as $item)
                                            <div class="form-check mb-3 d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <input type="checkbox" class="form-check-input kategori_check me-3"
                                                        id="dropdownCheck1" name="kategori[]"
                                                        value="{{ $item['id_kategori'] }}">
                                                    <label class="form-check-label"
                                                        for="dropdownCheck1">{{ $item['kategori'] }}</label>
                                                </div>
                                                <div class="badge blue-onlybg-inkindo text-white ms-2 my-auto">
                                                    {{ $item['jumlah'] }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed rounded-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseLocation" aria-expanded="false"
                                        aria-controls="collapseLocation" style="background-color: #0169B8;">
                                        <p class="m-0 text-white">Lokasi</p>
                                    </button>
                                </h2>
                                <div id="collapseLocation" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach ($dataWilayah['top_prov'] as $item)
                                            <div class="form-check mb-3  d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <input type="checkbox" name="wilayah[]"
                                                        value="{{ $item['id_wilayah'] }}"
                                                        class="form-check-input wilayah_check wilayah_top me-3"
                                                        id="dropdownCheck1">
                                                    <label class="form-check-label"
                                                        for="dropdownCheck1">{{ $item['prov'] }}</label>
                                                </div>
                                                <div class="badge blue-onlybg-inkindo text-white ms-2 my-auto">
                                                    {{ $item['produk_count'] }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--button modal--->
                                    <div class="btn btn-light text-decoration-none d-flex justify-content-between mx-3"
                                        type="button" data-bs-toggle="modal" data-bs-target="#form-lokasi"
                                        style="color: #0169B8;">
                                        <p class="my-auto">Lihat Selengkapnya</p>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal modal-lg ms-md-5 fade" id="form-lokasi" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header p-4">
                                                    <p class="p-2 fw-bold modal-title mx-2"
                                                        style="border-left: #0169B8 solid 5px">
                                                        Lokasi</p>
                                                    <div class="input-group mx-2">
                                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                                style="color: #0169B8;"
                                                                class="fa-solid fa-magnifying-glass"></i></span>
                                                        <input type="text" class="form-control search-input-lokasi"
                                                            aria-label="Sizing example input" placeholder="Cari lokasi"
                                                            aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                    <button type="button" class="btn-close mx-2" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mt-4 list-lokasi">
                                                            @foreach ($dataWilayah['kota'] as $item)
                                                                <div class="col-4 item-lokasi">
                                                                    <div class="form-check mb-3">
                                                                        <input type="checkbox" name="wilayah[]"
                                                                            value="{{ $item['id_wilayah'] }}"
                                                                            class="form-check-input wilayah_check wilayah_reguler">
                                                                        <label class="form-check-label"
                                                                            for="dropdownCheck3">{{ $item['kota'] }}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn blue-light-only-inkindo btn-reset-wilayah">Reset</button>
                                                    <button type="button" data-bs-dismiss="modal"
                                                        class="btn blue-only-inkindo btn-terapkan-wilayah active">Terapkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed rounded-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false"
                                        aria-controls="collapsePrice" style="background-color: #0169B8;">
                                        <p class="m-0 text-white">Harga</p>
                                    </button>
                                </h2>
                                <div id="collapsePrice" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Rp</span>
                                            <input id="harga_start_check" type="text" name="harga_start"
                                                class="form-control harga_start_check" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default" placeholder="Harga Terendah">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Rp</span>
                                            <input id="harga_end_check" type="text" name="harga_end"
                                                class="form-control harga_end_check" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default"
                                                placeholder="Harga Tertinggi">
                                        </div>
                                        <button type="submit" id="harga_submit"
                                            class="btn blue-only-inkindo w-100 harga_submit">Terapkan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed active rounded-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseMerk" aria-expanded="false"
                                        aria-controls="collapseMerk" style="background-color: #0169B8;">
                                        <p class="m-0 text-white">Merk Material</p>
                                    </button>
                                </h2>
                                <div id="collapseMerk" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach ($dataMerk['top_merk'] as $item)
                                            <div class="form-check mb-3  d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <input type="checkbox" name="merk[]" value="{{ $item['merk'] }}"
                                                        class="merk_check form-check-input merk_top me-3"
                                                        id="dropdownCheck1"
                                                        @if ($item['merk'] == str_replace("\r\n", '', $dataSuplierDetail['nama_pengguna'])) checked @endif>
                                                    <label class="form-check-label nama_merk"
                                                        for="dropdownCheck1">{{ $item['merk'] }}</label>
                                                </div>
                                                <div class="badge blue-onlybg-inkindo opacity-1-5 text-white ms-2 my-auto">
                                                    {{ $item['merk_count'] }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--button modal--->
                                    <div class="btn-light text-decoration-none d-flex justify-content-between mx-3 opacity-1-5"
                                        style="color: #0169B8;">
                                        <p class="my-auto">Lihat Selengkapnya</p>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal modal-lg ms-md-5 fade" id="form-merk" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header p-4">
                                                    <p class="p-2 fw-bold modal-title mx-2"
                                                        style="border-left: #0169B8 solid 5px">
                                                        Merk</p>
                                                    <div class="input-group mx-2">
                                                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                                                style="color: #0169B8;"
                                                                class="fa-solid fa-magnifying-glass"></i></span>
                                                        <input type="text" class="form-control search-input-merk"
                                                            aria-label="Sizing example input"
                                                            placeholder="Cari merk material"
                                                            aria-describedby="inputGroup-sizing-default">
                                                    </div>
                                                    <button type="button" class="btn-close mx-2" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mt-4 list-merk">
                                                            @foreach ($dataMerk['merk'] as $item)
                                                                <div class="col-4">
                                                                    <div class="form-check mb-3">
                                                                        <input type="checkbox" name="merk[]"
                                                                            value="{{ $item['merk'] }}"
                                                                            class="form-check-input merk_check merk_reguler"
                                                                            id="dropdownCheck3">
                                                                        <label class="form-check-label"
                                                                            for="dropdownCheck3">{{ $item['merk'] }}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn blue-light-only-inkindo btn-reset-merk">Reset</button>
                                                    <button type="button" data-bs-dismiss="modal"
                                                        class="btn blue-only-inkindo btn-terapkan-merk active">Terapkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <div class="col-12 col-md-9">
                    <div class="row d-flex align-items-center mt-5 mt-md-0">
                        <div class="col-8">
                            <div class="d-flex-column align-items-center"
                                style="border-left: 10px solid #0169B8 !important;">
                                <div class="mx-3 py-1">
                                    <h3 class="fw-semibold pt-2">Produk Material Kami</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" style="background-color: #0169B8 !important;">
                                <p class="my-0 px-2 fw-normal"><i class="fa-solid fa-download me-2"></i>Unduh Katalog</p>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-8">
                            <p>Menampilkan Produk Supplier</p>
                        </div>
                        <div class="col-4">
                            <div class="d-flex">
                                <p class="my-auto me-3">Urutkan</p>
                                <select class="form-select pengurutan" aria-label="Default select example">
                                    <option value="none" selected>Paling sesuai</option>
                                    <option value="asc">Harga terendah</option>
                                    <option value="desc">Harga tertinggi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <div class="row d-flex justify-content-center justify-content-lg-between mt-3 list-produk"
                                    data-id={{ $idSuplier }}>

                                </div>
                                <div class="d-flex justify-content-center nav nav-tabs gap-2 button-produk border-0 my-5"
                                    id="pagination-container">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on('click', '.btn-full-konten', function(e) {
            e.preventDefault();
            $('.part-konten').hide();
            $('.full-konten').removeClass("d-none");
        });

        $(document).on('click', '.btn-modal-reset', function(e) {
            e.preventDefault();
            $('.part-konten').show();
            $('.full-konten').addClass("d-none");
        });

        $(document).ready(function() {
            $('.merk_check').prop('disabled', true);
        });
    </script>
    <script style="text/javascript">
        $(document).ready(function() {
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            let currentPage = 1;
            let pageLimit = 9;
            let totalPage = 1;

            function fetchData() {
                const targetContainerHtml = $('.list-produk');
                const idSuplier = targetContainerHtml.data('id');

                $.ajax({
                    url: "{{ route('dmi.produk.suplier', '') }}/" + idSuplier,
                    type: 'GET',
                    contentType: 'application/json',
                    cache: false,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    data: {
                        page: currentPage,
                        page_limit: pageLimit,
                    },
                    success: function(response) {
                        console.log('data produk: ', response);
                        targetContainerHtml.empty();
                        setTimeout(() => {
                            if (response.produk.data.length > 0) {
                                totalPage = response.produk.pagination.total_page;

                                $.each(response.produk.data, function(key, item) {
                                     let resultProdukPaginationHtml =
                                    `<div class="col-6 col-sm-6 col-lg-4 p-1 p-md-2 d-flex justify-content-center">
                                        <div class="card mb-0 mb-ms-3 shadow-produk item active card w-100">
                                            <div class="img-agenda">
                                                <img src="{{ 'https://estimator.id/assets/foto/produk/', '' }}/${item.foto[0]}"
                                                     class="card-img-top" alt="">
                                                <hr class="m-0 p-0" style="color: #0169B8">
                                            </div>
                                            <div class="card-body mt-2">
                                                <div class="row">
                                                    <div class="d-flex align-items-center">
                                                        <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                                       ${((item.nama_produk))}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="merk-produk">
                                                        <div class="text-semi-lg d-inline-block">
                                                            <p class="mb-3 fw-semibold text-title-2" style="color: #0169B8;">
                                                                Rp<span>
                                                                    ${((item.harga_dasar).substring(0,60)+'...').toLocaleString()}<Span
                                                                        class="fw-normal text-desc-card-1" style="overflow:hidden;">/${
                                                                        item.satuan }</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center pb-0 mb-3">
                                                    <div class="logo-suplier">
                                                        <a href="#"><img class="w-100"
                                                                src="{{ 'https://estimator.id/assets/foto/pengguna/', '' }}/${response.suplier.logo}"
                                                                alt="..." style="max-width: 40px; max-height:20px"></a>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                                            ${((response.suplier.nama_pengguna)) }
                                                        </p>
                                                    </div>
                                                </div>
                                                  <div class="d-flex justify-content-between gap-1 gap-sm-2 gap-sm-0">
                                                    <div class="flex-fill d-flex align-items-center">
                                                        <a href="{{ route('dmi.detail-product', '') }}/${item.id_produk}" type="button"
                                                        class="btn btn-outline-secondary w-100 h-100 p-2 px-md-4">Detail</a>
                                                    </div>
                                                    <div class="flex-fill ms-sm-3">
                                                        <a href="https://wa.me/${item.phone}" type="button"
                                                            class="btn btn-outline-primary w-100 h-100 p-2 px-md-4 px-lg-3 active"  style="background:#0169B8"><i
                                                            class="d-none d-lg-inline bi bi-cart me-sm-2"></i>Pesan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                    targetContainerHtml.append(
                                        resultProdukPaginationHtml);
                                });
                                // updatePagination(currentPage);
                            } else {

                            }

                        }, 0);
                        setTimeout(() => {
                            updatePagination(currentPage);
                        }, 0);
                        console.log(currentPage);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function updatePagination(currPage) {
                $('#pagination-container').empty();

                // Create Previous button
                if (currentPage > 1) {
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${currentPage-1}"><</a>`
                    );
                }

                // Create page buttons
                for (var i = currentPage; i <= currentPage + 4 && i <= totalPage; i++) {
                    // harusnya <= totalPages
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${i}">${i}</a>`
                    );
                }

                // Create Next button
                if (currentPage < totalPage) {
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${currentPage+1}">></a>`
                    );
                }
                console.log(currentPage);
                console.log(totalPage);

                setTimeout(() => {
                    $(document).ready(function() {
                        let btnPagination = $('.btn-pagination');
                        btnPagination.on('click', function(e) {
                            e.preventDefault();
                            let nilaiArgumen = $(this).data('page');
                            currentPage = nilaiArgumen;
                            console.log('curr page ', currentPage);
                            setTimeout(() => {
                                fetchData();
                            }, 0);
                        });
                    });
                }, 0);

            }
            // Initial data fetch
            fetchData();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            function handleCheckboxChange() {
                let selectedCategories = $('input[name="kategori[]"]:checked').map(function() {
                    return this.value;
                }).get();

                let selectedWilayah = $('input[name="wilayah[]"]:checked').map(function() {
                    return this.value;
                }).get();

                let selectedMaterial = $('input[name="merk[]"]:checked').map(function() {
                    return this.value;
                }).get();

                let keyword = $('.keyword_produk').val();

                let harga_start = $('#harga_start_check').val();
                let harga_end = $('#harga_end_check').val();

                if ($('.pengurutan').val() !== "none") {
                    let pengurutan = $('.pengurutan').val();
                    getDataFilter(selectedCategories, selectedWilayah, selectedMaterial, harga_start, harga_end,
                        keyword,
                        pengurutan)
                } else {
                    getDataFilter(selectedCategories, selectedWilayah, selectedMaterial, harga_start, harga_end,
                        keyword)
                }
            };

            $('.keyword_submit').click(function(e) {
                e.preventDefault();
                console.log($('.keyword_produk').val());
                handleCheckboxChange()
            });

            $('.keyword_produk').keypress(function(e) {
                if (e.which === 13) {
                    console.log($('.keyword_produk').val());
                    handleCheckboxChange()
                }
            });

            $('.kategori_check').change(function(e) {
                console.log($('.kategori_check').val());
                handleCheckboxChange()
            });

            $('.wilayah_top').change(function(e) {
                console.log($('.wilayah_top').val());
                handleCheckboxChange()
            });

            $('.btn-terapkan-wilayah').click(function(e) {
                console.log($('.wilayah_check').val());
                handleCheckboxChange()
            });

            $(('.btn-reset-wilayah')).click(function(e) {
                e.preventDefault();
                $('.wilayah_reguler').prop("checked", false);
            });

            $('.merk_top').change(function(e) {
                console.log($('.merk_top').val());
                handleCheckboxChange()
            });

            $(('.btn-reset-merk')).click(function(e) {
                e.preventDefault();
                $('.merk_reguler').prop("checked", false);
            });

            $('.btn-terapkan-merk').click(function(e) {
                console.log($('.merk_check').val());
                handleCheckboxChange()
            });

            $('.harga_submit').click(function(e) {
                e.preventDefault();
                console.log('harga start', $('.harga_end_check').val());
                console.log('harga end', $('.harga_start_check').val());
                handleCheckboxChange()
            });

            $('.pengurutan').change(function(e) {
                console.log($('.pengurutan').val());
                handleCheckboxChange()
            });

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            let currentPage = 1;
            let pageLimit = 9;
            let totalPage = 1;

            function getDataFilter(selectedCategories, selectedWilayah, selectedMaterial, harga_start, harga_end,
                keyword,
                ...pengurutan) {

                console.log('pengurutan rest', pengurutan);
                let selectedWilayahInt = selectedWilayah.map(function(value) {
                    return parseInt(value, 10); // atau parseFloat(value) untuk angka desimal
                });

                let selectedCategoriesInt = selectedCategories.map(function(value) {
                    return parseInt(value, 10); // atau parseFloat(value) untuk angka desimal
                });

                let dataForm = {
                    keyword: keyword,
                    merk: selectedMaterial,
                    kategori: selectedCategoriesInt,
                    harga_start: harga_start,
                    harga_end: harga_end,
                    wilayah: selectedWilayahInt,
                    page: currentPage,
                    page_limit: pageLimit,
                };

                if (pengurutan.length > 0) {
                    dataForm['order_rule'] = pengurutan[0];
                    dataForm['order_by'] = "harga_dasar";
                } else {
                    if ('order_rule' in dataForm) {
                        delete dataForm.order_rule;
                        delete dataForm.order_by;
                    }
                }

                console.log('dataform', dataForm);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('dmi.filter.produk') }}",
                    data: JSON.stringify(dataForm),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        totalPage = parseInt(response.pagination.total_page, 10);
                        currentPage = parseInt(response.pagination.page, 10);
                        console.log('data', response);
                        console.log('totalPage', totalPage);
                        console.log('currentPage', currentPage);

                        $('.list-produk-filtered').hide();
                        const targetContainerHtml = $('.list-produk');
                        targetContainerHtml.empty();

                        setTimeout(() => {
                            $.each(response.data, function(key, item) {
                                 let resultProdukPaginationHtml =
                                    `<div class="col-6 col-sm-6 col-lg-4 p-1 p-md-2 d-flex justify-content-center">
                                        <div class="card mb-0 mb-ms-3 shadow-produk item active card w-100">
                                            <div class="img-agenda">
                                                <img src="{{ 'https://estimator.id/assets/foto/produk/', '' }}/${item.foto[0]}"
                                                     class="card-img-top" alt="">
                                                <hr class="m-0 p-0" style="color: #0169B8">
                                            </div>
                                            <div class="card-body mt-2">
                                                <div class="row">
                                                    <div class="d-flex align-items-center">
                                                        <div class="two-line-text text-title-1 mb-3 fw-semibold">
                                                       ${((item.nama_produk))}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="merk-produk">
                                                        <div class="text-semi-lg d-inline-block">
                                                            <p class="mb-3 fw-semibold text-title-2" style="color: #0169B8;">
                                                                Rp<span>
                                                                    ${((item.harga_dasar).substring(0,60)+'...').toLocaleString()}<Span
                                                                        class="fw-normal text-desc-card-1" style="overflow:hidden;">/${
                                                                        item.satuan }</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center pb-0 mb-3">
                                                    <div class="logo-suplier">
                                                        <a href="#"><img class="w-100"
                                                                src="{{ 'https://estimator.id/assets/foto/pengguna/', '' }}/${response.suplier.logo}"
                                                                alt="..." style="max-width: 40px; max-height:20px"></a>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <p class="text-desc-card-1 mb-0 ms-2 one-line-text">
                                                            ${((response.suplier.nama_pengguna)) }
                                                        </p>
                                                    </div>
                                                </div>
                                                  <div class="d-flex justify-content-between gap-1 gap-sm-2 gap-sm-0">
                                                    <div class="flex-fill d-flex align-items-center">
                                                        <a href="{{ route('dmi.detail-product', '') }}/${item.id_produk}" type="button"
                                                        class="btn btn-outline-secondary w-100 h-100 p-2 px-md-4">Detail</a>
                                                    </div>
                                                    <div class="flex-fill ms-sm-3">
                                                        <a href="https://wa.me/${item.phone}" type="button"
                                                            class="btn btn-outline-primary w-100 h-100 p-2 px-md-4 px-lg-3 active"  style="background:#0169B8"><i
                                                            class="d-none d-lg-inline bi bi-cart me-sm-2"></i>Pesan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                targetContainerHtml.append(
                                    resultProdukPaginationHtml);
                            });
                        }, 0);

                        updatePagination(currentPage);
                        setTimeout(() => {
                            currentPage = 1;
                        }, 0);
                    }
                });
            }

            function updatePagination(currPage) {
                $('#pagination-container').empty();

                // Create Previous button
                if (currentPage > 1) {
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${currentPage-1}"><</a>`
                    );
                }

                // Create page buttons
                for (var i = currentPage; i <= currentPage + 4 && i <= totalPage; i++) {
                    // harusnya <= totalPages
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${i}">${i}</a>`
                    );
                }

                // Create Next button
                if (currentPage < totalPage) {
                    $('#pagination-container').append(
                        `<a class="btn-pagination btn nav-item d-flex justify-content-center align-items-center fs-6 border-0 fw-semibold rounded ${currentPage === i ? 'active' : ''}"
                        data-bs-toggle="pill" type="button" role="tab" data-page="${currentPage+1}">></a>`
                    );
                }

                setTimeout(() => {
                    $(document).ready(function() {
                        let btnPagination = $('.btn-pagination');
                        btnPagination.on('click', function(e) {
                            e.preventDefault();
                            let nilaiArgumen = $(this).data('page');
                            currentPage = nilaiArgumen;
                            console.log('curr page ', currentPage);
                            setTimeout(() => {
                                handleCheckboxChange()
                            }, 0);
                        });
                    });
                }, 0);

            }
        });
    </script>
@endsection
