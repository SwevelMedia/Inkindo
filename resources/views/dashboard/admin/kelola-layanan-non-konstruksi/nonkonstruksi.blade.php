@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Non Konstruksi')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold mb-0">Klasifikasi Non Konstruksi</h5>
                        <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                            data-target="#tambah-kategori-konstruksi">Tambah
                            Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead class="table-info">
                            <tr>
                                <th class="text-weight-500 text-center col-1">
                                    No
                                </th>
                                <th class="text-weight-500 text-center">Kategori Layanan Konstruksi</th>
                                <th class="text-weight-500 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($klasifikasi as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{!! $item->nama_klasifikasi_non_konstruksi !!}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            {{-- hapus --}}
                                            <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                data-target="#hapusKlasifikasiKonstruksi{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i></button>

                                            {{-- edit --}}
                                            <button type="button"
                                                class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                data-toggle="modal" data-target="#modalKlasifikasiUpdate{{ $item->id }}"
                                                data-nama="#"><i class="far fa-edit"></i></button>
                                        </div>
                                        {{-- modal hapus --}}
                                        <div class="modal fade" id="hapusKlasifikasiKonstruksi{{ $item->id }}"
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
                                                        <form
                                                            action="{{ route('klasifikasi-nonkonstruksi.destroy', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{!! $item->nama_klasifikasi_non_konstruksi !!}</b></span>
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
                                            id="modalKlasifikasiUpdate{{ $item->id }}" name="kategori-update">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('klasifikasi-nonkonstruksi.update', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal"
                                                                    for="nama_klasifikasi_non_konstruksi">Nama
                                                                    Klasifikasi
                                                                    Non Konstruksi</label>
                                                                <textarea class="form-control" name="nama_klasifikasi_non_konstruksi">{{ $item->nama_klasifikasi_non_konstruksi }}</textarea>
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
                                        {{-- Modal Tambah Kategori --}}
                                        <div class="modal fade" tabindex="-1" id="tambah-kategori-konstruksi"
                                            name="tambah-kategori-konstruksi">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('klasifikasi-nonkonstruksi.store') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal"
                                                                    for="nama_klasifikasi_non_konstruksi">Jenis Layanan
                                                                    Non
                                                                    Konstruksi</label>
                                                                <textarea class="form-control" name="nama_klasifikasi_non_konstruksi"></textarea>
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
    <!------------------------------------------------------ batas------------------>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold mb-0">Jenis Layanan Non Konstruksi</h5>
                        <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                            data-target="#tambah-layanan-konstruksi2">Tambah
                            Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2_1" class="table table-bordered table-striped">
                        <thead class="table-info">
                            <tr>
                                <th class="text-weight-500 text-center align-middle">
                                    No
                                </th>
                                <th class="text-weight-500 text-center align-middle">Jenis Layanan Non Konstruksi</th>
                                <th class="text-weight-500 text-center align-middle">Deskripsi</th>
                                <th class="text-weight-500 text-center align-middle">Kategori</th>
                                <th class="text-weight-500 text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konstruksi as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{!! $item->jenis_layanan_non_konstruksi !!}</td>
                                    <td class="ps-5">{!! $item->deskripsi_layanan_non_konstruksi !!}</td>
                                    <td>{{ $item->klasifikasi_non_konstruksi->nama_klasifikasi_non_konstruksi }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            {{-- hapus --}}
                                            <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                data-target="#hapuslayananKonstruksi{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i></button>

                                            <!---- edit-->
                                            <button type="button"
                                                class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                data-toggle="modal"
                                                data-target="#modalKonstruksiUpdate{{ $item->id }}"
                                                data-nama="{{ $item->jenis_klasifikasi_non_konstruksi }}"><i
                                                    class="far fa-edit"></i></button>
                                        </div>
                                        {{-- modal hapus --}}
                                        <div class="modal fade" id="hapuslayananKonstruksi{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="HapusKategoriLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="HapusKategoriLabel">
                                                            Hapus Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('layanan-nonkonstruksi.destroy', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{{ $item->jenis_layanan_non_konstruksi }}</b></span>
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
                                            id="modalKonstruksiUpdate{{ $item->id }}"
                                            name="kategori-update{{ $item->id }}">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('layanan-nonkonstruksi.update', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Jasa Layanan
                                                                    Non Konstruksi</label>
                                                                <textarea class="form-control" name="jenis_layanan_non_konstruksi">{{ $item->jenis_layanan_non_konstruksi }}</textarea>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Deskripsi
                                                                    Layanan Non
                                                                    Konstruksi</label>
                                                                <textarea class="form-control summernote" name="deskripsi_layanan_non_konstruksi">{!! $item->deskripsi_layanan_non_konstruksi !!}</textarea>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Kategori Layanan
                                                                    Non Konstruksi</label>
                                                                <select  class="form-control form-input"
                                                                    name="klasifikasi_non_konstruksi_id"
                                                                    >
                                                                    <option selected>Pilih Kategori</option>
                                                                    @foreach ($klasifikasi as $value)
                                                                        <option value="{{ $value->id }}"
                                                                            @if ($value->id == $item->klasifikasi_non_konstruksi_id) selected @endif>
                                                                            {{ $value->nama_klasifikasi_non_konstruksi }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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
                                        {{-- Modal Tambah Kategori --}}
                                        <div class="modal fade" tabindex="-1" id="tambah-layanan-konstruksi2"
                                            name="tambah-layanan-konstruksi2">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('layanan-nonkonstruksi.store') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Jasa Layanan Non
                                                                    Konstruksi<sup
                                                                                class="text-danger">*</sup></label>
                                                                <textarea class="form-control" name="jenis_layanan_non_konstruksi"></textarea>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Deskripsi
                                                                    Layanan
                                                                    Konstruksi<sup
                                                                                class="text-danger">*</sup></label>
                                                                <textarea class="form-control summernote" name="deskripsi_layanan_non_konstruksi"></textarea>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Kategori
                                                                    Layanan Non
                                                                    Konstruksi<sup
                                                                                class="text-danger">*</sup></label>
                                                                <select 
                                                                    name="klasifikasi_non_konstruksi_id"
                                                                    class="form-control form-input">
                                                                    <option selected>Pilih Kategori</option>
                                                                    @foreach ($klasifikasi as $value)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->nama_klasifikasi_non_konstruksi }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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
@endsection
@section('script')
    <script>
        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
            ],
            styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            height: 200,
            placeholder: 'Tuliskan sesuatu disini...',
            tabsize: 4,
            tabDisable: false,
            dialogsInBody: true,
            blockquoteBreakingLevel: 0,
            defaultPastingFormat: 'html',
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
        });
    </script>
@endsection
