@extends('layouts.app-home')

@section('title', 'Daftar Anggota')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/daftar-anggota.css') }}?<?php echo time(); ?>">
@endsection

@section('content')
{{-- <div class="container-fluid">
        <div class="row">
            <div class="d-block nav-prof d-flex align-items-center justify-content-center w-100"
                style="background-image: url('{{ asset('assets/img/bg-navbar.svg') }}');">
<h2>Profil</h2>
</div>
</div>
</div> --}}
<div class="container-fluid px-0" id="daftar-anggota">
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center" style=" background: url('{{ asset('assets/img/bg-navbar.svg') }}'); height: 180px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-white text-center fw-bold text-heeader" style="font-size: 40px;">Daftar Anggota
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex align-items-center mt-5 mb-3">
        <div class="search-filter col-12 d-md-flex justify-content-center">
            <!-- <input id="search-data-input" class="search-input form-control-sm mt-md-0 pt-md-3 pb-md-3 pe-md-5 card-anggota ps-md-4 shadow" type="search" placeholder="Cari informasi anggota" style="border-radius: 30px;width: 40%;    " /> -->


            <div class=" search-wrapper form-control-sm d-flex gap-3 mt-md-0 pt-md-3 pb-md-3 pe-md-5 card-anggota ps-md-4 shadow" style="border-radius: 30px;width: 45%;">
                <i class="bi bi-search" style="color:#6c757d"></i>
                <input id="search-data-input" type="search" placeholder="Cari informasi anggota" class="search-input border-0 w-100" />
            </div>

            {{-- <input class="search-input form-control-sm mt-md-0 pe-md-5 ps-md-4" type="search"
                    placeholder="cari daftar nama anggota" style="border-radius: 10px;width: 50%;" /> --}}
            <!-- <div class="dropdown d-flex align-items-center">
                <button class="btn-filter-anggota btn btn-primary dropdown-toggle ms-3 px-4 rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" style=" font-size:12px;  width: 100%; height: 100%;">Kategori
                    Anggota</button>
                <form id="filter-form">
                    @csrf
                    <ul class="dropdown-menu p-3" style="background:#F0F0F0">
                        <li>
                            <h6 class="blue-icon-inkindo fw-bold p-auto ms-2">Filter</h6>
                        </li>
                        <li class="submenu">
                            <div class="d-flex align-items-center ms-2">
                                <div class="ms-1">
                                    <img class="bg-danger d-inline-block" src="{{ asset('assets/img/keanggotaan/stick-3.png') }}" alt="stick" style="height: 15px">
                                    <a class="d-inline-block text-start text-dark text-decoration-none ms-2 mb-0 p-0" data-bs-toggle="collapse" href="#collapseKualifikasi" role="button" aria-expanded="false" aria-controls="collapseKualifikasi">
                                        Kualifikasi
                                    </a>
                                    <div class="input-group collapse" id="collapseKualifikasi">
                                        <div class="form-check ms-1">
                                            <input class="form-check-input" name="kualifikasi[]" type="checkbox" value="besar" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Besar
                                            </label>
                                        </div>
                                        <div class="form-check ms-1">
                                            <input class="form-check-input" name="kualifikasi[]" type="checkbox" value="menengah" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Menengah
                                            </label>
                                        </div>
                                        <div class="form-check ms-1">
                                            <input class="form-check-input" name="kualifikasi[]" type="checkbox" value="kecil" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Kecil
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="dropdown-divider"></div>
                        <div class="d-flex justify-content-around">
                            <div class="btn btn-outline-secondary">Batal</div>
                            <button type="submit" class="btn apply-btn custom-btn text-white blue-bg-inkindo ms-2">Simpan</button>
                        </div>
                    </ul>
                </form>
            </div> -->
        </div>
    </div>
    <div class="container my-4 d-flex justify-content-center">
        <div class="filter-kategori d-flex flex-column">
            <!-- <h5 class="fw-bold mb-3"><i class="bi bi-funnel-fill me-2"></i>Kualifikasi</h5> -->
            <form id="filter-form-new">
                @csrf
                <div class="input-group d-flex gap-3" id="form-kualifikasi">
                    <div class="">
                        <input class="d-none form-check-input kualifikasi-checkbox" name="kualifikasi[]" type="checkbox" value="kecil" id="defaultCheck1">
                        <button class="btn btn-outline-dark fw-bold rounded-pill px-3 py-1 text-semi-lg pills-kualifikasi" id="pills-kualifikasi-kecil" data-value="kecil" data-bs-toggle="pill" type="button" aria-controls="pills-home" aria-selected="false">Kecil

                        </button>
                    </div>
                    <div class="">
                        <input class="d-none form-check-input kualifikasi-checkbox" name="kualifikasi[]" type="checkbox" value="menengah" id="defaultCheck1">
                        <button class="btn btn-outline-dark fw-bold rounded-pill px-3 py-1 text-semi-lg pills-kualifikasi" id="pills-kualifikasi-menengah" data-value="menengah" data-bs-toggle="pill" type="button" aria-controls="pills-home" aria-selected="false">Menengah

                        </button>
                    </div>
                    <div class="">
                        <input class="d-none form-check-input kualifikasi-checkbox" name="kualifikasi[]" type="checkbox" value="besar" id="defaultCheck1">
                        <button class="btn btn-outline-dark fw-bold rounded-pill px-3 py-1 text-semi-lg pills-kualifikasi" id="pills-kualifikasi-besar" data-value="besar" data-bs-toggle="pill" type="button" aria-controls="pills-home" aria-selected="false">Besar

                        </button>
                    </div>


                </div>
            </form>
        </div>

    </div>
    <div class="container pb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 list-anggota d-flex justify-content-center">
        </div>
    </div>

    <div class="d-flex justify-content-center nav nav-tabs gap-2 button-produk border-0 mb-5" id="pagination-container">
    </div>
