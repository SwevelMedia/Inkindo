@extends('layouts.app-home')

@section('title', 'Regulasi')

@section('content')
    <section class="py-3" style="color: #c3292900;background: #0a425c;">
        <div class="container">
            <h2 class="text-white mb-0" style="font-family: Poppins, sans-serif;">Regulasi</h2>
        </div>
    </section>

    <div class="container py-5">
        <div class="row d-flex">
            <div class="col-md-3 d-flex flex-column">
                <h4 class="fw-bold text-center">Kategori</h4>
                <ul class="list-group">
                    <button class="list-group-item text-center list-group-item-action active" aria-current="true" id="syarat1" data-bs-toggle="pill" data-bs-target="#v-pills-home" role="tab"
                            style="border-radius: 0px;">Semua Regulasi
                    </button>
                    @foreach ($kategori as $kategori)
                        <button class="list-group-item text-center list-group-item-action" aria-current="true" id="kategori" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $kategori->id }}"
                                role="tab" style="border-radius: 0px;">{{ $kategori->arsip_kategori }}
                        </button>
                    @endforeach
                </ul>
                {{-- <div>
                    <h4 class="fw-bold mb-0">Kategori</h4>
                </div>
                <div class="nav nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-dark fw-semibold active mb-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                            aria-controls="v-pills-home" aria-selected="true">Semua Regulasi</button>
                    @foreach ($kategori as $kategori)
                        <button class="nav-link text-dark fw-semibold mb-2" id="v-pills-{{ $kategori->id }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $kategori->id }}" type="button"
                                role="tab" aria-controls="v-pills-{{ $kategori->id }}" aria-selected="false">{{ $kategori->arsip_kategori }}</button>
                    @endforeach
                </div> --}}
            </div>

            <div class="col">
                <div class="tab-content ms-3" id="v-pills-tabContent">
                    <div class="tab-pane tab-pane-custom fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        @foreach ($arsips as $arsip)
                            <h5>{{ $arsip->nama_arsip }}</h5>
                            <p>{{ $arsip->keterangan }}</p>
                            <a href="{{ asset('uploads/admin/arsip/' . $arsip->file_arsip) }}" class="btn btn-outline-secondary btn-sm d-inline-flex justify-content-xl-center align-items-xl-center"
                               role="button">
                                <i class="fas fa-download"></i> Download
                            </a>
                            <hr>
                        @endforeach
                    </div>
                    @foreach ($kategori2 as $kategori)
                        <div class="tab-pane fade" id="v-pills-{{ $kategori->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $kategori->id }}-tab" tabindex="0">
                            @foreach ($arsips as $arsip)
                                @if ($arsip->arsip_kategori_id == $kategori->id)
                                    <h5>{{ $arsip->nama_arsip }}</h5>
                                    <p>{{ $arsip->keterangan }}</p>
                                    <a class="btn btn-outline-secondary btn-sm d-inline-flex justify-content-xl-center align-items-xl-center" role="button">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
