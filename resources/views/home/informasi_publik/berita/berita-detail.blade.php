@extends('layouts.app-home')

@section('title', 'Berita')

@section('content')
    <section class="px-2 py-3 mb-5" style="background-color: #0A425C;">
        <div class="container">
            <h1 class="text-white">Berita</h1>
        </div>
    </section>
    <section class="container pb-5">
        <div class="row gx-5">

            <div class="col-md-7">
                <div>
                    <h4 class="fw-bold mb-3">{{ $beritaDetail->judul }}</h4>
                </div>
                <img class="img-fluid" src="{{ asset('storage/uploads/admin/berita/' . $beritaDetail->poster) }}" alt="">
                {{-- <h5 class="text-danger fw-semibold mt-3">{{ $beritaDetail->beritaKategori->berita_kategori }}</h5> --}}

                <p class="fw-semibold text-muted">Penulis : {{ $beritaDetail->penulis }}</p>
                <div>
                    {!! $beritaDetail->isi !!}
                </div>
            </div>

            <div class="col">
                <div>
                    <h4 class="fw-bold mb-3">Berita lainnya</h4>
                </div>
                <div class="recent-berita">
                    {{-- @forelse ($recentBerita as $recent)
                        <div class="row">
                            <div class="col mb-3">
                                <img class="img-fluid" src="{{ asset('uploads/admin/berita/' . $recent->poster) }}"
                                    alt="">
                            </div>
                            <div class="col">
                                <a href="{{ route('home.berita.detail', $recent->id) }}" class="text-dark">
                                    <h5 class="fw-semibold mb-0">{{ $recent->judul }}</h5>
                                </a>
                                <p class="fw-semibold text-muted fs-6">Penulis : {{ $recent->penulis }}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse --}}
                </div>
                <div class="row mt-5">
                    <div>
                        <h4 class="fw-bold mb-3">Kategori</h4>
                    </div>
                    {{-- <div>
                        @foreach ($kategori as $kategori)
                            <a href=""
                                class="btn btn-outline-danger btn-sm mb-2">{{ $kategori->berita_kategori }}</a>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