</div>
@endsection

@section('script')
<script>
    // Menghentikan event bubbling saat submenu diklik
    $(".submenu").on("click", function(e) {
        e.stopPropagation();
    });

    // Menampilkan dan menyembunyikan submenu saat submenu-trigger diklik
    // $(".submenu-trigger").on("click", function(e) {
    //     e.preventDefault();
    //     $(".submenu").toggleClass("show");
    // });

    // Menutup submenu saat dropdown-menu utama disembunyikan
    // $(".dropdown").on("hide.bs.dropdown", function() {
    //     $(".submenu").removeClass("show");
    // });
</script>
<script style="text/javascript">
    $(document).ready(function() {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        @auth
        var url = "{{ route('home.data-anggota') }}";
        @else
        var url = "{{ route('home.data-anggota-publik') }}";
        @endauth

        let currentPage = 1;
        let pageLimit = 9;
        let totalPage = 1;

        function fetchData() {
            $.ajax({
                url: url,
                type: 'GET',
                contentType: 'application/json',
                cache: false,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                },
                data: {
                    page: currentPage,
                },
                success: function(response) {
                    const targetContainerHtml = $('.list-anggota');
                    totalPage = response.last_page;
                    currentPage = response.current_page;
                    targetContainerHtml.empty();
                    setTimeout(() => {

                        $.each(response.data, function(key, item) {
                            let collapseName = "collapseKontak";
                            let collapseNameHref = "#collapseKontak";
                            let noTelpHTML = '';
                            let kontakHref = item.email ? '' : "{{ route('login') }}";
                            if (item.no_telp) {
                                const numbers = item.no_telp.split(',');
                                numbers.forEach((number, index) => {
                                    noTelpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                });
                            }

                            let noHpHTML = '';
                            if (item.no_hp) {
                                const numbers = item.no_hp.split(',');
                                numbers.forEach((number, index) => {
                                    noHpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                });
                            }
                            let resultAnggotaPaginationHtml = `<div class="col p-1 p-md-2"
                                    id="item-anggota">
                                    <div class="card shadow card-agenda card-anggota rounded-3 p-0 w-100 h-100"
                                      style="width: 40px;" >
                                        <div class="p-1 d-flex justify-content-center">
                                            ${item.logo ? `<img
                                                                    src="{{ asset('storage/uploads/anggota/logo/', '') }}/${item.logo}"
                                                                    class="card-img-top pb-1" alt="..." style="height: 180px; width: 180px;">`: ``}
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between mb-0">
                                            <div>
                                                <div class="px-2 perusahaan d-flex justify-content-between">
                                                    <div class="one-line-text w-100 text-title-1 mb-1 fw-bold text-lg-1">
                                                        ${item.perusahaan}</div>
                                                        <div>
                                                
                                                </div>
                                                </div>
                                                
                                                <div class="mb-3 px-2 w-100 d-flex justify-content-start align-items-center alamat">
                                                    <i class="bi bi-geo-alt-fill mb-0"
                                                        style="font-size: 14px;line-height: 0;"></i>
                                                    <p class=" ms-2 mb-0 one-line-text text-desc" style="color:#525252; max-width:100%;">
                                                        ${item.alamat}
                                                    </p>
                                                </div>
                                                <hr class="mx-2 my-0 mb-3" style="background-color:#0169B8; color:#0169B8;height: 1.5px;opacity:1 !important;"/>

                                                <div class="d-flex flex-row mb-3 gap-lg-0 gap-md-1">
                                                    <div class="d-flex flex-column w-50 ms-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                            <b>Nomor KTA</b>
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                            <b>Bentuk Badan Usaha</b>
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                            <b>Penanggung Jawab</b>
                                                        </p>
                                                    </div>

                                                    <div class="d-flex flex-column w-50 me-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                        ${item.no_anggota}
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                        ${item.bentuk_usaha}
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                        ${item.penanggung_jawab}
                                                        </p>
                                                    </div>
                                                
                                                </div>

                                                


                                                
                                            </div>
                                            
                                            <div>
                                                <div class="mb-3 d-flex align-items-center px-2 lihat-kontak">
                                                    <p class="mb-0 text-primary text-desc fw-semibold kontak-heading collapsed" data-bs-toggle="collapse" href="${collapseNameHref}"  role="button" aria-expanded="false" aria-controls="${collapseName}">
                                                        <a style="text-decoration:none !important; color:#23538F;" href="${kontakHref}">Lihat Kontak</a>
                                                        <span style="color:#23538F;"  class="ms-1 chevron-icon fw-bold"><i class="bi bi-chevron-right"></i></span>

                                                    </p>
                                                    
                                                </div>`;
                            @auth
                            resultAnggotaPaginationHtml += `
                            <div class="collapse collapse-kontak" id="${collapseName}">
                                <div class="d-flex flex-column justify-content-start gap-3 mb-3" style="min-height:109px;">

                                    ${item.no_telp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noTelpHTML}
                                        </div>
                                                        
                                    </div>`: ``}
                                    

                                    ${item.no_hp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noHpHTML}
                                        </div>
                                                        
                                    </div>`: ``}

                                    <div class="d-flex flex-row ms-2">
                                        <p class="mb-0 w-50 text-desc">
                                        <i class="bi bi-envelope-fill me-2"></i><b>Email</b>
                                        </p>
                                        <p class="mb-0 w-50 text-desc">
                                            ${item.email}
                                        </p>        
                                    </div>

                                    ${item.no_website ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-globe me-2"></i><b>Website</b>
                                                        </p>
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                                        ${item.website}
                                                        </p>
                                                        
                                    </div>`: ``}

                                    
                                </div>


                                
                            
                                            </div>
                                            
                                                <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                         
                                            
                                        </div>
                                    </div>
                                </div>`;
                            @else
                            resultAnggotaPaginationHtml += `
                            <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            $('.kontak-heading').on('click', function() {
                                location.href = kontakHref;
                            });
                            @endauth



                            targetContainerHtml.append(
                                resultAnggotaPaginationHtml);

                            $('.collapse-kontak').on('shown.bs.collapse', function() {
                                // When the collapse is shown, change the chevron direction to down
                                $('.chevron-icon').addClass('chevron-down');
                            });

                            $('.collapse-kontak').on('hidden.bs.collapse', function() {
                                // When the collapse is hidden, change the chevron direction to right
                                $('.chevron-icon').removeClass('chevron-down');
                            });
                        });
                    }, 0);

                    updatePagination(currentPage);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }


        $(document).ready(function() {
            // $('input.kualifikasi-checkbox').each(function() {
            //     var checkbox = $(this);
            //     var value = checkbox.val();
            //     var button = $('.pills-kualifikasi[data-value="' + value + '"]');

            //     if (checkbox.prop('checked')) {
            //         button.addClass('active');
            //     } else {
            //         button.removeClass('active');
            //     }
            // });
            $('.pills-kualifikasi').on('click', function() {
                $(this).toggleClass('active');
                var value = $(this).data('value');

                var checkbox = $('input.kualifikasi-checkbox[value="' + value + '"]');

                if ($(this).hasClass('active')) {
                    checkbox.prop('checked', true);
                } else {
                    checkbox.prop('checked', false);
                }

                let formData = $('#filter-form-new').serialize();
                $('.search-input').val('');
                $('#filter-form-new').submit();
            });
        });


        $(document).ready(function() {
            $('#filter-form-new').submit(function(e) {
                e.preventDefault();
                let formData = $('#filter-form-new').serialize();
                $('.search-input').val('');

                @auth
                var url = "{{ route('home.filter-anggota') }}";
                @else
                var url = "{{ route('home.filter-anggota-publik') }}";
                @endauth
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,

                    success: function(data) {
                        {
                            let container = $('.list-anggota');
                            totalPage = data.data.last_page;
                            currentPage = data.data.current_page;
                            container.empty();
                            console.log('result data kualifikasi', data);
                            if (data.data.length > 0) {
                                setTimeout(() => {
                                    $.each(data.data, function(key, item) {
                                        let collapseName = "collapseKontak";
                                        let collapseNameHref = "#collapseKontak";
                                        let noTelpHTML = '';
                                        let kontakHref = item.email ? '' : "{{ route('login') }}";
                                        if (item.no_telp) {
                                            const numbers = item.no_telp.split(',');
                                            numbers.forEach((number, index) => {
                                                noTelpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                            });
                                        }

                                        let noHpHTML = '';
                                        if (item.no_hp) {
                                            const numbers = item.no_hp.split(',');
                                            numbers.forEach((number, index) => {
                                                noHpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                            });
                                        }
                                        let resultAnggotaPaginationHtml = `<div class="col p-1 p-md-2"
                                    id="item-anggota">
                                    <div class="card shadow card-agenda card-anggota rounded-3 p-0 w-100 h-100"
                                      style="width: 40px;" >
                                        <div class="p-1 d-flex justify-content-center">
                                            ${item.logo ? `<img
                                                                    src="{{ asset('storage/uploads/anggota/logo/', '') }}/${item.logo}"
                                                                    class="card-img-top pb-1" alt="..." style="height: 180px; width: 180px;">`: ``}
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between mb-0">
                                            <div>
                                                <div class="px-2 perusahaan d-flex justify-content-between">
                                                    <div class="one-line-text w-100 text-title-1 mb-1 fw-bold text-lg-1">
                                                        ${item.perusahaan}</div>
                                                        <div>
                                                
                                                </div>
                                                </div>
                                                
                                                <div class="mb-3 px-2 w-100 d-flex justify-content-start align-items-center alamat">
                                                    <i class="bi bi-geo-alt-fill mb-0"
                                                        style="font-size: 14px;line-height: 0;"></i>
                                                    <p class=" ms-2 mb-0 one-line-text text-desc" style="color:#525252; max-width:100%;">
                                                        ${item.alamat}
                                                    </p>
                                                </div>
                                                <hr class="mx-2 my-0 mb-3" style="background-color:#0169B8; color:#0169B8;height: 1.5px;opacity:1 !important;"/>

                                                <div class="d-flex flex-row mb-3 gap-lg-0 gap-md-1">
                                                    <div class="d-flex flex-column w-50 ms-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                            <b>Nomor KTA</b>
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                            <b>Bentuk Badan Usaha</b>
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                            <b>Penanggung Jawab</b>
                                                        </p>
                                                    </div>

                                                    <div class="d-flex flex-column w-50 me-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                        ${item.no_anggota}
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                        ${item.bentuk_usaha}
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                        ${item.penanggung_jawab}
                                                        </p>
                                                    </div>
                                                
                                                </div>

                                                


                                                
                                            </div>
                                            
                                            <div>
                                                <div class="mb-3 d-flex align-items-center px-2 lihat-kontak">
                                                    <p class="mb-0 text-primary text-desc fw-semibold kontak-heading collapsed" data-bs-toggle="collapse" href="${collapseNameHref}"  role="button" aria-expanded="false" aria-controls="${collapseName}">
                                                        <a style="text-decoration:none !important; color:#23538F;" href="${kontakHref}">Lihat Kontak</a>
                                                        <span style="color:#23538F;"  class="ms-1 chevron-icon fw-bold"><i class="bi bi-chevron-right"></i></span>

                                                    </p>
                                                    
                                                </div>`;
                                        @auth
                                        resultAnggotaPaginationHtml += `
                            <div class="collapse collapse-kontak" id="${collapseName}">
                                <div class="d-flex flex-column justify-content-start gap-3 mb-3" style="min-height:109px;">

                                    ${item.no_telp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noTelpHTML}
                                        </div>
                                                        
                                    </div>`: ``}
                                    

                                    ${item.no_hp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noHpHTML}
                                        </div>
                                                        
                                    </div>`: ``}

                                    <div class="d-flex flex-row ms-2">
                                        <p class="mb-0 w-50 text-desc">
                                        <i class="bi bi-envelope-fill me-2"></i><b>Email</b>
                                        </p>
                                        <p class="mb-0 w-50 text-desc">
                                            ${item.email}
                                        </p>        
                                    </div>

                                    ${item.no_website ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-globe me-2"></i><b>Website</b>
                                                        </p>
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                                        ${item.website}
                                                        </p>
                                                        
                                    </div>`: ``}

                                    
                                </div>


                                
                            
                                            </div>
                                            
                                                <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                         
                                            
                                        </div>
                                    </div>
                                </div>`;
                                        @else
                                        resultAnggotaPaginationHtml += `
                            <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                        $('.kontak-heading').on('click', function() {
                                            location.href = kontakHref;
                                        });
                                        @endauth



                                        container.append(
                                            resultAnggotaPaginationHtml);

                                        $('.collapse-kontak').on('shown.bs.collapse', function() {
                                            // When the collapse is shown, change the chevron direction to down
                                            $('.chevron-icon').addClass('chevron-down');
                                        });

                                        $('.collapse-kontak').on('hidden.bs.collapse', function() {
                                            // When the collapse is hidden, change the chevron direction to right
                                            $('.chevron-icon').removeClass('chevron-down');
                                        });
                                    });
                                }, 0);
                                currentPage = data.current_page;
                                totalPage = data.last_page;
                                updatePagination(currentPage);
                            } else {
                                resultNoDataHtml = `<div class="alert w-100 alert-warning alert-dismissible fade show"
                                    role="alert">
                                    <strong>Mohon maaf!</strong> Data anggota belum ada.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>`
                                $(container).append(resultNoDataHtml);
                                updatePagination(0);
                            }
                        }
                    }
                });
            });
        })

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

        $('.search-input').keyup(function(e) {
            e.preventDefault();
            let value = $(this).val();
            searchAnggota(value, 1);
        });

        @auth
        var urlEmpty = "{{ route('home.data-anggota') }}";
        var urlSearch = "{{ route('home.search-anggota') }}";
        @else
        var urlEmpty = "{{ route('home.data-anggota-publik') }}";
        var urlSearch = "{{ route('home.search-anggota-publik') }}";
        @endauth

        function searchAnggota(kataKunci, currPage) {
            if (kataKunci == '') {
                $.ajax({
                    url: urlEmpty,
                    type: 'GET',
                    contentType: 'application/json',
                    cache: false,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    data: {
                        page: currentPage,
                    },
                    success: function(response) {
                        const targetContainerHtml = $('.list-anggota');
                        totalPage = response.last_page;
                        currentPage = response.current_page;
                        targetContainerHtml.empty();
                        setTimeout(() => {
                            $.each(response.data, function(key, item) {
                                let collapseName = "collapseKontak";
                                let collapseNameHref = "#collapseKontak";
                                let noTelpHTML = '';
                                let kontakHref = item.email ? '' : "{{ route('login') }}";
                                if (item.no_telp) {
                                    const numbers = item.no_telp.split(',');
                                    numbers.forEach((number, index) => {
                                        noTelpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                    });
                                }

                                let noHpHTML = '';
                                if (item.no_hp) {
                                    const numbers = item.no_hp.split(',');
                                    numbers.forEach((number, index) => {
                                        noHpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                    });
                                }
                                let resultAnggotaPaginationHtml = `<div class="col p-1 p-md-2"
                                    id="item-anggota">
                                    <div class="card shadow card-agenda card-anggota rounded-3 p-0 w-100 h-100"
                                      style="width: 40px;" >
                                        <div class="p-1 d-flex justify-content-center">
                                            ${item.logo ? `<img
                                                                    src="{{ asset('storage/uploads/anggota/logo/', '') }}/${item.logo}"
                                                                    class="card-img-top pb-1" alt="..." style="height: 180px; width: 180px;">`: ``}
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between mb-0">
                                            <div>
                                                <div class="px-2 perusahaan d-flex justify-content-between">
                                                    <div class="one-line-text w-100 text-title-1 mb-1 fw-bold text-lg-1">
                                                        ${item.perusahaan}</div>
                                                        <div>
                                                
                                                </div>
                                                </div>
                                                
                                                <div class="mb-3 px-2 w-100 d-flex justify-content-start align-items-center alamat">
                                                    <i class="bi bi-geo-alt-fill mb-0"
                                                        style="font-size: 14px;line-height: 0;"></i>
                                                    <p class=" ms-2 mb-0 one-line-text text-desc" style="color:#525252; max-width:100%;">
                                                        ${item.alamat}
                                                    </p>
                                                </div>
                                                <hr class="mx-2 my-0 mb-3" style="background-color:#0169B8; color:#0169B8;height: 1.5px;opacity:1 !important;"/>

                                                <div class="d-flex flex-row mb-3 gap-lg-0 gap-md-1">
                                                    <div class="d-flex flex-column w-50 ms-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                            <b>Nomor KTA</b>
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                            <b>Bentuk Badan Usaha</b>
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                            <b>Penanggung Jawab</b>
                                                        </p>
                                                    </div>

                                                    <div class="d-flex flex-column w-50 me-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                        ${item.no_anggota}
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                        ${item.bentuk_usaha}
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                        ${item.penanggung_jawab}
                                                        </p>
                                                    </div>
                                                
                                                </div>

                                                


                                                
                                            </div>
                                            
                                            <div>
                                                <div class="mb-3 d-flex align-items-center px-2 lihat-kontak">
                                                    <p class="mb-0 text-primary text-desc fw-semibold kontak-heading collapsed" data-bs-toggle="collapse" href="${collapseNameHref}"  role="button" aria-expanded="false" aria-controls="${collapseName}">
                                                        <a style="text-decoration:none !important; color:#23538F;" href="${kontakHref}">Lihat Kontak</a>
                                                        <span style="color:#23538F;"  class="ms-1 chevron-icon fw-bold"><i class="bi bi-chevron-right"></i></span>

                                                    </p>
                                                    
                                                </div>`;
                                @auth
                                resultAnggotaPaginationHtml += `
                            <div class="collapse collapse-kontak" id="${collapseName}">
                                <div class="d-flex flex-column justify-content-start gap-3 mb-3" style="min-height:109px;">

                                    ${item.no_telp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noTelpHTML}
                                        </div>
                                                        
                                    </div>`: ``}
                                    

                                    ${item.no_hp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noHpHTML}
                                        </div>
                                                        
                                    </div>`: ``}

                                    <div class="d-flex flex-row ms-2">
                                        <p class="mb-0 w-50 text-desc">
                                        <i class="bi bi-envelope-fill me-2"></i><b>Email</b>
                                        </p>
                                        <p class="mb-0 w-50 text-desc">
                                            ${item.email}
                                        </p>        
                                    </div>

                                    ${item.no_website ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-globe me-2"></i><b>Website</b>
                                                        </p>
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                                        ${item.website}
                                                        </p>
                                                        
                                    </div>`: ``}

                                    
                                </div>


                                
                            
                                            </div>
                                            
                                                <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                         
                                            
                                        </div>
                                    </div>
                                </div>`;
                                @else
                                resultAnggotaPaginationHtml += `
                            <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                $('.kontak-heading').on('click', function() {
                                    location.href = kontakHref;
                                });
                                @endauth



                                targetContainerHtml.append(
                                    resultAnggotaPaginationHtml);

                                $('.collapse-kontak').on('shown.bs.collapse', function() {
                                    // When the collapse is shown, change the chevron direction to down
                                    $('.chevron-icon').addClass('chevron-down');
                                });

                                $('.collapse-kontak').on('hidden.bs.collapse', function() {
                                    // When the collapse is hidden, change the chevron direction to right
                                    $('.chevron-icon').removeClass('chevron-down');
                                });
                            });
                        }, 0);

                        updatePagination(currentPage);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                $.ajax({
                    type: "GET",
                    url: urlSearch,
                    data: {
                        kata_kunci: kataKunci,
                        page: currPage,
                    },
                    success: function(response) {
                        let targetResultAnggotaSearchHtml = $('.list-anggota');
                        totalPage = response.last_page;
                        currentPage = response.current_page;
                        console.log('totalPage', totalPage);
                        console.log('curPage', currentPage);
                        console.log("res", response);
                        targetResultAnggotaSearchHtml.empty();
                        $('.form-check-input').prop('checked', false);

                        if (response.data.length > 0) {
                            setTimeout(() => {
                                $.each(response.data, function(key, item) {
                                    let collapseName = "collapseKontak";
                                    let collapseNameHref = "#collapseKontak";
                                    let noTelpHTML = '';
                                    let kontakHref = item.email ? '' : "{{ route('login') }}";
                                    if (item.no_telp) {
                                        const numbers = item.no_telp.split(',');
                                        numbers.forEach((number, index) => {
                                            noTelpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                        });
                                    }

                                    let noHpHTML = '';
                                    if (item.no_hp) {
                                        const numbers = item.no_hp.split(',');
                                        numbers.forEach((number, index) => {
                                            noHpHTML += `<p class=" mb-0 text-desc">
                                                        ${number}
                                                        </p>${index < numbers.length - 1 ? '<div class="stripe"></div>' : ''}`;
                                        });
                                    }
                                    let resultAnggotaPaginationHtml = `<div class="col p-1 p-md-2"
                                    id="item-anggota">
                                    <div class="card shadow card-agenda card-anggota rounded-3 p-0 w-100 h-100"
                                      style="width: 40px;" >
                                        <div class="p-1 d-flex justify-content-center">
                                            ${item.logo ? `<img
                                                                    src="{{ asset('storage/uploads/anggota/logo/', '') }}/${item.logo}"
                                                                    class="card-img-top pb-1" alt="..." style="height: 180px; width: 180px;">`: ``}
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between mb-0">
                                            <div>
                                                <div class="px-2 perusahaan d-flex justify-content-between">
                                                    <div class="one-line-text w-100 text-title-1 mb-1 fw-bold text-lg-1">
                                                        ${item.perusahaan}</div>
                                                        <div>
                                                
                                                </div>
                                                </div>
                                                
                                                <div class="mb-3 px-2 w-100 d-flex justify-content-start align-items-center alamat">
                                                    <i class="bi bi-geo-alt-fill mb-0"
                                                        style="font-size: 14px;line-height: 0;"></i>
                                                    <p class=" ms-2 mb-0 one-line-text text-desc" style="color:#525252; max-width:100%;">
                                                        ${item.alamat}
                                                    </p>
                                                </div>
                                                <hr class="mx-2 my-0 mb-3" style="background-color:#0169B8; color:#0169B8;height: 1.5px;opacity:1 !important;"/>

                                                <div class="d-flex flex-row mb-3 gap-lg-0 gap-md-1">
                                                    <div class="d-flex flex-column w-50 ms-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                            <b>Nomor KTA</b>
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                            <b>Bentuk Badan Usaha</b>
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                            <b>Penanggung Jawab</b>
                                                        </p>
                                                    </div>

                                                    <div class="d-flex flex-column w-50 me-2 gap-3">
                                                        <p class=" mb-0 one-line-text text-desc">
                                                        ${item.no_anggota}
                                                        </p>
                                                        <p class="mb-0 one-line-text text-desc">
                                                        ${item.bentuk_usaha}
                                                        </p>
                                                        <p class="mb-0 text-desc">
                                                        ${item.penanggung_jawab}
                                                        </p>
                                                    </div>
                                                
                                                </div>

                                                


                                                
                                            </div>
                                            
                                            <div>
                                                <div class="mb-3 d-flex align-items-center px-2 lihat-kontak">
                                                    <p class="mb-0 text-primary text-desc fw-semibold kontak-heading collapsed" data-bs-toggle="collapse" href="${collapseNameHref}"  role="button" aria-expanded="false" aria-controls="${collapseName}">
                                                        <a style="text-decoration:none !important; color:#23538F;" href="${kontakHref}">Lihat Kontak</a>
                                                        <span style="color:#23538F;"  class="ms-1 chevron-icon fw-bold"><i class="bi bi-chevron-right"></i></span>

                                                    </p>
                                                    
                                                </div>`;
                                    @auth
                                    resultAnggotaPaginationHtml += `
                            <div class="collapse collapse-kontak" id="${collapseName}">
                                <div class="d-flex flex-column justify-content-start gap-3 mb-3" style="min-height:109px;">

                                    ${item.no_telp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-telephone-fill me-2"></i><b>Telepon</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noTelpHTML}
                                        </div>
                                                        
                                    </div>`: ``}
                                    

                                    ${item.no_hp ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-phone-fill me-2"></i><b>HP</b>
                                                        </p>
                                        <div class="d-flex flex-row flex-wrap gap-2 align-items-center  w-50">
                                        ${noHpHTML}
                                        </div>
                                                        
                                    </div>`: ``}

                                    <div class="d-flex flex-row ms-2">
                                        <p class="mb-0 w-50 text-desc">
                                        <i class="bi bi-envelope-fill me-2"></i><b>Email</b>
                                        </p>
                                        <p class="mb-0 w-50 text-desc">
                                            ${item.email}
                                        </p>        
                                    </div>

                                    ${item.no_website ? `<div class="d-flex flex-row ms-2">
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                        <i class="bi bi-globe me-2"></i><b>Website</b>
                                                        </p>
                                        <p class=" mb-0 one-line-text text-desc w-50">
                                                        ${item.website}
                                                        </p>
                                                        
                                    </div>`: ``}

                                    
                                </div>


                                
                            
                                            </div>
                                            
                                                <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                         
                                            
                                        </div>
                                    </div>
                                </div>`;
                                    @else
                                    resultAnggotaPaginationHtml += `
                            <a href="{{ route('home.profil-anggota', '') }}/${item.id}" class="mb-2 d-none" style="text-decoration:none;color:white;"
                                                    >
                                                    <div class="d-flex text-small-lg justify-content-center fw-semibold px-4 py-2 text-desc-card-1 profil-anggota-btn" style="letter-spacing: 0.4px; ">
                                                    PROFIL ANGGOTA
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                    $('.kontak-heading').on('click', function() {
                                        location.href = kontakHref;
                                    });
                                    @endauth



                                    targetResultAnggotaSearchHtml.append(
                                        resultAnggotaPaginationHtml);

                                    $('.collapse-kontak').on('shown.bs.collapse', function() {
                                        // When the collapse is shown, change the chevron direction to down
                                        $('.chevron-icon').addClass('chevron-down');
                                    });

                                    $('.collapse-kontak').on('hidden.bs.collapse', function() {
                                        // When the collapse is hidden, change the chevron direction to right
                                        $('.chevron-icon').removeClass('chevron-down');
                                    });
                                });
                            }, 0);
                            updatePagination(currentPage);
                        } else {
                            resultNoDataHtml = `<div class="alert w-100 alert-warning alert-dismissible fade show"
                                    role="alert">
                                    <strong>Mohon maaf!</strong> Data anggota belum ada.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>`
                            $(targetResultAnggotaSearchHtml).append(resultNoDataHtml);
                            $('#pagination-container').empty();
                            // updatePagination(0);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

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
                        let kataKunci = $('.search-input').val();
                        currentPage = nilaiArgumen;
                        console.log('curr page ', currentPage);
                        setTimeout(() => {
                            searchAnggota(kataKunci, nilaiArgumen);
                        }, 0);
                    });
                });
            }, 0);

        }
    });
</script>
@endsection