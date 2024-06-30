<?php
// $kontak = App\Models\Kontak::all();
$kontak = App\Models\Profil::all();
$medsos = App\Models\Profil::all();
?>
<footer class="text-white" style="background: #002F52">
    {{-- py-lg-5 --}}
    <div class="container py-4 ">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4 text-center text-lg-start d-flex flex-column item py-md-4 px-md-2">
                <div class="fw-medium d-flex justify-content-center justify-content-sm-start align-items-center mb-2">
                    <span class="me-md-2">
                        <img class="img-fluid" src="{{ asset('assets/img/logo-inkindo.png') }}" />
                    </span>
                    <span class="ms-2">
                        <p style="font-size: 20px; margin-bottom: 0px; padding-bottom: 0px; padding-top: 8px">INKINDO
                        </p>
                        <p style="font-size: 14px; margin-top: -5px; padding-top: 0px">Yogyakarta</p>
                    </span>
                </div>
                <div class="flex">
                    <p style="font-size: 12px;">
                        Ikatan Nasional Konsultan Indonesia (INKINDO) merupakan Asosiasi Perusahaan
                        Jasa Konsultan di Indonesia yang di dirikan pada tanggal 20 Juni 1979 di Jakarta.
                    </p>
                </div>
            </div>
            {{-- <div
                class="col-auto col-sm-4 col-md-4 col-lg-3 text-center text-lg-start d-flex flex-column item py-md-4 px-md-4 py-3 ps-3">
                <h3 class="fs-6 text-white">INKINDO YOGYAKARTA</h3>
                <p style="font-size: 12px;">
                    Ikatan Nasional Konsultan Indonesia (INKINDO) merupakan Asosiasi Perusahaan
                    Jasa Konsultan di Indonesia yang di dirikan pada tanggal 20 Juni 1979 di Jakarta.
                </p>
            </div> --}}
            <div class="col-12 col-sm-4 text-center text-lg-start d-flex flex-column item py-md-4 px-md-4">
                <h3 class="fs-6 text-white pt-3">KONTAK</h3>
                <ul class="list-unstyled text-sm-start">
                    @forelse ($kontak as $kontak)
                        <li class="py-md-1"><i class="fas fa-envelope"></i><a
                                class="link-light ms-2 text-decoration-none"
                                style="font-size: 12px;">{{ $kontak->email }}</a></li>
                        <li class="py-md-1"><i class="fas fa-phone-alt"></i><a
                                class="link-light ms-2 text-decoration-none"
                                style="font-size: 12px;">{{ $kontak->no_hp }}</a></li>
                    @empty
                        <li class="py-md-1"><i class="fas fa-envelope"></i><a class="link-light ms-2" href="#"
                                style="font-size: 12px;">Data belum diisi</a></li>
                        <li class="py-md-1"><i class="fas fa-phone-alt"></i><a class="link-light ms-2" href="#"
                                style="font-size: 12px;">Data belum diisi</a></li>
                    @endforelse
                    <li class="py-md-1"><i class="fas fa-map-marked"></i><a class="link-light ms-2 text-decoration-none"
                            href="#" style="font-size: 12px;">Jl. Kenari No. 29, Yogyakarta 10210</a></li>
                </ul>
            </div>
            <div {{-- class="col-12 col-sm-4 text-center text-lg-start d-flex flex-column align-items-center bg-danger item py-md-4 px-md-4"> --}}
                class="col-12 col-sm-4 text-center text-lg-start d-flex flex-column align-items-center align-items-lg-start item social px-md-4 py-md-4">
                <h3 class="fs-6 text-white pt-3">SOSIAL MEDIA</h3>
                <ul class="list-unstyled d-flex flex-row flex-sm-row flex-md-row">
                    @forelse ($medsos as $medsos)
                        <li class="me-2"><a href="#"><i class="fab fa-facebook text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                        <li class="me-2"><a href="#"><i class="fab fa-instagram text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                        <li class="me-2"><a href="#"><i class="fab fa-twitter text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                        <li class="me-2"><a href="#"><i class="fab fa-whatsapp text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                    @empty
                        <li class="me-2"><a href="#"><i class="fab fa-facebook text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                        <li class="me-2"><a href="#"><i class="fab fa-instagram text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                        <li class="me-2"><a href="#"><i class="fab fa-twitter text-white"
                                    style="color: rgb(13, 110, 253);"></i></a></li>
                    @endforelse
                </ul>
            </div>
        </div>
        <hr />
        <div class="d-flex justify-content-center align-items-center text-center pt-3">
            <p class="mb-0">&copy; 2023 INKINDO D.I. YOGYAKARTA</p>
        </div>
    </div>
</footer>
