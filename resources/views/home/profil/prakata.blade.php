@extends('layouts.app-home')

@section('title', 'Prakata')

@section('css')
    <style>
        .wrapper {
            column-count: 2;
            column-gap: 50px;
            padding: 50px;
        }
    </style>
@endsection

@section('content')
    @foreach ($profil as $profil)
        <section class="py-3" style="color: #c3292900;background: #0a425c;">
            <div class="container">
                <h2 class="text-white mb-0" style="font-family: Poppins, sans-serif;">PRAKATA</h2>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="wrapper">
                    <div id="background-prakata" class="mb-5">
                        <img class="w-100 fit-cover px-md-5 py-md-5" src="{{ asset('storage/uploads/profil/' . $profil->gambar_prakata) }}" />
                    </div>
                    <p class="my-3 my-md-0">{!! $profil->prakata !!}</p>
                </div>
                {{-- <div class="row d-flex">
                    <div class="col-md-7">
                        <h3 class="fw-bold text-center my-md-0 mb3 mb-md-3" style="font-family: Poppins, sans-serif;">PRAKATA</h3>
                        <p class="my-3 my-md-0">{!! $profil->prakata !!}</p>
                    </div>
                    <div class="col p-5">
                        <div id="background-prakata">
                            <img class="w-100 fit-cover px-md-5 py-md-5" src="{{ asset('storage/uploads/profil/' . $profil->gambar_prakata) }}" />
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    @endforeach

    <section class="pb-5 mb-5">
        <div class="container bg-roadmap">
            <div class="row d-md-flex justify-content-md-center">
                <div class="col-md-8 col-xl-6 text-center py-0 px-md-0 px-5">
                    <h3 class="fw-bold" style="color: #2275AF">ROADMAP INKINDO 2022</h3>
                    <p class="py-md-4 px-md-4">Merupakan blueprint dan grand design yang menjadi peta jalan strategis berupa
                        rencana berbasis waktu yang mendefinisikan kondisi eksisting organisasi INKINDO saat ini, kearah
                        mana tujuan ideal kondisi yang dituju dalam prespektif waktu, dan bagaimana mencapai tujuan
                        tersebut. Roadmap akan menjadi representasi visual yang mengatur dan menyajikan informasi penting
                        terkait dengan rencana masa depan INKINDO.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.owl-prakata').owlCarousel({
                loop: false,
                margin: 35,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        })
    </script>
@endsection
