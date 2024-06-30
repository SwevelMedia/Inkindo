@extends('layouts.app-home')

@section('title', 'Layanan Non Konstruksi')

@section('content')
    <section class="py-5" style="background: #0a425c; font-family: Poppins, sans-serif;">
        <div class="container my-3" style="text-align: center;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white" style="font-size: 30px;">Bidang dan Layanan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-xl-flex justify-content-xl-center mt-md-4"><input class="form-control-sm mt-md-0 pt-md-2 pb-md-2 pe-md-5 ps-md-4" type="search" placeholder="cari bidang jasa"
                           style="border-radius: 30px;border-color: #ffffff;width: 356px;" /><button class="btn btn-primary ms-3" type="button"
                            style="width: 160px;border-radius: 30px;background: #207fc1;">Cari</button></div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Nav-tabs -->
                <div class="col-md-6 col-xl-4">
                    <h4 class="mb-0 fw-semibold">Klasifikasi Bidang Non-Konstruksi</h4>
                    <ul class="nav nav-tabs flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="list-group my-4">
                            <!-- tab-1 -->
                            <button type="button" id="v-pills-first-tab" class="list-group-item list-group-item-action active mb-4" aria-current="true" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-first" type="button" role="tab" style="border-radius: 10px;"><img class="me-3" src="{{ asset('assets/img/architect 1.png') }}"
                                     style="width: 50px;height: 50px;"> Kategori 1</button>

                            <!-- tab-2 -->
                            <button type="button" id="v-pills-second-tab" class="list-group-item list-group-item-action mb-4" data-bs-toggle="pill" data-bs-target="#v-pills-second"
                                    style="border-radius: 10px;"><img class="me-3" src="{{ asset('assets/img/architect 1.png') }}" style="width: 50px;height: 50px;">Kategroi 2</button>

                            <!-- tab-3 -->
                            <button type="button" id="v-pills-third-tab" class="list-group-item list-group-item-action mb-4" data-bs-toggle="pill" data-bs-target="#v-pills-third"
                                    style="border-radius: 10px;"><img class="me-3" src="{{ asset('assets/img/architect 1.png') }}" style="width: 50px;height: 50px;">Kategroi 3</button>

                            <!-- tab-4 -->
                            <button type="button" id="v-pills-fourth-tab" class="list-group-item list-group-item-action mb-4" data-bs-toggle="pill" data-bs-target="#v-pills-fourth"
                                    style="border-radius: 10px;"><img class="me-3" src="{{ asset('assets/img/architect 1.png') }}" style="width: 50px;height: 50px;">Kategroi 4</button>
                        </div>
                    </ul>
                </div>

                <!-- tab content -->
                <div class="col-md-6 col-xl-8 tab-content d-none d-sm-block" style="margin-top: 3px">
                    <div class="tab-pane fade show active" id="v-pills-first" role="tabpanel" aria-labelledby="v-pills-first-tab" tabindex="0">
                        <div class=" my-4 py-4">
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Pengembangan Pertanian dan Pedesaan</h1>
                                    <ol class="ps-sm-3">
                                        <li>Prasarana Sosial Dan Pengembangan / Partisipasi Masyarakat</li>
                                        <li>Kredit Dan Kelembagaan Pertanian</li>
                                        <li>Perkebunan Dan Mekanisasi Pertanian</li>
                                        <li>Pembibitan</li>
                                        <li>Pengendalian Hama / Penyakit Tanaman</li>
                                        <li>Peternakan, Kehutanan</li>
                                        <li>Perikanan dan Kelautan</li>
                                        <li>Tanaman Keras, Tanaman Pangan, dan Produk Tanaman Lain</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Heading</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Heading</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-second" role="tabpanel" aria-labelledby="v-pills-second-tab" tabindex="0">
                        <div class=" my-5 py-5">
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Kategori 2</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Heading</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-third" role="tabpanel" aria-labelledby="v-pills-third-tab" tabindex="0">
                        <div class=" my-5 py-5">
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Kategori 3</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Heading</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-fourth" role="tabpanel" aria-labelledby="v-pills-fourth-tab" tabindex="0">
                        <div class=" my-5 py-5">
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Kategori 4</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row mb-3 mx-3">
                                <div class="col text-white py-3 px-4" style="background: #0a425c;border-radius: 10px;">
                                    <h1 style="font-size: 24px;">Heading</h1>
                                    <ol class="ps-sm-3">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
