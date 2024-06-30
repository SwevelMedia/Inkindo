@extends('layouts.app')

@section('title', 'Visi-Misi')

@section('content')
    <div class="col bg-visi-misi">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 text-white my-5 py-5">
                    <h1 class="fw-bold fs-1 align-middle">Visi</h1>
                    <h5 class="fw-normal">Terwujudnya perusahaan Jasa Konsultan yang berintegritas, <br>professional dan
                        inovatif</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 py-5">
        <h1 class="text-center my-5 fw-bold">Misi</h1>
        <div class="row py-3 px-5 text-center">
            <div class="owl-visi-misi owl-carousel owl-theme">
                <div class="item mb-4 me-4">
                    <div class="card shadow">
                        <img src="<?= 'assets/img/misi3.png' ?>" alt="image" class="card-img-top">
                        <div class="card-body">
                            <h6> Meningkatkan efektivitas INKINDO sebagai wadah komunikasi dan koordinasi antar Anggota
                                dengan para pemangku kepentingan</h6>
                        </div>
                    </div>
                </div>
                <div class="item mb-4  me-4">
                    <div class="card shadow">
                        <img src="<?= 'assets/img/misi.png' ?>" alt="image" class="card-img-top">
                        <div class="card-body">
                            <h6> Meningkatkan efektivitas INKINDO sebagai wadah komunikasi dan koordinasi antar Anggota
                                dengan para pemangku kepentingan</h6>
                        </div>
                    </div>
                </div>
                <div class="item mb-4  me-4">
                    <div class="card shadow">
                        <img src="<?= 'assets/img/misi2.png' ?>" alt="image" class="card-img-top">
                        <div class="card-body">
                            <h6> Meningkatkan efektivitas INKINDO sebagai wadah komunikasi dan koordinasi antar Anggota
                                dengan para pemangku kepentingan</h6>
                        </div>
                    </div>
                </div>
                <div class="item mb-4  me-4">
                    <div class="card shadow">
                        <img src="<?= 'assets/img/misi3.png' ?>" alt="image" class="card-img-top">
                        <div class="card-body">
                            <h6> Meningkatkan efektivitas INKINDO sebagai wadah komunikasi dan koordinasi antar Anggota
                                dengan para pemangku kepentingan</h6>
                        </div>
                    </div>
                </div>
                <div class="item mb-4  me-4">
                    <div class="card shadow">
                        <img src="<?= 'assets/img/misi2.png' ?>" alt="image" class="card-img-top">
                        <div class="card-body">
                            <h6> Meningkatkan efektivitas INKINDO sebagai wadah komunikasi dan koordinasi antar Anggota
                                dengan para pemangku kepentingan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
