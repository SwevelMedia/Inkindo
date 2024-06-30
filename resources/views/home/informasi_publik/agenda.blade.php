@extends('layouts.app-home')

@section('title', 'Agenda')

@section('content')
    <section class="py-3" style="background: #0a425c;">
        <div class="container">
            <h1 class="text-white" style="font-family: Poppins, sans-serif;">Detail Agenda</h1>
        </div>
    </section>
    <section>
        <div class="container py-5">
            @if ($allAgenda != null)
                <div class="row d-flex justify-content-between">
                    <div class="col-md-3">
                        <div class="card shadow" style="background: rgba(128,186,224,0.5);">
                            <div class="card-body">
                                <h5 class="fw-bold card-title mb-0" style="color: #0a425c;">Daftar Agenda</h5>
                            </div>
                        </div>
                        {{-- accordion --}}
                        <div class="accordion mt-3 shadow" id="accordionExample">
                            @foreach ($bulan as $key => $b)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            {{ date('F Y', strtotime($b->bulan)) }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="" style="font-size: 14px;">
                                                @foreach ($kegiatan as $k)
                                                    @if ($k->bulan == $b->bulan)
                                                        <li>{{ $k->kegiatan }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($recentAgenda as $recent)
                        <div class="col-md-5 p-4 shadow">
                            <h1 class="fw-bold" style="font-size: 20px;">{{ $recent->kegiatan }}</h1>
                            <img class="img-fluid p-3" src="{{ asset('uploads/admin/agenda/' . trim($recent->poster, '"')) }}" alt="Poster" />
                            <div class="row p-3">
                                <div class="col d-flex justify-content-center">
                                    <ul class="list-unstyled">
                                        <li class="mb-2" style="font-size: 14px;">
                                            <i class="far fa-calendar me-3"></i>{{ $recent->tanggal }}
                                        </li>
                                        <li class="mb-2" style="font-size: 14px;"><i class="far fa-clock me-3">
                                            </i><span style="color: var(--bs-body-color); background-color: var(--bs-body-bg);">{{ date('H', strtotime($recent->waktu)) }} :
                                                {{ date('i', strtotime($recent->waktu)) }}</span>
                                        </li>
                                        <li style="font-size: 14px;">
                                            <i class="fas fa-home me-3"></i>{{ $recent->tempat }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col d-flex flex-column align-items-center">
                                    @if ($recent->link != null)
                                        {!! QrCode::size(100)->generate($recent->link) !!}
                                    @endif
                                    <p class="mt-3" style="font-size: 12px;text-align: center;">Scan QR Code untuk registrasi<br /></p>
                                </div>
                            </div>
                            <div class="row px-3 pb-3">
                                <p>{{ $recent->deskripsi }}<br /></p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col mb-3">
                                <h1 class="fw-bold" style="font-size: 18px;color: #2282c1;">Agenda Lainnya</h1>
                            </div>
                        </div>
                        <div class="row p-3 shadow" style="overflow-y: scroll;max-height: 500px">
                            @foreach ($allAgenda as $a)
                                <div class="mb-4">
                                    <div class="row py-2 mb-sm-0 pb-sm-0 pt-sm-3" style="background: #bfdcef;">
                                        <div class="col-2 me-3 mb-sm-0 pb-sm-3">
                                            <img src="{{ asset('uploads/admin/agenda/' . trim($a->poster, '"')) }}" style="width: 36px;height: 36px;border-radius: 100%;" alt="Poster" />
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <p style="font-size: 14px;">{{ $a->kegiatan }}<br /></p>
                                        </div>
                                    </div>
                                    <div class="row py-2 mb-sm-0 pb-sm-0 pt-sm-3">
                                        <div class="col ps-sm-0">
                                            <p>{{ $a->deskripsi }}<br /></p>
                                        </div>
                                    </div>
                                    <div class="row py-2 mb-sm-0 pb-sm-0 pt-sm-3">
                                        <div class="col ps-sm-0">
                                            <div class="row pb-sm-0 mb-sm-0">
                                                <div class="col-1 me-2 mb-sm-0 pb-sm-3"><i class="far fa-calendar" style="font-size: 20px;"></i></div>
                                                <div class="col">
                                                    <p style="font-size: 14px;">{{ $a->tanggal }}<br /></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1 me-2 mb-sm-0 pb-sm-3"><i class="far fa-clock" style="font-size: 20px;"></i></div>
                                                <div class="col">
                                                    <p style="font-size: 14px;">{{ date('H', strtotime($recent->waktu)) }} : {{ date('i', strtotime($recent->waktu)) }}<br /></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {{-- alert --}}
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Maaf!</h4>
                            <p>Agenda belum tersedia</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
