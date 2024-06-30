@extends('layouts.app-home')

@section('title', 'Proker')

@section('content')
    <section class="py-3" style="background: #0a425c;">
        <div class="container">
            <h1 class="text-white" style="font-family: Poppins, sans-serif;">Program Kerja</h1>
        </div>
    </section>
    <section class="container py-5">
        <div class="card shadow mb-4" style="background: #4694B8">
            <div class="card-body container p-4">
                <h5 class="m-0 font-weight-bold text-white"><i class="fa fa-clone me-3" aria-hidden="true"></i>Statistik program kerja</h5>
                <div class="table-responsive d-flex justify-content-center my-5">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body text-center py-4" style="color: #333333">
                            <i class="fa fa-list-ul fs-1" style="color: #607EAA"></i>
                            <h5 class="mt-5">Program Kerja</h5>
                            <h5 class="">{{ $totalProker }}</h5>
                        </div>
                    </div>
                    <div class="card mx-4" style="width: 13rem;">
                        <div class="card-body text-center py-4" style="color: #333333">
                            <i class="fa fa-bookmark fs-1" style="color: #607EAA"></i>
                            <h5 class="mt-5">Berjalan</h5>
                            <h5 class="">{{ $dikerjakan }}</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 13rem;">
                        <div class="card-body text-center py-4" style="color: #333333">
                            <i class="fa fa-check-square fs-1" style="color: #607EAA"></i>
                            <h5 class="mt-5">Terselesaikan</h5>
                            <h5 class="">{{ $selesai }}</h5>
                        </div>
                    </div>
                </div>
                <h5 class="font-weight-bold text-white">
                    <h5 class="text-white font-weight-bold">Completion Rate</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $persenSelesai }}%" aria-valuenow="{{ $persenSelesai }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $persenSelesai }}%</div>
                    </div>
                </h5>
            </div>
        </div>

        <div class="container py-3">
            <h4 class="fw-bold card-title ">Program Kerja Terdekat</h4>
            <div class="row row-cols-3 gy-3 py-3">
                @forelse ($prokerTerdekat as $terdekat)
                    <div class="col-md-4">
                        <div class="card">
                            <div id="custom-blue" class="card-header d-flex align-items-center" style="min-height: 80px">
                                <h5 class="card-title mb-0">{{ $terdekat->nama_proker }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column" style="height: 300px">
                                    <div class="card-subtitle text-muted ">
                                        <h6>Tanggal Pelaksanaan :
                                            <span class="text-dark fw-bold">{{ $terdekat->pelaksanaan }}</span>
                                        </h6>
                                    </div>
                                    <div class="">
                                        <h6>Detail : <br>
                                            {!! $terdekat->keterangan !!}
                                        </h6>
                                    </div>
                                    <div class="mt-auto">
                                        <p>Status :
                                            @if ($terdekat->status == 1)
                                                <span class="text-primary">Masuk Draft</span>
                                            @elseif($terdekat->status == 2)
                                                <span class="text-success">Berjalan</span>
                                            @elseif ($terdekat->status == 3)
                                                <span class="text-danger">Selesai</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                @endforelse
            </div>

            <h4 class="fw-bold card-title mt-3">Program Kerja Terealisasi</h4>
            <div class="row row-cols-3 gy-3 py-3">
                @forelse ($prokerSelesai as $selesai)
                    <div class="col-md-4">
                        <div class="card">
                            <div id="custom-blue" class="card-header d-flex align-items-center" style="min-height: 80px">
                                <h5 class="card-title mb-0">{{ $selesai->nama_proker }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column" style="height: 300px">
                                    <div class="card-subtitle text-muted ">
                                        <h6>Tanggal Pelaksanaan :
                                            <span class="text-dark fw-bold">{{ $selesai->pelaksanaan }}</span>
                                        </h6>
                                    </div>
                                    <div class="">
                                        <h6>Detail : <br>
                                            <p>{!! $selesai->keterangan !!}</p>
                                        </h6>
                                    </div>
                                    <div class="mt-auto">
                                        <p>Status :
                                            @if ($selesai->status == 1)
                                                <span class="text-primary">Masuk Draft</span>
                                            @elseif($selesai->status == 2)
                                                <span class="text-success">Berjalan</span>
                                            @elseif ($selesai->status == 3)
                                                <span class="text-danger">Selesai</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                @endforelse
            </div>

            <h4 class="fw-bold card-title mt-3">Daftar Program Kerja</h4>
            <div class="row row-cols-3 gy-3 py-3">
                @forelse ($proker as $proker)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div id="custom-blue" class="card-header d-flex align-items-center" style="min-height: 100px">
                                <h5 class="card-title mb-0">{{ $proker->nama_proker }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column" style="height: 420px">
                                    <div class="card-subtitle text-muted ">
                                        <h6>Tanggal Pelaksanaan :
                                            <span class="text-dark fw-bold">{{ $proker->pelaksanaan }}</span>
                                        </h6>
                                    </div><br>
                                    <div class="">
                                        <h6>Detail : <br><br>
                                            {!! $proker->keterangan !!}
                                        </h6>
                                    </div>
                                    <div class="mt-auto">
                                        <p>Status :
                                            @if ($proker->status == 1)
                                                <span class="text-primary">Masuk Draft</span>
                                            @elseif($proker->status == 2)
                                                <span class="text-success">Berjalan</span>
                                            @elseif ($proker->status == 3)
                                                <span class="text-danger">Selesai</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
