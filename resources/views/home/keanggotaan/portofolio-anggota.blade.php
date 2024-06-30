@extends('layouts.app-home')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/portofolio-anggota.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home/keanggotaan/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
@endsection

@section('content')
<!-- Heading -->
<div class="container-fluid py-5 d-flex align-items-center justify-content-center" style=" background: url('{{ asset('assets/img/bg-navbar.svg') }}'); height: 180px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-white fw-bold text-heeader" style="font-size: 40px;">Portolio
                Anggota</h1>
        </div>
    </div>
</div>
<!-- End Heading -->

<div class="container pt-5">
    {{-- About --}}
    <div class="row about d-flex justify-content-center">
        <div class="col-lg-6 col-md-12 pe-lg-5">
            <h3 class="text-title fw-bold fs-3 m-0 pb-5 text-lg-start">{{ $anggota->perusahaan }}</h3>
            <div class="text-about-content fs-5 text-lg-start pb-sm-4">
                @if ($anggota->deskripsi)
                <p style="text-align: justify">
                    {{ $anggota->deskripsi }}
                </p>
                @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Mohon maaf!</strong> Belum ada deskripsi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            @if ($anggota->foto_perusahaan)
            <img class="w-100 rounded-4" src="{{ asset('assets/uploads/anggota/profil/' . $perusahaan->foto_perusahaan) }}" alt="bg">
            @else
            <img class="w-100 rounded-4" src="https://dummyimage.com/600x400/bdbdbd/000000.png&text=dummy+img" alt="img_perusahaan">
            @endif
        </div>
    </div>
    {{-- End About --}}


    <!-- Galeri Project -->
    <div class="row d-flex py-5 justify-content-center">
        <div class="col-lg-6 col-md-12 pb-5">
            <h3 class="project-title fw-bold text-lg-start fs-4 m-0">Project Kami</h3>
        </div>
        <div class="col-lg-6 col-md-12 text-md-end pb-5 projects">
            <div class="project-content">
                <select class="form-select" id="kategori" data-id=" {{ $anggota->id }}" name="kategori" aria-label="Default select example">
                    <option class="fw-light text-medium" value="0" selected>Semua</option>
                    @forelse($kategoriAngg as $item)
                    <option class="fw-light text-medium" value="{{ $item->id }}">{{ $item->kategori }}</option>
                    @empty
                    ''
                    @endforelse
                </select>
            </div>
        </div>
        <div class="row px-0 d-flex justify-content-center align-items-center" id="list-portofolio">
            @forelse ($portoAngg as $item)
            <div class="col-lg-4 mb-4 mb-lg-0" data-bs-toggle="modal" data-bs-target="#portoAng{{ $item->id }}" style="cursor: pointer">
                <img src="{{ asset('storage/uploads/anggota/portofolio/' . $item->portofolioGambar[0]->gambar) }}" class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="img" style="max-height: 310px;" />
            </div>

            <!-- Modal -->
            <div class="modal modal-xl fade" id="portoAng{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header px-4 pt-4">
                            <h5 class="ps-2 py-2 fw-bold" style="border-left: #0169B8 solid 5px">
                                {{ $item->nama }}
                            </h5>
                            <button type="button" class="btn-close mx-2" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <p class="mb-1 fw-light">Lokasi Proyek</p>
                                            <p class="text-weight-500">{{ $item->lokasi }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="mb-1 fw-light">Tahun Proyek</p>
                                            <p class="text-weight-500">{{ $item->tahun }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="mb-1 fw-light">Pemilik Proyek</p>
                                            <p class="text-weight-500">{{ $item->pemilik }}
                                            </p>
                                        </div>
                                        <div class="row text-wrap w-100">
                                            <p class="mb-1 fw-light">Deskripsi Proyek</p>
                                            <p class="text-weight-500 full-konten d-none" style="text-align: justify">
                                                {{ $item->deskripsi }}
                                            </p>
                                            <p class="text-weight-500 " style="text-align: justify">
                                                {{ Str::limit($item->deskripsi, 100) }}<a class="btn-full-konten text-decoration-none" style="cursor: pointer"> Lebih lanjut...</a>
                                            </p>
                                        </div>
                                        <div class="row dok-proyek">
                                            <p class="mb-1 fw-light">Dokumentasi Proyek</p>
                                            @if ($item->portofolioGambar)
                                            @foreach ($item->portofolioGambar as $item)
                                            <div class="col-lg-3 mb-4 mb-lg-0">
                                                <img src="{{ asset('storage/uploads/anggota/portofolio/' . $item->gambar) }}" class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="img" style="max-height: 310px;" />
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Mohon maaf!</strong> Belum ada dokumentasi gambar.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Modal --}}
            @empty
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Mohon maaf!</strong> Belum ada portofolio.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforelse
        </div>
        {{-- Filter Modal --}}
        <div class="modal-filter-porto modal modal-xl fade" id="modal-porto">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row my-2 mx-1 d-flex align-items-start">
                            <div class="col-lg-11 me-1 me-md-0">
                                <h5 class="ps-2 py-2 fw-bold m-p-judul" style="border-left: #0169B8 solid 5px">

                                </h5>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn-close btn-modal-reset" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <hr class="m-0 p-0">
                        <div class="container">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="row">
                                        <p class="mb-1 fw-light">Lokasi Proyek</p>
                                        <p class="text-weight-500 m-p-lok">
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="mb-1 fw-light">Tahun Proyek</p>
                                        <p class="text-weight-500 m-p-tahun">
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="mb-1 fw-light">Pemilik Proyek</p>
                                        <p class="text-weight-500 m-p-pemilik">
                                        </p>
                                    </div>
                                    <div class="row text-wrap w-100">
                                        <p class="mb-1 fw-light">Deskripsi Proyek</p>
                                        <p class="text-weight-500 full-konten d-none" style="text-align: justify">

                                        </p>
                                        <p class="text-weight-500 part-konten" style="text-align: justify">

                                        </p>
                                    </div>
                                    <div class="row dok-proyek m-p-pemilik-dok">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Filter Modal --}}
    </div>
    <!-- End Galeri Project -->

    <!-- Informasi lain -->
    <div class="row justify-content-center ">
        <div class="col-12">
            <h3 class="project-title fw-bold text-lg-start fs-4 m-0 pb-5">Informasi Lainnya</h3>
        </div>
        {{-- <div class="col-4 card-contact d-flex justify-content-between"> --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card card-content border border-0 m-2" style="max-width: 100%">
                <div class="card-body bg-card-body">
                    <div class="d-flex py-2 rounded">
                        <img src="{{ asset('assets/img/keanggotaan/email-icon.png') }}" alt="">
                        {{-- <i class="bi bi-telephone-plus mx-auto" style="color: white"></i> --}}
                    </div>
                    <h5 class="card-title fw-bold m-0 py-2 text-wrap w-100" style="text-align: justify">Hubungi kami
                    </h5>
                    <p class="card-text m-0 py-1 px-0 text-wrap w-100" style="text-align: justify">Kami siap membantu
                        kapan saja
                    </p>
                    <p class="card-text blue-c-v2 py-0 px-0 text-wrap w-100" style="text-align: justify">
                        {{ $anggota->email }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card card-content border border-0 m-2" style="max-width: 100%">
                <div class="card-body bg-card-body">
                    <div class="d-flex py-2 rounded">
                        <img src="{{ asset('assets/img/keanggotaan/linkedin-icon.png') }}" alt="">
                    </div>
                    <h5 class="card-title fw-bold m-0 py-2 text-wrap w-100" style="text-align: justify">Linkedin</h5>
                    <p class="card-text m-0 py-1 px-0 text-wrap w-100" style="text-align: justify">Kunjungi kami lewat
                        Linkedin
                    </p>
                    @if ($anggota->linkedin)
                    <p class="card-text blue-c-v2 py-0 px-0 text-wrap w-100" style="text-align: justify">
                        {{ $anggota->linkedin }}
                    </p>
                    @else
                    <p class="card-text blue-c-v2 py-0 px-0 text-wrap w-100" style="text-align: justify">Belum ada
                        alamat</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-content border border-0 m-2" style="max-width: 100%">
                <div class="card-body bg-card-body">
                    <div class="d-flex py-2 rounded">
                        <img src="{{ asset('assets/img/keanggotaan/loc-icon.png') }}" alt="">
                    </div>
                    <h5 class="card-title fw-bold m-0 py-2 text-wrap w-100" style="text-align: justify">Alamat Kami
                    </h5>
                    <p class="card-text m-0 py-1 px-0 text-wrap w-100" style="text-align: justify">Kunjungi kami
                        secara langsung
                    </p>
                    <p class="card-text blue-c-v2 py-0 px-0 text-wrap w-100" style="text-align: justify">
                        {{ $anggota->alamat }}
                    </p>
                </div>
            </div>
        </div>
        {{-- </div> --}}

    </div>
    <!-- End Informasi lain -->

    <!-- Maps -->
    <div class="row py-5">
        <div class="col-md-12 mx-auto anggota-maps">
            @if ($anggota->maps)
            {!! $anggota->maps !!}
            @else
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Mohon maaf!</strong> Belum ada maps.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <!-- End Maps -->
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        function fullDeskripsiPorto() {
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
        }

        function changeKategori(callback) {
            $('#kategori').change(function(e) {
                e.preventDefault();

                const formData = $('#kategori').serialize();
                const anggota_id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('home.filter-kategori', '') }}/" +
                        anggota_id,
                    data: formData,
                    processData: false,
                    cache: false,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    success: function(data) {
                        console.log('result data kategori', data)
                        callback(data);
                    }
                });
            });
        }

        function prosesChangeKtgr(data) {
            // console.log(data[0].portofolio_gambar[0].gambar)
            const container = $('#list-portofolio')
            container.empty();
            if (data.length > 0) {
                $.each(data, function(key, item) {
                    // console.log(item)
                    let resultPortoHtml = `
                            <div class="col-lg-4 mb-4 mb-lg-0 openModal" data-id="${item.id}" style="cursor: pointer">
                                <img id="modal-trigger"
                                    src="{{ asset('storage/uploads/anggota/portofolio/', '') }}/${item . portofolio_gambar[0] . gambar}"
                                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="img"
                                    style="max-height: 310px;" />
                            </div>
                            `;
                    container.append(resultPortoHtml);
                    setTimeout(() => {
                        if ($('.openModal')) {
                            detailPorto()
                        }
                    }, 0);
                });
            } else {
                let resultNoPortoHtml = `<div class="alert alert-warning alert-dismissible fade show"
                         role="alert">
                         <strong>Mohon maaf!</strong> Belum ada portofolio.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>`
                container.append(resultNoPortoHtml);
            }

        }

        changeKategori(prosesChangeKtgr)

        function detailPorto() {
            const target = $('#list-portofolio').find('.openModal');
            console.log('target:', target);
            $(target).click(function(e) {
                e.preventDefault();
                const porto_id = $(this).data('id');
                console.log('this id', $(this).data('id'))
                $.ajax({
                    type: 'GET',
                    url: "{{ route('home.filter-porto-modal', '') }}/" +
                        porto_id,
                    processData: false,
                    cache: false,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    success: function(data) {
                        console.log('result data: ', data)
                        setTimeout(() => {
                            prosesDetailPorto(data);
                        }, 0);
                    },
                });
            });

        }

        function prosesDetailPorto(data) {
            const container = $('.modal-filter-porto')
            $.each(data, function(key, item) {
                // console.log(item)

                const judul = container.find('.m-p-judul');
                const lok = container.find('.m-p-lok');
                const tahun = container.find('.m-p-tahun');
                const pemilik = container.find('.m-p-pemilik');
                const desc_part = container.find('.part-konten');
                const desc_full = container.find('.full-konten');

                $(judul).text(item.nama);
                $(lok).text(item.lokasi);
                $(tahun).text(item.tahun);
                $(pemilik).text(item.pemilik);
                $(desc_part).empty()
                $(desc_part).append(`${((item.deskripsi).substring(0,100)+'...')} <a class="btn-full-konten text-decoration-none" style="cursor: pointer">
                                                    Lebih lanjut...</a>`);
                $(desc_full).text(item.deskripsi);

                //iamges
                const img_porto = container.find('.m-p-pemilik-dok');
                $(img_porto).empty()
                $(img_porto).append(`<p class="mb-1 fw-light">Dokumentasi Proyek</p>`);
                if (item.portofolio_gambar) {
                    setTimeout(() => {
                        $.each(item.portofolio_gambar, function(keyImg, itemImg) {
                            $(img_porto).append(`<div class="col-lg-3 mb-4 mb-lg-0">
                            <img src="{{ asset('storage/uploads/anggota/portofolio/', '') }}/${itemImg . gambar}"
                                class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" alt="img"
                                style="max-height: 310px;" />
                        </div>`)
                        });
                    }, 0);
                }

                setTimeout(() => {
                    $('.modal-filter-porto').modal('show')
                }, 0);
            });
        }

        fullDeskripsiPorto()
    });
</script>
<script>
    $(document).ready(function() {
        let maps = $('.anggota-maps iframe');
        console.log(maps);
        maps.removeAttr('width').removeAttr('height').addClass('w-100').attr('height', '300px');
    });
</script>
@endsection