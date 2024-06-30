@extends('DMI.layouts.app')
@section('title', 'Suplier')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/DMI/supplier.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row my-2">
                <div class="col-md-5 my-3">
                    <div class="d-flex-column align-items-center" style="border-left: 10px solid #0169B8 !important;">
                        <div class="mx-3 py-2">
                            <h3 class="fw-semibold pt-2">Suplier Material</h3>
                            <p>Sumber Utama untuk Solusi Pemasok Terbaik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center list-suplier">
            </div>
            <div class="d-flex justify-content-center nav nav-tabs gap-2 button-produk border-0 my-5"
                id="pagination-container">
            </div>
        </div>
    </section>
@endsection

@section('scripts')
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
                $.ajax({
                    url: "{{ route('dmi.data.suplier') }}",
                    type: 'GET',
                    contentType: 'application/json',
                    cache: false,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    data: {
                        page: currentPage,
                        // page_limit = 9,
                    },
                    success: function(response) {
                        const targetContainerHtml = $('.list-suplier');
                        console.log('data produk: ', response);
                        totalPage = response.pagination.total_page;
                        targetContainerHtml.empty();
                        setTimeout(() => {
                            $.each(response.data, function(key, item) {
                                let resultSuplierPaginationHtml = `<div class="col-6 col-md-6 col-lg-4 p-1 p-sm-2">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-12 col-md-4 ">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="bulat">
                                                            <img class="object-fit-fill"
                                                                src="{{ 'https://estimator.id/assets/foto/pengguna/', '' }}/${item.logo}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 ">
                                                    <div class="row text-center text-md-start pt-3 pt-sm-0">
                                                        <h5 class="text-semi-lg fw-semibold nama-pengguna">
                                                            ${item.nama_pengguna}</h5>
                                                        <p class="text-small website"><i class="d-none d-sm-inline fa-solid fa-globe me-2"
                                                                style="color: #0169B8"></i><span>   ${item.website}</span>
                                                        </p>
                                                        <div class="d-flex justify-content-evenly p-0">
                                                            <a href="{{ route('dmi.detail.suplier', '') }}/${item.id_supplier}"
                                                                type="button"
                                                                class="btn btn-outline-primary custom-tombol">
                                                                <p class="my-0 px-0 px-sm-2 text-small fw-normal">Detail</p>
                                                            </a>
                                                            <a href="https://wa.me/${item.phone }"
                                                                type="button"
                                                                class="btn btn-outline-primary custom-tombol">
                                                                <p class="my-0 text-small px-0 px-sm-2  fw-normal"><i
                                                                        class="fa-brands d-none d-sm-inline fa-whatsapp me-2"></i>Hubungi
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                targetContainerHtml.append(
                                    resultSuplierPaginationHtml);
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
@endsection
