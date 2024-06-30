@extends('layouts.app-home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/layanan/konstruksi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/layanan/responsive.css') }}">
@endsection

@section('content')
    <section class="py-5 background-nav w-100" style=" background: url('{{ asset('assets/img/backgorund-navbar.svg') }}');">
        <div class="container my-3" style="text-align: center;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white fw-bold text-heeader" style="font-size: 30px;">Bidang dan Layanan Sertifikasi</h1>
                </div>
            </div>
            <div class="row">
                <div class="search col-md-12 d-xl-flex justify-content-xl-center mt-md-4">
                    <input id="search-data-input"
                        class="input-search form-control-sm mt-md-0 pt-md-2 pb-md-2 pe-md-5 ps-md-4" type="search"
                        placeholder="cari serfifikasi yang anda inginkan" style="border-radius: 30px;width: 40%;" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Nav-tabs -->
                <h4 class="fw-semibold pb-3 mb-0 text-md-start text-center">Klasifikasi Bidang</h4>
                <div class="vp-sm-klasifikasi">
                    <div class="text-center">
                        <a class="btn btn-primary px-4 w-50" data-bs-toggle="collapse" href="#collapse-klasifikasi-bidang"
                            role="button" aria-expanded="false" aria-controls="collapse-klasifikasi-bidang"
                            style="background: #005896;border-radius: 10px;">
                            Menu
                        </a>
                    </div>
                    <div class="collapse collapse-klasifikasi" id="collapse-klasifikasi-bidang">
                        <ul class="nav nav-tabs flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <div class="list-group my-5">
                                <!-- tab-1 -->
                                <div>
                                    <button type="button" id="v-pills-first-tab"
                                        class="list-group-item active first-one list-group-item-action fw-semibold mb-4"
                                        aria-current="true" data-bs-toggle="pill" data-bs-target="#v-pills-first"
                                        type="button" role="tab" style="border-radius: 10px;">
                                        @if ($kategori1->logo_light)
                                            <img class="me-3 logo-light logo-active icon-kategori-1"
                                                src="{{ asset('storage/uploads/admin/layanan/' . $kategori1->logo_light) }}"
                                                style="width: 50px;height: 50px;">
                                        @endif
                                        @if ($kategori1->logo_dark)
                                            <img class="me-3 logo-dark logo-nonactive icon-kategori-1"
                                                src="{{ asset('storage/uploads/admin/layanan/' . $kategori1->logo_dark) }}"
                                                style="width: 50px;height: 50px;">
                                        @endif
                                        {{ $kategori1->nama_klasifikasi_konstruksi }}
                                    </button>
                                </div>
                                @foreach ($kategori2 as $index => $item)
                                    @if ($index > 0)
                                        <!-- Mulai dari index 1 -->
                                        <div>
                                            <button type="button" id="v-pills-first-tab{{ $item->id }}"
                                                class="list-group-item list-group-item-action fw-semibold mb-4"
                                                data-bs-toggle="pill" data-bs-target="#v-pills-first{{ $item->id }}"
                                                type="button" role="tab" style="border-radius: 10px;">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        @if ($item->logo_light)
                                                            <img class="me-3 logo-light logo-nonactive icon-kategori-1"
                                                                src="{{ asset('storage/uploads/admin/layanan/' . $item->logo_light) }}"
                                                                style="width: 50px;height: 50px;">
                                                        @endif
                                                        @if ($item->logo_dark)
                                                            <img class="me-3 logo-dark logo-active icon-kategori-1"
                                                                src="{{ asset('storage/uploads/admin/layanan/' . $item->logo_dark) }}"
                                                                style="width: 50px;height: 50px;">
                                                        @endif
                                                    </div>
                                                    <div>
                                                        {!! $item->nama_klasifikasi_konstruksi !!}
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="vp-lg-klasifikasi col-md-6 col-xl-4 p-3">
                    <ul class="nav nav-tabs flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="list-group my-3">
                            <!-- tab-1 -->
                            <div>
                                <button type="button" id="v-pills-first-tab"
                                    class="list-group-item active first-one list-group-item-action fw-semibold mb-4"
                                    aria-current="true" data-bs-toggle="pill" data-bs-target="#v-pills-first" type="button"
                                    role="tab" style="border-radius: 10px;">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            @if ($kategori1->logo_light)
                                                <img class="me-3 logo-light logo-active icon-kategori-1"
                                                    src="{{ asset('storage/uploads/admin/layanan/' . $kategori1->logo_light) }}"
                                                    style="width: 50px;height: 50px;">
                                            @endif
                                            @if ($kategori1->logo_dark)
                                                <img class="me-3 logo-dark logo-nonactive icon-kategori-1"
                                                    src="{{ asset('storage/uploads/admin/layanan/' . $kategori1->logo_dark) }}"
                                                    style="width: 50px;height: 50px;">
                                            @endif
                                        </div>
                                        <div>
                                            {!! $kategori1->nama_klasifikasi_konstruksi !!}
                                        </div>
                                    </div>
                                </button>
                            </div>
                            @foreach ($kategori2 as $index => $item)
                                @if ($index > 0)
                                    <!-- Mulai dari index 1 -->
                                    <div>
                                        <button type="button" data-id="{{ $item->id }}"
                                            id="v-pills-first-tab{{ $item->id }}"
                                            class="list-group-item list-group-item-action fw-semibold mb-4"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-first{{ $item->id }}"
                                            type="button" role="tab" style="border-radius: 10px;">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img class="me-3 logo-light logo-nonactive logo-nonactive{{ $item->id }} icon-kategori-1"
                                                        src="{{ asset('storage/uploads/admin/layanan/' . $item->logo_light) }}"
                                                        style="width: 50px;height: 50px;">
                                                    <img class="me-3 logo-dark logo-active logo-active{{ $item->id }} icon-kategori-1"
                                                        src="{{ asset('storage/uploads/admin/layanan/' . $item->logo_dark) }}"
                                                        style="width: 50px;height: 50px;">
                                                </div>
                                                <div>
                                                    {!! $item->nama_klasifikasi_konstruksi !!}
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </ul>
                </div>
                <!-- tab content -->
                <div class="col-md-6 col-xl-8 tab-content d-sm-block">
                    <div class="tab-pane fade show active tab-hide" id="v-pills-first" role="tabpanel"
                        aria-labelledby="v-pills-first-tab" tabindex="0">
                        <div class=" my-3 ">
                            <div class="row mb-1 mx-3">
                                <div class="col text-white py-1 px-4">
                                    <div class="accordion accordion-flush" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingOne">
                                                @foreach ($default as $get)
                                                    <button class="accordion-button collapsed rounded shadow mt-2 mb-3"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#sub1{{ $get->id }}" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        <h6 class="fw-medium">
                                                            {!! $get->jenis_layanan_konstruksi !!}</h6>
                                                    </button>
                                                    <div id="sub1{{ $get->id }}" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne">
                                                        <div class="accordion-body">
                                                            <p>{!! $get->deskripsi_layanan_konstruksi !!}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none data-kategori" data-item ="{{ $kategori2 }}"></div>
                    @foreach ($kategori2 as $item)
                        <div class="tab-pane fade tab-hide" id="v-pills-first{{ $item->id }}" role="tabpanel"
                            aria-labelledby="v-pills-first-tab{{ $item->id }}" tabindex="0">
                            <div class=" my-3 ">
                                <div class="row mb-1 mx-3">
                                    <div class="col text-white py-1 px-4">
                                        <div class="accordion accordion-flush" id="accordionExample">
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="headingOne">
                                                    @foreach ($kons as $value)
                                                        @if ($value->klasifikasi_konstruksi_id == $item->id)
                                                            <button
                                                                class="accordion-button collapsed rounded shadow mt-2 mb-3"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#sub1{{ $value->id }}"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                <h6 class="fw-medium">
                                                                    {!! $value->jenis_layanan_konstruksi !!}</h6>
                                                            </button>
                                                            <div id="sub1{{ $value->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne">
                                                                <div class="accordion-body">
                                                                    <p>{!! $value->deskripsi_layanan_konstruksi !!}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.logo-nonactive').hide();
            $('.list-group-item-action').on('click', function() {
                $('.input-search').val('');
                $('.logo-light').hide();
                $('.logo-dark').show();
                $('.active .logo-dark').hide();
                $('.active .logo-light').show();
            });
        });
    </script>
    <script src="{{ asset('plugins/filter-search-accordion/plg.js') }}"></script>
    <script>
        var plg = $().btAcc_sf({
            'search_input_id': 'search-data-input',
            'filter_input_id': 'filter_data_input',
            'filter_btn_id': 'filter_data_btn',
            'filter_container': 'filter_container'
        });
    </script>
@endsection
