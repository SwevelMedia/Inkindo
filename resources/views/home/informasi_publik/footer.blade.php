{{-- <footer class="mt-3" style="background-color: #001D3D">
    <div class="px-5 pt-5 pb-2">
        <div class="row text-white">
            <div class="col-md-12 text-center">
                <img src="{{ asset('assets/img/DMI/logo-footer.png') }}" style="height: 80px;" id="logo-navbar">
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-block d-sm-flex justify-content-center text-light">
                <div class="d-flex pt-1">
                    <a class="text-decoration-none" href="#">
                        <h6 class="fw-normal text-white mx-3">Produk</h6>
                    </a>|
                    <a class="text-decoration-none" href="#">
                        <h6 class="fw-normal text-white mx-3">Supplier</h6>
                    </a>|
                    <a class="text-decoration-none" href="#">
                        <h6 class="fw-normal text-white mx-3">Tentang Kami</h6>
                    </a>|
                </div>
                <div class="d-flex justify-content-center mx-3 pt-0 mt-0 text-center text-white">
                    <a href="#"><i class="fab fa-brands fa-facebook text-white" style="font-size: 30px;"></i></a>
                    <a href="#"><i class="fab fa-brands fa-instagram mx-2 text-white"
                            style="font-size: 30px;"></i></a>
                    <a href="#"><i class="fab fa-brands fa-youtube text-white" style="font-size: 30px; "></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="text-light d-flex justify-content-center">
                <p class="w-75 text-center" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Suscipit, ea. Porro nihil impedit recusandae
                    maxime facere iure ipsam adipisci non?</p>
            </div>
        </div>
        <div class="row">
            <div class="text-light text-center">
                <p> &copy;&nbsp;2023 DMI. All right Reserved</p>
            </div>
        </div>
    </div>
</footer> --}}
<?php
// $kontak = App\Models\Kontak::all();
$kontak = App\Models\Profil::all();
$medsos = App\Models\Profil::all();
?>
<footer class="text-white" style="background: #002F52">
    {{-- py-lg-5 --}}
    <div class="container py-4 ">
        <div class="row justify-content-center">
            <div
                class="col-auto col-sm-4 col-md-4 col-lg-3 text-center text-lg-start d-flex flex-column item py-md-4 px-md-2">
                <div class="fw-bold d-flex justify-content-center align-items-center mb-2">
                    <span class="me-md-2">
                        <img class="img-fluid" src="{{ asset('assets/img/logo-inkindo.png') }}" />
                    </span>
                    <span>
                        <p style="font-size: 20px; margin-bottom: 0px; padding-bottom: 0px; padding-top: 8px">INKINDO</p>
                        <p style="font-size: 14px; margin-top: -5px; padding-top: 0px">Yogyakarta</p>
                    </span>
                </div>
            </div>
            <div
                class="col-auto col-sm-4 col-md-4 col-lg-3 text-center text-lg-start d-flex flex-column item py-md-4 px-md-4 py-3 ps-3">
                <h3 class="fs-6 text-white">INKINDO YOGYAKARTA</h3>
                <p style="font-size: 12px;">
                    Ikatan Nasional Konsultan Indonesia (INKINDO) merupakan Asosiasi Perusahaan
                    Jasa Konsultan di Indonesia yang di dirikan pada tanggal 20 Juni 1979 di Jakarta.
                </p>
            </div>
            <div
                class="col-auto col-sm-4 col-md-4 col-lg-3 text-center text-lg-start d-flex flex-column item py-md-4 px-md-4">
                <h3 class="fs-6 text-white">KONTAK</h3>
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
            <div
                class="col-auto col-sm-4 col-md-4 col-lg-3 text-center text-lg-start d-flex flex-column align-items-center align-items-lg-start item social px-md-4 py-md-4">
                <h3 class="fs-6 text-white">SOSIAL MEDIA</h3>
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
        <div class="d-flex justify-content-center align-items-center pt-3">
            <p class="mb-0">© 2023 INKINDO D.I. YOGYAKARTA - All Right Reserved</p>
        </div>
    </div>
</footer>
