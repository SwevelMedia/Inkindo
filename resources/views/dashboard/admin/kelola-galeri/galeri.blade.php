@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Galeri')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold text-dark mb-0">Kategori</h5>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                data-target="#tambah-kategori">Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 col-1">
                                        No
                                    </th>
                                    <th class="text-weight-500">Nama Kategori</th>
                                    <th class="text-weight-500">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- hapus --}}
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusKategoriGaleri{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                                {{-- edit --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalKategoriUpdate{{ $item->id }}"
                                                    data-nama="{{ $item->nama_kategori }}"><i
                                                        class="far fa-edit"></i></button>
                                            </div>
                                            {{-- modal hapus --}}
                                            <div class="modal fade" id="hapusKategoriGaleri{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="HapusKategoriGaleriLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="HapusKategoriGaleriLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('galeri_kategori.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->nama_kategori }}</b></span>
                                                                    dihapus ?
                                                                </label>
                                                                <div class="btn d-flex justify-content-end gap-2">
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
                                            {{-- Modal Edit --}}
                                            <div class="modal fade" tabindex="-1"
                                                id="modalKategoriUpdate{{ $item->id }}" name="kategori-update">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('galeri_kategori.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Kategori</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Kategori<sup class="text-danger">*</sup></label>
                                                                    <input type="text" name="nama_kategori"
                                                                        id="nama_kategori"
                                                                        class="form-control @error('nama_kategori') is-invalid @enderror"
                                                                        value="{{ $item->nama_kategori }}">
                                                                    @error('berita_kategori')
                                                                        <div class="invalid-feedback">
                                                                            {{-- {{ $message }} --}}
                                                                        </div>
                                                                    @enderror
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
                                            {{-- Modal Tambah Kategori --}}
                                            <div class="modal fade" tabindex="-1" id="tambah-kategori"
                                                name="kategori-tambah">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('galeri_kategori.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Kategori</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Kategori<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="nama_kategori" name="nama_kategori"
                                                                        placeholder="Masukkan nama kategori">
                                                                    <span
                                                                        class="text-danger text_error_store text-small name_error_store"></span>
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
        <div class="row">
            <div class="col-12">
                <div class="card card-light">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-bold text-dark mb-0">Galeri</h5>
                            </div>
                            <div>
                                <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                    data-target="#tambahGaleri">Tambah Data</button>

                                {{-- Modal Tambah --}}
                                <div class="modal fade" id="tambahGaleri" tabindex="-1" role="dialog"
                                    aria-labelledby="tambahGaleriLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahGaleriLabel">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('galeri.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label font-weight-normal">Judul<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" name="judul" id="judul"
                                                            class="form-control" placeholder="Masukkan Judul" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label font-weight-normal">Deskripsi<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" name="deskripsi" id="deskripsi"
                                                            class="form-control" placeholder="Masukkan deskripsi"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label font-weight-normal">Tanggal<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            class="form-control" placeholder="Masukkan Tanggal" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Kategori<sup
                                                                class="text-danger">*</sup></label>
                                                        <select name="kategori_gallery_id" id="kategori_gallery_id"
                                                            class="form-control form-input">
                                                            <option value="">Pilih Kategori</option>
                                                            @foreach ($kategori as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span
                                                            class="text-danger text_error_update text-small kategori_gallery_id_error_store">
                                                        </span>
                                                    </div>
                                                    <div class="form-group" enctype="multipart/form-data">
                                                        <label class="font-weight-normal">Gambar<sup
                                                                class="text-danger">*</sup></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="gambar" name="gambar[]" multiple required>
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
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
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500">No</th>
                                    <th class="text-weight-500">Judul</th>
                                    <th class="text-weight-500">Deskripsi</th>
                                    <th class="text-weight-500">Kategori</th>
                                    {{-- <th>Gambar</th> --}}
                                    <th class="text-weight-500">Tanggal</th>
                                    <th class="text-weight-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galeri as $galeri)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $galeri->judul }}</td>
                                        <td>{{ $galeri->deskripsi }}</td>
                                        <td>{{ $galeri->nama_kategori }} </td>
                                        <td> {{ $galeri->tanggal }} </td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                data-toggle="modal" data-target="#editGaleri{{ $galeri->id }}"
                                                style="width: 50px;"><i class="far fa-edit"></i></button>
                                            {{-- Modal Update --}}
                                            <div class="modal fade" id="editGaleri{{ $galeri->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editGaleriLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editGaleriLabel">Edit Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('galeri.update', $galeri->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Judul<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="nama_kategori" name="nama_kategori"
                                                                        placeholder="Masukkan Judul"
                                                                        value="{{ $galeri->judul }}">
                                                                    <span
                                                                        class="text-danger text_error_store text-small nama_kategori_error_store"></span>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label
                                                                        class="form-label font-weight-normal">Deskripsi<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control form-input"
                                                                        name="deskripsi" id="deskripsi"
                                                                        placeholder="Masukkan deskripsi"
                                                                        value="{{ $galeri->deskripsi }}">
                                                                    <span
                                                                        class="text-danger text_error_store text-small deskripsi_error_store"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="font-weight-normal">Kategori<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <select name="kategori_gallery_id"
                                                                        id="kategori_gallery_id"
                                                                        class="form-control form-input">
                                                                        <option value="">Pilih Kategori</option>
                                                                        @foreach ($kategori as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                {{ $galeri->kategori_gallery_id == $item->id ? 'selected' : '' }}>
                                                                                {{ $item->nama_kategori }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span
                                                                        class="text-danger text_error_update text-small kategori_gallery_id_error_store">
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        class="form-label font-weight-normal">Tanggal<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <input type="date" name="tanggal" id="tanggal"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Tanggal"
                                                                        value="{{ $galeri->tanggal }}">
                                                                </div>
                                                                <div class="form-group" enctype="multipart/form-data">
                                                                    <label class="font-weight-normal">Gambar<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                class="custom-file-input form-input"
                                                                                id="gambar" name="gambar[]" multiple
                                                                                required>
                                                                            <label class="custom-file-label form-control"
                                                                                for="">Pilih file</label>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="text-danger text_error_store text-small foto_perusahaan_error_store"></span>
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
                                            {{-- Modal Tambah Kategori --}}
                                            <div class="modal fade" tabindex="-1" id="tambah-kategori"
                                                name="kategori-tambah">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('galeri_kategori.store') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Kategori</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Kategori<sup class="text-danger">*</sup></label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="nama_kategori" name="nama_kategori"
                                                                        placeholder="Masukkan nama kategori">
                                                                    <span
                                                                        class="text-danger text_error_store text-small name_error_store"></span>
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
                                            <button class="btn btn-sm btn-danger far fa-trash-alt my-1"
                                                data-toggle="modal" data-target="#hapusGaleri{{ $galeri->id }}"
                                                style="width: 50px;">
                                            </button>
                                            <div class="modal fade" id="hapusGaleri{{ $galeri->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="tambahGaleriLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="tambahGaleriLabel">Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('galeri.destroy', $galeri->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                               <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $galeri->judul }}</b></span>
                                                                    dihapus ?
                                                                </label>
                                                                <div class="btn d-flex justify-content-end gap-2">
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
                                            <a href="{{ route('galeri_detail', $galeri->id) }}">
                                                <button class="btn btn-sm btn-secondary my-1" data-toggle="modal"
                                                    style="width: 50px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </button>
                                            </a>
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
