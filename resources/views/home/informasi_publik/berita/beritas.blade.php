@extends('layouts.app-home')

@section('title', 'Berita')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/berita.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
@endsection

@section('content')
    <section>
        <div class="row bg-berita-all position-relative">
            <div class="bg-berita"
                style=" background: url('{{ asset('assets/img/bg-navbar.svg') }}');">
            </div>
            <h1 class="text-heeader text-center text-white fw-bold  position-absolute top-50 start-50 translate-middle"
                style="font-size: 40px;">Berita Kegiatan</h1>
        </div>
        <div class="container px-0">
            <div class="row p-5">
                <div class="sub-title col-12 d-flex align-items-center">
                    <img class=" d-inline-block" src="{{ asset('assets/img/informasi_publik/stick-2.png') }}"
                        alt="stick">
                    <div class="d-inline-block card-text text-start fw-semibold ms-2 fs-5 p-0" style="color: #005896">
                        Berita Terbaru
                    </div>
                </div>
            </div>
            <div class="row px-5">
                @foreach ($lastBerita as $mainBerita)
                    <div class="col-8 col-md-7 main-berita p-0 d-flex flex-column align-items-center">
                        <div class="card card-main-berita shadow-sm border-0 rounded-0 mx-2 mb-3 px-0 pt-0">
                            <a class="text-decoration-none id-main-berita" data-mainId="{{ $mainBerita->id }}"
                                href="{{ route('home.berita', $mainBerita->id) }}">
                                <img class="img-main-berita img-fluid"
                                    src="{{ asset('storage/uploads/admin/berita/' . $mainBerita->poster) }}"
                                    alt="img-main-berita">                             
                            </a>
                            <div class="card-body">
                                <div class="berita-header mb-2">
                                    <img src="{{ asset('assets/img/homepage/stick.png') }}" alt="stick">
                                    <div class="d-inline card-text text-start fw-bold p-0 pb-1"
                                        style="font-size: 0.8rem; color:#005896">
                                        <i class="ms-2 bi bi-calendar2-minus" style="font-size: 16px;"></i> <span
                                            class="fw-light ms-1">
                                            {{ \Carbon\Carbon::parse($mainBerita->created_a)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                </div>
                                <a class="text-decoration-none" href="{{ route('home.berita', $mainBerita->id) }}">
                                    <div class="fw-semibold text-xl-1 two-line-text mb-0 text-start px-0 py-0"
                                        style=" color:#202124;">
                                        {{ $mainBerita->judul }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-4 col-md-5 main-berita p-0 d-flex flex-column align-items-center">
                    @foreach ($secondaryBerita as $item)
                        <div class="card card-main-berita w-75 shadow-sm  border-0 rounded-0 mx-2 mb-3 px-0 pt-0">
                            <a class="text-decoration-none id-main-berita" data-mainId="{{ $item->id }}"
                                href="{{ route('home.berita', $item->id) }}">
                                <img class="img-scnd-berita"
                                    src="{{ asset('storage/uploads/admin/berita/' . $item->poster) }}"
                                    alt="img-main-berita"></a>
                            <div class="card-body">
                                <div class="berita-header mb-2">
                                    <img src="{{ asset('assets/img/homepage/stick.png') }}" alt="stick">
                                    <div class="d-inline card-text text-start fw-bold p-0 pb-1"
                                        style="font-size: 0.8rem; color:#005896">
                                        <i class="ms-2 bi bi-calendar2-minus" style="font-size: 16px;"></i> <span
                                            class="fw-light ms-1">
                                            {{ \Carbon\Carbon::parse($item->created_a)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                </div>
                                <a class="text-decoration-none" href="{{ route('home.berita', $item->id) }}">
                                    <div class="card-text fw-semibold two-line-text text-title-1 text-start px-0 py-0"
                                        style="color:#202124;">
                                        {{ $item->judul }}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row p-5">
                <div class="sub-title col-12 d-flex align-items-center">
                    <img class=" d-inline-block" src="{{ asset('assets/img/informasi_publik/stick-2.png') }}"
                        alt="stick">
                    <div class="d-inline-block card-text text-start fw-semibold ms-2 fs-5 p-0" style="color: #005896">
                        Berita Lainnya
                    </div>
                </div>
            </div>
            <div class="row px-5 pb-5">
                <div class="row berita-all">
                    {{-- @foreach ($recentBerita as $item)
                        <div class="col-md-6 col-lg-3 mb-4 berita-item">
                            <div class="card fixed h-100 card-beritas shadow-sm border-0 rounded-0 px-0 pt-0">
                                <a class="text-decoration-none" href="{{ route('home.berita', $item->id) }}">
                <img class="img-fluid img-recent-berita"
                    src="{{ asset('storage/uploads/admin/berita/' . $item->poster) }}"
                    alt="img-main-berita"></a>
                <div class="card-body pb-2">
                    <div class="berita-header pb-2">
                        <img src="{{ asset('assets/img/homepage/stick.png') }}" alt="stick">
                        <div class="d-inline card-text text-start fw-bold p-0 pb-1"
                            style="font-size: 0.8rem; color:#005896">
                            <i class="fa-regular ms-2 fa-calendar-days" style="font-size: 14px;"></i> <span
                                class="fw-light ms-1">
                                {{ \Carbon\Carbon::parse($item->created_a)->isoFormat('D MMMM Y') }}</span>
                        </div>
                    </div>
                    <a class="text-decoration-none"
                        href="{{ route('home.berita', $item->id) }}">
                        <div class="card-text fw-bolder text-start px-0 py-0" style="font-size: 0.9rem; color:#202124;">
                            {{ Str::limit($item->judul, 35) }}</div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach --}}
                </div>
            </div>
            <div class="d-flex justify-content-center nav nav-tabs gap-2 button-produk border-0 mb-5"
                id="pagination-container">
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script style="text/javascript">
        $(document).ready(function() {
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            let currentPage = 1;
            let pageLimit = 8;
            let totalPage = 1;

            function fetchData() {
                $.ajax({
                    url: "{{ route('home.data-berita') }}",
                    type: 'GET',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    data: {
                        page: currentPage,
                        page_limit: pageLimit,
                    },
                    success: function(response) {
                        const targetContainerHtml = $('.berita-all');
                        totalPage = response.totalPage;
                        targetContainerHtml.empty();
                        setTimeout(() => {
                            $.each(response.data, function(key, item) {
                                let resultBeritaPaginationHtml = `<div class="col-md-6 col-lg-3 mb-4 berita-item">
                                <div class="card card-main-berita fixed h-100 card-beritas shadow-sm border-0 rounded-0 px-0 pt-0">
                                    <a class="text-decoration-none"
                                        href="{{ route('home.berita', '') }}/${item.id}">
                                        <img class="img-fluid img-recent-berita"
                                            src="{{ asset('storage/uploads/admin/berita/', '') }}/${item.poster}"
                                            alt="img-main-berita"></a>
                                    <div class="card-body">
                                        <div class="berita-header mb-2">
                                            <img src="{{ asset('assets/img/homepage/stick.png') }}"
                                                alt="stick">
                                            <div class="d-inline card-text text-start fw-bold p-0 pb-1"
                                                style="font-size: 0.8rem; color:#005896">
                                                  <i class="ms-2 bi bi-calendar2-minus" style="font-size: 14px;"></i> <span class="fw-light ms-1"> ${moment(item.created_at).format('DD MMMM YYYY')}
                                                  </span>
                                            </div>
                                        </div>
                                        <a class="text-decoration-none"
                                            href="{{ route('home.berita', '') }}/${item.id}">
                                            <div class="card-text fw-semibold two-line-text text-title-1 text-start px-0 py-0"
                                                style="font-size: 0.9rem; color:#202124;">
                                                ${item.judul.substring(0,35)}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>`;
                                targetContainerHtml.append(
                                    resultBeritaPaginationHtml);
                            });
                        }, 0);

                        updatePagination(currentPage);
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
@endsection
