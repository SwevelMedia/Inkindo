@extends('layouts.app-home')

@section('title', 'FAQ')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/responsive.css') }}">
@endsection


@section('content')
    <section id="FAQ">
        <div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="nav position-relative">
                        <h2 class="position-absolute">Ada yang bisa kami Bantu ?</h2>
                        <form class="position-absolute form-group d-flex justify-content-center" method="get"
                            action="{{ route('home.faq.cari') }}">
                            <input type="text" placeholder="Tuliskan pertanyaanmu disini" name="cari"
                                class="form-control rounded-pill" id="input-search">
                        </form>
                        <img class="bg-2 position-absolute" src="{{ asset('assets/img/bg-faq-1.svg') }}" alt="">
                        <img class="bg-1 position-aboslute" src="{{ asset('assets/img/Shape.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="tanya col-md-12 my-5">
                        <section class="container-fluid">
                            <div class="accordion accordion-flush" id="accordionFaq">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item list-search">
                                        <div class="accordion-header" id="headingOne">
                                            {{--  --}}
                                            <button class="accordion-button collapsed shadow my-2" type="button"
                                                {{--     --}} data-bs-toggle="collapse"
                                                data-bs-target="#faq{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <h6 class="fw-semibold">{{ $faq->pertanyaan }}</h6>
                                            </button>
                                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne">
                                                <div class="accordion-body">
                                                    <p>{{ $faq->jawaban }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
                {{-- <div class="row mb-5">
                    <div class="text-center" id="pagingControls"></div>
                    <div class="text-center" id="showingInfo" class="well" style="margin-top:20px"></div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
