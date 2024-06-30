@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Agenda')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class=" card-title font-weight-bold mb-0">Daftar Agenda</h5>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button id="custom-blue" type="button" class="btn btn-sm" data-toggle="modal" data-target="#tambahAgenda">
                            Tambah Data
                        </button>

                        {{-- Modal Tambah --}}
                        <div id="tambahAgenda" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Agenda</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Poster</label>
                                                <input type="file" class="form-control-file border @error('poster') is-invalid @enderror" name="poster">
                                                @error('poster')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Kegiatan</label>
                                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{ old('kegiatan') }}"
                                                       placeholder="Masukkan Nama Kegiatan">
                                                @error('kegiatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Deskripsi Kegiatan</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Tulis Deskripsi">{{ old('deskripsi') }}</textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Tanggal Pelaksanaan</label>
                                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}">
                                                @error('tanggal')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Waktu Pelaksanaan</label>
                                                <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}">
                                                @error('waktu')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Tempat Pelaksanaan</label>
                                                <textarea class="form-control @error('tempat') is-invalid @enderror" name="tempat" rows="2" placeholder="Tulis Lokasi">{{ old('tempat') }}</textarea>
                                                @error('tempat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Penyelenggara</label>
                                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" name="penyelenggara" value="{{ old('penyelenggara') }}"
                                                       placeholder="Masukkan Nama Penyelenggara">
                                                @error('penyelenggara')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Tautan Pendaftaran</label>
                                                <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}"
                                                       placeholder="Tulis Tautan Kegiatan">
                                                @error('link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                                                <button id="custom-blue" class="btn" type="sumbit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- table satu --}}
                @forelse ($agenda as $a)
                    <div class="row d-flex justify-content-between align-items-between mb-3 p-3 border">
                        <div class="col-3">
                            <img src="{{ asset('uploads/admin/agenda/' . trim($a->poster, '"')) }}" class="img-fluid rounded" alt="Poster">
                        </div>
                        <div class="col ml-3">
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <div>
                                        <h5 class="card-title font-weight-bold">{{ $a->kegiatan }}</h5>
                                    </div>
                                    <div class="">
                                        <p class="fs-6">{{ $a->deskripsi }}</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button data-toggle="modal" data-target="#update{{ $a->id }}" class="btn btn-sm btn-warning mr-2 text-light"><i class="fas fa-edit"></i> Edit</button>

                                    {{-- Modal Update --}}
                                    <div id="update{{ $a->id }}" class="modal fade" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Agenda</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('agenda.update', $a->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Poster</label>
                                                            <input type="file" class="form-control-file border @error('poster') is-invalid @enderror" name="poster">
                                                            @error('poster')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Kegiatan</label>
                                                            <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" placeholder="Masukkan Nama Kegiatan"
                                                                   value="{{ $a->kegiatan }}">
                                                            @error('kegiatan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Deskripsi Kegiatan</label>
                                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Tulis Deskripsi">{{ $a->deskripsi }}</textarea>
                                                            @error('deskripsi')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Tanggal Pelaksanaan</label>
                                                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $a->tanggal }}">
                                                            @error('tanggal')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Waktu Pelaksanaan</label>
                                                            <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ $a->waktu }}">
                                                            @error('waktu')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Tempat Pelaksanaan</label>
                                                            <textarea class="form-control @error('tempat') is-invalid @enderror" name="tempat" rows="2" placeholder="Tulis Lokasi">{{ $a->tempat }}</textarea>
                                                            @error('tempat')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Penyelenggara</label>
                                                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" name="penyelenggara"
                                                                   value="{{ $a->penyelenggara }}" placeholder="Masukkan Nama Penyelenggara">
                                                            @error('penyelenggara')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">Tautan Pendaftaran</label>
                                                            <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $a->link }}"
                                                                   placeholder="Tulis Tautan Kegiatan">
                                                            @error('link')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                                                            <button id="custom-blue" class="btn" type="sumbit">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('agenda.destroy', $a->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash"></i> Delete</button>
                                    </form>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <ul class="list-unstyled fs-6">
                                        <li>Tempat</li>
                                        <li>Penyelenggara</li>
                                        <li>Tanggal</li>
                                        <li>Waktu</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-unstyled fs-6">
                                        <li>:&nbsp;&nbsp;&nbsp;{{ $a->tempat }}</li>
                                        <li>:&nbsp;&nbsp;&nbsp;{{ $a->penyelenggara }}</li>
                                        <li>:&nbsp;&nbsp;&nbsp;{{ $a->tanggal }}</li>
                                        <li>:&nbsp;&nbsp;&nbsp;{{ $a->waktu }}</li>
                                    </ul>
                                </div>
                                <div class="col-3 d-flex flex-column align-items-center">
                                    <p>Barcode Pendaftaran</p>
                                    @if ($a->link)
                                        {!! QrCode::size(90)->generate($a->link) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                @endforelse
                {{ $agenda->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
