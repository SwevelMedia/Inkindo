@extends('layouts.app-home')

@section('title', 'Berita')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/informasi_publik/berita.css') }}">
@endsection

@section('content')
    <section class="container pb-5 pt-4 px-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="fw-bold mb-3">{{ $berita->judul }}</h3>
                <div class="d-flex">
                    <p> {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</p>
                    <p class="fw-semibold ms-3" style="color:#2282C1">Oleh : {{ $berita->penulis }}</p>
                </div>

            </div>
        </div>
        <div class="row gx-5 mt-2">
            <div class="col-md-7">
                <img class="img-fluid" src="{{ asset('storage/uploads/admin/berita/' . $berita->poster) }}" alt="">
                <h5 class="fw-semibold my-3" style="color:#005896"> Kategori :
                    {{ $berita->beritaKategori->berita_kategori }}</h5>
                <div style=" word-wrap: break-word;text-align: justify ">
                    {!! $berita->isi !!}
                </div>
            </div>
            <div class="col" style="overflow-y: scroll;overflow-x:hidden;max-height: 500px;">
                <div>
                    <h4 class="fw-medium mb-3" style="color :#005896;">Berita Terbaru</h4>
                </div>
                <div class="recent-berita">
                    @forelse ($recentBerita as $recent)
                        <div class="row">
                            <div class="col mb-3">
                                <a class="text-decoration-none" href="{{ route('home.berita', $recent->id) }}">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/uploads/admin/berita/' . $recent->poster) }}" alt=""
                                        style="max-height: 120px;object-fit: cover;border-radius:5px;"></a>
                            </div>
                            <div class="col">
                                <div class="fw-semibold" style="font-size: 0.9rem; color:#202124;">{{ $recent->judul }}
                                </div>
                                <a class="text-decoration-none" href="{{ route('home.berita', $recent->id) }}">
                                    <p class="m-0" style="font-size: 0.8rem; color:#929395;">
                                        {{ \Carbon\Carbon::parse($recent->created_at)->isoFormat('D MMMM Y') }}</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            <h3 class="text-center">Tidak ada berita</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-flex flex-wrap">
                @foreach ($kategori as $kategori)
                    <a href="" class="btn fw-semibold btn-sm m-1 px-3 py-1 rounded-pill"
                        style="color: #FFFFFF; background:#005896">{{ $kategori->berita_kategori }}</a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
