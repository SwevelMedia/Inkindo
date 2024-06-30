@extends('layouts.app')

@section('content')
<body style="font-family: Poppins, sans-serif;">
    <section class="py-3" style="background: #0a425c;">
        <div class="container">
            <h1 class="text-white" style="font-family: Poppins, sans-serif;">Program Kerja</h1>
        </div>
    </section>

    <!-- ver 1 -->
    <section  style="background-color: #1379A8; font-family: Poppins, sans-serif;">
        <div class="container timeline mb-5 py-5">
            <div class="row text-center justify-content-center mb-5 pb-5">
                <div class="col-xl-6 col-lg-8 text-white">
                    <p class="" >We’re very proud of the path we’ve taken. Explore the history that made us the company we are today.</p>
                </div>
            </div>

            <div class="row my-5 pt-5">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate text-white" data-aos="fade-up">
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">2018</p>
                                <p class="h6 mb-0 mb-lg-0">Favland Founded</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">2019</p>
                                <p class="h6 mb-0 mb-lg-0">Launched Trello</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">2020</p>
                                <p class="h6 mb-0 mb-lg-0">Launched Messanger</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">2021</p>
                                <p class="h6 mb-0 mb-lg-0">Open New Branch</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">2022</p>
                                <p class="h6 mb-0 mb-lg-0">In Fortune 500</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- nav-tabs -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Nav-tabs -->
                <div class="col-md-6 col-xl-3 p-3">
                    <h4 class="">Kategori</h4>
                    <ul class="nav nav-tabs flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="list-group">
                            <button type="button" id="v-pills-first-tab" class="list-group-item list-group-item-action active" aria-current="true" data-bs-toggle="pill" data-bs-target="#v-pills-first" type="button" role="tab">
                            <i class="far fa-user fs-5 me-3"></i>Kategori 1
                            </button>
                            <button type="button" id="v-pills-second-tab" class="list-group-item list-group-item-action" data-bs-toggle="pill" data-bs-target="#v-pills-second"><i class="far fa-edit fs-5 me-3"></i>Kategroi 2</button>
                            <button type="button" class="list-group-item list-group-item-action" id="v-pills-third-tab" data-bs-toggle="pill" data-bs-target="#v-pills-third" type="button" role="tab"><i class="far fa-folder fs-5 me-3"></i>Kategori 3</button>
                            <button type="button" class="list-group-item list-group-item-action"  id="v-pills-fourth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourth" type="button" role="tab" aria-controls="v-pills-messages"><i class="far fa-chart-bar fs-5 me-3"></i>Kategori 4</button>
                            <button type="button" class="list-group-item list-group-item-action"  id="v-pills-fifth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fifth" type="button" role="tab" aria-controls="v-pills-settings"><i class="far fa-question-circle fs-5 me-3"></i>Kategori 5</button>
                        </div>
                    </ul>
                </div>

                <!-- Nav-Content -->
                <div class="col-md-6 col-xl-9 tab-content d-none d-sm-block">
                    <div class="tab-pane fade show active" id="v-pills-first" role="tabpanel" aria-labelledby="v-pills-first-tab" tabindex="0">
                        <div class="row px-3 pb-5">
                            <div class="col-xl-4 "><img class="img-fluid rounded-4" src="assets/img/proker.png" /></div>
                            <div class="col align-self-center">
                                <h5 class="fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /></p><button class="btn btn-primary mt-3" type="button">Lihat selengkpanya</button>
                            </div>
                        </div>
                        <div class="row px-3 py-5">
                            <div class="col-xl-4"><img class="img-fluid rounded-4" src="assets/img/proker.png" /></div>
                            <div class="col align-self-center">
                                <h5 class="fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /></p><button class="btn btn-primary mt-3" type="button">Lihat selengkpanya</button>
                            </div>
                        </div>
                        <div class="row px-3 py-5">
                            <div class="col-xl-4"><img class="img-fluid rounded-4" src="assets/img/proker.png" /></div>
                            <div class="col align-self-center">
                                <h5 class="fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /></p><button class="btn btn-primary mt-3" type="button">Lihat selengkpanya</button>
                            </div>
                        </div>
                        <div class="row px-3 py-5">
                            <div class="col-xl-4"><img class="img-fluid rounded-4" src="assets/img/proker.png" /></div>
                            <div class="col align-self-center">
                                <h5 class="fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br /></p><button class="btn btn-primary mt-3" type="button">Lihat selengkpanya</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-second" role="tabpanel" aria-labelledby="v-pills-second-tab" tabindex="0">dua</div>
                    <div class="tab-pane fade" id="v-pills-third" role="tabpanel" aria-labelledby="v-pills-third-tab" tabindex="0">tiga</div>
                    <div class="tab-pane fade" id="v-pills-fourth" role="tabpanel" aria-labelledby="v-pills-fourth-tab" tabindex="0">dua</div>
                    <div class="tab-pane fade" id="v-pills-fifth" role="tabpanel" aria-labelledby="v-pills-fifth-tab" tabindex="0">dua</div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
