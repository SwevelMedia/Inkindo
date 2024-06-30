@extends('dashboard.layouts.app-admin')

@section('title', 'Mitra')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Mitra --}}
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="card-title font-weight-bold">Mitra</h3>
                    </div>
                    <div>
                        <button id="custom-blue" class="btn btn-sm" type="button" data-target="#modal-tambah"
                            data-toggle="modal">Tambah Mitra</button>
                        {{-- Modal Tambah --}}
                        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Mitra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label font-weight-normal">Nama Regulasi</label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Masukan Nama Mitra">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input">
                                                    <label class="custom-file-label">Pilih
                                                        File</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-primary blue-bg-inkindo">Simpan</button>
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
                <div class="table-responsive">
                    <table class="table table-sm table-bordered justify-content-center table-hover">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama Mitra</th>
                                <th class="text-center align-middle">Logo Mitra</th>
                                <th class="text-center align-middle">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mitras as $key => $mitra)
                                {{-- <tr>
                                    <td class="text-center align-middle">{{ $key + 1 }}</td>
                                    <td class="text-center align-middle">{{ $mitra->nama }}</td>
                                    <td class="text-center align-middle">
                                        <img class="object-fit-cover"
                                            src="{{ asset('uploads/admin/mitra/' . $mitra->logo) }}" alt="img"
                                            style="max-width: 200px; height:100px">
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <button type="button"
                                                class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                data-toggle="modal" data-target="#modal-edit{{ $mitra->id }}"
                                                data-nama=""><i class="far fa-edit mitra-edit"></i></button>
                                            <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" value="{{ $mitra->id }}" name="id" hidden>
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>

                                    {{-- Modal Edit --}}
                                <div class="modal fade" id="modal-edit{{ $mitra->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Mitra</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('mitra.update', $mitra->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label class="form-label font-weight-normal">Nama Mitra</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            id="editNama" placeholder="Masukan Nama Mitra"
                                                            value="{{ $mitra->nama }}">
                                                    </div>
                                                    <div class="input-group align-items-center mb-3">
                                                        <div class="img pr-2">
                                                            <img class="object-fit-cover"
                                                                src="{{ asset('uploads/admin/mitra/' . $mitra->logo) }}"
                                                                alt="no-img" style="max-width: 200px; height:100px">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="hidden" name="logoOld"
                                                                value="{{ $mitra->logo }}">
                                                            <input type="file" name="logo" class="custom-file-input">
                                                            <label class="custom-file-label">Pilih
                                                                File</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn btn-primary blue-bg-inkindo">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </tr> --}}
                            @empty
                                {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Mohon maaf!</strong> Data kategori FAQ belum tersedia. Silahkan tambahkan data
                                kategori FAQ terlebih dahulu.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
