@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title font-weight-bold">Kategori Berita</h5>
                    </div>
                    <div>
                        <button type="button" id="custom-blue" class="btn btn-sm" data-toggle="modal" data-target="#kategoriBeritaTambah">Tambah Kategori</button>

                        {{-- Modal Tambah Kategori --}}
                        <div class="modal fade" id="kategoriBeritaTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('berita_kategori.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Kategori</label>
                                                <input type="text" name="berita_kategori" class="form-control" placeholder="Masukkan kategori baru">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" id="custom-blue" class="btn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered berita-kategori" id="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->berita_kategori }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateKategori{{ $kategori->id }}">Edit</button>

                                    {{-- Modal Update Kategori --}}
                                    <div class="modal fade" id="updateKategori{{ $kategori->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('berita_kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Nama Kategori</label>
                                                            <input type="text" name="berita_kategori" class="form-control" placeholder="Masukkan kategori baru" value="{{ $kategori->berita_kategori }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" id="custom-blue" class="btn">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('berita_kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title font-weight-bold mb-0">Data berita</h5>
                    </div>
                    <div>
                        <button class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambahBerita">Tambah Data</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
