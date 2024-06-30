@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Detail Galeri')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="col">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="font-weight-bold mb-0">{{ $galeri->judul }}</h5>
                        </div>
                        <div>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambah-data">Tambah
                                Data
                            </button>
                        </div>
                        {{-- Modal Tambah Foto --}}
                        <div class="modal fade" tabindex="-1" id="tambah-data" name="tambah-data">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('galeri_detail.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Gambar Galeri</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="gallery_id" id="gallery_id"
                                                class="form-control-file border" required value="{{ $galeri->id }}">
                                            <div class="form-group" enctype="multipart/form-data">
                                                <label class="form-label font-weight-normal">Gambar<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input form-input"
                                                            id="gambar" name="gambar[]" multiple required>
                                                        <label class="custom-file-label form-control" for="">Pilih
                                                            file</label>
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-danger text_error_store text-small gambar_error_store"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="col-1 text-weight-500">
                                        No
                                    </th>
                                    <th class="text-weight-500">Foto</th>
                                    <th class="text-weight-500">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td><img src="{{ asset('storage/uploads/admin/galeri/' . $item->nama_foto) }}"
                                                alt="" style="max-width: 150px; max-height: 150;"></td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- hapus --}}
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusDetailGaleri{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                                {{-- edit --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white gambarUpdate mr-1"
                                                    data-toggle="modal" data-target="#modalGambarUpdate{{ $item->id }}"
                                                    data-nama="{{ $item->nama_foto }}"><i class="far fa-edit"></i></button>
                                            </div>
                                            {{-- modal hapus foto --}}
                                            <div class="modal fade" id="hapusDetailGaleri{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="HapusDetailiGaleriLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="HapusDetailGaleriLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('galeri_detail.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->nama_foto }}</b></span>
                                                                    dihapus ?
                                                                </label>
                                                                <input type="hidden" name="gallery_id" id="gallery_id"
                                                                    class="form-control-file border" required
                                                                    value="{{ $galeri->id }}">
                                                                <div
                                                                    class="btn d-flex justify-content-end gap-2">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">ya</button>
                                                                    <button type="button" data-dismiss="modal"
                                                                        class="btn btn-sm btn-secondary mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">tidak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Modal Edit foto --}}
                                            <div class="modal fade" tabindex="-1"
                                                id="modalGambarUpdate{{ $item->id }}" name="kategori-update">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('galeri_detail.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Gambar Galeri</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{-- <img src="{{ asset('uploads/admin/galeri/' . $item->nama_foto) }}"
                                                                    alt="" style="width: 200px;"> --}}
                                                                <div class="form-group">
                                                                    <input type="hidden" name="gallery_id"
                                                                        id="gallery_id" class="form-control-file border"
                                                                        required value="{{ $galeri->id }}">
                                                                    <label class="form-label font-weight-normal">Gambar<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                class="custom-file-input form-input"
                                                                                id="gambar" name="gambar[]" multiple
                                                                                required>
                                                                            <label class="custom-file-label form-control"
                                                                                for="">Pilih
                                                                                file</label>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="text-danger text_error_store text-small gambar_error_store"></span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
